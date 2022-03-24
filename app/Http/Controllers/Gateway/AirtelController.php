<?php

namespace App\Http\Controllers\Gateway;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AirtelController extends Controller
{

    public function index(Request $request)
    {
        $myfile = fopen('log/airtel/'.date('m_d_i_s',strtotime(now())).'.json', "w") or die("Unable to open file!");
        $txt = $request->getContent();
        fwrite($myfile, $txt);
        fclose($myfile);

        $response = ['data'=>["first_name"=> "Dealer","first_name"=> "Dealer"]];

        $ree = "Success";


        return response(json_encode($ree),'200')->header('Content-Type','application/json');
    }


    public function airtel(Request $request)
    {
        $resources = new Payment();
        $responses = new Responses();

        $payload = simplexml_load_string($request->getBody());
        $TYPE = (string)$payload->TYPE;
        $TXNID = (string)$payload->TXNID; // FIX-ME
        $MSISDN = (string)$payload->MSISDN;
        $AMOUNT = (double)$payload->AMOUNT;
        $COMPANYNAME = (string)$payload->COMPANYNAME;
        $opco = 1; // set operation country to Tanzania

        if ($COMPANYNAME == '237733') {
            $COMPANYNAME = 'TIGOPESA';
        }

        $CUSTOMERREFERENCEID =(string)$payload->CUSTOMERREFERENCEID;

        if ($TYPE == 'TXN_ALLOCATION') {
            $COMPANYNAME_DESC = 'SIMUSOLAR LTD';
        } else {
            $COMPANYNAME_DESC = 'TIGOPESA';
        }

        $operator = 'Tigo';

        $DATE = date('Y-m-d');

        $resources->addPayment($COMPANYNAME, $COMPANYNAME, $COMPANYNAME_DESC, $TXNID, $AMOUNT, $CUSTOMERREFERENCEID, $MSISDN, $DATE, $TXNID, $opco);

        $RESPONSE = array(
            'TYPE' => $TYPE,
            'TXNID' => $TXNID,
            'REFID' => $resources->generateID(),
            'RESULT' => 'TS',
            'ERRORCODE' => 'error000',
            'ERRORDESC' => 'Succesful',
            'MSISDN' => $MSISDN,
            'FLAG' => 'Y',
            'CONTENT' => 'Malipo Yamepokelewa',
            'CUSTOMERREFERENCEID' => $CUSTOMERREFERENCEID
        );

        echo $responses->tigoResponse($RESPONSE);

        $prefix = strtoupper(substr($CUSTOMERREFERENCEID, 0, 4));
        $c_prefix = strtoupper(substr($CUSTOMERREFERENCEID, 0, 3));

        $sys_prefix = 'C300';
        $c_sys_prefix = '300';

        $comparison = strcmp($prefix, $sys_prefix);
        $c_comparison = strcmp($c_prefix, $c_sys_prefix);

        if ($comparison == 0 || $c_comparison == 0) {
            $CUSTOMERREFERENCEID = substr($CUSTOMERREFERENCEID, -10);
        }

        $data['transactionId'] = $TXNID;
        $data['amount'] = $AMOUNT;
        $data['currency'] = 'TZS';
        $data['paymentReference'] = $CUSTOMERREFERENCEID;
        $data['financialServiceProvider'] = $COMPANYNAME_DESC;
        $data['payer'] = $MSISDN;
        $date = new DateTime('now');
        $data['date'] = $date->format(DATE_ISO8601);
        $data['opco'] = $opco; // Tanzania aka Tz

        $route_payment = new Route();

        $route_payment->process_routing($data);
        }
}
