<?php
	require_once('../../Connection/Connection.php');
	require_once('../../Model/Task.php');
	if(isset($_POST['id']))
	{
		if(!empty($_POST['id']))
		{
			$task = new Task();
			$task->setId($_POST['id']);
			if($task->delete())
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
		echo "Error : There is one paramter";
	}
?>