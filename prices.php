<?php
class Prices{
	function Prices(){			
		$servername = "localhost";
		$username = "test";
		$password = "test";
		$database = "hotelplazanueva";
		$port = 3306;

		$connection = new mysqli($servername, $username, $password, $database, $port);
		if($connection->connect_error){
			die("Connection failed: " . $connection->connect_error);
		}else{
			$this->connection = $connection;
		}
	}
	
	
	function createPrice($roomtype, $firstDay, $finalDay, $price){
		$sql = "insert into price (roomtype, firstDay, finalDay, price) values ('" . $roomtype . "', '" . $firstDay . "', '" . $finalDay . "', '" . $price . "')";
		
		if ($this->connection->query($sql) === FALSE) {
			echo "Error: " . $sql . "<br>" . $this->connection->error;
		}
		
		return $this->connection->insert_id;
	}
	
	
	function deletePrice($id){
		$sql = "delete from price where id=" . $id;
		
		if ($this->connection->query($sql) === FALSE) {
			echo "Error: " . $sql . "<br>" . $this->connection->error;
		}
	}
	
	
	function updatePrice($id, $roomtype, $firstDay, $finalDay, $price){
		$sql = "update price set roomtype='" . $roomtype . "', firstDay='" . $firstDay . "', finalDay='" . $finalDay . "', price='" . $price . "' where id='" . $id . "'";
		
		if ($this->connection->query($sql) === FALSE) {
			echo "Error: " . $sql . "<br>" . $this->connection->error;
		}
	}
	
	function getPriceByID($id){
		$sql = "select * from price where id=" . $id;
		
		$query = $this->connection->query($sql);
	
		return $query->fetch_assoc();
	}

	function getPriceByDateRangeAndRoomType($roomtype, $firstDay, $finalDay){
		$sql = "select * from price 
			where roomtype=" . $roomtype . " 
			and firstDay<=STR_TO_DATE('" . $finalDay . "', '%Y-%m-%d') 
			and finalDay>=STR_TO_DATE('" . $firstDay . "', '%Y-%m-%d')
			";

		$query = $this->connection->query($sql);
	
		return $query;
	}
	
	
}
?>
