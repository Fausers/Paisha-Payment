<?php

namespace App\Models\Sms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inbox extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'callback_id',
        'from',
        'to',
        'channel',
        'timeUTC',
        'transaction_id',
        'timeUTC',
        'media',
        'billing',
        'message'
    ];
}
