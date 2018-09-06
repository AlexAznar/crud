<?php

class UserModel { 

	public function getUsers(){
		$connection = $this->dbConnection();

		$sql = $connection->query("SELECT * FROM login ORDER BY id DESC");

		$users = array();

		while ($row = $sql->fetch()) {
		    $user = new User();
		    $user->usuario = $row['usuario'];
		    $user->email = $row['correo'];
		    array_push($users, $user);
		}

		return $users;
	}

	public function dbConnection(){

		try {
			return new PDO('mysql:host=localhost;dbname=gervillaesphoto','root','gervillaes');
		} catch (PDOException $exception) {
			echo "Error! ". $exception->getMessage(). "<br/>";
			die();
		}

	}
}

?>
