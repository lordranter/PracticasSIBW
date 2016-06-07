<?php
class UserController{
	function UserController(){
		include 'users.php';
		$this->users = new users();
	}
	function getUser($name, $pass){
		return $this->users->getUser($name, $pass);
	}
}
?>
