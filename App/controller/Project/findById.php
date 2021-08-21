<?php
	require_once('../../Connection/Connection.php');
	require_once('../../Model/Project.php');
	if(isset($_GET['id']))
	{
		$project = new Project();
		echo json_encode($project->findById($_GET['id']));
	}
	else
	{
		return json_encode(array());
	}
?>