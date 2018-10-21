@extends('layouts.app')

@section('content')


@if (session('status'))
    <div class="notification is-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="container has-text-centered">

    <h1 class="title has-text-grey">Você ainda não tem questionários</h1>

    <button class="button is-large is-primary">
        <span class="icon is-medium">
            <i class="fas fa-plus"></i>
        </span>
        <span>Criar Questionário</span>
    </button>
    
</div>

@endsection
