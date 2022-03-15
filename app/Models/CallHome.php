<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CallHome extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'version',
        'power',
        'comm_type',
        'ip_address',
        'response',
        'pcu_shord_id',
        'command',
    ];

    public function call_home_data()
    {
        return $this->hasMany(\App\Models\CallHomeData::class);
    }

}
