<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
   
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'phone',
        'graduate',
        'picture',
        'gender',
    ];

    public function friend()
    {
        return $this->belongsToMany(Friend::class, 'friends');
    }
}
