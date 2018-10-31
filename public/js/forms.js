var $formTitle = document.querySelector('#form-title');
var $formDescription = document.querySelector('#form-description');
var $btnAddQuestion = document.querySelector('#btn-add-question');

var formId = document.querySelector('#form-id').value;
var formUrl = '/forms/' + formId;

$formTitle.addEventListener('blur', updateFormData);
$formDescription.addEventListener('blur', updateFormData);
$btnAddQuestion.addEventListener('click', addQuestion);

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