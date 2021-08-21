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
				echo json_encode
							(
								array
								(
									"response" => "The deleting of this project has been successful",
									"code" => 1
								)
							);
			}
			else
			{
				echo json_encode
							(
								array
								(
									"response" => "There is an error of deleting",
									"code" => 0
								)
							);
			}
		}
		else
		{
			echo json_encode
							(
								array
								(
									"response" => "The parameter is empty",
									"code" => 0
								)
							);
		}
	}
	else
	{
		echo json_encode
							(
								array
								(
									"response" => "You should enter a parameter",
									"code" => 0
								)
							);
	}
?>