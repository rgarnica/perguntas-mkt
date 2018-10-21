<form method="POST" action="{{ route('register') }}">
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

    <div class="field has-text-left">
        <label for="name" class="label is-small">Nome</label>
        <div class="control has-icons-left">
            <input class="input" type="text" name="name" placeholder="Informe seu nome completo">
            <span class="icon is-left">
                <i class="fas fa-user"></i>
            </span>
        </div>
        @if ($errors->has('name'))
            <p class="help is-danger">
                {{ $errors->first('name') }}
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

    <button class="button is-block is-success is-medium is-fullwidth">Criar Conta</button>

    <div class="has-text-left">
        Já tem conta? <a href="{{ url('/login') }}" class="has-text-info ">Clique aqui para acessar</a>
    </div>
</form>