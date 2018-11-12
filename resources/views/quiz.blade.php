@inject('types', 'App\Types\FormQuestionTypes')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css" />
    <link rel="stylesheet" href="{{ asset('css/bulma-checkradio.min.css') }}">
    <title>{{ config('app.name') }} | {{ $form->title }}</title>
    <link rel='shortcut icon' type='image/png' href='{{ asset('img/logo.png') }}' />
</head>
<body>
    <div class="hero is-fullheight is-light is-bold">

        @if(!is_null($answer))
            <div class="hero-head">
                <nav class="navbar">
                    <div class="container">
                        <div class="navbar-brand">
                            <a href="" class="navbar-item">
                                {{ $form->title }}
                            </a>
                        </div>
                        <div id="navbarMenuHeroA" class="navbar-menu">
                            <div class="navbar-end">
                                <a class="navbar-item">
                                    Pergunta 1 de {{ $form->questions()->count() }}
                                <a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        @endif

        <div class="hero-body">
            <div class="container has-text-centered">
                @if(is_null($answer))
                    <div class="column is-6 is-offset-3">

                        <h1 class="title">
                            {{ $form->title }}
                        </h1>
                        <h2 class="subtitle">
                            {{ $form->description }}
                        </h2>
                        <form class="box has-text-left" method="POST" action="{{ route('answers.store') }}">
                            @csrf
                            <input type="hidden" name="form_hash" value="{{$form->link_hash}}">
                            <h1 class="title has-text-grey is-5">Informe seu e-mail para começar</h1>
                            <div class="field">
                                <div class="control">
                                    <input type="email" required name="email" class="input" autofocus placeholder="Digite seu e-mail">
                                </div>
                                @if ($errors->has('email'))
                                    <span class="help is-danger">{{ $errors->first('email') }}</span>
                                @endif
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
                        </form>
                    </div>                  
                @else
                    @foreach ($form->questions as $question)
                        
                        <h1 class="title">{{ $question->title }}</h1>

                        @if($question->type === $types::OPEN)
                            <div class="field">
                                <div class="control">
                                    <textarea name="" id="" rows="5" class="textarea"></textarea>
                                </div>
                            </div>
                        @else
                            @foreach ($question->alternatives as $alt)
                                <div class="field">
                                    <input type="radio" name="alternativa" class="is-checkradio has-background-color is-primary" name="" id="">
                                    <label for="" class="label">{{ $alt->title }}</label>
                                </div>
                            @endforeach
                        @endif

                        <button 
                            class="button is-success is-large" 
                            disabled>
                        
                        @if ($loop->last)
                            Finalizar
                        @else
                            Avançar para a próxima questão
                        @endif
                        </button>

                    @endforeach
                @endif
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