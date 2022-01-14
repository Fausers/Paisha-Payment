<?php

namespace App\Models\Pos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'cart_id',
        'user_id',
        'price',
        'name',
        'phone',
        'address',
        'email',
        'coupon_id',

        // PDO Payments
        'company_ref',
        'result_code',
        'result_explanation',
        'trans_token',
        'trans_ref',
    ];

    public function shops()
    {
        return $this->belongsToMany(\App\Models\Pos\Shop::class,'shop_order')->withTimestamps();
    }

    public function customer()
    {
        return $this->belongsTo(\App\Models\User::class,'user_id');
    }

    public function cart()
    {
        return $this->belongsTo(\App\Models\Pos\Cart::class)->withTrashed();
    }

    public function user()
    {
        return $this->setConnection('mysql')->belongsTo(\App\Models\User::class)->withTrashed();
    }
}
