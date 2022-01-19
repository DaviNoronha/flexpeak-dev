<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoBug extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function bugs()
    {
        return $this->hasMany(Bug::class);
    }
}
