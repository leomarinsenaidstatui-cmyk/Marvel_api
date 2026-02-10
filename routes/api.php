<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/teste',[TestController::class,'envia_teste']);

Route::get('/soma',[TestController::class,'soma']);

Route::post('/salva_heroi',[TestController::class,'salva_heroi']);

Route::get('/exibe_heroi/{id}',[TestController::class,'exibe_heroi']);

Route::get('/todos_herois',[TestController::class,'todos_herois']);

Route::put('/atualiza_heroi/{id}',[TestController::class,'atualiza_heroi']);

Route::delete('/deleta_heroi/{id}',[TestController::class,'deleta_heroi']);

