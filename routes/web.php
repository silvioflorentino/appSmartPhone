<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DispositivoController;

Route::get('/',[DispositivoController::class,'index'])->name('home');
Route::get('/cadastrar',[DispositivoController::class, 'formCadastrar'])->name('cadastrar');

Route::post('/cadastrar',[DispositivoController::class, 'salvarDispositivo'])->name('salvar-dispositivo');

Route::get('/gerenciar-dispositivo',[DispositivoController::class, 'MostrarGerenciadorDispositivo'])->name('gerenciar-dispositivo');

Route::delete('/apagar-dispositivo/{id}',[DispositivoController::class, 'ApagarBancoDispositivo'])->name('apagar-dispositivo');

Route::get('/tela-alterar-dispositivo/{id}',[DispositivoController::class, 'GerenciarDispositivoTela'])->name('tela-alterar-dispositivo');
Route::put('/alterar-dispositivo/{id}',[DispositivoController::class, 'AlterarBancoDispositivo'])->name('alterar-dispositivo');


