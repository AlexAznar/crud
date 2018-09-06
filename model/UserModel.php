<?php

class UserModel { 

	public function getUsers(){
		$connection = dbConnection()

		$sql = $connection->query("SELECT * FROM login ORDER BY id DESC");

		$users = array();

		while ($row = $stmt->fetch()) {
		    $user = new User();
		    $user->usuario = $row['usuario'];
		    $user->email = $row['email'];
		    array_push($users, $user);
		}

		return $users;
	}

	public function dbConnection(){

		try {
			$connection = new PDO('mysql:host=localhost;dbname=gervillaesphoto','root','root');
		} catch (PDOException $exception) {
			echo "Error! ". $exception->getMessage(). "<br/>";
			die();
		}

	}
}

?>