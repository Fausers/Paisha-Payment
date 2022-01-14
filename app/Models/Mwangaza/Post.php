<?php

namespace App\Models\Mwangaza;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'post_category_id',
        'title',
        'artist_name',
        'title',
        'desc',
        'content',
        'status',
        'post_date',
        'image_url',
        'likes',
        'shares',
        'views',
        'tags',
        'asset_url',
    ];

    public function post_category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Mwangaza\PostCategory::class);
    }

    public function author(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class,'user_id');
    }

    public function images(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Mwangaza\PostImage::class);
    }

    public function main_tags(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Mwangaza\Tag::class);
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Mwangaza\Comment::class)->where('comment_id',null)->orderBy('created_at','desc');
    }
}
