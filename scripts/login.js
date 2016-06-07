function login()
{
	var userName = document.getElementById("userName").value;
	var passwordA = document.getElementById("passwordA").value;
	alert("llega aqui");
	$.post('login.php',{},function(respuesta){
		//alert(respuesta);
	
		//var res = JSON.parse(respuesta);
		if(respuesta.Encontrado == "true")
		{
			alert(respuesta.Mensaje);
		}else{
			alert(respuesta.Mensaje);
		}
	/*alert("Se ha realizado la reserva.")
	window.location.replace("index.php");*/
	});

	
	alert("llega aqui2");
}