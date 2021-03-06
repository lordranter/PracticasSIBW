<?php
class RoomTypeNum{
	function RoomTypeNum($idTypeRoom, $numRooms){
		$this->idTypeRoom = $idTypeRoom;
		$this->numRooms = $numRooms;
	}	
}

class Reservations{
	function Reservations(){			
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

	function getNumberOfRooms(){
		$sql = "select sum(maxCapacity) as totalRooms from roomtype";	
		$result = $this->connection->query($sql);	
		$totalRooms = $result->fetch_assoc();
		
		return $totalRooms["totalRooms"];
	}

	function getNumberOfRoomsOfAType($roomType){
		$sql = "select sum(maxCapacity) as totalRooms from roomtype where id=" . $roomType;	
		$result = $this->connection->query($sql);	
		$totalRooms = $result->fetch_assoc();
		
		return $totalRooms["totalRooms"];
	}

	function getNumberOfReservedRooms(){		
		$sql = "select count(*) as roomsReserved from roomreservation";		
		$result = $this->connection->query($sql);
		$roomsReserved = $result->fetch_assoc();
		
		return $roomsReserved["roomsReserved"];
	}	

	function getNumberOfReservedRoomsOfAType($roomType){		
		$sql = "select count(*) as roomsReserved from roomreservation where roomtype=" . $roomType;		
		$result = $this->connection->query($sql);
		$roomsReserved = $result->fetch_assoc();
		
		return $roomsReserved["roomsReserved"];
	}	
	
	
	function createReservation($checkIn, $checkOut, $selectedRooms, $promotion, $client){
		$sql = "insert into  reservation (checkIn, checkOut, promotionID, clientID) values ('" . $checkIn . "', '" . $checkOut . "', '" . $promotion . "', '" . $client . "')";
		
		if ($this->connection->query($sql) === FALSE) {
			echo "Error: " . $sql . "<br>" . $this->connection->error;
		}
		
		$id = $this->connection->insert_id;
		
		for($i = 0; $i < count($selectedRooms); $i++){
			for($j = 0; $j < $selectedRooms[$i]->numRooms; $j++){
				$sql = "insert into  roomreservation (reservation, roomtype) values ('" . $id . "', '" . $selectedRooms[$i]->idTypeRoom . "')";				
				
				if ($this->connection->query($sql) === FALSE) {
					echo "Error: " . $sql . "<br>" . $this->connection->error;
				}
			}
		}		
	}
	
	
	function deleteReservation($reservation){
		$sql = "delete from reservation where id=" . $reservation;
		
		if ($this->connection->query($sql) === FALSE) {
			echo "Error: " . $sql . "<br>" . $this->connection->error;
		}
	}
	
	
	function updateReservation($reservation, $checkIn, $checkOut, $selectedRooms, $promotion, $client, $paid){
		$sql = "update reservation set checkIn='" . $checkIn . "', checkOut='" . $checkOut . "', promotionID='" . $promotion . "', clientID='" . $client . "', paid='" . $paid . "' where id='" . $reservation . "'";
		
		if ($this->connection->query($sql) === FALSE) {
			echo "Error: " . $sql . "<br>" . $this->connection->error;
		}
		
		$sql = "delete from roomreservation where reservation=" . $reservation;
		
		if ($this->connection->query($sql) === FALSE) {
			echo "Error: " . $sql . "<br>" . $this->connection->error;
		}
		
		for($i = 0; $i < count($selectedRooms); $i++){
			for($j = 0; $j < $selectedRooms[$i]->numRooms; $j++){
				$sql = "insert into  roomreservation (reservation, roomtype) values ('" . $reservation . "', '" . $selectedRooms[$i]->idTypeRoom . "')";				
				
				if ($this->connection->query($sql) === FALSE) {
					echo "Error: " . $sql . "<br>" . $this->connection->error;
				}
			}
		}
	}
	
	function getReservationByID($reservation){
		$result = array();
		$sql = "select * from reservation where id=" . $reservation;
		
		$query = $this->connection->query($sql);
		array_push($result, $query->fetch_assoc());
		
		$sql = "select id from roomtype";
		
		$roomTypes = $this->connection->query($sql);
		
		if ($roomTypes->num_rows > 0) {
			while($row = $roomTypes->fetch_assoc()) {
				$sql = "select count(*) as roomsreserved from roomreservation where reservation=" . $reservation;
				
				$roomsReservedQuery = $this->connection->query($sql);
				$roomsreserved = $roomsReservedQuery->fetch_assoc();
				
				array_push($result, new RoomTypeNum($row["id"],  $roomsreserved["roomsreserved"]));		
			}
		}
	
		return $result;
	}

	function getReservationByClientID($clientID){
		$sql = "select * from reservation where clientID=" . $clientID;
		
		$query = $this->connection->query($sql);
	
		return $query;
	}

	function getReservationByPromotionID($promotionID){
		$sql = "select * from reservation where promotionID=" . $promotionID;
		
		$query = $this->connection->query($sql);
	
		return $query;
	}
	
	function getNumberOfRoomsReservedWithinAPeriodOfTimePerType($checkIn, $checkOut){
		$result = array();
		
		$sql = "select id from roomtype";
		
		$roomTypes = $this->connection->query($sql);
		
		if ($roomTypes->num_rows > 0) {
			while($row = $roomTypes->fetch_assoc()) {
				$sql = "select count(*) as roomsreserved from roomreservation, reservation 
							where roomreservation.roomtype=" . $row["id"] . " 
							and roomreservation.reservation=reservation.id 
							and reservation.checkIn<=STR_TO_DATE('" . $checkOut . "', '%Y-%m-%d') 
							and reservation.checkOut>=STR_TO_DATE('" . $checkIn . "', '%Y-%m-%d') 					
						";
				
				$roomsReservedQuery = $this->connection->query($sql);
				$roomsreserved = $roomsReservedQuery->fetch_assoc();
				
				array_push($result, new RoomTypeNum($row["id"],  $roomsreserved["roomsreserved"]));				
			}
		}
		
		return $result;
	}

	function pay($reservation){		
		$sql = "update reservation set paid=1 where id=" . $reservation;		
		$this->connection->query($sql);		
	}
	
	
}
?>
