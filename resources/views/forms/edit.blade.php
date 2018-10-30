@extends('layouts.app')

@section('content')

<div class="column is-8 is-offset-2">

    <div class="field">
        <a class="button" href="{{ route('forms.index') }}">
            <span class="icon">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span>Voltar para Meus Questionários</span>
        </a>
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
    
        <section id="form-questions">
            @each('partials.edit-question', $form->questions, 'question')
        </section>

        <button class="button is-primary" id="btn-add-question">
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