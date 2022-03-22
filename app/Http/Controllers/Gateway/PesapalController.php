<?php

namespace App\Http\Controllers\Gateway;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PesapalController extends Controller
{
    public function index(Request $request)
    {


        $payload = simplexml_load_string($request->getContent());


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, route('pesapal_save'));
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Connection: Keep-Alive'
        ));
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_exec($ch);

         return response($request->getContent(),'201')->header('Content-Type','application/json');
    }

    public function save(Request $request)
    {
        $myfile = fopen('log/pesapal/'.date('m_d_i_s',strtotime(now())).'.json', "w") or die("Unable to open file!");
        $txt = $request->getContent();
        fwrite($myfile, $txt);
        fclose($myfile);

        echo "Done";
    }
}
