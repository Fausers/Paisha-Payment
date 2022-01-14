<?php

namespace App\Models\Pos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tax extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function products()
    {
        return $this->belongsToMany(\App\Models\Pos\Product::class,"product_tax")->orderBy('id','desc');
    }
}
