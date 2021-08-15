<?php
	require_once('../../../Connection/Connection.php');
	require_once('../../../Model/User.php');
	
	if(isset($_POST['id']))
	{
		if(!empty($_POST['id']))
		{
			$user = new User();
			$user->setId($_POST['id']);
			if($user->delete())
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
			echo "Error : The parameter is empty";
		}
	}
	else
	{
		echo "Error : There is one parameter";
	}
?>