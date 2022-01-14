<?php

namespace App\Models\Sms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'shop_id',
        'desc',
    ];

    public function contacts()
    {
        return $this->hasMany(\App\Models\Sms\Contact::class);
    }
}
