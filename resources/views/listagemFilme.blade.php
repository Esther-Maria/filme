@extends('template')

@section('conteudo')

  <h1>Listagem de Filmes</h1>
  <a href="{{ url('filme/novo') }}" class="btn btn-primary">Novo</a>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Ano</th>
        <th>Diretor</th>
        <th>Gênero</th>
        <th>Imagem</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($filmes as $filme)
          <tr>
            <td>{{$filme->id}}</td>
            <td>{{$filme->titulo}}</td>
            <td>{{$filme->ano}}</td>
            <td>{{$filme->diretor->nome}}</td>
            <td>{{$filme->genero->descricao}}</td>
            <td>
              @if ($filme->imagem != "")
                <img style="width: 50px;" src="{{$filme->imagem}}">
              @endif
            </td>
            <td><a class='btn btn-primary' href='{{ url("filme/editar/{$filme->id}") }}'>+</a></td>
            <td><a class='btn btn-danger' href='{{ url("filme/excluir/{$filme->id}") }}'>-</a></td>
          </tr>
      @endforeach

   </tbody>
  </table>

  
@endsection
