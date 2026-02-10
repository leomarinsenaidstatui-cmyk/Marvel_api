<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarvelModel extends Model
{
   protected $table = 'marvel';

    protected $fillable = [
        'nome',
        'codinome',
        'idade',
        'habilidades',
        'equipe',
        'primeira_aparicao'

    ];
}
