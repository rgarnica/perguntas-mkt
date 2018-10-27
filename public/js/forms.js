var token = document.querySelector("meta[name='csrf-token']").getAttribute('content');
var $formTitle = document.querySelector('#form-title');
var $formDescription = document.querySelector('#form-description');
var formId = document.querySelector('#form-id').value;
var formUrl = '/forms/' + formId;

$formTitle.addEventListener('blur', updateFormData);
$formDescription.addEventListener('blur', updateFormData);

function sendRequest(method, url, objData) {
    let xhr = new XMLHttpRequest();
    let data = JSON.stringify(objData);

    xhr.open('PUT', url);
    
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