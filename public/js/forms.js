var token = document.querySelector("meta[name='csrf-token']").getAttribute('content');
var $formTitle = document.querySelector('#form-title');
var $formDescription = document.querySelector('#form-description');
var $btnAddQuestion = document.querySelector('#btn-add-question');

var formId = document.querySelector('#form-id').value;
var formUrl = '/forms/' + formId;

$formTitle.addEventListener('blur', updateFormData);
$formDescription.addEventListener('blur', updateFormData);
$btnAddQuestion.addEventListener('click', addQuestion);

function toggleLoadingState($element) {
    if ($element.classList.contains('is-loading')) {
        $element.classList.remove('is-loading');
    } else {
        $element.classList.add('is-loading');
    }
}

function sendRequest(method, url, objData, callback = '') {
    let xhr = new XMLHttpRequest();
    let data = JSON.stringify(objData);

    if (callback != '') {
        xhr.onreadystatechange = callback;
    }

    xhr.open(method, url);
    
    xhr.setRequestHeader('X-CSRF-TOKEN', token);
    xhr.setRequestHeader('Content-Type', 'application/json');
    
    xhr.send(data);
}


function updateFormData() {
    sendRequest(
        'PUT', 
        formUrl, 
        {
            'title': $formTitle.value,
            'description': $formDescription.value
        }
    );
}

function addQuestion() {

    toggleLoadingState($btnAddQuestion);

    let onAddedQuestion = (e) => {

        if (e.target.readyState === 4) {
            let question = document.createElement('template');
            question.innerHTML = e.target.response;
                        
            document.querySelector('#form-questions')
                .appendChild(question.content);
            toggleLoadingState($btnAddQuestion);
        }
        
    };

    sendRequest(
        'POST',
        '/questions',
        {
            'form_id': formId
        },
        onAddedQuestion
    )
}

function askConfirmation(e) {
    return confirm("Confirme para deletar a questão.");
}