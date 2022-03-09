<?php

namespace App\Http\Controllers\Gateway;

use App\Http\Controllers\Controller;
use App\Models\MobilePayment;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class VodacomController extends Controller
{
    public function __construct(PaymentController $payment_control)
    {
        $this->payment_control = $payment_control;
    }

    public function vodacom(Request $request)
    {

        $payment_control = new PaymentController;

        $payload = simplexml_load_string($request->getContent());

        $spId = (string)$payload->request->serviceProvider->spId;
        $spPassword = (string)$payload->request->serviceProvider->spPassword;
        $timestamp = (string)$payload->request->serviceProvider->timestamp;

        $amount = (double)$payload->request->transaction->amount;
        $commandID = (string)$payload->request->transaction->commandID;
        $initiator = (string)$payload->request->transaction->initiator;
        $conversationID = (string)$payload->request->transaction->conversationID;
        $originatorConversationID = (string)$payload->request->transaction->originatorConversationID;
        $recipient = (string)$payload->request->transaction->recipient;
        $mpesaReceipt = (string)$payload->request->transaction->mpesaReceipt;
        $transactionDate = (string)$payload->request->transaction->transactionDate;
        $accountReference = (string)$payload->request->transaction->accountReference;
        $transactionID = (string)$payload->request->transaction->transactionID;

        $resultURL = (string)$payload->request->resultURL;
        $opco = 1; // /Operation country TZ
        $operator = 'Vodacom';

//        Check Existence Of account  Redis
        $values = Redis::sismember('pay_ref', $accountReference);

//        return json_encode($values);
        if (json_encode($values) == 0){
            $serviceStatus = 'FAILED';
            $code = 999;
        }else{
            $serviceStatus = 'SUCCESSFUL';
            $code = 0;
        }

        $initial_response =  array(
            'originatorConversationID' => $originatorConversationID,
            'transactionID' => $transactionID,
            'serviceID' => '237733',
            'conversationID' => $conversationID,
            'responseCode' => $code,
            'responseDesc' => 'Received',
            'serviceStatus' => $serviceStatus,
            'initiator' => $initiator);

        $payment_control->getInitialResponse($initial_response);
//        End Here if Payment Reference not Found in our DB
        if ($code == 999)
            return response('Payment Reference not found','206')->header('Content-Type','application/json');

        $payment = new MobilePayment;
        $payment->api_username = $spId;
        $payment->api_password = $spPassword;
        $payment->service_id = $recipient;
        $payment->trans_id = $transactionID;
        $payment->amount = $amount;
        $payment->msnid = $initiator;
        $payment->reference_no = $accountReference;
        $payment->trans_date = $transactionDate;
        $payment->trans_timestamp = $timestamp;
        $payment->payment_status = $serviceStatus;
        $payment->payment_status_desc = "SUCCESFUL";
        $payment->payment_receipt = $mpesaReceipt;
        $payment->opco = $opco;

        $payment->save();

        $finalResults = array(
            'spId' => $spId,
            'spPassword' => $spPassword,
            'timestamp' => $timestamp,
            'resultType' => 'Completed',
            'resultCode' => 0,
            'resultDesc' => 'Success',
            'serviceReceipt' => $payment_control->generateID(),
            'serviceDate' => date('Y-m-d H:i:s'),
            'serviceID' => $payment_control->generateID(15),
            'originatorConversationID' => $originatorConversationID,
            'conversationID' => $conversationID,
            'transactionID' => $transactionID,
            'initiator' => $initiator,
            'url' => $resultURL,
            'accountReference' => $accountReference
        );


        return response($this->responseToVodacom($finalResults),200)
            ->header('Content-Type', 'text/plain');
    }

    public function responseToVodacom($responseData)
    {

//        return $this->getPassword($responseData['spId'],2);

        $dom = new DOMDocument('1.0','UTF-8');
        $dom->formatOutput = true;
        $version="2.0";
        $namespaceuri= "http://infowise.co.tz/broker/";
        $root = $dom->createElementNS($namespaceuri,'mpesaBroker'); //append namespace to root
        $root->appendChild($dom->createAttribute('version'))->appendChild($dom->createTextNode($version)); //append version 2.0
        $dom->appendChild($root);
        $response = $dom->createElement('result');
        $servicep =$dom->createElement('serviceProvider');
        $trans =$dom->createElement('transaction');
        $response->appendChild($servicep);
        $response->appendChild($trans);
        $root->appendChild($response);

        $servicep->appendChild($dom->createElement('spId',$responseData['spId']));
        $servicep->appendChild($dom->createElement('spPassword',$this->payment_control->getPassword($responseData['spId'],2)));
        $servicep->appendChild($dom->createElement('timestamp',$responseData['timestamp']));

        $trans->appendChild( $dom->createElement('resultType',$responseData['resultType']));
        $trans->appendChild( $dom->createElement('resultCode',$responseData['resultCode']));
        $trans->appendChild( $dom->createElement('resultDesc',$responseData['resultDesc']));
        $trans->appendChild( $dom->createElement('serviceReceipt',$responseData['serviceReceipt']));
        $trans->appendChild( $dom->createElement('serviceDate',$responseData['serviceDate']));
        $trans->appendChild( $dom->createElement('serviceID',$responseData['serviceID']));
        $trans->appendChild( $dom->createElement('originatorConversationID',$responseData['originatorConversationID']));
        $trans->appendChild( $dom->createElement('conversationID',$responseData['conversationID']));
        $trans->appendChild( $dom->createElement('transactionID',$responseData['transactionID']));
        $trans->appendChild( $dom->createElement('initiator',$responseData['initiator']));
        $trans->appendChild( $dom->createElement('initiatorPassword',$this->payment_control->getpassword($responseData['spId'],1)));

        $log_file='log.xml/'.$responseData['initiator'].'_'.'finalResult_'.date('m-d-Y_h_i_s').'.xml';
        $dom->save($log_file) or die('XML Create Error');
//https://49cc02c3-d38f-456c-af1b-e488570f4daa.mock.pstmn.io
        $callback_data=$dom->saveXML();
//        $requestURL="https://broker2.ipg.tz.vodafone.com:30009/iPG/c2b/multione";
        $requestURL="https://cddd16db-b1d8-48dd-9b28-1940e1b02a88.mock.pstmn.io/to_vodacom";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $requestURL);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: tex/xml',
            'Connection: Keep-Alive'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $callback_data);
        curl_setopt($ch, CURLOPT_CERTINFO, true);
        curl_setopt($ch, CURLOPT_ENCODING, "");
        curl_setopt($ch, CURLOPT_VERBOSE, true);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSLKEY, "file:///laragon/www/payment/public/certs/simusolar.vodacom.co.tz.key");
//        curl_setopt($ch, CURLOPT_SSLCERT, "file:///laragon/www/payment/public/certs/simusolar.vodacom.co.tz.cer");
        $response = curl_exec($ch);

        // Check for errors
        if($response === FALSE){
            echo $response;

            die(curl_error($ch));
        }
        return $response;

    }
}
