<?php
	require_once('../../Connection/Connection.php');
	require_once('../../Model/Project.php');
	$project = new Project();
	echo json_encode($project->getAll()); //json_encode converte un tableau associative vers format json
?>