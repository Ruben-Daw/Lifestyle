<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;   

class User extends Authenticatable
{
    protected $primaryKey = 'usuari_id';
    protected $fillable = ['nom', 'cognoms', 'data_naixement', 'username', 'email', 'password', 'tipus_privilegi'];
}
