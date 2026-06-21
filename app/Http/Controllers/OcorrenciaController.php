<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ocorrencia;

class OcorrenciaController extends Controller
{
    public function index(Request $request)
    {
        $ocorrencias = Ocorrencia::latest()->get();

        return view('ocorrencias.index', compact('ocorrencias'));
    }

    public function cadastrar(Request $request)
    {
        return view('ocorrencias.cadastrar');
    }

    public function salvar(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'endereco' => 'required',
            'categoria' => 'required',
            'descricao' => 'required',
            'status' => 'required'
        ]);

        $nomeImagem = null;

        if ($request->hasFile('imagem')) {
            $nomeImagem = $request->file('imagem')->store('imagens', 'public');
        }

        Ocorrencia::create([
            'titulo' => $request->titulo,
            'endereco' => $request->endereco,
            'categoria' => $request->categoria,
            'descricao' => $request->descricao,
            'status' => $request->status,
            'imagem' => $nomeImagem,
            'user_id' => auth()->id()
        ]);

        return redirect('/admin');
    }

    public function admin()
    {
        $ocorrencias = Ocorrencia::all();

        return view('ocorrencias.admin', compact('ocorrencias'));
    }

    public function editar($id)
    {
        $ocorrencia = Ocorrencia::findOrFail($id);

        return view('ocorrencias.editar', compact('ocorrencia'));
    }

    public function atualizar(Request $request, $id)
    {
        $ocorrencia = Ocorrencia::findOrFail($id);

        $ocorrencia->update([
            'titulo' => $request->titulo,
            'endereco' => $request->endereco,
            'categoria' => $request->categoria,
            'descricao' => $request->descricao,
            'status' => $request->status,
        ]);

        return redirect('/admin');
    }

    public function excluir($id)
    {
        $ocorrencia = Ocorrencia::findOrFail($id);

        $ocorrencia->delete();

        return redirect('/admin');
    }
}