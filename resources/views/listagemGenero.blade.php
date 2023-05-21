@extends('template')

@section('conteudo')
  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <h1>Listagem de Gêneros</h1>
  <a href="novo" class="btn btn-primary">Novo</a>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Descrição</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($generos as $genero)
          <tr>
            <td>{{$genero->id}}</td>
            <td>{{$genero->descricao}}</td>
            <td><a class='btn btn-primary' href='editar/{{$genero->id}}'>+</a></td>
            <td><a class='btn btn-danger' href='excluir/{{$genero->id}}'>-</a></td>
          </tr>
      @endforeach
    </tbody>
  </table>
@endsection
