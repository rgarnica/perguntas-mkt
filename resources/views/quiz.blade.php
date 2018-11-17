@inject('types', 'App\Types\FormQuestionTypes')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" href="{{ asset('css/bulma-checkradio.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
                                    Pergunta &nbsp;<span id="spn-question-number">1</span>&nbsp; de {{ $form->questions()->count() }}
                                <a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        @endif

        <div class="hero-body">
            <div class="container has-text-centered">

                <div id="thanks-card" class="column is-4 is-offset-4">
                    <div class="card">
                        <div class="card-header">
                            <span class="card-header-title">
                                Obrigado!
                            </span>
                        </div>
                        <div class="card-content">
                            Você finalizou o questionário. Suas respostas ajudarão em nossa análise.
                        </div>
                        <div class="card-footer">
                            <div class="card-footer-item">
                                <a href="{{ route('index') }}" target="_blank" class="button is-success is-inverted">
                                    <span class="icon">
                                        <i class="fas fa-external-link-alt"></i>
                                    </span>
                                    <span>Veja como é fácil criar um questionário.</span>
                                </a>
                            </div>
                            
                        </div>
                    </div>
                </div>


                @if(is_null($answer))
                    <div class="column is-6 is-offset-3">

                        <h1 class="title">
                            {{ $form->title }}
                        </h1>
                        <h2 class="subtitle">
                            {{ $form->description }}
                        </h2>
                        

                        @if($form->expires_at < \Carbon\Carbon::now())
                            <div class="notification is-danger">
                                Este questionário expirou!
                            </div>
                        @else
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
                        @endif
                    </div>                  
                @elseif($answer->submited)
                    <h1 class="title">Você já respondeu esse questionário</h1>
                    <h2 class="subtitle">Obrigado pela participação!</h2>
                @else
                    <input type="hidden" name="answer-hash" id="answer-hash" value="{{ $answer->hash }}">
                    @foreach ($form->questions as $question)

                    <div data-question-id="{{ $question->id }}" class="question animated">
                        
                        <h1 class="title">{{ $question->title }}</h1>

                        @if($question->type === $types::OPEN)
                            <div class="field">
                                <div class="control">
                                    <textarea class="textarea open-field" name="" id="" rows="5" class="textarea"></textarea>
                                </div>
                            </div>
                        @else
                            @foreach ($question->alternatives as $i => $alt)
                            <div class="field has-text-left">
                                <input value="{{ $alt->id }}" class="is-checkradio has-background-color is-primary" id="alternative_{{ $alt->id }}" type="radio" name="radioAlternative">
                                <label for="alternative_{{ $alt->id }}" class="alternativeLabel">{{ $alt->title }}</label>
                            </div>
                            @endforeach
                        @endif

                    </div>

                    @endforeach
                

                    <section class="section has-text-centered">
                        <button 
                            id="btn-next"
                            class="button is-success is-large" 
                            disabled>
                            Avançar para a próxima questão
                        </button>
                    </section>

                    

                    
                @endif
            </div>

        </div>

        <div class="hero-foot">

            <nav class="navbar">
                <div class="container">
                    <div class="navbar-brand">
                        <a class="navbar-item" href="{{ route('index') }}">
                            <img src="{{ asset('img/logo.png') }}" alt="Logo">
                        </a>
                        <a href="{{ route('index') }}" class="navbar-item">
                            {{ config('app.name') }}
                        </a>
                    </div>
                    <div id="navbarMenuHeroA" class="navbar-menu">
                    <div class="navbar-end">
                        <span class="navbar-item">
                            <a target="_blank" class="button is-primary is-outlined" href="{{ route('index') }}">
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
    <script type="text/javascript" src="{{asset('js/default.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/quiz.js')}}"></script>
</body>
</html>