<?php

namespace App\Models\Pos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'shop_id',
        'product_id',
        'qty',
        'cost',
        'cost_tax',
        'value',
        'value_tax',
    ];

    public function shop()
    {
        return $this->belongsTo(\App\Models\Pos\Shop::class);
    }

    public function product()
    {
        return $this->belongsTo(\App\Models\Pos\Product::class);
    }
}
