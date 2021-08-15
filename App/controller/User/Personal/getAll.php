<?php
	require_once('../../../Connection/Connection.php');
	require_once('../../../Model/User.php');
	
	$user = new User();
	echo json_encode($user->getAll());
?>