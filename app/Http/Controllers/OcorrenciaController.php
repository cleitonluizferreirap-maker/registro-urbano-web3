<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ocorrencia;
use App\Models\User;

class OcorrenciaController extends Controller
{
    public function index(Request $request)
    {
        $ocorrencias = Ocorrencia::with('user')
            ->latest()
            ->get();

        return view('ocorrencias.index', compact('ocorrencias'));
    }

    public function cadastrar(Request $request)
    {
        $usuarios = User::orderBy('name')->get();

        return view('ocorrencias.cadastrar', compact('usuarios'));
    }

    public function salvar(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'endereco' => 'required',
            'categoria' => 'required',
            'descricao' => 'required',
            'status' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);

        $nomeImagem = null;

        if ($request->hasFile('imagem')) {
            $nomeImagem = $request->file('imagem')
                ->store('imagens', 'public');
        }

        Ocorrencia::create([
            'titulo' => $request->titulo,
            'endereco' => $request->endereco,
            'categoria' => $request->categoria,
            'descricao' => $request->descricao,
            'status' => $request->status,
            'imagem' => $nomeImagem,
            'user_id' => $request->user_id,
        ]);

        return redirect('/admin')
            ->with('sucesso', 'Ocorrência cadastrada com sucesso.');
    }

    public function admin()
    {
        $ocorrencias = Ocorrencia::with('user')
            ->latest()
            ->get();

        return view('ocorrencias.admin', compact('ocorrencias'));
    }

    public function editar($id)
    {
        $ocorrencia = Ocorrencia::findOrFail($id);
        $usuarios = User::orderBy('name')->get();

        return view(
            'ocorrencias.editar',
            compact('ocorrencia', 'usuarios')
        );
    }

    public function atualizar(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required',
            'endereco' => 'required',
            'categoria' => 'required',
            'descricao' => 'required',
            'status' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);

        $ocorrencia = Ocorrencia::findOrFail($id);

        $ocorrencia->update([
            'titulo' => $request->titulo,
            'endereco' => $request->endereco,
            'categoria' => $request->categoria,
            'descricao' => $request->descricao,
            'status' => $request->status,
            'user_id' => $request->user_id,
        ]);

        return redirect('/admin')
            ->with('sucesso', 'Ocorrência atualizada com sucesso.');
    }

    public function excluir($id)
    {
        $ocorrencia = Ocorrencia::findOrFail($id);

        $ocorrencia->delete();

        return redirect('/admin')
            ->with('sucesso', 'Ocorrência excluída com sucesso.');
    }
}