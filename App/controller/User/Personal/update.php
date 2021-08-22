<?php
	require_once('../../../Connection/Connection.php');
	require_once('../../../Model/User.php');
	
	if((isset($_POST['first_name'])) AND (isset($_POST['last_name'])) AND (isset($_POST['email'])) AND
		(isset($_POST['login']))   AND
		(isset($_POST['cin'])) AND (isset($_POST['id'])) )
	{
		if((!empty($_POST['first_name'])) AND (!empty($_POST['last_name'])) AND (!empty($_POST['email'])) AND
			(!empty($_POST['login']))  AND
			(!empty($_POST['cin']))  AND (!empty($_POST['id'])) )
		{
			$user = new User();
			$user->setId($_POST['id']);
			$user->setFirst_name($_POST['first_name']);
			$user->setLast_name($_POST['last_name']);
			$user->setEmail($_POST['email']);
			$user->setLogin($_POST['login']);
			$user->setCin($_POST['cin']);
			if($user->update())
			{
				echo json_encode
							(
								array
								(
									"response" => "The updating of this project has been successful",
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
									"response" => "There is an error of updating",
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
									"response" => "There is one or many empty paramater",
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
									"response" => "There are 6 parameter",
									"code" => 0
								)
							);
	}
?>