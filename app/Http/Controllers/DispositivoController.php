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

     public function ApagarBancoDispositivo(Dispositivo $registrosDispositivos){
        //dd($registrosDispositivos);
        $registrosDispositivo->delete();
        //Dispositivo::findOrFail($id)->delete();
        return Redirect::route('gerenciar-dispositivo');
    }

    public function GerenciarDispositivo(Dispositivo $registrosDispositivos){
        return view('alterarCelular',['registrosDispositivos' => $registrosDispositivos]);
    }
    public function AlterarBancoDispositivo(Dispositivo $registrosDispositivo, Request $request){
        $dispositivo = $request->validate([
            'celular' => 'string|required',
            'marca' => 'string|required',
            'descricao' => 'string|required'
        ]);

        $registrosdispositivo->fill($dispositivo);
        $registrosdispositivo->save();

        return Redirect::route('gerenciar-dispositivo');


    }


}
