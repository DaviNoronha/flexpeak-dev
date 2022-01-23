<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BugController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [BugController::class, 'create'])->name('bugs.form');
Route::post('/forum/create', [BugController::class, 'store'])->name('bugs.salvar');

Auth::routes();

Route::get('/home', function () {
    return redirect('/restrito/home');
});

Route::get('/restrito/', function () {
    return redirect('/restrito/home');
});

Route::get('restrito/{any}', function () {
    return view('app');
})->where('any', '.*')->middleware('auth');
