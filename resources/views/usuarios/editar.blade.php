@extends('layouts.app')

@section('conteudo')

<h2 class="mb-4">Editar Usuário</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/usuarios/{{ $usuario->id }}" method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nome</label>

        <input
            type="text"
            name="name"
            value="{{ old('name', $usuario->name) }}"
            class="form-control"
            required>
    </div>

    <div class="mb-3">
        <label class="form-label">E-mail</label>

        <input
            type="email"
            name="email"
            value="{{ old('email', $usuario->email) }}"
            class="form-control"
            required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nova senha</label>

        <input
            type="password"
            name="password"
            class="form-control">

        <small class="text-muted">
            Deixe em branco para manter a senha atual.
        </small>
    </div>

    <div class="mb-3">
        <label class="form-label">Confirmar nova senha</label>

        <input
            type="password"
            name="password_confirmation"
            class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">
        Atualizar
    </button>

    <a href="/usuarios" class="btn btn-secondary">
        Cancelar
    </a>

</form>

@endsection