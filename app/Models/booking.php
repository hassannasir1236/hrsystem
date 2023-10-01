<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;
     protected $fillable = [
        'uid',
        'hid',
        'oid',
        'status',
        'payment_status',
        'txno',
        'amount',
        'people',
        'message',
        'roomno',
    ];
}
