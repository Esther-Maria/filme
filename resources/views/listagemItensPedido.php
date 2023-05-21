@extends('template')

@section('conteudo')
  <h1>Listagem de Itens do Pedido</h1>
  <a href="{{ url('itempedido/novo') }}" class="btn btn-primary">Novo</a>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>ID do Pedido</th>
        <th>ID do Produto</th>
        <th>Quantidade</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($itens as $item)
          <tr>
            <td>{{$item->id_item}}</td>
            <td>{{$item->pedido_id}}</td>
            <td>{{$item->produto_id}}</td>
            <td>{{$item->quantidade}}</td>
            <td><a class='btn btn-primary' href='{{ url('itempedido/editar/'.$item->id_item) }}'>Editar</a></td>
            <td><a class='btn btn-danger' href='{{ url('itempedido/excluir/'.$item->id_item) }}'>Excluir</a></td>
          </tr>
      @endforeach

   </tbody>
  </table>
@endsection
