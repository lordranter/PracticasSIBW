<?php 

	include 'reservationController.php';
	
	$fechaIn = $_POST["fechaIn"];
	$fechaOut = $_POST["fechaOut"];
	
	
	header('Location: index.php?secc=reservaS&fechaIn='.$fechaIn .'&fechaOut='.$fechaOut.'');
	
	


?>