<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registro Urbano</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>

<header class="cabecalho shadow-sm">

    <nav class="navbar navbar-expand-lg bg-white">

        <div class="container">

            <a class="navbar-brand fw-bold" href="/ocorrencias">
                Registro Urbano
            </a>

            <div class="d-flex gap-2 align-items-center">

                <a
                    href="/ocorrencias"
                    class="btn btn-outline-primary btn-sm"
                >
                    Início
                </a>

                @auth

                    <a
                        href="/ocorrencias/cadastrar"
                        class="btn btn-outline-success btn-sm"
                    >
                        Cadastrar
                    </a>

                    <a
                        href="/admin"
                        class="btn btn-outline-dark btn-sm"
                    >
                        Administração
                    </a>

                    <a
                        href="/usuarios"
                        class="btn btn-outline-primary btn-sm"
                    >
                        Usuários
                    </a>

                    <span class="fw-bold">
                        Olá, {{ Auth::user()->name }}
                    </span>

                    <form
                        action="/logout"
                        method="POST"
                        style="display:inline;"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="btn btn-outline-danger btn-sm"
                        >
                            Sair
                        </button>

                    </form>

                @endauth

                @guest

                    <a
                        href="/login"
                        class="btn btn-outline-secondary btn-sm"
                    >
                        Login
                    </a>

                @endguest

            </div>

        </div>

    </nav>

</header>

<main class="conteudo-principal container py-4">

    @yield('conteudo')

</main>

<footer class="rodape">

    Registro Urbano - Projeto Web3

</footer>

</body>
</html>