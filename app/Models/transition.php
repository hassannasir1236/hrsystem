<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transition extends Model
{
    use HasFactory;
    protected $fillable = [
        'hid',
        'oid',
        'method',
        'account_title',
        'account_no',
    ];
}
