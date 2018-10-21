<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css" />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel='shortcut icon' type='image/png' href='{{ asset('img/logo.png') }}' />
        <title>Perguntas.mkt | Crie questionários para fazer pesquisas com seus clientes</title>
    </head>
    <body>
        <section class="hero is-info is-medium is-bold">
            <div class="hero-head">
                <nav class="navbar">
                    <div class="container">
                        <div class="navbar-brand">
                            <a class="navbar-item" href="../">
                                <img src="{{ asset('img/logo.png') }}" alt="Logo">
                            </a>
                            <a class="navbar-item">
                                Perguntas.mkt
                            </a>
                        </div>
                        <div id="navbarMenu" class="navbar-menu">
                            <div class="navbar-end">
                                <div class="tabs is-right">
                                    <span class="navbar-item">
                                        <a class="button is-white is-outlined" href="{{ url('/login') }}">
                                            <span>Entrar</span>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="hero-body">
                <div class="container">
                    <div class="columns is-vcentered">
                        <div class="column is-6">
                            <h1 class="title">
                            Colete opiniões sobre seu produto de um jeito fácil
                            </h1>
                            <h2 class="subtitle">
                            Crie questionários com perguntas elaboradas por você para que possa avaliar como as pessoas usam seus produtos e o que pensam sobre eles.
                            </h2>
                        </div>
                        <div class="column is-4 is-offset-2">
                            <div class="box">
                                @include('partials.register')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="features container">

            <div class="columns has-text-centered">
                <div class="column is-3">
                    <span class="icon button is-rounded is-large">
                        <i class="fas fa-pen"></i>
                    </span>
                    
                    <p>Crie seu questionário e elabore suas questões objetivas ou abertas</p>
                </div>
                <div class="column is-3">
                    <span class="icon button is-rounded is-large">
                        <i class="fas fa-share-alt"></i>
                    </span>
                    <p>Compartilhe o link gerado com seu público alvo</p>
                </div>
                <div class="column is-3">
                    <span class="icon button is-rounded is-large">
                        <i class="fas fa-check"></i>
                    </span>
                    <p>Visualize as respostas dos seus questionários em relatórios simples</p>
                </div>
            </div>

        </section>
    </body>
</html>
