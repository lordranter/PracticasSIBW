<?php 

		include 'reservationController.php';
		/*include 'index.php';/*
		include 'reservations.php';*/
	
	$fechaIn = $_POST["fechaIn"];
	$fechaOut = $_POST["fechaOut"];
	
	$reservationController = new ReservationController();
	
	$ar = array();
	
	$result = $reservationController->escogerFecha($fechaIn,$fechaOut);
	
	$serialize = serialize($result);

	$_SESSION['rooms'] = $serialize;
	
	
	/*$session = new Session();
	
	$session->add("rooms",$serialize);
	/*
	for($i = 0; $i < count($result); $i++)
	{
		$ar[] = $result->
	}*/
	
	//$_SESSION['result'] = serialize($result);
	
	header('Location: index.php?secc=reservaS');
	
	


?>