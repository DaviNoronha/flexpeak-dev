<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bug extends Model
{
    protected $fillable = [
        'titulo', 'descricao', 'imagem', 'status'
    ];
}
