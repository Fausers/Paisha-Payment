<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CallHomeData extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'call_home_id',
        'real_time',
        'total_uptime',
        'session_uptime',
        'v_panel',
        'v_out',
        'isns',
        'carrier',
        'lac',
        'ci',
        'rssi',
        'ber',
        'lat_long',
    ];
}
