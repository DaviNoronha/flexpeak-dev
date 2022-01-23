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
            return Bug::with(['imagens', 'tipoBug'])->get();
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
        try {
            $bug = Bug::create($request);

            for ($i = 0; $i < count($request->allFiles()['imagens']); $i++) {
                $arquivo = $request->allFiles()['imagens'][$i];

                $imagem = new Imagem();
                $imagem->bug_id = $bug->id;
                $imagem->path = $arquivo->store('bugs/' . $bug->id);
                $imagem->save();
            }

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
            foreach ($bug->imagens as $imagem) {
                $imagem->delete();
            }
            return $bug->delete();
        } catch (Throwable $th) {
            Log::error([
                'mensagem' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }

    public static function changeStatus($request, $bug)
    {
        try {
            $bug->update($request);
            $bug->status = $bug->status + 1;
            $bug->save();
            return $bug;
        } catch (Throwable $th) {
            Log::error([
                'mensagem' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }
}
