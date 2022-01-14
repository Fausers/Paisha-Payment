<?php

namespace App\Models\Pos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function owners()
    {
        return $this->belongsToMany(\App\Models\User::class,config('app.first_db').'.user_shop')->withTimestamps();
    }

    public function owner()
    {
        return $this->setConnection('mysql')->belongsToMany(\App\Models\User::class,'user_shop')->withTimestamps();
    }

    public function products()
    {
        return $this->hasMany(\App\Models\Pos\Product::class);
    }

    public function orders()
    {
        return $this->belongsToMany(\App\Models\Pos\Order::class,'shop_order')->withTimestamps();
    }

    public function shop_orders()
    {
        return $this->hasMany(\App\Models\Pos\ShopOrder::class);
    }

    public function taxes()
    {
        return $this->hasMany(\App\Models\Pos\Tax::class);
    }

    public function outbox()
    {
        return $this->hasMany(\App\Models\Sms\Outbox::class);
    }

    public function balance()
    {
        return $this->hasOne(\App\Models\Sms\Balance::class);
    }

    public function sales()
    {
        return $this->hasMany(\App\Models\Pos\Sale::class);
    }


}
