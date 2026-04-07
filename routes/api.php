<?php

use App\Http\Controllers\QuadrinhosController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UsuarioController;
use App\Http\Middleware\auth_api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// Rotas públicas da API
Route::get('/teste', [TestController::class, 'envia_teste']);
Route::get('/exibe_heroi/{id}', [TestController::class, 'exibe_heroi']);
Route::post('/cadastro_usuario', [UsuarioController::class, 'cadastra_usuario']);
Route::get('/login_novo', [UsuarioController::class, 'login']);
Route::get('/herois', [TestController::class, 'lista_herois'])->name('herois');


Route::middleware([auth_api::class])->group(function () {
    Route::post('/salva_heroi', [TestController::class, 'salva_heroi']);
    Route::put('/altera_heroi', [TestController::class, 'altera_heroi']);
    Route::delete('/deleta_heroi', [TestController::class, 'deleta_heroi']);
    
    Route::post('/salva_quadrinho', [QuadrinhosController::class, 'salva_quadrinho']);
    Route::put('/edita_quadrinho', [QuadrinhosController::class, 'edita_quadrinho']);
    Route::delete('/deleta_quadrinho', [QuadrinhosController::class, 'deleta_quadrinho']);
 
    Route::get('/quadrinhos', [QuadrinhosController::class, 'lista_quadrinhos']);
});