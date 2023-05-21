<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoController extends Controller
{
    public function listar()
    {
        $pedidos = Pedido::orderBy('id')->get();
        return view('listagemPedido', compact('pedidos'));
    }

    public function novo()
    {
        $pedido = new Pedido();
        $pedido->id_pedido = 0;
        return view('frmPedido', compact('pedido'));
    }

    public function salvar(Request $request)
    {
        if ($request->input('id_pedido') == 0) {
            $pedido = new Pedido();
        } else {
            $pedido = Pedido::find($request->input('id_pedido'));
        }

        $pedido->cliente_id = $request->input('cliente_id');
        $pedido->descricao = $request->input('descricao');
        $pedido->save();
        $produtosSelecionados = $request->input('produtos', []);
        $nome = $request->input('nome');
        $produto = new Produto();
        $produto->nome = $nome;
        $produto->produtos()->attach($produtosSelecionados);
        return redirect('pedido/listar');
    }

    public function editar($id)
    {
        $pedido = Pedido::find($id);
        return view('frmPedido', compact('pedido'));
    }

    public function excluir($id)
    {
        $pedido = Pedido::find($id);
        $pedido->delete();

        return redirect('pedido/listar');
    }


    public function detalhes($id)
    {
        $pedido = Pedido::findOrFail($id);
        $produtos = $pedido->produtos()->get    ();

        return view('detalhesPedido', compact('pedido', 'produtos'));
    }


}
