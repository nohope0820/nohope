<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    public $timestamps = false;
      /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'my_ID',
        'customer_ID',
        'status',
    ];
}
