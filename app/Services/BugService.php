<?php

namespace App\Services;

use App\Bug;
use App\Imagem;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Throwable;

class BugService
{
    public static function list()
    {
        try {
            return Bug::all();
        } catch (Throwable $th) {
            Log::error([
                'mensagem' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }

    }

    public static function store($request)
    {
        //$arquivo = $request->allFiles('imagens');

        //$arquivo->store('imagens');
                /*for ($i = 0; $i < count($request->allFiles()['imagens']); $i++) {
            $arquivo = $request->allFiles('imagens');

            $bugImagem = new Imagem();
            $bugImagem->bug_id = $bug->id;
            $bugImagem->path =  $arquivo->store('imagens');
            $bugImagem->save();

        }*/
        try {
            $bug = Bug::create($request);
            return $bug;
        } catch (Throwable $th) {
            Log::error([
                'mensagem' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }

    }

    public static function update($request, $bug)
    {
        try {
            return $bug->update($request);
        } catch (Throwable $th) {
            Log::error([
                'mensagem' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }

    }

    public static function destroy($bug)
    {
        try {
            return $bug->delete();
        } catch (Throwable $th) {
            Log::error([
                'mensagem' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }
}
