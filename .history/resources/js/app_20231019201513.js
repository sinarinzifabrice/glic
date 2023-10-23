import './bootstrap';
import moment from 'moment';

let form = document.querySelector('.needs-validation');
form.addEventListener('submit',valider);


function valider(e){
    document.querySelector('#datefin').setCustomValidity('');
    document.getElementById('error-datefin').textContent('Le champ date fin est obligatoire.');

    if(form.checkValidity()==false || validerDates()==false){
        e.preventDefault();
    }
    form.classList.add('was-validated');
}


function validerDates() {
    const dateDebut = moment(document.querySelector('#datedebut').value, 'YYYY-MM-DD');
    const dateFin = moment(document.querySelector('#datefin').value, 'YYYY-MM-DD');




    // Vérifier si la date de fin est au moins 6 mois après la date de début
    const sixMoisApresDebut = moment(dateDebut).add(6, 'months');



    if (dateFin.isBefore(sixMoisApresDebut)) {
        // Sélectionnez l'élément par son ID
        var paragraphe = document.getElementById('error-datefin');

        // Modifiez le texte
        paragraphe.textContent = 'La durée de contrat est de 6 mois minimum';

        document.querySelector('#datefin').setCustomValidity('sdfg');
        return false;
    } else {
        document.querySelector('#datefin').setCustomValidity('');
        return true;
    }
}

