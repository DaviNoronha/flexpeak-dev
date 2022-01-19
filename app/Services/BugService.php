<?php

namespace App\Services;

use App\Bug;
use App\Imagem;
use Illuminate\Support\Str;

class BugService
{
    public static function list()
    {
        return Bug::all();
    }

    public static function store($request)
    {
        //$arquivo = $request->allFiles('imagens');
        //$arquivo->store('imagens');

        $bug = Bug::create($request);

        /*for ($i = 0; $i < count($request->allFiles()['imagens']); $i++) {
            $arquivo = $request->allFiles('imagens');

            $bugImagem = new Imagem();
            $bugImagem->bug_id = $bug->id;
            $bugImagem->path =  $arquivo->store('imagens');
            $bugImagem->save();

        }*/

        return $bug;
    }

    public static function update($request, $bug)
    {
        return $bug->update($request);
    }

    public static function destroy($bug)
    {
        return $bug->delete();
    }
}
