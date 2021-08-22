<?php
	require_once('../../../Connection/Connection.php');
	require_once('../../../Model/User.php');
	if(isset($_GET['id']))
	{
		$user = new User();
		echo json_encode($user->findById($_GET['id']));
	}
	else
	{
		echo json_encode(array());
	}
?>