@extends('layouts.app')

@section('conteudo')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2>Ocorrências de {{ $usuario->name }}</h2>

        <p class="text-muted">
            Total de ocorrências:
            {{ $usuario->ocorrencias->count() }}
        </p>
    </div>

    <a href="/usuarios" class="btn btn-secondary">
        Voltar
    </a>

</div>

<table class="table table-striped table-hover">

    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Categoria</th>
            <th>Status</th>
            <th>Endereço</th>
            <th>Ação</th>
        </tr>
    </thead>

    <tbody>

        @forelse($usuario->ocorrencias as $ocorrencia)

            <tr>
                <td>{{ $ocorrencia->id }}</td>
                <td>{{ $ocorrencia->titulo }}</td>
                <td>{{ $ocorrencia->categoria }}</td>
                <td>{{ $ocorrencia->status }}</td>
                <td>{{ $ocorrencia->endereco }}</td>

                <td>
                    <a
                        href="/ocorrencias/{{ $ocorrencia->id }}/editar"
                        class="btn btn-primary btn-sm">
                        Editar
                    </a>
                </td>
            </tr>

        @empty

            <tr>
                <td colspan="6" class="text-center">
                    Este usuário ainda não possui ocorrências.
                </td>
            </tr>

        @endforelse

    </tbody>

</table>

@endsection