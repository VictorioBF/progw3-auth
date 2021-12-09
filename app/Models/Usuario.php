<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model implements Authenticatable
{
    function getAuthIdentifierName(){
        return 'id';
    }
    
    function getAuthIdentifier(){
        return $this->id;
    }

    function getAuthPassword(){
        return $this->password;
    }

    function getRememberToken(){
        return;
    }
    
    function setRememberToken($data){
        return;
    }

    function getRememberTokenName(){
        return 'token';
    }

    use HasFactory;

    public $timestamps = false;
}
