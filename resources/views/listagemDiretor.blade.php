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

  <h1>Listagem de Diretores</h1>
  <a href="novo" class="btn btn-primary">Novo</a>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($diretores as $diretor)
          <tr>
            <td>{{$diretor->id}}</td>
            <td>{{$diretor->nome}}</td>
            <td><a class='btn btn-primary' href='editar/{{$diretor->id}}'>+</a></td>
            <td><a class='btn btn-danger' href='excluir/{{$diretor->id}}'>-</a></td>
          </tr>
      @endforeach
    </tbody>
  </table>
@endsection
