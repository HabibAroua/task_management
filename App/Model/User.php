<?php

	class User
	{
		private $id;
		private $first_name;
		private $last_name;
		private $email;
		private $login;
		private $photo;
		private $password;
		private $cin;
		private $role;
		
		//id
		public function getId()
		{
			return $this->id;
		}
		
		public function setId($id)
		{
			$this->id = addslashes($id);
		}
	
		//first_name
		public function getFirst_name()
		{
			return $this->first_name;
		}
		
		public function setFirst_name($first_name)
		{
			$this->first_name = addslashes($first_name);
		}
		
		//last_name
		public function getLast_name()
		{
			return $this->last_name;
		}
		
		public function setLast_name($last_name)
		{
			$this->last_name = addslashes($last_name);
		}
		
		//email
		public function getEmail()
		{
			return $this->email;
		}
		
		public function setEmail($email)
		{
			$this->email = addslashes($email);
		}
		
		//login
		public function getLogin()
		{
			return $this->login;
		}
		
		public function setLogin($login)
		{
			$this->login = addslashes($login);
		}
		
		//photo
		public function getPhoto()
		{
			return $this->photo;
		}
		
		public function setPhoto($photo)
		{
			$this->photo = addslashes($photo);
		}
		
		//password
		public function setPassword($password)
		{
			$this->password = md5($password);
		}
		
		public function getPassword()
		{
			return $this->password;
		}
		
		//cin
		public function getCin()
		{
			return $this->cin;
		}
		
		public function setCin($cin)
		{
			$this->cin = addslashes($cin);
		}
		//role
		public function getRole()
		{
			return $this->role;
		}
		
		public function setRole($role)
		{
			$this->role = addslashes($role);
		}
		
		//add
		public function add()
		{
			try
			{
				global $connection;
				$req = $connection->con->exec
						(
							"INSERT INTO `The_user`
							(
								`first_name`,
								`last_name`,
								`email`,
								`login`,
								`photo`,
								`password`,
								`cin`,
								`role`
							)
							VALUES
							(
								'$this->first_name',
								'$this->last_name',
								'$this->email',
								'$this->login',
								'$this->photo',
								'$this->password',
								'$this->cin',
								'$this->role'
							)"
						);
				if($req != 0)
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			catch(Exception $e)
			{
				echo "Error : ".$e;
				return false;
			}
		}
		
		//update
		public function update()
		{
			try
			{
				global $connection;
				$req=$connection->con->exec
							(
								"UPDATE `The_user`SET
								`first_name`='$this->first_name',
								`last_name`='$this->last_name',
								`email`='$this->email',
								`login`='$this->login',
								`cin`='$this->cin'
								WHERE id = $this->id"
							 );
				if($req != 0 )
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			catch(Exception $e)
			{
				echo "Error : ".$e;
				return false;
			}
		}
		
		//delete
		public function delete()
		{
			try
			{
				global $connection;
				$req = $connection->con->exec
						(
							"DELETE FROM The_user where id=".$this->id.";"
						);
				if($req != 0)
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			catch(Exception $e)
			{
				echo "Error : ".$e;
				return false;
			}
		}
		
		//getAll
		public function getAll()
		{
			try
			{
				global $connection;
                $T = array();
                $res = $connection->con->query("SELECT * from The_user");
                $i = 0;
                while($tab=$res->fetch(PDO::FETCH_NUM))
                {
                    $T[$i] = $Array = array
                    (
                        'id'=> $tab[0],
                        'first_name' => $tab[1],
                        'last_name' => $tab[2],
                        'email'=> $tab[3],
                        'login'=> $tab[4],
                        'photo' => $tab[5],
						'password' => $tab[6],
						'cin' => $tab[7],
						'role' => $tab[8]
                    );
                    $i++;
                }
                return $T;
			}
			catch(Exception $e)
			{
				echo "Error : ".$e;
				return null;
			}
		}
		
		//findById
		public function findById($id)
		{
			try
			{
				
			}
			catch(Exception $e)
			{
				
			}
		}
		
		//findByLogin
		public function findByLogin($login)
		{
			try
			{
				
			}
			catch(Exception $e)
			{
				
			}
		}
		
		//findByEmail
		public function findByEmail($email)
		{
			try
			{
				
			}
			catch(Exception $e)
			{
				
			}
		}
		
		//toString()
		public function toString()
		{
			$tab = array();
			if($this->role == 1)
			{
				$tab = 	array
						(
							[
								'id' => $this->id ,
								'first_name' => $this->first_name,
								'last_name' => $this->last_name,
								'email' => $this->email,
								'login' => $this->login,
								'photo' => $this->photo,
								'password' => $this->password,
								'cin' => $this->cin,
								'role' => 'Super Admin'
							]
						);
			}
			else
			{
				if($this->role == 2)
				{
					$tab = array
						(
							[
								'id' => $this->id ,
								'first_name' => $this->first_name,
								'last_name' => $this->last_name,
								'email' => $this->email,
								'login' => $this->login,
								'photo' => $this->photo,
								'password' => $this->password,
								'cin' => $this->cin,
								'role' => 'Admin'
							]
						);
				}
				else
				{
					if($this->role == 3)
					{
						$tab = array
						(
							[
								'id' => $this->id ,
								'first_name' => $this->first_name,
								'last_name' => $this->last_name,
								'email' => $this->email,
								'login' => $this->login,
								'photo' => $this->photo,
								'password' => $this->password,
								'cin' => $this->cin,
								'role' => 'Personal'
							]
						);
					}
				}
			}
			return json_encode($tab);
		}
	}
?>