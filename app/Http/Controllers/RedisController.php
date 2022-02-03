<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class RedisController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return string
     */
    public function show(): string
    {
        $orders = Order::get();

//        foreach ($orders as $order){
//            Redis::sadd('pay_ref', $order->OrderPaymentRefNo);
//        }

        $values = Redis::sismember('pay_ref','2101000885');


        return json_encode($values);
    }
}
