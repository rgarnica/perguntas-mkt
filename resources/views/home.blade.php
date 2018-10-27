@extends('layouts.app')

@section('content')


@if (session('status'))
    <div class="notification is-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="container has-text-centered">

    <h1 class="title has-text-grey">Você ainda não tem questionários</h1>

    <a class="button is-large is-primary" 
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
</div>

@endsection
