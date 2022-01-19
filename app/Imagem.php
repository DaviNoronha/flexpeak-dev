<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    protected $table = 'imagens';

    public function bug()
    {
        return $this->belongsTo(Bug::class);
    }
}
