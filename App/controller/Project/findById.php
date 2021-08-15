<?php
	require_once('../../Connection/Connection.php');
	require_once('../../Model/Project.php');
	$project = new Project();
	echo json_encode($project->findById(1));
?>