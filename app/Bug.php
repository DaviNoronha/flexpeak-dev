<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bug extends Model
{
    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];

    protected $fillable = [
        'titulo', 'descricao', 'imagem', 'status', 'tipo_bug_id'
    ];

    public function imagens()
    {
        return $this->hasMany(Imagem::class);
    }

    public function tipoBug()
    {
        return $this->belongsTo(TipoBug::class);
    }
}
