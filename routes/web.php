<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\QuadrinhosController;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/inicio', function () {
    return view('principal');
})->name('inicio');

Route::get('/cadastro', function () {
    return view('cadastro');
})->name('cadastro');

Route::get('/entrar', function () {
    return view('login');
})->name('entrar');

Route::get('/perfil', function () {
    return view('perfil');
})->name('perfil')->middleware('auth');

Route::get('/teste', function () {
    return view('teste');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/visualiza_heroi/{id_heroi}', [TestController::class, 'visualiza_heroi']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/herois', [TestController::class, 'lista_herois'])->name('herois');
    
    // Rotas que precisam de autenticação
    Route::get('/cadastro_quadrinhos', function () {
        return view('cadastro_quadrinho');
    })->name('lancar_quadrinhos');
    
    Route::get('/edita_quadrinho/{quadrinhos}', [QuadrinhosController::class, 'mostra_quadrinho'])->name('edita_quadrinhos');
    
    // Rota protegida para listar quadrinhos
    Route::get('/quadrinhos', [QuadrinhosController::class, 'lista_quadrinhos'])->name('quadrinhos');


// Rotas públicas
Route::get('/herois', [TestController::class, 'lista_herois'])->name('herois');

require __DIR__.'/auth.php';