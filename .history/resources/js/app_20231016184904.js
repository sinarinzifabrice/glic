import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


let form = document.querySelector('.needs-validation');
form.addEventListener('submit',valider);


function valider(e){
    if(form.checkValidity()==false){
        e.preventDefault();
    }
    form.classList.add('was-validated');
}
