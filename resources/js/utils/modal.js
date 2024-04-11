const addErrorMessage = (errors = {}) => {
    const modalElement = document.getElementById('error-header-modal');
    var myModal = new bootstrap.Modal(modalElement, {});

    const modalBody = modalElement.querySelector('.modal-body');
    modalBody.innerHTML = '';

    for (let field in errors) {
        let errorTitle = document.createElement('h5');
        errorTitle.className = 'mt-0 modal-error-title';
        errorTitle.textContent = field;

        let errorBody = document.createElement('div');
        errorBody.className = 'modal-error-body';

        let ul = document.createElement('ul');

        errors[field].forEach((error) => {
            const li = document.createElement('li');
            li.textContent = error;
            ul.appendChild(li);
        });

        errorBody.appendChild(ul);

        modalBody.appendChild(errorTitle);
        modalBody.appendChild(errorBody);
    }

    myModal.show();
};

const showModalConfirm = (title, message, callback, type = 'primary') => {
    const modalType = type +'-header-modal'
    
    const modalElement = document.getElementById(modalType);
    var myModal = new bootstrap.Modal(modalElement, {});

    const modalTitle = modalElement.querySelector('.modal-title');
    modalTitle.textContent = title;

    const modalBody = modalElement.querySelector('.modal-body');
    modalBody.textContent = message;

    const confirmButton = modalElement.querySelector('.btn-on-accept');
    confirmButton.addEventListener('click', () => {
        callback();
        myModal.hide();
    });

    const cancelButton = modalElement.querySelector('.btn-on-cancel');
    cancelButton.addEventListener('click', () => {
        myModal.hide();
    });

    myModal.show();
};

export { addErrorMessage, showModalConfirm };
