<?php

namespace App\Models\Mwangaza;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostImage extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'post_id',
        'main',
        'mid',
        'thumb',
    ];

    public function post(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Mwangaza\Post::class);
    }
}
