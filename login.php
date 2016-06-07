<?php 


	include 'usersController.php';
	$userController = new userController();
	
	$name = $_POST["name"];
	$pass = $_POST["pass"];*/
	
		$outp = "[";
		$outp .= '{"Mensaje": "No se ha encontrado al usuario.","Link":"","Encontrado":"false"}'; 
		$outp .="]";

		//$outp = '{"Mensaje": "Login correcto","Link":"admin.php","Encontrado":"true"}'; 
		echo ($outp);
		/*
	$result = $userController->getUser($name,$pass);
	$outp = "";
	
	if($result != null)
	{
		
		$outp = "[";
		$outp .= '{"Mensaje": "Login correcto","Link":"admin.php","Encontrado":"true"}'; 
		$outp .="]";

		
	}
	else
	{
		$outp = "[";
		$outp .= '{"Mensaje": "No se ha encontrado al usuario.","Link":"","Encontrado":"false"}'; 
		$outp .="]";
	}
	
	echo ($outp);
*/

?>
	 


