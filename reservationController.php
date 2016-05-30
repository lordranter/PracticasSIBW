<?php
class ReservationController{
	function ReservationController(){
		include 'reservations.php';
		include 'paymentController.php';
		$this->reservations = new Reservations();
	}
	
	function escogerFecha($checkIn ,$checkOut){
		$result = $this->reservations->getNumberOfRoomsReservedWithinAPeriodOfTimePerType($checkIn ,$checkOut);
		for($i = 0; $i < count($result); $i++){
			$result[$i]->numRooms = $this->reservations->getNumberOfRoomsOfAType($result[$i]->idTypeRoom) - $result[$i]->numRooms;
		}

		return $result;
	}
	
	function createReservation($checkIn, $checkOut, $selectedRooms, $promotion, $client){
		$this->reservations->createReservation($checkIn, $checkOut, $selectedRooms, $promotion, $client);
	}
	
		
	function payReservation($reservation){
		$paymentController = new PaymentController();
		$result = false;
		if($paymentController->pay()){
			$this->reservations->pay($reservation);
			$result = true;
		}
		return $result;
	}
	
	function deleteReservation($reservation){
		$this->reservations->deleteReservation($reservation);
	}
	
	function updateReservation($reservation, $checkIn, $checkOut, $selectedRooms, $promotion, $client, $paid){
		$this->reservations->createReservation($reservation, $checkIn, $checkOut, $selectedRooms, $promotion, $client, $paid);
	}
	
	/*function updateReservation($reservation, $checkIn, $checkOut, $selectedRooms, $promotion, $client, $paid){
		$this->reservations->createReservation($reservation, $checkIn, $checkOut, $selectedRooms, $promotion, $client, $paid);
	}*/
	
	function getReservation($reservation){
		$this->reservations->getReservation($reservation);		
	}
}
?>
