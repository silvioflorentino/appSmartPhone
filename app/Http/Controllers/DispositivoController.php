<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Dispositivo;

class DispositivoController extends Controller
{
    public function index(){
        return view('home');
    }

    public function formCadastrar(){
        return view('cadastrar');
    }

    public function salvarDispositivo(Request $request){
        $dispositivo = $request->validate([
            'celular' => 'string|required',
            'marca' => 'string|required',
            'descricao' => 'string|required'
        ]);

        Dispositivo::create($dispositivo);
        return Redirect::route('home');
        
    }
}
