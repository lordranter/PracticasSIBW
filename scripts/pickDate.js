function guardarDatos(){
	var fechaIn = document.getElementById('fechaIn').value;
	var fechaOut = document.getElementById('fechaOut').value;

	localStorage.fechaIn = fechaIn;
	localStorage.fechaOut = fechaOut;

}

function setDatosFecha()
{
	if(localStorage.fechaIn != null)
	{
		document.getElementById('fechaIn').value = localStorage.fechaIn;
	}else{
	
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1;
		var yyyy = today.getFullYear();
		
		if(dd < 10)
		{
			dd = '0' + dd;
		}
		
		if(mm<10)
		{
			mm = '0' + mm;
		}
		
		today = yyyy+'-'+mm+'-'+dd;
		document.getElementById('fechaIn').value = today;
	}
	
	
	
	if(localStorage.fechaOut != null)
	{
		document.getElementById('fechaOut').value = localStorage.fechaOut;
	}else{
	
		var today = new Date();
		var dd = today.getDate()+1;
		var mm = today.getMonth()+1;
		var yyyy = today.getFullYear();
		
		if(dd < 10)
		{
			dd = '0' + dd;
		}
		
		if(mm<10)
		{
			mm = '0' + mm;
		}
		
		today = yyyy+'-'+mm+'-'+dd;
		document.getElementById('fechaOut').value = today;
	}
}

function addCarrito1()
{

	var e = document.getElementById("cantidadhab1").value;
	localStorage.id1 = e;
	
	actualizarItems1();
	
}

function actualizarItems1()
{
	var e = localStorage.id1;
	document.getElementById('resumenP0').innerHTML = e;
}

function addCarrito2()
{

	var e = document.getElementById("cantidadhab2").value;
	localStorage.id2 = e;
		actualizarItems2();
	
}
function actualizarItems2()
{
	var e = localStorage.id2;
	document.getElementById('resumenP1').innerHTML = e;
}

function addCarrito3()
{

	var e = document.getElementById("cantidadhab3").value;
	localStorage.id3 = e;
		actualizarItems3();
	
}

function actualizarItems3()
{
	var e = localStorage.id3;
	document.getElementById('resumenP2').innerHTML = e;
}

function actualizarItemsTodos()
{
	actualizarItems1();
	actualizarItems2();
	actualizarItems3();
}

function limpiarItems()
{
	localStorage.id1 = 0;
	localStorage.id2 = 0;
	localStorage.id3 = 0;
	localStorage.promocion = -1;
	
}

function escogerPromocion0()
{
	localStorage.promocion = 0;
	actualizarPromo();
	
}

function escogerPromocion1()
{
	localStorage.promocion = 1;
	actualizarPromo();
}

function actualizarPromo()
{
	var e = localStorage.promocion;
	var result;
	if(e == 0)
	{
		result = "Habitación doble + visita guiada a la Alhambra.";
	}
	else if(e == 1){
		result = "Descuento 10%.";
	}else{
		result = "No seleccionado."
	}
	document.getElementById('resumenP3').innerHTML = result;
	
}

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

function esUnNumero(n) {
	return !isNaN(parseFloat(n)) && isFinite(n);
}

function comprobarFormulario()
{
	var telefono = document.getElementById('telefono').value;
	var email = document.getElementById('email').value;
	var nombre = document.getElementById('name').value;
	var apellidos = document.getElementById('apellidos').value;
	var direccion = document.getElementById("direccion").value;
	var dni = document.getElementById("dni").value;
	var numTar = document.getElementById("numTar").value;
	var nombTitu = document.getElementById("nombTitu").value;
	var caducidad = document.getElementById("caducidad").value;
	var Cseguridad = document.getElementById("Cseguridad").value;
	var regExEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

	if (telefono == null || telefono == "" || !esUnNumero(telefono) || telefono.toString().length != 9) {
        alert("Introduzca un número de teléfono español");
		return false;
    }else if (email == null || email == "" || !regExEmail.test(email)) {
        alert("Introduzca un email válido");
		return false;
    }else if (nombre == null || nombre == "") {
        alert("Introduzca su nombre");
		return false;
    }else if (apellidos == null || apellidos == "") {
        alert("Introduzca sus apellidos");
		return false;
    }else if (direccion == null || direccion == "") {
        alert("Introduzca su direccion");
		return false;
    }else if (numTar == null || numTar == "") {
        alert("Introduzca correctamente el numero de la tarjeta");
		return false;
    }else if (nombTitu == null || nombTitu == "") {
        alert("Introduzca el nombre del titular");
		return false;
    }else if (nombTitu == null || nombTitu == "") {
        alert("Introduzca el nombre del titular");
		return false;
    }else if (caducidad == null || caducidad == "") {
        alert("Introduzca la caducidad de la tarjeta");
		return false;
    }else if (Cseguridad == null || Cseguridad == "") {
        alert("Introduzca el CVC");
		return false;
    }else if (dni == null || dni == "") {
        alert("Introduzca su dni");
		return false;
    
    }else{
		//alert("El mensaje se ha enviado correctamente.");
		if (document.getElementById("termns").checked) {
			

			return true;
			}else
			{
				alert("Acepte los términos y condiciones.");
			}
		
	}
}

