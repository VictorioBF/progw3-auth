<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model implements Authenticatable
{
    protected $hidden = [
        'password'
    ];

    function getAuthIdentifierName()
    {
        return 'id';
    }

    function getAuthIdentifier()
    {
        return $this->id;
    }

    function getAuthPassword()
    {
        return $this->password;
    }

    function getRememberToken()
    {
        return $this->remember_token;
    }

    function setRememberToken($value)
    {
        $this->remember_token = $value;

        return;
    }

    function getRememberTokenName()
    {
        return 'remember_token';
    }

    use HasFactory;

    public $timestamps = false;
}
