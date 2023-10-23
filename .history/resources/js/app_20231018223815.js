import './bootstrap';


let form = document.querySelector('.needs-validation');
form.addEventListener('submit',valider);


function valider(e){
    if(form.checkValidity()==false && !validerDates()){
        e.preventDefault();
    }
    form.classList.add('was-validated');
}


function validerDates() {
    const dateDebut = moment(document.querySelector('#date-debut').value);
    const dateFin = moment(document.querySelector('#date-fin').value);

    // Vérifier si la date de fin est au moins 6 mois après la date de début
    const sixMoisApresDebut = moment(dateDebut).add(6, 'months');

    if (dateFin.isBefore(sixMoisApresDebut)) {
        document.querySelector('.date-fin').setCustomValidity('Le contrat doit avoir une durée minimale de 6 mois.');
        return false;
    } else {
        document.querySelector('.date-fin').setCustomValidity('');
        return true;
    }
}
