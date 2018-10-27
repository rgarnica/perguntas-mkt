@extends('layouts.app')

@section('content')

<div class="column is-8 is-offset-2">

    
    <div class="notification">
    Fique atento com a quantidade de perguntas. Para prender a atenção do usuário e ter sucesso na sua pesquisa recomendamos no máximo 10 perguntas com enunciados simples e objetivos.
    </div>

    <div class="box">
        <input type="hidden" id="form-id" value="{{ $form->id }}" />

        <div class="field">
            <div class="control">
                <input id="form-title" class="input is-large" value="{{ $form->title }}" />
            </div>
        </div>

        <div class="field">
            <div class="control">
                <textarea id="form-description" rows="2" class="textarea">{{ $form->description }}</textarea>
            </div>
        </div>
    
        @each('partials.edit-question', $form->questions, 'question')
        
        <button class="button is-primary">
            <span class="icon">
                <i class="fas fa-plus"></i>
            </span>
            <span>Nova Questão</span>
        </button>


    </div>

</div>

@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('js/forms.js')}}"></script>
@endsection