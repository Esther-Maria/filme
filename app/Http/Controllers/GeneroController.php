<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genero;

class GeneroController extends Controller
{
    public function listar()
    {
        $generos = Genero::orderBy('descricao')->get();
        return view('listagemGenero', compact('generos'));
    }

    public function novo()
    {
        $genero = new Genero();
        $genero->id = 0;
        $genero->descricao = "";
        return view('frmGenero', compact('genero'));
    }

    public function salvar(Request $request)
    {
        if ($request->input('id') == 0) {
            $genero = new Genero();
        } else {
            $genero = Genero::find($request->input('id'));
        }

        $genero->descricao = $request->input('descricao');
        $genero->save();

        return redirect('genero/listar');
    }

    public function editar($id)
    {
        $genero = Genero::find($id);
        return view('frmGenero', compact('genero'));
    }

    public function excluir($id)
    {
        $genero = Genero::find($id);

        try {
            $genero->delete();
        } catch (\Exception $e) {
            return redirect('genero/listar')->with(['msg' => 'Gênero não pode ser excluído']);
        }

        return redirect('genero/listar')->with(['msg' => 'Gênero excluído']);
    }
}
