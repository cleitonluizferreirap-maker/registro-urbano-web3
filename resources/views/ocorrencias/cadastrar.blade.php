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
            <label>Título</label>
            <input type="text" name="titulo" class="form-control">
        </div>

        <div class="campo-formulario">
            <label>Endereço</label>
            <input type="text" name="endereco" class="form-control">
        </div>

        <div class="campo-formulario">
            <label>Categoria</label>
            <select name="categoria" class="form-control">
                <option value="">Selecione</option>
                <option value="Iluminação Pública">Iluminação Pública</option>
                <option value="Buraco na Via">Buraco na Via</option>
                <option value="Limpeza Urbana">Limpeza Urbana</option>
                <option value="Sinalização">Sinalização</option>
                <option value="Calçada Danificada">Calçada Danificada</option>
                <option value="Árvore ou Vegetação">Árvore ou Vegetação</option>
                <option value="Esgoto">Esgoto</option>
                <option value="Drenagem">Drenagem</option>
                <option value="Lixo Irregular">Lixo Irregular</option>
                <option value="Segurança">Segurança</option>
                <option value="Outro">Outro</option>
            </select>
        </div>

        <div class="campo-formulario">
            <label>Descrição</label>
            <textarea name="descricao" class="form-control"></textarea>
        </div>

        <div class="campo-formulario">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="">Selecione</option>
                <option value="Aberto">Aberto</option>
                <option value="Em análise">Em análise</option>
                <option value="Em andamento">Em andamento</option>
                <option value="Aguardando equipe">Aguardando equipe</option>
                <option value="Resolvido">Resolvido</option>
                <option value="Encerrado">Encerrado</option>
            </select>
        </div>

        <div class="campo-formulario">
            <label>Imagem</label>
            <input type="file" name="imagem" class="form-control">
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