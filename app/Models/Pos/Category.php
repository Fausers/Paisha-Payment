<?php

namespace App\Models\Pos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'category_id',
        'shop_id',
        'image',
        'wide',
        'thumb',
    ];

    public function categories()
    {
        return $this->hasMany(\App\Models\Pos\Category::class);
    }

    public function category()
    {
        return $this->belongsTo(\App\Models\Pos\Category::class);
    }

    public function products()
    {
        return $this->belongsToMany(\App\Models\Pos\Product::class, 'product_category')->orderBy('id', 'desc')->withTimestamps();
    }

}
