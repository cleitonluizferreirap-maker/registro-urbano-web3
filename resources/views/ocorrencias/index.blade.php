@extends('layouts.app')

@section('conteudo')

<div class="text-center mb-4">
    <h1>Registro Urbano</h1>
    <p>Sistema para registro e acompanhamento de ocorrências urbanas.</p>
</div>

<div class="d-flex justify-content-between align-items-center mb-4">

    <h4>Ocorrências Cadastradas</h4>

    <a href="/ocorrencias/cadastrar" class="btn btn-success">
        Nova Ocorrência
    </a>

</div>

@if($ocorrencias->count() == 0)

    <div class="alert alert-info">
        Nenhuma ocorrência cadastrada.
    </div>

@else

    <div class="lista-ocorrencias">

        @foreach($ocorrencias as $ocorrencia)

            <div class="ocorrencia-card">

                @if($ocorrencia->imagem)
                    <img
                        src="{{ asset('storage/' . $ocorrencia->imagem) }}"
                        class="imagem-ocorrencia">
                @endif

                <div class="ocorrencia-titulo">
                    {{ $ocorrencia->titulo }}
                </div>

                <div class="ocorrencia-endereco">
                    {{ $ocorrencia->endereco }}
                </div>

                <div class="ocorrencia-categoria">
                    Categoria: {{ $ocorrencia->categoria }}
                </div>

                <div class="ocorrencia-descricao">
                    {{ $ocorrencia->descricao }}
                </div>

                <div class="ocorrencia-acoes mt-2">
                    <span class="badge bg-primary">
                        {{ $ocorrencia->status }}
                    </span>
                </div>

            </div>

        @endforeach

    </div>

@endif

@endsection