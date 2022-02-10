<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_for_qrcode',
        'name',
        'email',
        'password',
        'furigana',
        'sex',
        'district',
        'birth_date',
        'age',
        'address',
        'phone_number',
        'ec_phone_number',
        'ec_name',
        'ec_address',
        'relative_name1',
        'relative_name2',
        'relative_name3',
        'special_request',
        'disclosure_permission'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
