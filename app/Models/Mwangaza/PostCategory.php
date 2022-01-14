<?php

namespace App\Models\Mwangaza;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'image'];

    public function posts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Mwangaza\Post::class)->orderBy('created_at','desc');
    }

    public function popular(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Mwangaza\Post::class)->orderBy('views','desc')->limit(4);
    }

    public function four_posts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Mwangaza\Post::class)->orderBy('views','desc')->limit(6);
    }

    public function new(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Mwangaza\Post::class)->orderBy('created_at','desc')->limit(4);
    }
}
