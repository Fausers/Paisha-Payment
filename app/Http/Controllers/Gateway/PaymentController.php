<?php

namespace App\Http\Controllers\Gateway;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use DOMDocument;
use Illuminate\Support\Facades\Redis;
use function response;

class PaymentController extends Controller
{
    public function tigo()
    {
    }

    public function generateID()
    {
//        $last_msg =  OutgoingSMS::orderBy('msg_id','desc')->first();
        $last_msg = rand(2000,9999);
        $last_msg++;
        return $last_msg;
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



    function getPassword($spID=null,$passType=null){
        $publicKey = 'file:///laragon/www/payment/public/certs/broker.tz.vodafone.com.pem';

        $wallet = Wallet::where('api_username',$spID)->first();
        $password = $wallet->api_password;


        if($passType==1){ //passtype 1 is initiator password

            $initiatorpassword= $wallet->api_secret;
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
