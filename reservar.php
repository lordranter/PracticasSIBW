<?php 

	include 'reservationController.php';
	
	$reservationController = new ReservationController();
	
	$checkIn = $_POST["fechaIn"];
	$checkOut = $_POST["fechaOut"];
	$idRoom1 = $_POST["idRoom1"];
	$idRoom2 = $_POST["idRoom2"];
	$idRoom2 = $_POST["idRoom3"];
	$promotion = $_POST["promotionId"];
	$selectedRooms = array(new RoomTypeNum(0, $idRoom1),new RoomTypeNum(1, $idRoom2),new RoomTypeNum(2, $idRoom3));
	
	
	$reservationController->createReservation($checkIn, $checkOut, $selectedRooms, $promotion, 1);
	 
	 header('Location: index.php');

?>