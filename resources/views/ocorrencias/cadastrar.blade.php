@extends('layouts.app')

@section('conteudo')

<h2 class="mb-4">Cadastrar Ocorrência</h2>

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

    <form action="/ocorrencias" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="campo-formulario">
            <label>Usuário responsável</label>

            <select name="user_id" class="form-control" required>
                <option value="">Selecione o usuário</option>

                @foreach($usuarios as $usuario)
                    <option
                        value="{{ $usuario->id }}"
                        {{ old('user_id', auth()->id()) == $usuario->id ? 'selected' : '' }}
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
                value="{{ old('titulo') }}"
                class="form-control"
                required
            >
        </div>

        <div class="campo-formulario">
            <label>Endereço</label>

            <input
                type="text"
                name="endereco"
                value="{{ old('endereco') }}"
                class="form-control"
                required
            >
        </div>

        <div class="campo-formulario">
            <label>Categoria</label>

            <select name="categoria" class="form-control" required>
                <option value="">Selecione</option>

                <option value="Iluminação Pública"
                    {{ old('categoria') == 'Iluminação Pública' ? 'selected' : '' }}>
                    Iluminação Pública
                </option>

                <option value="Buraco na Via"
                    {{ old('categoria') == 'Buraco na Via' ? 'selected' : '' }}>
                    Buraco na Via
                </option>

                <option value="Limpeza Urbana"
                    {{ old('categoria') == 'Limpeza Urbana' ? 'selected' : '' }}>
                    Limpeza Urbana
                </option>

                <option value="Sinalização"
                    {{ old('categoria') == 'Sinalização' ? 'selected' : '' }}>
                    Sinalização
                </option>

                <option value="Calçada Danificada"
                    {{ old('categoria') == 'Calçada Danificada' ? 'selected' : '' }}>
                    Calçada Danificada
                </option>

                <option value="Árvore ou Vegetação"
                    {{ old('categoria') == 'Árvore ou Vegetação' ? 'selected' : '' }}>
                    Árvore ou Vegetação
                </option>

                <option value="Esgoto"
                    {{ old('categoria') == 'Esgoto' ? 'selected' : '' }}>
                    Esgoto
                </option>

                <option value="Drenagem"
                    {{ old('categoria') == 'Drenagem' ? 'selected' : '' }}>
                    Drenagem
                </option>

                <option value="Lixo Irregular"
                    {{ old('categoria') == 'Lixo Irregular' ? 'selected' : '' }}>
                    Lixo Irregular
                </option>

                <option value="Segurança"
                    {{ old('categoria') == 'Segurança' ? 'selected' : '' }}>
                    Segurança
                </option>

                <option value="Outro"
                    {{ old('categoria') == 'Outro' ? 'selected' : '' }}>
                    Outro
                </option>
            </select>
        </div>

        <div class="campo-formulario">
            <label>Descrição</label>

            <textarea
                name="descricao"
                class="form-control"
                required
            >{{ old('descricao') }}</textarea>
        </div>

        <div class="campo-formulario">
            <label>Status</label>

            <select name="status" class="form-control" required>
                <option value="">Selecione</option>

                <option value="Aberto"
                    {{ old('status') == 'Aberto' ? 'selected' : '' }}>
                    Aberto
                </option>

                <option value="Em análise"
                    {{ old('status') == 'Em análise' ? 'selected' : '' }}>
                    Em análise
                </option>

                <option value="Em andamento"
                    {{ old('status') == 'Em andamento' ? 'selected' : '' }}>
                    Em andamento
                </option>

                <option value="Aguardando equipe"
                    {{ old('status') == 'Aguardando equipe' ? 'selected' : '' }}>
                    Aguardando equipe
                </option>

                <option value="Resolvido"
                    {{ old('status') == 'Resolvido' ? 'selected' : '' }}>
                    Resolvido
                </option>

                <option value="Encerrado"
                    {{ old('status') == 'Encerrado' ? 'selected' : '' }}>
                    Encerrado
                </option>
            </select>
        </div>

        <div class="campo-formulario">
            <label>Imagem</label>

            <input
                type="file"
                name="imagem"
                class="form-control"
            >
        </div>

        <button type="submit" class="btn btn-success botao-salvar">
            Salvar
        </button>

        <a href="/admin" class="btn btn-secondary botao-cancelar">
            Cancelar
        </a>

    </form>

</div>

@endsection