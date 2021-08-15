<?php
	require_once('../../../Connection/Connection.php');
	require_once('../../../Model/User.php');
	
	if((isset($_POST['first_name'])) AND (isset($_POST['last_name'])) AND (isset($_POST['email'])) AND
		(isset($_POST['login']))  AND (isset($_POST['password'])) AND
		(isset($_POST['cin'])) AND (isset($_POST['role'])))
	{
		if((!empty($_POST['first_name'])) AND (!empty($_POST['last_name'])) AND (!empty($_POST['email'])) AND
			(!empty($_POST['login']))  AND (!empty($_POST['password'])) AND
			(!empty($_POST['cin'])) AND (!empty($_POST['role'])))
		{
			$user = new User();
			$user->setFirst_name($_POST['first_name']);
			$user->setLast_name($_POST['last_name']);
			$user->setEmail($_POST['email']);
			$user->setLogin($_POST['login']);
			$user->setPassword($_POST['password']);
			$user->setCin($_POST['cin']);
			$user->setRole($_POST['role']);
			if($user->add())
			{
				echo "Good";
			}
			else
			{
				echo "Bad";
			}
		}
		else
		{
			echo "Error : There is one or many empty paramater";
		}
	}
	else
	{
		echo "Error : There are 7 parameter";
	}
?>