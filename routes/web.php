<?php

use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\Auth\CadastroController;
use App\Http\Controllers\Auth\HomeAuthController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RestaurarSenhaController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::resource('cadastro', CadastroController::class);

    Route::resource('login', LoginController::class);
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('instituicao', [InstituicaoController::class, 'index'])->name('instituicao');


// quem pode doar
Route::get('/pode_doar', [HomeController::class, 'pode_doar'])->name('pode_doar');

Route::middleware('auth')->group(function () {
    Route::get('/home_auth', [HomeAuthController::class, 'index'])->name('home_auth');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/alterar_dados', [UsuarioController::class, 'alterar_dados'])->name('alterar_dados');
    Route::post('/salvar_alterar_dados', [UsuarioController::class, 'salvar_alterar_dados'])->name('salvar_alterar_dados');

    // agendamento
    Route::get('agendamentos', [AgendamentoController::class, 'index'])->name('agendamentos');
    Route::post('agendamentos', [AgendamentoController::class, 'store'])->name('cadastrar_gerenciamento');
    Route::delete('/agendamentos/{id}', [AgendamentoController::class, 'destroy'])->name('agendamentos.destroy');
    Route::put('agendamentos/{id}', [AgendamentoController::class, 'update'])->name('editar_agendamentos');

    //estoque
    Route::get('estoque/{id}/gerenciamento', [EstoqueController::class, 'gerenciamento'])->name('gerenciamento');
    Route::put('estoque/{id}/store', [EstoqueController::class, 'store'])->name('store');

    Route::resource('estoque', EstoqueController::class);
});
