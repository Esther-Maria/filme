@extends('template')

@section('conteudo')
  <h1>Formulário de Item do Pedido</h1>

  <form action="{{ $item->id_item ? url('itempedido/editar/'.$item->id_item) : url('itempedido/salvar') }}" method="post">
    @csrf
    <div class="mb-3">
      <label for="pedido_id" class="form-label">ID do Pedido</label>
      <input class="form-control" type="text" name="pedido_id" value="{{ $item->pedido_id }}">
    </div>
    <div class="mb-3">
      <label for="produto_id" class="form-label">ID do Produto</label>
      <input class="form-control" type="text" name="produto_id" value="{{ $item->produto_id }}">
    </div>
    <div class="mb-3">
      <label for="quantidade" class="form-label">Quantidade</label>
      <input class="form-control" type="text" name="quantidade" value="{{ $item->quantidade }}">
    </div>

    <button class="btn btn-primary" type="submit">Salvar</button>
  </form>
@endsection
