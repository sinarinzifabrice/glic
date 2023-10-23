import './bootstrap';


let form = document.querySelector('.needs-validation');
form.addEventListener('submit',valider);
console.log('coucou');

function valider(e){
    if(form.checkValidity()==false && !validerDates()){
        e.preventDefault();
    }
    form.classList.add('was-validated');
}


function validerDates() {
    console.log('coucou');
    const dateDebut = moment(document.getElementById('#datedebut').value);
    const dateFin = moment(document.getElementById('#datefin').value);

    console.log(dateDebut dateFin);

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
