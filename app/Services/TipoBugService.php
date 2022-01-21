<?php

namespace App\Services;

use App\TipoBug;
use Illuminate\Support\Facades\Log;
use Throwable;

class TipoBugService
{
    public static function list()
    {
        try {
            return TipoBug::all();
        } catch (Throwable $th) {
            Log::error([
                'mensagem' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }

    }
}
