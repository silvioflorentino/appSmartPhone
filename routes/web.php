<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DispositivoController;

Route::get('/',[DispositivoController::class,'index'])->name('home');;
Route::get('/cadastrar',[DispositivoController::class, 'formCadastrar']);
Route::post('/cadastrar',[DispositivoController::class, 'salvarDispositivo'])->name('salvar-dispositivo');

