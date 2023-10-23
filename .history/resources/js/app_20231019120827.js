import './bootstrap';
import moment from 'moment';

let form = document.querySelector('.needs-validation');
form.addEventListener('submit',valider);


function valider(e){
    if(form.checkValidity()==false && validerDates()==false){
        e.preventDefault();
    }
    form.classList.add('was-validated');
}

console.log
function validerDates() {
    const dateDebut = moment(document.querySelector('#datedebut').value, 'YYYY-MM-DD');
    const dateFin = moment(document.querySelector('#datefin').value, 'YYYY-MM-DD');

    // Vérifier si la date de fin est au moins 6 mois après la date de début
    const sixMoisApresDebut = moment(dateDebut).add(6, 'months');

    if (dateFin.isBefore(sixMoisApresDebut)) {
        document.querySelector('#datefin').setCustomValidity('Le contrat doit avoir une durée minimale de 6 mois.');
        return false;
    } else {
        document.querySelector('#datefin').setCustomValidity('');
        return true;
    }
}

