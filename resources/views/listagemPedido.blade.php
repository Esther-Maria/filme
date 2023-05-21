@extends('template')

@section('conteudo')
  <h1>Listagem de Pedidos</h1>
  <a href="novo" class="btn btn-primary">Novo</a>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Cliente</th>
        <th>Descrição</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($pedidos as $pedido)
        <tr>
          <td>{{$pedido->id}}</td>
          <td>{{$pedido->cliente->nome}}</td>
          <td>{{$pedido->desc   ricao}}</td>
          <td><a class="btn btn-primary" href="{{url('pedido/editar/'.$pedido->id)}}">Editar</a></td>
          <td><a class="btn btn-danger" href="{{url('pedido/excluir/'.$pedido->id)}}">Excluir</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
