<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
  
   protected $table = 'Usuario';

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'telefone',
        'nascimento',
        'genero'

    ];
}
