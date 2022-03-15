<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CellId extends Model
{
    use HasFactory;

    protected $fillable = [
        'radio',
        'mcc',
        'net',
        'area',
        'cell',
        'unit',
        'lon',
        'lat',
        'range',
        'samples',
        'changeable',
        'created',
        'updated',
        'average_signal',
    ];

}
