<?php
class PriceController{
	function PriceController(){
		include 'prices.php';
		$this->prices = new Prices();
	}

	function createPrice($roomtype, $firstDay, $finalDay, $price){
		return $this->prices->createPrice($roomtype, $firstDay, $finalDay, $price);
	}
	
	
	function deletePrice($id){
		$this->prices->deleteClient($client);
	}
	
	
	function updatePrice($id, $roomtype, $firstDay, $finalDay, $price){
		$this->prices->updatePrice($id, $roomtype, $firstDay, $finalDay, $price);
	}
	
	function getPriceByID($id){
		return $this->prices->getPriceByID($id);
	}

	function getPriceByDateRangeAndRoomType($roomtype, $firstDay, $finalDay){
		return $this->prices->getPriceByDateRangeAndRoomType($roomtype, $firstDay, $finalDay);
	}
}
?>
