<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;

    public $timestamps = false;
    
    protected $fillable = [
        'full_name',
        'email',
        'password',
        'created_at'
    ];
}
