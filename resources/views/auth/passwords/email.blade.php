@extends('layouts.app')

@section('content')

@if (session('status'))
    <div class="notification is-success">
        {{ session('status') }}
    </div>
@endif

<div class="container has-text-centered">
    <div class="column is-4 is-offset-4">
        <h1 class="title has-text-grey">Esqueceu sua Senha?</h1>
        <h2 class="subtitle has-text-grey">Preencha seu e-mail e enviaremos um link para você redefini-lá.</h2>
        <div class="box">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="field has-text-left">
                    <label class="label is-small">E-mail</label>
                    <div class="control has-icons-left">
                        <input class="input" type="input" placeholder="você@exemplo.com" autofocus="" name="email">
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


         
                <button type="submit" class="button is-success is-block is-fullwidth">
                    Enviar Instruções para Redefinir a Senha
                </button>
                   
            </form>
        </div>
    </div>
</div>
@endsection
