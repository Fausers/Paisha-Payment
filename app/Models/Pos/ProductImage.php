<?php

namespace App\Models\Pos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImage extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'product_id',
        'path',
        'wide',
        'shop_id',
        'thumb_car',
        'main_car',
    ];

    public function product()
    {
        return $this->belongsTo(\App\Models\Pos\Product::class);
    }
}
