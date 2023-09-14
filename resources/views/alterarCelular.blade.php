@extends('padrao')
@section('content')
  <section>
    <div class="container" style="display: flex; justify-content:center; align-items:center; height:50vh">
        <form class="row g-3" method="POST" action="{{route('alterar-dispositivo', $registrosDispositivos->id)}}">
          @method('put')
          @csrf
            <div class="col-md-6">
              <label for="inputCelular" class="form-label">Celular</label>
              <input type="text" name="celular" value="{{old('celular', $registrosDispositivos->celular)}}" class="form-control" id="inputCelular" placeholder="MotoG 60">
              @error('celular')
              <div class="text-sm-start text-light">*Preencher o campo celular.</div>
              @enderror
            </div>
            
            <div class="col-md-6">
              <label for="inputMarca" class="form-label">Marca</label>
              <input type="text" name="marca" value="{{old('marca', $registrosDispositivos->marca)}}" class="form-control" id="inputMarca" placeholder="Motorola">
              @error('marca')
              <div class="text-sm-start text-light">*Preencher o campo Marca.</div>
              @enderror
            </div>
            
            <div class="col-12">
              <label for="inputDescricao" class="form-label">Descrição</label>
              <input type="text" name="descricao" value="{{old('descricao', $registrosDispositivos->descricao)}}" class="form-control" id="inputDescricao" placeholder="3 Cameras, 512 Gb, 12Gb Ram, ">
              @error('descricao')
              <div class="text-sm-start text-light">*Preencher o campo Descrição.</div>
              @enderror
            </div>

            
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
          </form>
    </div>
  </section>  
@endsection