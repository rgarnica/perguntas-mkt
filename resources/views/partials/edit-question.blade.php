@inject('types', 'App\Types\FormQuestionTypes')

<div class="box form-question">


    <div class="field is-grouped">

        <div class="control is-expanded">
            <input 
                onblur="updateQuestion(event)"
                class="input"
                name="title" 
                value="{{ $question->title }}" 
                data-update-url="{{ route('questions.update', [$question]) }}" />
        </div>

        <div class="control">
            <div class="select">
                <select
                    onchange="updateQuestion(event)"
                    name="type"
                    data-update-url="{{ route('questions.update', [$question]) }}">
                    <option value="{{ $types::OPEN }}" @if($question->type == $types::OPEN) selected="selected" @endif>Aberta</option>
                    <option value="{{ $types::OBJECTIVE }}" @if($question->type == $types::OBJECTIVE) selected="selected" @endif>Múltipla Escolha</option>
                </select>
            </div>
        </div>

    </div>

    <div class="field is-grouped">
        <div class="control">
            <form class="question-delete" 
                    method="POST" 
                    action="{{ route('questions.destroy', [$question]) }}"
                    onsubmit="return askConfirmation(event, 'Certeza que quer remover a questão?')">
                @csrf
                @method('delete')
                <button class="button is-dark is-small is-outlined">
                    <span class="icon">
                        <i class="fas fa-trash"></i>
                    </span>
                    <span>Excluir Questão</span>
                </button>
            </form>
        </div>
        <div class="control">
            <button 
                class="button is-link is-small is-outlined" 
                @if($question->type == $types::OPEN) disabled @endif
                data-question-id="{{ $question->id }}"
                onclick="addAlternative(event)">
                <span class="icon">
                    <i class="fas fa-plus"></i>
                </span>
                <span>Adicionar Alternativa</span>
            </button>
        </div>
    </div>

    @each('partials.edit-alternative', $question->alternatives, 'alternative')

</div>


