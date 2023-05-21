@extends('template')

@section('conteudo')

  <h1>Cadastro de Produto</h1>
  <form action="{{ url('produto/salvar') }}" method="post">
    @csrf
    <div class="mb-3">
      <label for="id" class="form-label">ID do Produto</label>
      <input readonly class="form-control" type="text" name="id" value="{{ $produto->id }}">
    </div>
    <div class="mb-3">
      <label for="nome" class="form-label">Nome</label>
      <input class="form-control" type="text" name="nome" value="{{ $produto->nome }}">
    </div>
    <div class="mb-3">
      <label for="preco" class="form-label">Preço</label>
      <input class="form-control" type="text" name="preco" value="{{ $produto->preco }}">
    </div>


  <div class="form-group">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" class="form-control" required>
  </div>

  <div class="form-group">
    <label for="produtos">Produtos:</label>
    <div class="checkbox-list">
      @foreach($produtos as $produto)
        <div class="checkbox">
          <label>
            <input type="checkbox" name="produtos[]" value="{{ $produto->id }}">
            {{ $produto->nome }}
          </label>
        </div>
      @endforeach
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Salvar</button>
  @csrf
</form>

<button class="btn btn-primary" type="submit" name="button">Salvar</button>
  </form>
@endsection
