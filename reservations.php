<?php
class RoomTypeNum{
	function RoomReservation($idTypeRoom, $numRooms){
		$this->idTypeRoom = $idTypeRoom;
		$this->numRooms = $numRooms;
	}	
}

class Reservations{
	function Reservations($serverName, $userName, $password){
		$connection = new mysqli($serverName, $userName, $password);
		if($connection->connect_error){
			die("Connection failed: " . $connection->connect_error);
		}else{
			$this->connection = $conn;
			echo "Connected successfully";
		}
	}
	
	function getNumeroHabitaciones(){
		$sql = "select sum(maxCapacity) as totalRooms from roomtype";	
		$result = $this->connection->query($sql);	
		$totalRooms = mysql_fetch_assoc($result);
		
		$sql = "select count(*) as roomsReserved from roomreservation";		
		$result = $this->connection->query($sql);
		$roomsReserved = mysql_fetch_assoc($result);
		
		return $totalRooms - $roomsReserved		
	}
	
	function getNumeroHabitaciones($roomType){
		$sql = "select sum(maxCapacity) as totalRooms from roomtype where roomtype = " . $roomType;
		$result = $this->connection->query($sql);	
		$totalRooms = mysql_fetch_assoc($result);
		
		$sql = "select count(*) as roomsReserved from roomreservation where roomtype = " . $roomType;		
		$result = $this->connection->query($sql);
		$roomsReserved = mysql_fetch_assoc($result);
		
		return $totalRooms - $roomsReserved
	}
	
	function crearReserva($checkIn, $checkOut, $selectedRooms, $promotion, $client){
		$sql = "insert into  reservation (checkIn, checkOut, promotionID, clientID) values ('" . $checkIn . "', '" . $checkOut . "', '" . $promotion . "', '" . $client . "')";
		
		if ($this->connection->query($sql) === FALSE) {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
		$id = $this->connection->insert_id;
		
		for($i = 0; $i < count($selectedRooms); $i++){
			for($j = 0; $j < $selectedRooms[$i]->numRooms; $j++){
				$sql = "insert into  roomreservation (reservation, roomtype) values ('" . $id . "', '" . $selectedRooms[$i]->idTypeRoom . "')";				
				
				if ($this->connection->query($sql) === FALSE) {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
		}		
	}
	
	function consultarDisponibilidad($checkIn, $checkOut){
		$resultado = array();
		
		$sql = "select id from roomtype";
		
		$result = $this->connection->query($sql);
		
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				
				$sql = "select count(*) from roomreservation where ";
				
				array_push($resultado, new RoomTypeNum($row["id"], ));
			}
		}
		
		
		
		
		return $resultado;
	}
	
	
}