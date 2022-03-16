<?php

namespace App\Http\Controllers\Gateway;

use App\Http\Controllers\Controller;
use App\Models\CallHome;
use App\Models\CallHomeData;
use App\Models\CellId;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CallHomeController extends Controller
{
    public function index(Request $request)
    {
//        return $request->all();
        $status = Redis::GET($request->ip());

        if ($status == 'OFF'){
            $action = "OFF";
        }else{
            $action = "ON";
        }


        $request['comm_type'] = $request['comm type'];
        $request['ip_address'] = $request->ip();
        $request['response'] = "Simusolar ".$action;
        $request['pcu_short_id'] = "9876";
        $request['command'] = $action;

        $call_home  = CallHome::create($request->all());


        foreach ($request['data'] as $data){

            $tower = $this->findTower(substr($data[6],0, -2),$data[8]);

            $call_home_data = new CallHomeData;
            $call_home_data->call_home_id = $call_home->id;
            $call_home_data->real_time = $data[0];
            $call_home_data->total_uptime = $data[1];
            $call_home_data->session_uptime = $data[2];
            $call_home_data->v_panel = $data[3];
            $call_home_data->v_out = $data[4];
            $call_home_data->isns = $data[5];
            $call_home_data->carrier = $data[6];
            $call_home_data->lac = $data[7];
            $call_home_data->ci = $data[8];
            $call_home_data->rssi = $data[9];
            $call_home_data->ber = $data[10];
            $call_home_data->lat_long = $tower->lat.','.$tower->lon;
            $call_home_data->save();
        }

        if (isset($call_home))
            echo "Updated";

        return response(json_encode($request->all()))
            ->header("Content-Type","application/json");
    }

    public function updateIP(Request $request)
    {
        $response = Redis::SET($request['ip'],$request['status']);

        if ($response == "OK"){
            $res = 'Updated';
        }else{
            $res = 'Exists';
        }

        return response(json_encode($res))
            ->header("Content-Type","application/json");
    }

    public function findTower($mmc, $cell)
    {
        $tower = CellId::where('mcc',$mmc)->where('cell',$cell)->first();
        if (isset($tower)){
            return $tower;
        }else{
            return "tower not Found";
        }
    }


}
