<?php
	require_once('../../Connection/Connection.php');
	require_once('../../Model/User.php');
	
	if((isset($_POST['login'])) AND (isset($_POST['password'])))
	{
		$user = new User();
		session_start();
		if(($user->findByEmail($_POST['login']) != null) OR
			($user->findByLogin($_POST['login']) != null))
		{
			if($user->findByEmail($_POST['login']) != null)
			{
				$_SESSION['user'] = json_encode($user->findByEmail($_POST['login']));
				$user = json_decode($_SESSION['user']);
				if(md5($_POST['password']) == $user->password )
				{
					if($user->role == 3)
					{
						echo json_encode
							(
								array
								(
									"response" => "You are not an admin",
									"code" => 0
								)
							);
					}
					else
					{
						echo json_encode
						(
							array
							(
								"response" => "Good",
								"code" => 1
							)
						);	
					}
				}
				else
				{
					session_unset ();
					session_destroy ();
					echo json_encode
						(
							array
							(
								"response" => "Please verif your password",
								"code" => 0
							)
						);
					//echo "Please verif your password";
				}
			}
			else
			{
				if($user->findByLogin($_POST['login']) != null)
				{
					$_SESSION['user'] = json_encode($user->findByLogin($_POST['login']));
					$user = json_decode($_SESSION['user']);
					if(md5($_POST['password']) == $user->password )
					{
						if($user->role == 3)
						{
							echo json_encode
							(
								array
								(
									"response" => "You are not an admin",
									"code" => 0
								)
							);
						}
						else
						{
							echo json_encode
							(
								array
								(
									"response" => "Good",
									"code" => 1
								)
							);	
						}
					}
					else
					{
						session_unset ();
						session_destroy ();
						echo json_encode
						(
							array
							(
								"response" => "Please verif your password",
								"code" => 0
							)
						);
						//echo "Please verif your password";
					}
				}
				else
				{
					echo json_encode
						(
							array
							(
								"response" => "This user is not found",
								"code" => 0
							)
						);
				}
			}
		}
		else
		{
			echo json_encode
						(
							array
							(
								"response" => "This user is not found",
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
								"response" => "There are 2 parameter",
								"code" => 0
							)
						);
		//echo "There are 2 parameter";
	}
	//echo json_encode($user->findById(1));
	//echo json_encode($user->findByEmail('habib.aroua@hotmail.fr'));
	//echo json_encode($user->findByLogin('HabibAroua'));
?>