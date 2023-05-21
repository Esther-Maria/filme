<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Filme;
use App\Models\Genero;
use App\Models\Diretor;

class FilmeController extends Controller
{
    public function listar()
    {
        $filmes = Filme::orderBy('titulo')->get();
        return view('listagemFilme', compact('filmes'));
    }

    public function novo(Request $request)
    {
        $filme = new Filme();
        $filme->id = 0;
        $filme->titulo = "";
        $filme->ano = null;
        $filme->diretor_id = null;
        $filme->genero_id = null;
        if ($request->hasFile('arquivo')) {
            $file = $request->file('arquivo');
            $upload = $file->store('public/imagens');
            $upload = explode("/", $upload);
            $tamanho = sizeof($upload);
            if ($filme->imagem != "") {
              Storage::delete("public/imagens/".$filme->imagem);
            }
            $filme->imagem = $upload[$tamanho-1];
        }
        $diretores = Diretor::all();
        $generos = Genero::all();


        return view('frmFilme', compact('filme', 'diretores', 'generos'));
    }

    public function salvar(Request $request)
    {
        if ($request->input('id') == 0) {
            $filme = new Filme();
        } else {
            $filme = Filme::find($request->input('id'));
        }

        $filme->titulo = $request->input('titulo');
        $filme->ano = $request->input('ano');
        $filme->diretor_id = $request->input('diretor_id');
        $filme->genero_id = $request->input('genero_id');

        if ($request->hasFile('arquivo')) {
            $file = $request->file('arquivo');
            $upload = $file->store('public/imagens');
            $upload = explode("/", $upload);
            $tamanho = sizeof($upload);
            if ($filme->imagem != "") {
              Storage::delete("public/imagens/".$filme->imagem);
            }
            $filme->imagem = $upload[$tamanho-1];
        }

        $filme->save();
        return redirect('filme/listar');
    }


    public function editar($id)
    {
        $filme = Filme::find($id);
        $diretores = Diretor::orderBy('nome')->get();
        $generos = Genero::orderBy('descricao')->get();
        return view('frmFilme', compact('filme', 'diretores', 'generos'));
    }


    public function excluir($id)
    {
        $filme = Filme::find($id);
        if ($filme->imagem != "") {
            Storage::delete("public/imagens/".$filme->imagem);
          }
        try {
            $filme->delete();
        } catch (\Exception $e) {
            return redirect('filme/listar')->with(['msg' => 'Filme não pode ser excluído']);
        }

        return redirect('filme/listar')->with(['msg' => 'Filme excluído']);
    }
}
