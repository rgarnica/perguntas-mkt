<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css" />
    <title>{{ config('app.name') }} | {{ $form->title }}</title>
    <link rel='shortcut icon' type='image/png' href='{{ asset('img/logo.png') }}' />
</head>
<body>
    <div class="hero is-fullheight is-light is-bold">
        <!--<div class="hero-head">
            <div class="container has-text-centered">
                Pergunta 1 de 10
            </div>
        </div>-->
        <!--<div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">Em qual desses lugares você passou recentemente?</h1>

                <button class="button is-large is-dark is-outlined">
                    <span>Ir para próxima</span>
                </button>
            </div>
        </div>-->

        <div class="hero-body">
            <div class="container has-text-centered">

                <div class="column is-6 is-offset-3">

                    <h1 class="title">
                        {{ $form->title }}
                    </h1>
                    <h2 class="subtitle">
                        {{ $form->description }}
                    </h2>
                    <div class="box has-text-left">
                        <h1 class="title has-text-grey is-5">Informe seu e-mail para começar</h1>
                        <div class="field">
                            <div class="control">
                                <input type="email" class="input" placeholder="Digite seu e-mail">
                            </div>
                            <span class="help">Seu e-mail não será compartilhado com ninguém</span>
                            <span class="help">Não enviaremos e-mail para você</span>
                        </div>
                        <div class="field">
                            <div class="control">
                                <button class="button is-success is-fullwidth">
                                    Iniciar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="hero-foot">

            <nav class="navbar">
                <div class="container">
                    <div class="navbar-brand">
                        <a class="navbar-item">
                            <img src="{{ asset('img/logo.png') }}" alt="Logo">
                        </a>
                        <a href="" class="navbar-item">
                            {{ config('app.name') }}
                        </a>
                    </div>
                    <div id="navbarMenuHeroA" class="navbar-menu">
                    <div class="navbar-end">
                        <span class="navbar-item">
                            <a class="button is-primary is-outlined">
                                <span class="icon">
                                <i class="fas fa-external-link-alt"></i>
                                </span>
                                <span>Crie seu Questionário</span>
                            </a>
                        </span>
                    </div>
                    </div>
                </div>
            </nav>

            
        </div>
    </div>
</body>
</html>