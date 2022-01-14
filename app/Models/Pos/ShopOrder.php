<?php

namespace App\Models\Pos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShopOrder extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function order()
    {
        return $this->belongsTo(\App\Models\Pos\Order::class);
    }
}
