<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    public function listar()
    {
        $produtos = Produto::orderBy('nome')->get();
        return view('listagemProduto', compact('produtos'));
    }

    public function novo()
    {
        $produto = new Produto();
        $produto->id = 0;
        return view('frmProduto', compact('produto'));
    }

    public function salvar(Request $request)
    {
        if ($request->input('id') == 0) {
            $produto = new Produto();
        } else {
            $produto = Produto::find($request->input('id'));
        }

        if ($request->hasFile('arquivo')) {
            $file = $request->file('arquivo');
            $upload = $file->store('public/imagens');
            $upload = explode("/", $upload);
            $tamanho = sizeof($upload);
            if ($produto->imagem != "") {
                Storage::delete("public/imagens/".$produto->imagem);
            }
            $produto->imagem = $upload[$tamanho-1];
        }

        $produto->nome = $request->input('nome');
        $produto->preco = $request->input('preco');
        $produto->save();

        return redirect('produto/listar');
    }

    public function editar($id)
    {
        $produto = Produto::find($id);
        return view('frmProduto', compact('produto'));
    }

    public function excluir($id)
    {
        $produto = Produto::find($id);
        if ($produto->imagem != "") {
            Storage::delete("public/imagens/".$produto->imagem);
        }
        $produto->delete();

        return redirect('produto/listar');
    }
}
