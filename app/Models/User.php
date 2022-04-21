<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;  
use Illuminate\Notifications\Notifiable; 
use Illuminate\Contracts\Auth\CanResetPassword;

class User extends Authenticatable implements MustVerifyEmail
{

    use Notifiable;

    protected $primaryKey = 'usuari_id';
    protected $fillable = ['nom', 'cognoms', 'data_naixement', 'username', 'email', 'password', 'tipus_privilegi',];
}
