@extends('layouts.app')

@section('content')

<div class="container has-text-centered">
    <div class="column is-4 is-offset-4">
        <h1 class="title has-text-grey">Redefinir Senha</h1>
        <div class="box">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

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

                <div class="field has-text-left">
                    <label for="name" class="label is-small">Senha</label>
                    <div class="control has-icons-left">
                        <input class="input" type="password" name="password" placeholder="Crie uma senha">
                        <span class="icon is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                    @if ($errors->has('password'))
                        <p class="help is-danger">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>

                <div class="field has-text-left">
                    <label for="name" class="label is-small">Confirme a Senha</label>
                    <div class="control has-icons-left">
                        <input class="input" type="password" name="password_confirmation" placeholder="Digite a senha novamente">
                        <span class="icon is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                    @if ($errors->has('password_confirmation'))
                        <p class="help is-danger">
                            {{ $errors->first('password_confirmation') }}
                        </p>
                    @endif
                </div>

                <button class="button is-block is-success is-fullwidth">Redefinir Senha</button>

                
            </form>
        </div>
    </div>
</div>
@endsection
