@extends('layouts.app')

@section('conteudo')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="mb-1">Usuários</h2>

        <p class="text-muted mb-0">
            Um usuário pode possuir várias ocorrências.
        </p>
    </div>

    <a href="/usuarios/cadastrar" class="btn btn-success">
        Novo Usuário
    </a>

</div>

@if(session('sucesso'))
    <div class="alert alert-success">
        {{ session('sucesso') }}
    </div>
@endif

@if(session('erro'))
    <div class="alert alert-danger">
        {{ session('erro') }}
    </div>
@endif

<table class="table table-striped table-hover">

    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ocorrências</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>

        @forelse($usuarios as $usuario)

            <tr>
                <td>{{ $usuario->id }}</td>

                <td>{{ $usuario->name }}</td>

                <td>{{ $usuario->email }}</td>

                <td>
                    {{ $usuario->ocorrencias_count }}
                </td>

                <td>

                    <a
                        href="/usuarios/{{ $usuario->id }}"
                        class="btn btn-info btn-sm">
                        Ver ocorrências
                    </a>

                    <a
                        href="/usuarios/{{ $usuario->id }}/editar"
                        class="btn btn-primary btn-sm">
                        Editar
                    </a>

                    <form
                        action="/usuarios/{{ $usuario->id }}"
                        method="POST"
                        class="d-inline"
                        onsubmit="return confirm('Deseja excluir este usuário?')">

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn btn-danger btn-sm">
                            Excluir
                        </button>

                    </form>

                </td>
            </tr>

        @empty

            <tr>
                <td colspan="5" class="text-center">
                    Nenhum usuário cadastrado.
                </td>
            </tr>

        @endforelse

    </tbody>

</table>

@endsection