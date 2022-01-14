<?php

namespace App\Models\Pos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartItems extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function product()
    {
        return $this->belongsTo(\App\Models\Pos\Product::class)->withTrashed();
    }

    public function cart()
    {
        return $this->belongsTo(\App\Models\Pos\Cart::class)->withTrashed();
    }
}
