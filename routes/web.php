<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OcorrenciaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return 'Registro Urbano Web3';
});

Route::get('/sobre', function () {
    return 'Página Sobre';
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/ocorrencias', [OcorrenciaController::class, 'index']);

Route::middleware(['auth'])->group(function () {

    Route::get('/ocorrencias/cadastrar', [OcorrenciaController::class, 'cadastrar']);
    Route::get('/admin', [OcorrenciaController::class, 'admin']);
    Route::post('/ocorrencias', [OcorrenciaController::class, 'salvar']);
    Route::get('/ocorrencias/{id}/editar', [OcorrenciaController::class, 'editar']);
    Route::put('/ocorrencias/{id}', [OcorrenciaController::class, 'atualizar']);
    Route::delete('/ocorrencias/{id}', [OcorrenciaController::class, 'excluir']);

    Route::get('/usuarios', [UsuarioController::class, 'index']);
    Route::get('/usuarios/cadastrar', [UsuarioController::class, 'cadastrar']);
    Route::post('/usuarios', [UsuarioController::class, 'salvar']);
    Route::get('/usuarios/{id}', [UsuarioController::class, 'mostrar']);
    Route::get('/usuarios/{id}/editar', [UsuarioController::class, 'editar']);
    Route::put('/usuarios/{id}', [UsuarioController::class, 'atualizar']);
    Route::delete('/usuarios/{id}', [UsuarioController::class, 'excluir']);
});