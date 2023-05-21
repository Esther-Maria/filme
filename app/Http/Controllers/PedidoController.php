<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    public function listar()
    {
        $pedidos = Pedido::orderBy('id')->get();
        return view('listagemPedidos', compact('pedidos'));
    }

    public function novo()
    {
        $pedido = new Pedido();
        $pedido->id_pedido = 0;
        return view('frmPedido', compact('pedido'));
    }

    public function salvar(Request $request)
    {
        if ($request->input('id') == 0) {
            $pedido = new Pedido();
        } else {
            $pedido = Pedido::find($request->input('id'));
        }

        $pedido->cliente_id = $request->input('cliente_id');
        $pedido->descricao = $request->input('descricao');
        $pedido->save();

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
}
