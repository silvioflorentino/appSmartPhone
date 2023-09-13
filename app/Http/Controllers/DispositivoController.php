<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DispositivoController extends Controller
{
    public function index(){
        return view('home');
    }

    public function formCadastrar(){
        return view('cadastrar');
    }
}
