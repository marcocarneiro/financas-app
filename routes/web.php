<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovimentoController; 

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

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware(['auth:sanctum', 'verified'])
->get('/dashboard', [MovimentoController::class, 'getMovimentos'])
->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])->get('/novo_movimento', function () {
    return view('novo_movimento');
})->name('novo_movimento');

Route::post('/novomovimento', [MovimentoController::class, 'store']);

Route::middleware(['auth:sanctum', 'verified'])
->get('/editar/{id}', [MovimentoController::class, 'editar'])->name('editar');

Route::middleware(['auth:sanctum', 'verified'])
->put('/updatemovimento/{id}', [MovimentoController::class, 'updatemovimento'])->name('updatemovimento');

Route::middleware(['auth:sanctum', 'verified'])
->delete('/deletar/{id}', [MovimentoController::class, 'destroy'])->name('deletar');

