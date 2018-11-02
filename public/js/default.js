var token = document.querySelector("meta[name='csrf-token']").getAttribute('content');

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

function toggleLoadingState($element) {
    if ($element.classList.contains('is-loading')) {
        $element.classList.remove('is-loading');
    } else {
        $element.classList.add('is-loading');
    }
}

function askConfirmation(e) {
    return confirm("Confirme para deletar. Todos os dados serão perdidos.");
}

function openShareModal(e) {
    let $txtLink = document.querySelector('#txt-form-link');
    $txtLink.value = e.currentTarget.getAttribute('href');
    document.querySelector('.modal').classList.add('is-active');
    return false;
}

function closeModal(e) {
    e.target.parentNode.classList.remove('is-active');
}

function copyLink() {
    document.querySelector('#txt-form-link').select();
    document.execCommand('copy');
}