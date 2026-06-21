@extends('layouts.app')

@section('conteudo')

<div class="container">

    <h2>Login</h2>

    @if($errors->any())
        <div>
            {{ $errors->first() }}
        </div>
    @endif

    <form action="/login" method="POST">
        @csrf

        <div>
            <label>E-mail</label>
            <input type="email" name="email" required>
        </div>

        <div>
            <label>Senha</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit">
            Entrar
        </button>

    </form>

</div>

@endsection