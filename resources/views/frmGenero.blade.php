@extends('template')

@section('conteudo')
  <h1>Cadastro de Gênero</h1>

  <form action="{{url('genero/salvar')}}" method="post">
    @csrf
    <!-- @if($genero->id == 0) d-none @endif -->
    <div class="mb-3 ">
      <label for="id" class="form-label">ID</label>
      <input readonly class="form-control" type="text" name="id" value="{{$genero->id}}">
    </div>
    <div class="mb-3">
      <label for="descricao" class="form-label">Descrição</label>
      <input class="form-control" type="text" name="descricao" value="{{$genero->descricao}}">
    </div>

    <button class="btn btn-primary" type="submit" name="button">Salvar</button>
  </form>
@endsection
