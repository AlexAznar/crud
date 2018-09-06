<?php

class UserModel { 

	public function getUsers(){
		$connection = $this->dbConnection();

		$sql = $connection->query("SELECT * FROM login ORDER BY id DESC");

		$users = array();

		while ($row = $sql->fetch()) {
		    $user = new User();
		    $user->id = $row['id'];
		    $user->usuario = $row['usuario'];
		    $user->email = $row['correo'];
		    array_push($users, $user);
		}

		return $users;
	}

	public function getUser($id){
		$connection = $this->dbConnection();
		$sql = $connection->query("SELECT * FROM login WHERE id = ".$id);

		while ($row = $sql->fetch()) {
		    $user = new User();
		    $user->id = $row['id'];
		    $user->usuario = $row['usuario'];
		    $user->email = $row['correo'];
		}

		return $user;
	}

	public function editUser($user){
		$connection = $this->dbConnection();
		$sql = "UPDATE login SET usuario=?, correo=? WHERE id=?";
		$connection->prepare($sql)->execute([$user->usuario, $user->email, $user->id]);
	}


	public function deleteUser($id){
		$connection = $this->dbConnection();
		$sql = "DELETE FROM login WHERE id=?";
		$connection->prepare($sql)->execute([$id]);
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
