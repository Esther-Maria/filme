@extends('template')

@section('conteudo')

<h1>Cadastro de Filmes</h1>
  @if ($filme->imagem != "")
    <img style="width: 200px;height:200px;object-fit:cover" src="{{$filme->imagem}}">
  @endif
  <form action="{{url('filme/salvar')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="id" class="form-label">ID</label>
      <input readonly class="form-control" readonly type="text" name="id" value="{{$filme->id}}">
    </div>
    <div class="mb-3">
      <label for="titulo" class="form-label">Título</label>
      <input class="form-control @error('titulo') is-invalid @enderror" type="text" name="titulo" value="{{old('titulo', $filme->titulo)}}">


    </div>
    <div class="mb-3">
      <label for="ano" class="form-label">Ano</label>
      <input class="form-control @error('ano') is-invalid @enderror" type="number" name="ano" value="{{old('ano', $filme->ano)}}">
      @error('ano')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="diretor_id" class="form-label">Diretor</label>
      <select class="form-select @error('diretor_id') is-invalid @enderror" name="diretor_id">
        @foreach($diretores as $diretor)
          <option {{ $diretor->id == old('diretor_id', $filme->diretor_id) ?'selected': ''}} value="{{$diretor->id}} ">{{$diretor->nome}}</option>
        @endforeach
      </select>
      @error('diretor_id')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="genero_id" class="form-label">Gênero</label>
      <select class="form-select @error('genero_id') is-invalid @enderror" name="genero_id">
        @foreach($generos as $genero)
          <option {{ $genero->id == old('genero_id', $filme->genero_id) ?'selected': ''}} value="{{$genero->id}} ">{{$genero->descricao}}</option>
        @endforeach
      </select>
      @error('genero_id')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- <div class="mb-3">
      <label for="arquivo" class="form-label">Imagem</label>
      <input class="form-control" type="file" name="arquivo" accept="image/*">
    </div> -->

<button class="btn btn-primary" type="submit" name="button">Salvar</button>
  </form>
@endsection
