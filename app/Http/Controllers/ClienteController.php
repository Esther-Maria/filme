<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Storage;

class ClienteController extends Controller
{
    public function listar()
    {
        $clientes = Cliente::orderBy('nome')->get();
        return view('listagemCliente', compact('clientes'));
    }

    public function novo()
    {
        $cliente = new Cliente();
        $cliente->id = 0;
        return view('frmCliente', compact('cliente'));
    }

    public function salvar(Request $request)
    {
        if ($request->input('id') == 0) {
            $cliente = new Cliente();
        } else {
            $cliente = Cliente::find($request->input('id'));
        }

        if ($request->hasFile('arquivo')) {
            $file = $request->file('arquivo');
            $upload = $file->store('public/imagens');
            $upload = explode("/", $upload);
            $tamanho = sizeof($upload);
            if ($cliente->imagem != "") {
                Storage::delete("public/imagens/".$cliente->imagem);
            }
            $cliente->imagem = $upload[$tamanho-1];
        }

        $cliente->nome = $request->input('nome');
        $cliente->email = $request->input('email');
        $cliente->save();

        return redirect('cliente/listar');
    }

    public function editar($id)
    {
        $cliente = Cliente::find($id);
        return view('frmCliente', compact('cliente'));
    }

    public function excluir($id)
    {
        $cliente = Cliente::find($id);
        if ($cliente->imagem != "") {
            Storage::delete("public/imagens/".$cliente->imagem);
        }
        $cliente->delete();

        return redirect('cliente/listar');
    }
}
