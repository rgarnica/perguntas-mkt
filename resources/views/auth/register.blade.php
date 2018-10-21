@extends('layouts.app')

@section('content')
<div class="container has-text-centered">
    <div class="column is-4 is-offset-4">
        <h1 class="title has-text-grey">Crie sua Conta</h1>
        
        <div class="box">
            @include('partials.register')
        </div>
    </div>
</div>
@endsection
