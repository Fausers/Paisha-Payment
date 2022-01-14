<?php

namespace App\Models\Pos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'category_id',
        'shop_id',
        'user_id',
        'details',
        'description',
        'product_type',
        'status',
        'remarks',
        'colours',
        'sizes',
    ];


    public function categories()
    {
        return $this->belongsToMany(\App\Models\Pos\Category::class,"product_category")->orderBy('id','desc');
    }

    public function shop()
    {
        return $this->belongsTo(\App\Models\Pos\Shop::class);
    }

    public function price()
    {
        return $this->hasOne(\App\Models\Pos\Price::class);
    }

    public function costs()
    {
        return $this->hasOne(\App\Models\Pos\Price::class);
    }

    public function images()
    {
        return $this->hasMany(\App\Models\Pos\ProductImage::class);
    }

    public function image()
    {
        return $this->hasOne(\App\Models\Pos\ProductImage::class);
    }

    public function taxes()
    {
        return $this->belongsToMany(\App\Models\Pos\Tax::class,"product_tax")->orderBy('id','desc');
    }

    public function stock()
    {
        return $this->hasOne(\App\Models\Pos\Stock::class);
    }
}
