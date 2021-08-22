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
				echo json_encode
							(
								array
								(
									"response" => "The deleting of this personal has been successful",
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
									"response" => "There is one parameter",
									"code" => 0
								)
							);
	}
?>