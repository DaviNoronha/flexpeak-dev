<?php

namespace App\Http\Controllers;

use App\Perfil;
use App\Services\PerfilService;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index()
    {
        return response()->json(PerfilService::list());
    }
}
