@extends('template')

@section('conteudo')
  <h1>Listagem de Clientes</h1>
  <a href="novo" class="btn btn-primary">Novo</a>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Figura</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($clientes as $cliente)
          <tr>
            <td>{{$cliente->id}}</td>
            <td>
              @if ($cliente->imagem != "")
                <img style="width: 50px;" src="/storage/imagens/{{$cliente->imagem}}">
              @endif
            </td>
            <td>{{$cliente->nome}}</td>
            <td>{{$cliente->email}}</td>
            <td><a class='btn btn-primary' href='editar/{{$cliente->id}}'>+</a></td>
            <td><a class='btn btn-danger' href='excluir/{{$cliente->id}}'>-</a></td>
          </tr>
      @endforeach

   </tbody>
  </table>
@endsection
