<?php

namespace App\Models\Sms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'group_id',
        'first_name',
        'last_name',
        'phone',
        'email',
        'address',
        'email',
    ];

    public function contacts()
    {
        return $this->hasMany(\App\Models\Sms\Contact::class);
    }
}
