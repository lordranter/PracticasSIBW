<?php
class Users{
	function Users(){			
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

	function getUser($name, $pass, $address, $email, $idCard, $phone){
		$sql = "select * from usuarios where name='" . $name . "' and password='" . $pass . "'";
		
		$query = $this->connection->query($sql);
	
		return $query;
	}
	
	
}
?>
