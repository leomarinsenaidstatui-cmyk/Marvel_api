<?php

use App\Http\Controllers\QuadrinhosController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UsuarioController;
use App\Http\Middleware\auth_api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::get('/enviar_codigo', [UsuarioController::class, 'enviar_codigo']);

    

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// Rotas públicas da API
Route::get('/teste', [TestController::class, 'envia_teste']);
Route::get('/exibe_heroi/{id}', [TestController::class, 'exibe_heroi']);
Route::post('/cadastro_usuario', [UsuarioController::class, 'cadastra_usuario']);
Route::get('/login_novo', [UsuarioController::class, 'login']);
Route::get('/herois', [TestController::class, 'todos_herois'])->name('api.herois');
Route::get('/todos_herois', [TestController::class, 'todos_herois']);
Route::post('/salva_heroi', [TestController::class, 'salva_heroi']);
Route::get('/teste_email/{id_usuario}',[UsuarioController::class,'testa_email']);
Route::get('/testa_email/{id_usuario}',[UsuarioController::class,'testa_email']);


Route::middleware([auth_api::class])->group(function () {
    Route::put('/altera_heroi/{id}', [TestController::class, 'altera_heroi']);
    Route::delete('/deleta_heroi', [TestController::class, 'deleta_heroi']);
    Route::put('/reatribui_dono_heroi', [TestController::class, 'reatribui_dono_heroi']);
    
    Route::post('/salva_quadrinho', [QuadrinhosController::class, 'salva_quadrinho']);
    Route::put('/edita_quadrinho', [QuadrinhosController::class, 'edita_quadrinho']);
    Route::delete('/deleta_quadrinho', [QuadrinhosController::class, 'deleta_quadrinho']);
 
    Route::get('/quadrinhos', [QuadrinhosController::class, 'todos_quadrinhos']);
});

// Rotas de autenticação dupla
Route::post('/ativar_autenticacao_dupla', [UsuarioController::class, 'ativar_autenticacao_dupla']);
Route::post('/desativar_autenticacao_dupla', [UsuarioController::class, 'desativar_autenticacao_dupla']);
Route::get('/status_autenticacao_dupla', [UsuarioController::class, 'status_autenticacao_dupla']);
Route::post('/confirmar_codigo_dupla_autentica', [UsuarioController::class, 'confirmar_codigo_dupla_autentica']);
Route::post('/enviar_codigo_autenticacao', [UsuarioController::class, 'ativar_autenticacao_dupla']);
Route::post('/verificar_codigo_autenticacao', [UsuarioController::class, 'enviar_codigo']);
