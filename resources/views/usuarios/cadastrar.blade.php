@extends('layouts.app')

@section('conteudo')

<h2 class="mb-4">Cadastrar Usuário</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/usuarios" method="POST">

    @csrf

    <div class="mb-3">
        <label class="form-label">Nome</label>

        <input
            type="text"
            name="name"
            value="{{ old('name') }}"
            class="form-control"
            required>
    </div>

    <div class="mb-3">
        <label class="form-label">E-mail</label>

        <input
            type="email"
            name="email"
            value="{{ old('email') }}"
            class="form-control"
            required>
    </div>

    <div class="mb-3">
        <label class="form-label">Senha</label>

        <input
            type="password"
            name="password"
            class="form-control"
            required>
    </div>

    <div class="mb-3">
        <label class="form-label">Confirmar senha</label>

        <input
            type="password"
            name="password_confirmation"
            class="form-control"
            required>
    </div>

    <button type="submit" class="btn btn-success">
        Salvar
    </button>

    <a href="/usuarios" class="btn btn-secondary">
        Cancelar
    </a>

</form>

@endsection