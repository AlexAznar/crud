<?php

require_once dirname(__FILE__).'/view/ListView.php';
require_once dirname(__FILE__).'/entity/User.php';
require_once dirname(__FILE__).'/model/UserModel.php';

switch($_POST['action']){

	case 'list':
		$userModel = new UserModel();
		$users = $userModel->getUsers();
		$listView = new ListView();
		$listView->output($users);

} 


?>