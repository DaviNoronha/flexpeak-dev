<?php

namespace App\Http\Controllers;

use App\Bug;
use App\Http\Requests\BugRequest;
use App\Imagem;
use App\Services\BugService;
use App\Services\TipoBugService;
use Illuminate\Http\Request;

class BugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(BugService::list());
    }

    public function create()
    {
        return view('createBug', [
            'tipo_bugs' => TipoBugService::list()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BugRequest $request)
    {
        $bug = new Bug();
        $bug->titulo = $request->titulo;
        $bug->descricao = $request->descricao;
        $bug->tipo_bug_id = $request->tipo_bug_id;
        $bug->status = 1;
        $bug->save();

        for ($i = 0; $i < count($request->allFiles()['imagens']); $i++) {
            $arquivo = $request->allFiles()['imagens'][$i];

            $imagem = new Imagem();
            $imagem->bug_id = $bug->id;
            $imagem->path = $arquivo->store('bugs/' . $bug->id);
            $imagem->save();
        }
        return redirect()->route('bugs.form');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bug  $bug
     * @return \Illuminate\Http\Response
     */
    public function show(Bug $bug)
    {
        return response()->json($bug);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bug  $bug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bug $bug)
    {
        return response()->json(BugService::changeStatus($request->all(), $bug));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bug  $bug
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bug $bug)
    {
        return response()->json(BugService::destroy($bug));
    }
}
