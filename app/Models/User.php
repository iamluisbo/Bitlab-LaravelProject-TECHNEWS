<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['user_name', 'email', 'password', 'first_name', 'last_name', 'age'];
}
