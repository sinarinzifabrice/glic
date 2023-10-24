import './bootstrap';
import moment from 'moment';

let form = document.querySelector('.needs-validation');
form.addEventListener('submit',valider);


function valider(e){
    document.getElementById('error-datefin').textContent='Le champ date fin est obligatoire.';
    document.querySelector('#datefin').setCustomValidity('');

    if(form.checkValidity()==false {
        e.preventDefault();
    }
    form.classList.add('was-validated');
}




