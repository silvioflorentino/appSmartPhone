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
        return view('cadastrarCelular');
    }

    public function salvarDispositivo(Request $request){
        $Dispositivo = $request->validate([
            'celular' => 'string|required',
            'marca' => 'string|required',
            'descricao' => 'string|required'
        ]);

        Dispositivo::create($Dispositivo);
        return Redirect::route('home');
        
    }


//aula 14/09/2023
    public function MostrarGerenciadorDispositivo(Request $request){
        // $dados = Dispositivo::all();
         //dd($dados);
         $dadosDispositivo = Dispositivo::query();
         $dadosDispositivo->when($request->marca,function($query, $vl){
             $query->where('marca','like','%'.$vl.'%');
         });
          $dadosDispositivo = $dadosDispositivo->get();
          return view('gerenciarCelular',[
             'registrosDispositivo' => $dadosDispositivo
         ]);       
     }

     public function ApagarBancoDispositivo(Dispositivo $id){
        //dd($registrosDispositivos);
        $id->delete();
        //Dispositivo::findOrFail($id)->delete();
        return Redirect::route('gerenciar-dispositivo');
    }
    public function GerenciarDispositivoTela(Dispositivo $id){
        return view('alterarCelular',['registrosDispositivos' => $id]);
    }
    public function AlterarBancoDispositivo(Dispositivo $id, Request $request){
        $Dispositivo = $request->validate([
            'celular' => 'string|required',
            'marca' => 'string|required',
            'descricao' => 'string|required'
        ]);
        $id->fill($Dispositivo);
        $id->save();
        return Redirect::route('gerenciar-dispositivo');
    }


}
