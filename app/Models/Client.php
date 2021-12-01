<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticate;

class Client extends Authenticate
{
    use Notifiable;
    protected $guard = 'client';
    protected $fillable = [
        'name','first_name', 'email', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
