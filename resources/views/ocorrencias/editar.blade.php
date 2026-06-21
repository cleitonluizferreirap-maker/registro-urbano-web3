@extends('layouts.app')

@section('conteudo')

<h2 class="mb-4">Editar Ocorrência</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="formulario-ocorrencia">

    <form action="/ocorrencias/{{ $ocorrencia->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="campo-formulario">
            <label>Título</label>
            <input
                type="text"
                name="titulo"
                class="form-control"
                value="{{ $ocorrencia->titulo }}">
        </div>

        <div class="campo-formulario">
            <label>Endereço</label>
            <input
                type="text"
                name="endereco"
                class="form-control"
                value="{{ $ocorrencia->endereco }}">
        </div>

        <div class="campo-formulario">
            <label>Categoria</label>

            <select name="categoria" class="form-control">
                <option value="Iluminação Pública" {{ $ocorrencia->categoria == 'Iluminação Pública' ? 'selected' : '' }}>Iluminação Pública</option>
                <option value="Buraco na Via" {{ $ocorrencia->categoria == 'Buraco na Via' ? 'selected' : '' }}>Buraco na Via</option>
                <option value="Limpeza Urbana" {{ $ocorrencia->categoria == 'Limpeza Urbana' ? 'selected' : '' }}>Limpeza Urbana</option>
                <option value="Sinalização" {{ $ocorrencia->categoria == 'Sinalização' ? 'selected' : '' }}>Sinalização</option>
                <option value="Calçada Danificada" {{ $ocorrencia->categoria == 'Calçada Danificada' ? 'selected' : '' }}>Calçada Danificada</option>
                <option value="Árvore ou Vegetação" {{ $ocorrencia->categoria == 'Árvore ou Vegetação' ? 'selected' : '' }}>Árvore ou Vegetação</option>
                <option value="Esgoto" {{ $ocorrencia->categoria == 'Esgoto' ? 'selected' : '' }}>Esgoto</option>
                <option value="Drenagem" {{ $ocorrencia->categoria == 'Drenagem' ? 'selected' : '' }}>Drenagem</option>
                <option value="Lixo Irregular" {{ $ocorrencia->categoria == 'Lixo Irregular' ? 'selected' : '' }}>Lixo Irregular</option>
                <option value="Segurança" {{ $ocorrencia->categoria == 'Segurança' ? 'selected' : '' }}>Segurança</option>
                <option value="Outro" {{ $ocorrencia->categoria == 'Outro' ? 'selected' : '' }}>Outro</option>
            </select>
        </div>

        <div class="campo-formulario">
            <label>Descrição</label>
            <textarea
                name="descricao"
                class="form-control">{{ $ocorrencia->descricao }}</textarea>
        </div>

        <div class="campo-formulario">
            <label>Status</label>

            <select name="status" class="form-control">
                <option value="Aberto" {{ $ocorrencia->status == 'Aberto' ? 'selected' : '' }}>Aberto</option>
                <option value="Em análise" {{ $ocorrencia->status == 'Em análise' ? 'selected' : '' }}>Em análise</option>
                <option value="Em andamento" {{ $ocorrencia->status == 'Em andamento' ? 'selected' : '' }}>Em andamento</option>
                <option value="Aguardando equipe" {{ $ocorrencia->status == 'Aguardando equipe' ? 'selected' : '' }}>Aguardando equipe</option>
                <option value="Resolvido" {{ $ocorrencia->status == 'Resolvido' ? 'selected' : '' }}>Resolvido</option>
                <option value="Encerrado" {{ $ocorrencia->status == 'Encerrado' ? 'selected' : '' }}>Encerrado</option>
            </select>
        </div>

        @if($ocorrencia->imagem)
            <div class="campo-formulario">
                <label>Imagem Atual</label><br>

                <img
                    src="{{ asset('storage/' . $ocorrencia->imagem) }}"
                    class="imagem-edicao">
            </div>
        @endif

        <button type="submit" class="btn btn-primary">
            Atualizar
        </button>

        <a href="/admin" class="btn btn-secondary">
            Voltar
        </a>

    </form>

</div>

@endsection