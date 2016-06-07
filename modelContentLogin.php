<?php

class modelContentLogin{

	
	
	function modelContentLogin(){
		require 'core/init.php';
		$this->titleSection = $lang['Iniciar Sesión'];
		$this->userName = $lang['Nombre de Usuario'];
		$this->placeholderUserName = $lang['Introducir Nombre de Usuario'];
		$this->password = $lang['Contraseña'];
		$this->placeHolderpass = $lang['Introducir Contraseña'];
		$this->logIn = $lang['Iniciar Sesión'];
	}
}
?>