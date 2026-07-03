<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::withCount('ocorrencias')
            ->orderBy('name')
            ->get();

        return view('usuarios.index', compact('usuarios'));
    }

    public function cadastrar()
    {
        return view('usuarios.cadastrar');
    }

    public function salvar(Request $request)
    {
        $dados = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $dados['name'],
            'email' => $dados['email'],
            'password' => Hash::make($dados['password']),
        ]);

        return redirect('/usuarios')
            ->with('sucesso', 'Usuário cadastrado com sucesso.');
    }

    public function mostrar($id)
    {
        $usuario = User::with([
            'ocorrencias' => function ($consulta) {
                $consulta->latest();
            }
        ])->findOrFail($id);

        return view('usuarios.mostrar', compact('usuario'));
    }

    public function editar($id)
    {
        $usuario = User::findOrFail($id);

        return view('usuarios.editar', compact('usuario'));
    }

    public function atualizar(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $dados = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($usuario->id)
            ],
            'password' => 'nullable|min:6|confirmed',
        ]);

        $usuario->name = $dados['name'];
        $usuario->email = $dados['email'];

        if (!empty($dados['password'])) {
            $usuario->password = Hash::make($dados['password']);
        }

        $usuario->save();

        return redirect('/usuarios')
            ->with('sucesso', 'Usuário atualizado com sucesso.');
    }

    public function excluir($id)
    {
        $usuario = User::withCount('ocorrencias')->findOrFail($id);

        if ($usuario->ocorrencias_count > 0) {
            return redirect('/usuarios')->with(
                'erro',
                'Esse usuário possui ocorrências e não pode ser excluído.'
            );
        }

        if (auth()->id() === $usuario->id) {
            return redirect('/usuarios')->with(
                'erro',
                'Você não pode excluir o usuário que está conectado.'
            );
        }

        $usuario->delete();

        return redirect('/usuarios')
            ->with('sucesso', 'Usuário excluído com sucesso.');
    }
}