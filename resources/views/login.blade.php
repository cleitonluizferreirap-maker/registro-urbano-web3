@extends('layouts.app')

@section('conteudo')

<div class="row justify-content-center">
    <div class="col-md-5">

        <div class="card shadow-sm border-0">
            <div class="card-body p-4">

                <h2 class="text-center mb-3">Login</h2>

                <p class="text-center text-muted mb-4">
                    Acesse o Registro Urbano
                </p>

                @if($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="/login" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">E-mail</label>
                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            placeholder="Digite seu e-mail"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Senha</label>
                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Digite sua senha"
                            required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        Entrar
                    </button>
                </form>

            </div>
        </div>

    </div>
</div>

@endsection