<?php

use App\Http\Controllers\Usuarios\UsuariosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Empresas\EmpresasController;

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
Route::resource('usuarios', UsuariosController::class);
Route::group(['prefix' => 'usuarios'], function(){
    Route::put('desassociar-empresas', [UsuariosController::class, 'desassociarEmpresas']);
    Route::put('associar-empresas', [UsuariosController::class, 'associarEmpresas']);
});

// Contexto de Empresas
Route::resource('empresas', EmpresasController::class);
Route::group(['prefix' => 'empresas'], function(){
    Route::put('desassociar-usuarios', [EmpresasController::class, 'desassociarUsuarios']);
    Route::put('associar-usuarios', [EmpresasController::class, 'associarUsuarios']);
});
