<?php

require_once dirname(__FILE__).'/view/ListView.php';
require_once dirname(__FILE__).'/entity/User.php';
require_once dirname(__FILE__).'/model/UserModel.php';


if(empty($_GET['action'])){
	$action = 'list';
} else {
	$action = $_GET['action'];
}

switch($action){

	case 'list':
		listView(false);
		break;

	case 'editview':
		$userModel = new UserModel();
		$user = $userModel->getUser($_GET['id']);
		$listView = new ListView();
		echo $listView->editOutput($user);
		break;

	case 'editaction':
		$user = new User();
		$user->id = $_POST['id'];
		$user->usuario = $_POST['usuario'];
		$user->email = $_POST['email'];

		$userModel = new UserModel();
		$userModel->editUser($user);
		$message = $_POST['usuario'].' has been updated!';

		listView(true, $message);
		break;

	case 'delete':
		$userModel = new UserModel();
		$userModel->deleteUser($_GET['id']);
		$message = 'The user has been removed!';

		listView(true, $message);
		break;
} 

function listView($success = false, $message = null){
	$userModel = new UserModel();
	$users = $userModel->getUsers();
	$listView = new ListView();
	echo $listView->listOutput($users, $success, $message);
}


?>