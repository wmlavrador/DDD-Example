<?php

use App\Http\Controllers\Usuarios\UsuariosController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Empresas\EmpresasController;

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

// Contexto de Usuarios
Route::group(['prefix' => 'usuarios'], function(){
    Route::resource('/', UsuariosController::class);
});

// Contexto de Empresas
Route::group(['prefix' => 'empresas'], function(){
    Route::resource('/', EmpresasController::class);
});
