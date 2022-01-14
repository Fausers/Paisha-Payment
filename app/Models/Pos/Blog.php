<?php

namespace App\Models\Pos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'content',
        'author',
        'image',
    ];


    public function category()
    {
        return $this->belongsTo(\App\Models\Pos\Category::class);
    }
}
