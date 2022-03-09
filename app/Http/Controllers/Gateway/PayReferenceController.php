<?php

namespace App\Http\Controllers\Gateway;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redis;

class PayReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $response = Redis::SMEMBERS('pay_ref');
        return response(json_encode($response),'200')->header('Content-Type','application/json');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $response = Redis::SADD('pay_ref',$request['reference']);
        if ($response == 1){
            return response('Payment Reference Added','201')->header('Content-Type','application/json');
        }else{
            return response('Payment Reference Already Exist','202')->header('Content-Type','application/json');
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $response = Redis::sismember('pay_ref',$id);
        return response(json_encode($response),'200')->header('Content-Type','application/json');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request): Response
    {
        $response = Redis::SREM('pay_ref',$request['id']);

        if ($response == 1){
            return response('Reference Deleted','203')->header('Content-Type','application/json');
        }else{
            return response('Reference Not Found','202')->header('Content-Type','application/json');
        }

    }
}
