<?php
	require_once('../../Connection/Connection.php');
	require_once('../../Model/Task.php');
	$task = new Task();
	echo json_encode($task->getAll());
?>