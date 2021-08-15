<?php
	require_once('../../Connection/Connection.php');
	require_once('../../Model/Project.php');
	if((isset($_POST['project_name'])) AND (isset($_POST['description'])) AND (isset($_POST['start_date'])) AND
		(isset($_POST['end_date'])) AND (isset($_POST['end_date'])))
	{
		if((!empty($_POST['project_name'])) AND (!empty($_POST['description'])) AND (!empty($_POST['start_date'])) AND
		(!empty($_POST['end_date'])) AND (!empty($_POST['end_date'])))
		{
			$project = new Project();
			$project->setProject_name($_POST['project_name']);
			$project->setDescription($_POST['description']);
			$project->setStart_date($_POST['start_date']);
			$project->setEnd_date($_POST['end_date']);
			$project->setPrice($_POST['price']);
			if($project->add())
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
			echo " Error : There is one or many empty fields";
		}
	}
	else
	{
		echo "Error : You should enter 5 parameter";
	}
?>