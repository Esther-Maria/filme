<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diretor;

class DiretorController extends Controller
{
    public function listar()
    {
        $diretores = Diretor::orderBy('nome')->get();
        return view('listagemDiretor', compact('diretores'));
    }

    public function novo()
    {
        $diretor = new Diretor();
        $diretor->id = 0;
        $diretor->nome = "";
        return view('frmDiretor', compact('diretor'));
    }

    public function salvar(Request $request)
    {
        if ($request->input('id') == 0) {
            $diretor = new Diretor();
        } else {
            $diretor = Diretor::find($request->input('id'));
        }

        $diretor->nome = $request->input('nome');
        $diretor->save();

        return redirect('diretor/listar');
    }

    public function editar($id)
    {
        $diretor = Diretor::find($id);
        return view('frmDiretor', compact('diretor'));
    }

    public function excluir($id)
    {
        $diretor = Diretor::find($id);

        try {
            $diretor->delete();
        } catch (\Exception $e) {
            return redirect('diretor/listar')->with(['msg' => 'Diretor não pode ser excluído']);
        }

        return redirect('diretor/listar')->with(['msg' => 'Diretor excluído']);
    }
}
