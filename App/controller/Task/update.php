<?php
	require_once('../../Connection/Connection.php');
	require_once('../../Model/Task.php');
	
	if((isset($_POST['title'])) AND (isset($_POST['description'])) AND (isset($_POST['end_date'])) AND
	   (isset($_POST['status'])) AND (isset($_POST['the_user_id'])) AND(isset($_POST['project_id']))
		AND (isset($_POST['id'])))
	{
		if((!empty($_POST['title'])) AND (!empty($_POST['description'])) AND (!empty($_POST['end_date'])) AND
			(!empty($_POST['status'])) AND (!empty($_POST['the_user_id'])) AND(!empty($_POST['project_id']))
			 AND (isset($_POST['id'])))
		{
			$task = new Task();
			$task->setTitle($_POST['title']);
			$task->setDescription($_POST['description']);
			$task->setEnd_date($_POST['end_date']);
			$task->setStatus($_POST['status']);
			$task->setThe_user_id($_POST['the_user_id']);
			$task->setProject_id($_POST['project_id']);
			if($task->update())
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
			echo "Error : There one or many empty paramater";
		}
	}
	else
	{
		echo "Error : There are 7 parameter";
	}
?>