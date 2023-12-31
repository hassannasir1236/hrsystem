<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class verifyuser extends Model
{
    use HasFactory;
    public $table= "verifyusers";
    protected $fillable = [
        'user_id',
        'token',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
