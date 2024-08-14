<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model implements Authenticatable, CanResetPassword
{
    use HasFactory, AuthenticatableTrait, CanResetPasswordTrait, Notifiable;
    protected $table = 'usuarios';
    protected $fillable = [
        'nome',
        'email',
        'senha',
        'status_login',
    ];

    public function getAuthPassword()
    {
        return $this->senha;
    }
}