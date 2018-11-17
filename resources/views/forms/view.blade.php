@extends('layouts.app')

@section('content')

    <div class="hero is-primary has-text-center is-large">
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
                        <p class="heading">Respostas</p>
                        <p class="title">{{ $form->submitedAnswers()->count() }}</p>
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

    <section class="section">
    <div class="columns">

        <div class="column is-7">
            <h1 class="title has-text-grey is-5">Questões objetivas (Resumo)</h1>
            
            @foreach($form->objectiveQuestions as $question)
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-header-title">{{ $question->title }}</h1>
                    </div>
                    <div class="card-content">
                        <nav class="level is-vertical">
                            @foreach($question->alternatives as $alternative)
                                <div class="level-item has-text-centered">   
                                    <div>
                                    <p class="heading"><abbr title="{{ $alternative->title }}">{{ $alternative->minified }}</abbr></p>
                                    <p class="title">{{ $question->responses()->wherePivot('response', $alternative->title)->count() }}</p>
                                    </div> 
                                </div>
                            @endforeach   
                        </nav>          
                    </div>
                </div>
            @endforeach
        </div>

        <div class="column is-5">
            <h1 class="title has-text-grey is-5">Questões abertas (Últimas 5 respostas)</h1>

            @foreach($form->openQuestions as $question)
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-header-title">{{ $question->title }}</h1>
                    </div>
                    <div class="card-content">

                        @foreach($question->responses()->orderBy('created_at', 'desc')->take(5)->get() as $response)
                            <div class="is-block">   
                                <p>{{ $response->pivot->response }}</p>
                            </div>
                            <hr>
                        @endforeach         
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

    

@endsection