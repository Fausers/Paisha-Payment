<?php

namespace App\Models\Sms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Outbox extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'outbox_sms';

    protected $fillable = [
        'user_id',
        'shop_id',
        'status',
        'phone',
        'message',
        'length',
        'sms_count',
        'request_id',
    ];
}
