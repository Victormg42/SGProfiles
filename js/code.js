window.onload = function() {
    modal = document.getElementById('myModal');
    document.getElementById('password').addEventListener("focusout", comprobarClave);
    document.getElementById('password1').addEventListener("focusout", comprobarClave);
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function openModal() {
    modal.style.display = "block";
}

function closeModal() {
    modal.style.display = "none";
}

function comprobarClave() {
    var clave1 = document.getElementById("password");
    var clave2 = document.getElementById("password1");
    var passwd = document.getElementById("passwd")

    if (clave1.value == clave2.value && clave1.value !== '') {
        passwd.innerHTML = "Las dos passwords son correctas";
        return true;
    } else if (clave1.value !== clave2.value) {
        passwd.innerHTML = "Las passwords no coinciden";
        return false;
    }
}

function validarFor() {
    var inputs = document.getElementsByClassName('validar');
    var val = true;
    for (let i = 0; i < inputs.length; i++) {
        if ((inputs[i].type == 'text' || inputs[i].type == 'password' || inputs[i].type == 'email') && inputs[i].value == '') {
            inputs[i].style.borderColor = 'red';
            val = false;
        } else if ((inputs[i].type == 'text' || inputs[i].type == 'password' || inputs[i].type == 'email') && inputs[i].value !== '') {
            inputs[i].style.borderColor = 'white';
        }
    }
    if (comprobarClave() && val) {
        return true;
    } else {
        return false;
    }
}