function loadForm()
{

	if(comprobarFormulario() == true)
	{
		var telefono = document.getElementById('telefono').value;
		var email = document.getElementById('email').value;
		var nombre = document.getElementById('name').value;
		var apellidos = document.getElementById('apellidos').value;
		var direccion = document.getElementById("direccion").value;
		var dni = document.getElementById("dni").value;
		
		localStorage.telefono = telefono;
		localStorage.email = email;
		localStorage.nombre = nombre;
		localStorage.apellidos = apellidos;
		localStorage.direccion = direccion;
		localStorage.dni = dni;
		window.location.replace("index.php?secc=reserva4");
	}
	
	
	

}

function createResumen()
{
	var e = document.getElementById("marcoGeneralR");
	var contenido = "<div id='cuadro'><h1 id='tituloResumen' style='text-align:center;color:#984dff;'> Resumen de la reserva </h1><div><div class='cabeceraRes'><p class='Cabecera1'> Tipo: </p><p class='Cabecera2'> Nombre </p><p class='Cabecera3'> Cantidad </p><p class='Cabecera4'> Precio </p></div>";
	var precioTotal = 0;
	
	if(localStorage.id1 > 0)
	{
		precioTotal = precioTotal + localStorage.id1*120;
		contenido = contenido + "<div class='cabeceraRes'><p class='Cabecera1'> Habitación </p><p class='Cabecera2'> Habitación doble </p><p class='Cabecera3'>" +localStorage.id1+ "</p><p class='Cabecera4'> 120,00€ </p></div>"
	}
	if(localStorage.id2 > 0)
	{
		precioTotal = precioTotal + localStorage.id2*140;
		contenido = contenido + "<div class='cabeceraRes'><p class='Cabecera1'> Habitación </p><p class='Cabecera2'> Habitación triple </p><p class='Cabecera3'>" +localStorage.id2+ "</p><p class='Cabecera4'> 140,00€ </p></div>"
	}if(localStorage.id3 > 0)
	{
		precioTotal = precioTotal + localStorage.ide*180;
		contenido = contenido + "<div class='cabeceraRes'><p class='Cabecera1'> Habitación </p><p class='Cabecera2'> Habitación superior </p><p class='Cabecera3'>" +localStorage.id3+ "</p><p class='Cabecera4'> 180,00€ </p></div>"
	}
	
	if(localStorage.promocion > 0)
	{
		if(localStorage.promocion == 0)
		{
			contenido = contenido + "<div class='cabeceraRes'><p class='Cabecera1'> Promoción </p><p class='Cabecera2'> Habitación + visita guiada </p><p class='Cabecera3'>1</p><p class='Cabecera4'> 0,00€ </p></div>"
		}else if(localStorage.promocion == 1)
		{
			contenido = contenido + "<div class='cabeceraRes'><p class='Cabecera1'> Promoción </p><p class='Cabecera2'> Descuento del 10% </p><p class='Cabecera3'>1</p><p class='Cabecera4'> 0,00€ </p></div>"
			precioTotal = precioTotal *	0.9	
		}
	}
	
	
	
	contenido = contenido + "<div class='CabeceraPTotal'><p class='CabeceraP'> Precio total </p><p class='Ptotal'>"+ precioTotal+",00€</p></div></div>"
	
	contenido = contenido + "<div id='resumContainer2'><div id='DatosCliente'><p id='tituloDatosPersonales'> Datos personales </p><div class='lineaDatos'><p class='datosColum1'> Nombre completo: </p>"+
								"<p class='datosColum2'>" +localStorage.nombre + " " + localStorage.apellidos+ "</p></div><div class='lineaDatos'><p class='datosColum1'> Teléfono: </p><p class='datosColum2'>" + localStorage.telefono +"</p>"+
								"</div>"+
								"<div class='lineaDatos'><p class='datosColum1'> Dirección: </p><p class='datosColum2'> " + localStorage.direccion + " </p></div><div class='lineaDatos'>"+
								"<p class='datosColum1'> DNI: </p><p class='datosColum2'> "+ localStorage.dni +" </p></div><div class='lineaDatos'><p class='datosColum1'> E-mail: </p>"+
								"<p class='datosColum2'> "+ localStorage.email +" </p></div></div><a id='botonCompletar'onclick='enviarReserva();'> Completar reserva</a>"+
								"</div></div>";
	document.getElementById("marcoGeneralR").innerHTML=contenido;
	
	
}

function enviarReserva()
{
	$.post('reservar.php',{fechaIn: localStorage.fechaIn, fechaOut: localStorage.fechaOut, nombre: localStorage.nombre, email: localStorage.email, apellidos: localStorage.apellidos, dni:localStorage.dni,direccion: localStorage.direccion,telefono: localStorage.telefono,
	idRoom1: localStorage.id1,idRoom2:localStorage.id2,idRoom3:localStorage.id3,promotionId: localStorage.promocion},function(){
	alert("Se ha realizado la reserva.")
	window.location.replace("index.php");
	})
}

