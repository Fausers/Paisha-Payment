<?php

namespace App\Models\Pos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'shop_id',
        'name',
        'description',
        'status',
        'code',
        'percent_off',
        'amount_off',
        'start_date',
        'end_date',
        'max_usage',
    ];

    public function orders()
    {
        return $this->hasMany(\App\Models\Pos\Order::class);
    }

}
