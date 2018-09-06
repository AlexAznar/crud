<?php

require_once dirname(__FILE__).'/view/ListView.php';
require_once dirname(__FILE__).'/entity/User.php';
require_once dirname(__FILE__).'/model/UserModel.php';

if(!$_GET['action']){
	$action = 'list';
} else{
	$action = $_GET['action'];
}

if(!$_POST['action']){
	$action = 'list';
} else {
	$action = $_POST['action'];
}

switch($action){

	case 'list':
		$userModel = new UserModel();
		$users = $userModel->getUsers();
		$listView = new ListView();
		echo $listView->listOutput($users);
		break;

	case 'editview':
		$userModel = new UserModel();
		$user = $userModel->getUser($_POST['id']);
		$listView = new ListView();
		echo $listView->listOutput($user);
		break;

	case 'editaction':
		$user = new User();
		$user->id = "";
		$user->usuario = "";
		$user->email = "";

		$userModel = new UserModel();
		$users = $userModel->editUser($user);
		$listView = new ListView();
		echo $listView->listOutput($users);
		break;
} 


?>