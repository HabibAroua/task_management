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
		
		//toString()
		public function toString()
		{
			$tab = array();
			if($this->role == 1)
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