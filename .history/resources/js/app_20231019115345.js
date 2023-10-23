import './bootstrap';


let form = document.querySelector('.needs-validation');
form.addEventListener('submit',valider);


function valider(e){
    if(form.checkValidity()==false && validerDates()==false){
        e.preventDefault();
    }
    form.classList.add('was-validated');
}


function validerDates() {
    const dateDebut = new Date(document.querySelector('#datedebut').value);
    const dateFin = new Date(document.querySelector('#datefin').value);

    // Vérifier si la date de fin est au moins 6 mois après la date de début
    const sixMoisApresDebut = new Date(dateDebut);
    sixMoisApresDebut.setMonth(sixMoisApresDebut.getMonth() + 6);

    if (dateFin < sixMoisApresDebut) {
        document.querySelector('#datefin').setCustomValidity('Le contrat doit avoir une durée minimale de 6 mois.');
        return false;
    } else {
        document.querySelector('#datefin').setCustomValidity('');
        return true;
    }
}
