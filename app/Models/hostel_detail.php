<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class hostel_detail extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'o_cnic',
        'h_name',
        'h_phoneno',
        'h_state',
        'h_address',
        'h_details',
        'h_slug',
        'h_category',
        'h_country',
        'h_city',
        'h_latitude',
        'h_longitude',
        'filenames',
        'new_filenames',
        // step 2 values
        'h_rent',
        'rent_period',
        'bills_included',
        'letting_type',
        'hostel_area',
        'h_condition',
        'h_floor',
        'h_schedule',
        'h_bathroom',
        'h_mess',
        'h_lawn',
        'h_occopancy',
        // step 3 values
        'facilities',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
