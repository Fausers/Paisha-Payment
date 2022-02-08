<?php

namespace App\Http\Controllers\Gateway;

use App\Http\Controllers\Controller;
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


        $values = Redis::sismember('pay_ref','2101000885');


        return json_encode($values);
    }
}
