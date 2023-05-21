@extends('template')

@section('conteudo')
<div class="container">
  <h1>Lista de Produtos</h1>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Preço</th>
      </tr>
    </thead>
    <tbody>
      @foreach($produtos as $produto)
      <tr>
        <td>{{ $produto->id }}</td>
        <td>{{ $produto->nome }}</td>
        <td>{{ $produto->preco }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
