function comprobarFormulario() {
    var telefono = document.forms["formularioContacto"]["telefonoContacto"].value;
	var email = document.forms["formularioContacto"]["emailContacto"].value;
	var nombre = document.forms["formularioContacto"]["nombreContacto"].value;
	var contenido = document.getElementById("contenidoContacto").value;
	var regExEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (telefono == null || telefono == "" || !esUnNumero(telefono) || telefono.toString().length != 9) {
        alert("Introduzca un número de teléfono español");
		return false;
    }else if (email == null || email == "" || !regExEmail.test(email)) {
        alert("Introduzca un email válido");
		return false;
    }else if (nombre == null || nombre == "") {
        alert("Introduzca su nombre y apellidos");
		return false;
    }else if (contenido == null || contenido == "") {
        alert("El mensaje esta vacio");
		return false;
    }else{
		alert("El mensaje se ha enviado correctamente.");
		document.getElementById("confirmacionEnvio").innerHTML = "Gracias por su interés";
		return true;
		
	}
}

function enviarFormulario(){
	comprobarFormulario();
	return false;
}

function esUnNumero(n) {
	return !isNaN(parseFloat(n)) && isFinite(n);
}