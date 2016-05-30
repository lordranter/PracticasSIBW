function escogerFecha(){
	$.ajax({
		type:"POST",
		url:"pickDate.php",
		data: {"fechaIn="+ document.getElementById('fechaIn').value, "fechaOut="+document.getElementById('fechaOut').value},
		dataType:"html",
		sucess: function(respuesta){
			document.getElementById('marcoPrincipal').innerHTML = respuesta;
		}
	
	
	
	})


}