<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel='shortcut icon' type='image/png' href='{{ asset('img/logo.png') }}' />
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <nav class="navbar is-info" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{ url('/') }}">
                <img src="{{ asset('img/logo.png') }}"  height="28">
            </a>
        </div>
        
        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item">
                    {{ config('app.name') }}
                </a>
            </div>
        
            <div class="navbar-end">

                @guest
                    <div class="navbar-item">
                        <div class="buttons">
                            @if (Route::has('register'))
                                <a class="button is-primary" href="{{ route('register') }}">
                                    <strong>Criar Conta</strong>
                                </a>
                            @endif
                            <a class="button is-light is-outlined" href="{{ route('login') }}">
                                Entrar
                            </a>
                        </div>
                    </div>
                @else
                    <div class="navbar-item">
                        <span class="icon">
                            <i class="fas fa-user" aria-hidden="true"></i>
                        </span>
                        <span>{{ Auth::user()->name }}</span>
                    </div>
                    <a class="navbar-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        Sair
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest

            </div>
        </div>
    </nav>



    <section class="section">
        @yield('content')
    </section>

    
    @yield('scripts')
    
</body>
</html>
