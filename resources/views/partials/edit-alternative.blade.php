<div class="field alternative has-addons">

    <div class="control is-expanded">
        <input 
            class="input"
            name="title" 
            value="{{ $alternative->title }}" 
            data-update-url="{{ route('alternatives.update', [$alternative]) }}" />
    </div>

    <div class="control">
        <form class="alternative-delete" 
            method="POST" 
            action="{{ route('alternatives.destroy', [$alternative]) }}"
            onsubmit="return askConfirmation()">
            @csrf
            @method('delete')
            <button class="button">
                <span class="icon">
                    <i class="fas fa-trash"></i>
                </span>
            </button>
        </form>
    </div>

</div>



