@extends('layouts.app')

@section('content')

<div class="column is-8 is-offset-2">


    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="{{ route('forms.index') }}">Meus Questionários</a></li>
            <li class="is-active"><a href="#" aria-current="page">Edição de Questionário</a></li>
        </ul>
    </nav>
        
    <div class="box">
        <input type="hidden" id="form-id" value="{{ $form->id }}" />

        <div class="field">
            <div class="control">
                <input id="form-title" 
                    name="title"
                    class="input is-large" 
                    value="{{ $form->title }}" />
            </div>
        </div>

        <div class="field">
            <div class="control">
                <textarea id="form-description" 
                          rows="2" 
                          name="description"
                          class="textarea">{{ $form->description }}
                </textarea>
            </div>
        </div>

        <label for="" class="label is-small">Quando a pesquisa expira?</label>
        <div class="field is-grouped">
            <div class="control">
                <input type="date" class="input" name="expires_at" id="expires_at" value="{{ $form->expires_at->format('Y-m-d') }}">
            </div>
            <div class="control help has-text-grey is-size-7">
                <span class="icon">
                    <i class="fas fa-lightbulb"></i>
                </span>
                
                Após a data de expiração, os usuários que possuem o link não consiguirão responder seu questionário.
            
            </div>
        </div>
    
    </div>
    
    <section id="form-questions">
        @each('partials.edit-question', $form->questions, 'question')
    </section>

    <section class="section add-section">
        <div class="field ">
            <div class="control has-text-centered">
                <button class="button is-large is-primary" id="btn-add-question">
                    <span class="icon">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span>Adicionar Questão</span>
                </button>
            </div>
        </div>
    </section>



</div>

@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('js/forms.js')}}"></script>
@endsection