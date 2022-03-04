<?php

namespace App\Http\Controllers\Gateway;

use App\Http\Controllers\Controller;
use App\Models\MobilePayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class VodacomController extends Controller
{
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
            $serviceStatus = 'Success';
            $code = 0;
        }

        $initial_response =  array(
            'originatorConversationID' => $originatorConversationID,
            'transactionID' => $transactionID,
            'serviceID' => $payment_control->generateID(),
            'conversationID' => $conversationID,
            'responseCode' => $code,
            'responseDesc' => 'Received',
            'serviceStatus' => $serviceStatus,
            'initiator' => $initiator);

        $payment_control->getInitialResponse($initial_response);

        $payment = new MobileP ayment;
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


        return response($payment_control->responseToVodacom($finalResults),200)
            ->header('Content-Type', 'text/plain');


    }
}
