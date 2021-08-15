<?php
	require_once('../../Connection/Connection.php');
	require_once('../../Model/Project.php');
	if(isset($_POST['id']))
	{
		if(!empty($_POST['id']))
		{
			$project = new Project();
			$project->setId($_POST['id']);
			if($project->delete())
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
		echo "Error : You should enter a parameter";
	}
?>