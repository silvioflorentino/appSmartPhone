<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DispositivoController;

Route::get('/',[DispositivoController::class,'index']);
Route::get('/cadastrar',[DispositivoController::class, 'formCadastrar']);

