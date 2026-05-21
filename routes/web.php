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

Route::get('/esqueci-senha', function () {
    return view('auth.forgot-password-custom');
})->name('senha.esqueci');

Route::get('/senha/codigo', function () {
    return view('auth.confirm-reset-code');
})->name('senha.codigo');

Route::get('/senha/redefinir', function () {
    return view('auth.reset-password-custom');
})->name('senha.redefinir');

Route::get('/perfil', function () {
    return view('perfil');
})->name('perfil')->middleware('auth');

Route::get('/teste', function () {
    return view('teste');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', function () {
    return redirect()->route('dashboard');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/visualiza_heroi/{id_heroi}', [TestController::class, 'visualiza_heroi']);

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// Rotas que precisam de autenticacao
Route::get('/cadastro_quadrinhos', function () {
    return view('cadastro_quadrinho');
})->name('lancar_quadrinhos');


Route::get('digita_codigo', function () {
    return view('digita_codigo');
})->name('digitar_codigo');

Route::get('/edita_quadrinho/{quadrinhos}', [QuadrinhosController::class, 'mostra_quadrinho'])->name('edita_quadrinhos');
Route::get('/quadrinhos', [QuadrinhosController::class, 'lista_quadrinhos'])->name('quadrinhos');

// Rotas publicas
Route::get('/herois', [TestController::class, 'lista_herois_web'])->name('herois');

require __DIR__.'/auth.php';
