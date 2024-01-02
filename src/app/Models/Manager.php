<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Manager extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $guard = 'manager';

    protected $fillable = [
        'name', 'email', 'password',
    ];

}
