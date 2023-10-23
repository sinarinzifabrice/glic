import './bootstrap';
import moment from 'moment';

let form = document.querySelector('.needs-validation');
form.addEventListener('submit', valider);

function valider(e) {
    if (!validerDates()) {
        e.preventDefault();
    }
}

function validerDates() {
    const dateDebut = moment(document.getElementById('datedebut').value);
    const dateFin = moment(document.getElementById('datefin').value);

    // Vérifier si la date de fin est au moins 6 mois après la date de début
    const sixMoisApresDebut = moment(dateDebut).add(6, 'months');

    if (dateFin.isBefore(sixMoisApresDebut)) {
        document.getElementById('datefin').setCustomValidity('Le contrat doit avoir une durée minimale de 6 mois.');
        return false;
    } else {
        document.getElementById('datefin').setCustomValidity('');
        return true;
    }
}
