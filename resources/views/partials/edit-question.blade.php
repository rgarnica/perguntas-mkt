@inject('types', 'App\Types\FormQuestionTypes')

<hr>


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
                action="{{ url('/questions/' . $question->id ) }}"
                onsubmit="return askConfirmation()">
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
        <button class="button is-link is-small is-outlined" disabled>
            <span class="icon">
                <i class="fas fa-plus"></i>
            </span>
            <span>Adicionar Alternativa</span>
        </button>
    </div>
</div>



