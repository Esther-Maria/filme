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
        foreach ($filmes as $filme) {
            if ($filme->imagem) {
                $filme->urlImagem = Storage::url($filme->imagem);
            }
        }

        return view('listagemFilme', compact('filmes'));
    }

    public function novo()
    {
        $filme = new Filme();
        $filme->id = 0;
        $filme->titulo = "";
        $filme->ano = null;
        $filme->diretor_id = null;
        $filme->genero_id = null;

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
            $arquivo = $request->file('arquivo');
            $nomeArquivo = uniqid() . '.' . $arquivo->getClientOriginalExtension();
            $arquivo->storeAs('public/imagens', $nomeArquivo);
            $filme->imagem = 'imagens/' . $nomeArquivo;
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

        try {
            $filme->delete();
        } catch (\Exception $e) {
            return redirect('filme/listar')->with(['msg' => 'Filme não pode ser excluído']);
        }

        return redirect('filme/listar')->with(['msg' => 'Filme excluído']);
    }
}
