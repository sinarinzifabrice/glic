import './bootstrap';
import moment from 'moment';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


let form = document.querySelector('.needs-validation');
form.addEventListener('submit',valider);


function valider(e){
    document.getElementById('error-datefin').textContent='Le champ date fin est obligatoire.';
    document.querySelector('#datefin').setCustomValidity('');

    if(form.checkValidity()==false || validerDates()==false){
        e.preventDefault();
    }
    form.classList.add('was-validated');
}


