<?php

namespace App\Http\Controllers;

use App\Bug;
use App\Http\Requests\BugRequest;
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
        $bug = BugService::store($request->all(), $request);
        if ($bug) {
            return view('createBug', [
                'success' => true,
                'tipo_bugs' => TipoBugService::list()
            ]);
        } else {
            return view('createBug', [
                'success' => false,
                'tipo_bugs' => TipoBugService::list()
            ]);
        }
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
