<?php 
	$msg = null;
	if(isset($_POST["phpmailer"]))
	{
		$nombre = htmlspecialchars($_POST["nombreContacto"]);
		$email = htmlspecialchars($_POST["emailContacto"]);
		$telefono = htmlspecialchars($_POST["telefonoContacto"]);
		$mensaje = $_POST["mensaje"];
		$usuario = "";
		$contrasena = "";
		
		$asunto = 'Contacto Hotel Plaza Nueva Granada';
		
		$mensajeServer = "Gracias por su mensaje, le responderemos en breve.<br></br> No responda a este mensaje.";

		
		require "phpmailer/PHPMailerAutoload.php";
		
		$mailC = new PHPMailer;
		

		//indico a la clase que use SMTP
		$mailC->IsSMTP();
		  


		//Debo de hacer autenticación SMTP
		$mailC->SMTPAuth = true;
		$mailC->SMTPSecure = "ssl";

		//indico el servidor SMTP
		$mailC->Host = "correo.ugr.es";

		//indico el puerto que usa el servidor
		$mailC->Port = 465;

		//indico un usuario / clave de un usuario 
		$mailC->Username = $usuario;
		$mailC->Password = $contrasena;
		  
		$mailC->From = "antonio2195@correo.ugr.es";
		$mailC->FromName = "Hotel Plaza Nueva Granada";
		$mailC->Subject = $asunto;
		$mailC->addAddress($email,$nombre);
		$mailC->MsgHTML($mensajeServer);
		
		//Email para el servidor//
		
		$mailS = new PHPMailer;
		

		//indico a la clase que use SMTP
		$mailS->IsSMTP();
		  

		//Debo de hacer autenticación SMTP
		$mailS->SMTPAuth = true;
		$mailS->SMTPSecure = "ssl";

		//indico el servidor SMTP
		$mailS->Host = "correo.ugr.es";

		//indico el puerto que usa el servidor
		$mailS->Port = 465;

		//indico un usuario / clave de un usuario 
		$mailS->Username = $usuario;
		$mailS->Password = $contrasena;
		  
		$mailS->From = "antonio2195@correo.ugr.es";
		$mailS->FromName = $nombre;
		$mailS->Subject = $asunto;
		$mailS->addAddress("antonio2195@correo.ugr.es",$nombre);
		$mailS->MsgHTML("<h4> Correo: </h4>". $email .' <br></br>' . ' <br></br>'. $mensaje . '<br></br> Teléfono: <br></br>' . $telefono);
		
		if($mailC->Send() && $mailS->Send() )
		{
			$msg = "Email enviado con éxito a $email";
		}
		else
		{
			$msg = "Ha ocurrido un error al enviar el email a $email";
		}
		
		header('Location: index.php#index_titulo_contacto2');
		
	
	}
?>