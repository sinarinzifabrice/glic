import './bootstrap';
import moment from 'moment';

let form = document.querySelector('.needs-validation');
form.addEventListener('submit',valider);


function valider(e){
    document.querySelector('#datefin').setCustomValidity('');

    if(form.checkValidity()==false || validerDates()==false){
        e.preventDefault();
    }
    form.classList.add('was-validated');
}


c

