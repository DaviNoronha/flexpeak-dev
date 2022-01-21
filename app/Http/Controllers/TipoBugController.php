<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TipoBugService;

class TipoBugController extends Controller
{
    public function index()
    {
        return response()->json(TipoBugService::list());
    }
}
