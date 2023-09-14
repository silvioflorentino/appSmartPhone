@extends('padrao')
@section('content')
<section class="container m-5">
  <div class="container m-5">
    <form method="get" action="{{route('gerenciar-dispositivo')}}">
      <div class="row center">
        <div class="col">
          <input type="text" id="marca" name="marca" class="form-control" placeholder="Digite a Marca" aria-label="First name">
        </div>
        <div class="col">
          <button type="submit" class="btn btn-info">Buscar</button>
        </div>
      </div>
    </form>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Código</th>
        <th scope="col">Celular</th>
        <th scope="col">Marca</th>
        <th scope="col">Editar</th>
        <th scope="col">Excluir</th>
      </tr>
    </thead>
    <tbody>
      @foreach($registrosDispositivo as $registrosDispositivos)
      <tr>
        <th scope="row">{{$registrosDispositivos->id}}</th>
        <td>{{$registrosDispositivos->celular}}</td>
        <td>{{$registrosDispositivos->marca}}</td>
        <td>
          <a href="{{route('tela-alterar-dispositivo',$registrosDispositivos->id)}}">
            <button type="button" class="btn btn-primary">X</button>
          </a>
        </td>
        
        <td>
          <form method="POST" Action="{{route('apagar-dispositivo',$registrosDispositivos->id)}}">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger">X </button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</section>
@endsection