<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoBugController;
use App\Http\Controllers\PerfilController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('api')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('bugs', BugController::class);
    Route::get('tipo-bugs', [TipoBugController::class, 'index']);
    Route::get('perfis', [PerfilController::class, 'index']);
});
