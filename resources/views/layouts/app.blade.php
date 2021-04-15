<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('titulo')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/estilos.css">

    @yield('scripts')
</head>

<body>
    <div class="container-fluid">
        <div class="header header--start">
            <div class="container">
                <div class="header__top">
                    <a href="/" title="Ir para o inicio">
                        <img src="/images/Logo.svg" alt="Jobs PG" />
                    </a>

                    @if(request()->path() != 'job/create')
                    <a href="/job/create" title="Adicionar Job" class="button__post">Adicionar Job</a>
                    @endif

                    @if(auth()->check())
                    <form method="POST" action="/logout">
                        @csrf
                        <button class="button_sair">Logout</button>
                    </form>
                    @endif

                </div>

                @yield('slogan')
            </div>
        </div>
    </div>

    <div class="container">

        @yield('conteudo')

    </div>
</body>

</html>