<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OcorrenciaController;
use App\Http\Controllers\LoginController;

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

});