@extends('template')

@section('conteudo')
  <h1>Detalhes do Pedido</h1>

  <h2>Pedido</h2>
  <p>ID do Pedido: {{ $pedido->id }}</p>
  <p>ID do Cliente: {{ $pedido->cliente_id }}</p>
  <p>Descrição: {{ $pedido->descricao }}</p>

  <h2>Produtos</h2>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Preço</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($produtos as $produto)
        <tr>
          <td>{{ $produto->id }}</td>
          <td>{{ $produto->nome }}</td>
          <td>{{ $produto->preco }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <a href="{{ url('pedido/listar') }}" class="btn btn-primary">Voltar</a>
@endsection
