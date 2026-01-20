<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'user_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'property_id',
        'full_name',
        'email',
        'password',
        'role',
        'profile_image_url',
        'otp_code',
        'otp_expiry'
    ];

    protected $hidden = ['password', 'otp_code'];

    protected $casts = [
        'otp_expiry' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
