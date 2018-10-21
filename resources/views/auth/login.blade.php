<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel='shortcut icon' type='image/png' href='{{ asset('img/logo.png') }}' />
    <title>Perguntas.mkt | Acesse sua conta</title>
</head>
<body>
    <section class="hero is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <figure>
                        <img src="{{ asset('img/logo.png') }}" width="64px" />
                    </figure>
                    <h1 class="title has-text-grey">Acesse sua Conta</h1>
                    <h2 class="subtitle has-text-grey">Faça login para visualizar seus formulários</h2>
                    <div class="box">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="field has-text-left">
                                <label class="label is-small">E-mail</label>
                                <div class="control has-icons-left">
                                    <input class="input" type="input" name="email" autofocus="">
                                    <span class="icon is-left">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>
                                @if ($errors->has('email'))
                                    <p class="help is-danger">
                                        {{ $errors->first('email') }}
                                    </p>
                                @endif
                            </div>
                
                
                            <div class="field has-text-left">
                                <label for="name" class="label is-small">Senha</label>
                                <div class="control has-icons-left">
                                    <input class="input" type="password" name="password">
                                    <span class="icon is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                                @if ($errors->has('password'))
                                    <p class="help is-danger">
                                        {{ $errors->first('password') }}
                                    </p>
                                @endif
                            </div>
                
                
                            <button class="button is-block is-success is-fullwidth">Entrar</button>
                
                        </form>
                    </div>

                    <p class="has-text-grey">
                        <a href="{{ route('register') }}">Criar Conta</a> &nbsp;·&nbsp;
                        <a href="{{ url('/password/reset') }}">Esqueci minha senha</a>
                    </p>
                </div>
            </div>
        </div>

    </section>
</body>
</html>