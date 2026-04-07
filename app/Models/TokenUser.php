<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TokenUser extends Model
{
  
   protected $table = 'TokenUser';

    protected $fillable = [
        'token',
        'user_id',
        'valido_ate'
        

    ];
}
