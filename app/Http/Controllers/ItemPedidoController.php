<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\ItensDoPedido;
    use App\Models\Pedido;
    use App\Models\Produto;

    class ItemPedidoController extends Controller
    {
    public function novo()
    {
        $itemPedido = new ItemPedido();
        $itemPedido->id = 0;
        $pedidos = Pedido::orderBy('id')->get();
        $produtos = Produto::orderBy('nome')->get();
        return view('frmItemPedido', compact('itens', 'pedidos', 'produtos'));
    }

    public function salvar(Request $request)
    {
        if ($request->input('id') == 0) {
        $itemPedido = new ItemPedido();
        } else {
        $itemPedido = ItemPedido::find($request->input('id'));
        }

        $itemPedido->pedido_id = $request->input('pedido_id');
        $itemPedido->produto_id = $request->input('produto_id');
        $itemPedido->quantidade = $request->input('quantidade');
        $itemPedido->save();

        return redirect('itempedido/listar')
        ->with(['msg' => 'Item do Pedido salvo com sucesso']);
    }

    public function editar($id)
    {
        $itemPedido = ItemPedido::find($id);
        $pedidos = Pedido::orderBy('id')->get();
        $produtos = Produto::orderBy('nome')->get();
        return view('frmItemPedido', compact('iitens', 'pedidos', 'produtos'));
    }

    public function excluir($id)
    {
        $itemPedido = ItemPedido::find($id);
        $itemPedido->delete();

        return redirect('itempedido/listar')
        ->with(['msg' => 'Item do Pedido excluído com sucesso']);
    }

    public function listar()
    {
        $itensPedido = ItemPedido::orderBy('id')->paginate(5);
        return view('listagemItemPedido', compact('itens'));
    }
    }
