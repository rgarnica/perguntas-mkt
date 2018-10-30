@extends('layouts.app')

@section('content')


@if (session('status'))
    <div class="notification is-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="container has-text-centered">

    @if (count($forms) == 0)
        <h1 class="title has-text-grey">Você ainda não tem questionários</h1>
    @endif

    <a id="btn-add-form"
       class="button is-large is-primary" 
       href="{{ url('forms') }}"
       onclick="event.preventDefault();
       document.getElementById('create-form').submit();" >
        <span class="icon is-medium">
            <i class="fas fa-plus"></i>
        </span>
        <span>Criar Questionário</span>
    </a>
    <form id="create-form" method="POST" action="{{url('forms')}}">
        @csrf
    </form>

    @if (count($forms) > 0)
        
            @foreach($forms as $form)
            <div class="box notification is-light form-box has-text-left columns is-vcentered">

                <div class="column is-10">
                    <h2 class="title is-6">{{ $form->title }}</h2>
                    <h3 class="subtitle is-6">{{ $form->description }}</h3>
                </div>

                <div class="column is-2 has-text-centered">
                    <a class="button is-link is-outlined">
                        <span class="icon">
                            <i class="fas fa-share-alt"></i>
                        </span>
                    </a>

                    <a class="button is-success is-outlined">
                        <span class="icon">
                            <i class="fas fa-chart-bar"></i>
                        </span>
                    </a>
                    
                    <a class="button is-dark is-outlined" href="{{ route('forms.edit', [$form]) }}">
                        <span class="icon">
                            <i class="fas fa-pen"></i>
                        </span>
                    </a>

                    <a class="button is-dark is-outlined">
                        <span class="icon">
                            <i class="fas fa-trash"></i>
                        </span>
                    </a>
                </div>

            </div>
            @endforeach
        
    @endif
</div>

@endsection
