<?php

class modelContentAdmin{

	
	
	function modelContentAdmin(){
		require 'core/init.php';
		$this->titleSection = $lang['Panel de administración'];
		$this->cabecera1 = $lang['Nº Reserva'];
		$this->cabecera2 = $lang['Nombre del cliente'];
		$this->cabecera3 = $lang['DNI'];
		$this->cabecera4 = $lang['Consultar'];
		$this->cabecera5 = $lang['Modificar'];
		$this->cabecera6 = $lang['Eliminar'];
		$this->titleSearch = $lang['Búsqueda'];
		$this->titleButton = $lang['Buscar'];

	}
}
?>