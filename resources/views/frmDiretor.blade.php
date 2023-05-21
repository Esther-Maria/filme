@extends('template')

@section('conteudo')
  <h1>Cadastro de Diretor</h1>

  <form action="{{url('diretor/salvar')}}" method="post">
    @csrf
    <div class="mb-3">
      <label for="id" class="form-label">ID</label>
      <input readonly class="form-control" type="text" name="id" value="{{$diretor->id}}">
    </div>
    <div class="mb-3">
      <label for="nome" class="form-label">Nome</label>
      <input class="form-control" type="text" name="nome" value="{{$diretor->nome}}">
    </div>

    <button class="btn btn-primary" type="submit" name="button">Salvar</button>
  </form>
@endsection
