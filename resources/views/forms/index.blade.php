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
                    <a onclick="return openShareModal(event)"
                       class="button is-link is-outlined" 
                       href="{{ url('ans?form=' . $form->link_hash) }}">
                        <span class="icon">
                            <i class="fas fa-share-alt"></i>
                        </span>
                    </a>

                    <a class="button is-success is-outlined" href="{{ route('forms.show', [$form]) }}">
                        <span class="icon">
                            <i class="fas fa-chart-bar"></i>
                        </span>
                    </a>
                    
                    <a class="button is-dark is-outlined" href="{{ route('forms.edit', [$form]) }}">
                        <span class="icon">
                            <i class="fas fa-pen"></i>
                        </span>
                    </a>

                    <form class="form is-inline" 
                        method="POST" 
                        action="{{ route('forms.destroy', [$form]) }}"
                        onsubmit="return askConfirmation(event, 'Certeza que quer excluir o formulário?')">
                        @csrf
                        @method('delete')
                        <button class="button is-dark is-outlined">
                            <span class="icon">
                                <i class="fas fa-trash"></i>
                            </span>
                        </button>
                    </form>

                </div>

            </div>
            @endforeach
        
    @endif
</div>


<div class="modal">
    <div class="modal-background" onclick="closeModal(event)"></div>
    <div class="modal-content">
        <div class="box">
            <h1 class="title is-4">Compartilhe o link abaixo:</h1>
            <h2 class="subtitle is-6">Envie para seu público alvo para que eles possam responder as perguntas.</h2>
            <div class="field has-addons">
                <div class="control is-expanded">
                    <input type="text" class="input" id="txt-form-link">
                </div>
                <div class="control">
                    <button class="button is-info is-light" onclick="copyLink()">
                        <span class="icon">
                            <i class="fas fa-copy"></i>
                        </span>
                        <span>Copiar Link</span>
                    </button>
                </div>
            </div>
            
            
        </div>
    </div>
    <button class="modal-close is-large" aria-label="close" onclick="closeModal(event)"></button>
</div>

@endsection
