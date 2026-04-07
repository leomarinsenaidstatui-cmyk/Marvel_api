<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuadrinhosModel extends Model
{
     protected $table = 'quadrinhos';

    protected $fillable = [
        'user_id',
        'nome',
        'heroi',
        'autor',
        'ilustrador',
        'editora',
        'data_de_lancamento'

    ];
}
