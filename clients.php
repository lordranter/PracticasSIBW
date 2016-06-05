<?php
class Clients{
	function Clients(){			
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
	
	
	function createClient($name, $surname, $address, $email, $idCard, $phone){
		$sql = "insert into client (name, surname, address, email, idCard, phone) values ('" . $name . "', '" . $surname . "', '" . $address . "', '" . $email . "', '" . $idCard . "', '" . $phone . "')";
		
		if ($this->connection->query($sql) === FALSE) {
			echo "Error: " . $sql . "<br>" . $this->connection->error;
		}
		
		return $this->connection->insert_id;
	}
	
	
	function deleteClient($client){
		$sql = "delete from client where id=" . $client;
		
		if ($this->connection->query($sql) === FALSE) {
			echo "Error: " . $sql . "<br>" . $this->connection->error;
		}
	}
	
	
	function updateClient($client, $name, $surname, $address, $email, $idCard, $phone){
		$sql = "update client set name='" . $name . "', surname='" . $surname . "', address='" . $address . "', email='" . $email . "', idCard='" . $idCard . "', phone='" . $phone . "' where id='" . $client . "'";
		
		if ($this->connection->query($sql) === FALSE) {
			echo "Error: " . $sql . "<br>" . $this->connection->error;
		}
	}
	
	function getClientByID($reservation){
		$sql = "select * from client where id=" . $reservation;
		
		$query = $this->connection->query($sql);
	
		return $query->fetch_assoc();
	}

	function getClientByMatchingPattern($pattern){
		$sql = "select * from client where name like '%" . $pattern . "%' or surname like '%" . $pattern . "%' or address like '%" . $pattern . "%' or email like '%" . $pattern . "%' or idCard like '%" . $pattern . "%' or phone like '%" . $pattern . "%'";
		
		$query = $this->connection->query($sql);
	
		return $query;
	}

	function getClientByExactMatch($name, $surname, $address, $email, $idCard, $phone){
		$sql = "select * from client where name='" . $name . "' and surname='" . $surname . "' and address='" . $address . "' and email='" . $email . "' and idCard='" . $idCard . "' and phone='" . $phone . "'";
		
		$query = $this->connection->query($sql);
	
		return $query;
	}
	
	
}
?>
