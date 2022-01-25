<?php

namespace App\Http\Controllers;

use App\Models\MobilePayment;
use App\Models\OutgoingSMS;
use DOMDocument;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function tigo()
    {
    }

    public function vodacom(Request $request)
    {
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

        $initial_response =  array(
            'originatorConversationID' => $originatorConversationID,
            'transactionID' => $transactionID,
            'serviceID' => $this->generateID(),
            'conversationID' => $conversationID,
            'responseCode' => 0,
            'responseDesc' => 'Received',
            'serviceStatus' => 'Success',
            'initiator' => $initiator);

        $this->getInitialResponse($initial_response);

        $payment = new MobilePayment;
        $payment->apiUsername = $spId;
        $payment->apiPassword = $spPassword;
        $payment->serviceID = $recipient;
        $payment->transid = $transactionID;
        $payment->amount = $amount;
        $payment->msisdn = $initiator;
        $payment->referenceNo = $accountReference;
        $payment->timestamp = $transactionDate;
        $payment->recdate = $timestamp;
        $payment->payment_status = "SUCCESFUL";
        $payment->payment_status_description = "SUCCESFUL";
        $payment->mpesa_receipt = $mpesaReceipt;
        $payment->opco = $opco;

        $payment->save();

        $finalResults = array(
            'spId' => $spId,
            'spPassword' => $spPassword,
            'timestamp' => $timestamp,
            'resultType' => 'Completed',
            'resultCode' => 0,
            'resultDesc' => 'Success',
            'serviceReceipt' => $this->generateID(),
            'serviceDate' => date('Y-m-d H:i:s'),
            'serviceID' => $this->generateID(15),
            'originatorConversationID' => $originatorConversationID,
            'conversationID' => $conversationID,
            'transactionID' => $transactionID,
            'initiator' => $initiator,
            'url' => $resultURL,
            'accountReference' => $accountReference
        );

         return $this->reponceToVodacom($finalResults);


        return response($this->getInitialResponse($initial_response),200)
            ->header('Content-Type', 'text/plain');

    }

    public function generateID()
    {
        $last_msg =  OutgoingSMS::orderBy('msg_id','desc')->first();
        $last_msg->msg_id++;
        return $last_msg->msg_id;
    }

    function getInitialResponse($responseData=null){

        $dom = new DOMDocument('1.0','UTF-8');
        $dom->formatOutput = true;
        $version="2.0";

        $namespaceuri= "http://infowise.co.tz/broker/";

        $root = $dom->createElementNS($namespaceuri,'mpesaBroker'); //append namespace to root
        $root->appendChild($dom->createAttribute('version'))->appendChild($dom->createTextNode($version)); //append version 2.0
        $dom->appendChild($root);
        $response = $dom->createElement('response');
        $root->appendChild($response);

        $response->appendChild($dom->createElement('conversationID', $responseData['conversationID']));
        $response->appendChild($dom->createElement('originatorConversationID', $responseData['originatorConversationID']));
        $response->appendChild($dom->createElement('transactionID', $responseData['transactionID']));
        $response->appendChild($dom->createElement('serviceID', $responseData['serviceID']) );
        $response->appendChild($dom->createElement('responseCode', $responseData['responseCode']));
        $response->appendChild($dom->createElement('responseDesc', $responseData['responseDesc']));
        $response->appendChild($dom->createElement('serviceStatus',$responseData['serviceStatus']));

        $output=$dom->saveXML();
        return $output;
    }

    public function reponceToVodacom($responseData)
    {

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
        $servicep->appendChild($dom->createElement('spPassword',$this->getPassword($responseData['spId'],2)));
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
        $trans->appendChild( $dom->createElement('initiatorPassword',$this->getpassword($responseData['spId'],1)));

        $log_file='log.xml/'.$responseData['initiator'].'_'.'finalResult_'.date('m-d-Y_h_i_s').'.xml';
        $dom->save($log_file) or die('XML Create Error');
//https://49cc02c3-d38f-456c-af1b-e488570f4daa.mock.pstmn.io
        $callback_data=$dom->saveXML();
//        $requestURL="https://broker2.ipg.tz.vodafone.com:30009/iPG/c2b/multione";
        $requestURL="https://49cc02c3-d38f-456c-af1b-e488570f4daa.mock.pstmn.io/iPG/c2b/multione";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $requestURL);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: tex/xml',
            'Connection: Keep-Alive'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $callback_data);
        curl_setopt($ch, CURLOPT_CERTINFO, true);
        curl_setopt($ch, CURLOPT_ENCODING, "");
        curl_setopt($ch, CURLOPT_VERBOSE, true);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSLKEY, "certs/simusolar.vodacom.co.tz.key");
        curl_setopt($ch, CURLOPT_SSLCERT, "certs/simusolar.vodacom.co.tz.cer");
        $results = curl_exec($ch);

//        $flog_file=$config['log']['payment_xml_log_files'].$responseData['initiator'].'_'.'confirmResult_'.date('m-d-Y_h_i_s').'.xml';
//        $verbose_log=$config['log']['payment_xml_log_files'].$responseData['initiator'].'_'.'verbosity_'.date('m-d-Y_h_i_s').'.xml';
//
//        if (curl_errno($ch)) {
//            $error_log="Error: " . curl_error($ch);
//            file_put_contents ($verbose_log, $error_log);
//            file_put_contents ($flog_file, $results);
//        } else {
//            file_put_contents ($flog_file, $results);
//
//        }

        curl_close ($ch);

        return "Success";
    }

    function getPassword($spID=null,$passType=null){
        $config = require realpath(__DIR__.'/../../../includes/config.inc.php');
        $publicKey = $config['local']['internal']['encryptionKey'];

        $config =new Config;
        $password = $this->getApiPassword($spID);

        if($passType==1){ //passtype 1 is initiator password

            $initiatorpassword=$config->getInitPassword();
            @openssl_public_encrypt($initiatorpassword,$encryptedPassword,$publicKey,OPENSSL_PKCS1_PADDING);
            return base64_encode($encryptedPassword);   //encrypted string

         }elseif($passType==2){

        //passtype 2 is spPassword
        $timestamp=date('YmdHis');
        $pass=$spID.$password.$timestamp;
        $hash=hash('sha256', $pass);
        $spPassword=base64_encode($hash);
        return $spPassword;
     }

    }


        public function airtel()
        {
        }
        public function pesapall()
        {
        }

        public function airteluganda()
        {
        }

}