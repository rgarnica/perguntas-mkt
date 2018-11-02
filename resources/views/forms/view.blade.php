@extends('layouts.app')

@section('content')

    <div class="hero is-light has-text-center is-large">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">{{ $form->title }}</h1>
                <h2 class="subtitle">{{ $form->description }}</h2>
            </div>
        </div>
        <div class="hero-foot">
            <div class="container">
                <nav class="level is-vertical">
                    <div class="level-item has-text-centered">
                        <div>
                        <p class="heading">Questões</p>
                        <p class="title">{{ $form->questions()->count() }}</p>
                        </div>
                    </div>
                    <div class="level-item has-text-centered">
                        <div>
                        <p class="heading">Acessos</p>
                        <p class="title">123</p>
                        </div>
                    </div>
                    <div class="level-item has-text-centered">
                        <div>
                        <p class="heading">Respostas</p>
                        <p class="title">456K</p>
                        </div>
                    </div>
                    <div class="level-item has-text-centered">
                        <div>
                        <p class="heading">Expiração</p>
                        <p class="title">{{ $form->expires_at->format('d/m/Y') }}</p>
                        </div>
                    </div>
                    </nav>
            </div>
        </div>
    </div>

@endsection