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
            <label>Usuário responsável</label>

            <select name="user_id" class="form-control" required>
                @foreach($usuarios as $usuario)
                    <option
                        value="{{ $usuario->id }}"
                        {{ old('user_id', $ocorrencia->user_id) == $usuario->id ? 'selected' : '' }}
                    >
                        {{ $usuario->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="campo-formulario">
            <label>Título</label>
            <input
                type="text"
                name="titulo"
                class="form-control"
                value="{{ old('titulo', $ocorrencia->titulo) }}"
                required>
        </div>

        <div class="campo-formulario">
            <label>Endereço</label>
            <input
                type="text"
                name="endereco"
                class="form-control"
                value="{{ old('endereco', $ocorrencia->endereco) }}"
                required>
        </div>

        <div class="campo-formulario">
            <label>Categoria</label>

            <select name="categoria" class="form-control" required>
                <option value="Iluminação Pública" {{ old('categoria', $ocorrencia->categoria) == 'Iluminação Pública' ? 'selected' : '' }}>Iluminação Pública</option>
                <option value="Buraco na Via" {{ old('categoria', $ocorrencia->categoria) == 'Buraco na Via' ? 'selected' : '' }}>Buraco na Via</option>
                <option value="Limpeza Urbana" {{ old('categoria', $ocorrencia->categoria) == 'Limpeza Urbana' ? 'selected' : '' }}>Limpeza Urbana</option>
                <option value="Sinalização" {{ old('categoria', $ocorrencia->categoria) == 'Sinalização' ? 'selected' : '' }}>Sinalização</option>
                <option value="Calçada Danificada" {{ old('categoria', $ocorrencia->categoria) == 'Calçada Danificada' ? 'selected' : '' }}>Calçada Danificada</option>
                <option value="Árvore ou Vegetação" {{ old('categoria', $ocorrencia->categoria) == 'Árvore ou Vegetação' ? 'selected' : '' }}>Árvore ou Vegetação</option>
                <option value="Esgoto" {{ old('categoria', $ocorrencia->categoria) == 'Esgoto' ? 'selected' : '' }}>Esgoto</option>
                <option value="Drenagem" {{ old('categoria', $ocorrencia->categoria) == 'Drenagem' ? 'selected' : '' }}>Drenagem</option>
                <option value="Lixo Irregular" {{ old('categoria', $ocorrencia->categoria) == 'Lixo Irregular' ? 'selected' : '' }}>Lixo Irregular</option>
                <option value="Segurança" {{ old('categoria', $ocorrencia->categoria) == 'Segurança' ? 'selected' : '' }}>Segurança</option>
                <option value="Outro" {{ old('categoria', $ocorrencia->categoria) == 'Outro' ? 'selected' : '' }}>Outro</option>
            </select>
        </div>

        <div class="campo-formulario">
            <label>Descrição</label>
            <textarea
                name="descricao"
                class="form-control"
                required>{{ old('descricao', $ocorrencia->descricao) }}</textarea>
        </div>

        <div class="campo-formulario">
            <label>Status</label>

            <select name="status" class="form-control" required>
                <option value="Aberto" {{ old('status', $ocorrencia->status) == 'Aberto' ? 'selected' : '' }}>Aberto</option>
                <option value="Em análise" {{ old('status', $ocorrencia->status) == 'Em análise' ? 'selected' : '' }}>Em análise</option>
                <option value="Em andamento" {{ old('status', $ocorrencia->status) == 'Em andamento' ? 'selected' : '' }}>Em andamento</option>
                <option value="Aguardando equipe" {{ old('status', $ocorrencia->status) == 'Aguardando equipe' ? 'selected' : '' }}>Aguardando equipe</option>
                <option value="Resolvido" {{ old('status', $ocorrencia->status) == 'Resolvido' ? 'selected' : '' }}>Resolvido</option>
                <option value="Encerrado" {{ old('status', $ocorrencia->status) == 'Encerrado' ? 'selected' : '' }}>Encerrado</option>
            </select>
        </div>

        @if($ocorrencia->imagem)
            <div class="campo-formulario">
                <label>Imagem atual</label><br>

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