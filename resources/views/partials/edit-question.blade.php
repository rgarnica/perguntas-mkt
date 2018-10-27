@inject('types', 'App\Types\FormQuestionTypes')

<hr>

<div class="columns is-vcentered">

    <div class="field column is-8">
        <label class="label is-small">Enunciado</label>
        <div class="control">
            <input class="input" value="{{ $question->title }}" />
        </div>
    </div>

    <div class="field column is-3">
        <label class="label is-small">Tipo da Questão</label>
        <div class="select">
            <select>
                <option @if($question->type == $types::OPEN) selected="selected" @endif>Aberta</option>
                <option @if($question->type == $types::OBJECTIVE) selected="selected" @endif>Múltipla Escolha</option>
            </select>
        </div>
    </div>

    <div class="field column is-1">
        <div class="control">
            <button class="button is-light is-small">
                <span class="icon">
                    <i class="fas fa-trash"></i>
                </span>
            </button>
        </div>
    </div>

</div>