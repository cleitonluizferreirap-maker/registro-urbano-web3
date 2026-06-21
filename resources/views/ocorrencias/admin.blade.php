@extends('layouts.app')

@section('conteudo')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Área Administrativa</h2>

    <a href="/ocorrencias/cadastrar"
       class="btn btn-success botao-nova-ocorrencia">
        Nova Ocorrência
    </a>
</div>

<div class="tabela-ocorrencias">

    <table class="table table-striped table-hover mb-0">

        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Imagem</th>
                <th>Título</th>
                <th>Usuário</th>
                <th>Categoria</th>
                <th>Status</th>
                <th class="coluna-acoes">Ações</th>
            </tr>
        </thead>

        <tbody>

        @foreach($ocorrencias as $ocorrencia)

            <tr>

                <td>{{ $ocorrencia->id }}</td>

                <td>
                    @if($ocorrencia->imagem)
                        <img
                            src="{{ asset('storage/' . $ocorrencia->imagem) }}"
                            class="imagem-admin">
                    @else
                        Sem imagem
                    @endif
                </td>

                <td>{{ $ocorrencia->titulo }}</td>

                <td>{{ $ocorrencia->user->name ?? 'Sem usuário' }}</td>

                <td>{{ $ocorrencia->categoria }}</td>

                <td>{{ $ocorrencia->status }}</td>

                <td class="coluna-acoes">

                    <a href="/ocorrencias/{{ $ocorrencia->id }}/editar"
                       class="btn btn-primary btn-sm botao-editar">
                        Editar
                    </a>

                    <form
                        action="/ocorrencias/{{ $ocorrencia->id }}"
                        method="POST"
                        style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn btn-danger btn-sm botao-excluir">
                            Excluir
                        </button>

                    </form>

                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

</div>

@endsection