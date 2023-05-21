@extends('template')

@section('conteudo')
  <h1>Cadastro de Pedido</h1>

  <form action="{{ url('pedido/salvar') }}" method="post">
    @csrf
    <div class="mb-3">
      <label for="id_pedido" class="form-label">ID do Pedido</label>
      <input readonly class="form-control" type="text" name="id_pedido" value="{{ $pedido->id_pedido }}">
    </div>
    <div class="mb-3">
      <label for="cliente_id" class="form-label">ID do Cliente</label>
      <input class="form-control" type="text" name="cliente_id" value="{{ $pedido->cliente_id }}">
    </div>
    <div class="mb-3">
      <label for="descricao" class="form-label">Descrição</label>
      <input class="form-control" type="text" name="descricao" value="{{ $pedido->descricao }}">
    </div>

    <button class="btn btn-primary" type="submit" name="button">Salvar</button>
  </form>
@endsection
