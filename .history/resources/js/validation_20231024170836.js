import './bootstrap';


let form = document.querySelector('.needs-validations');
form.addEventListener('submit',valider);


function valider(e){


    if(form.checkValidity()==false ){
        e.preventDefault();
    }
    form.classList.add('was-validated');
}




