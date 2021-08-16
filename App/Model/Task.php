<?php
	class Task
	{
		private $id;
		private $title;
		private $description;
		private $end_date;
		private $status;
		private $the_user_id;
		private $project_id;
		
		//id;
		public function getID()
		{
			return $this->id;
		}
		
		public function setId($id)
		{
			$this->id = addslashes($id);
		}
		
		//title;
		public function getTitle()
		{
			return $this->title;
		}
		
		public function setTitle($title)
		{
			$this->title = addslashes($title);
		}
		
		//description;
		public function getDescription()
		{
			return $this->description;
		}
		
		public function setDescription($description)
		{
			$this->description = addslashes($description);
		}
		
		//end_date;
		public function getEnd_date()
		{
			return $this->end_date;
		}
		
		public function setEnd_date($end_date)
		{
			$this->end_date = addslashes($end_date);
		}
		
		//status;
		public function getStatus()
		{
			return $this->status;
		}
		
		public function setStatus($status)
		{
			$this->status = addslashes($status);
		}
		
		//the_user_id;
		public function getThe_user_id()
		{
			return $this->the_user_id;
		}
		
		public function setThe_user_id($the_user_id)
		{
			$this->the_user_id = addslashes($the_user_id);
		}
		
		//project_id;
		public function getProject_id()
		{
			return $this->project_id;
		}
		
		public function setProject_id($project_id)
		{
			$this->project_id = addslashes($project_id);
		}
		
		//add
		public function add()
		{
			try
			{
				global $connection;
				$req = $connection->con->exec
						(
							"INSERT INTO `Task`
							(
								`title`,
								`description`,
								`end_date`,
								`status`,
								`the_user_id`,
								`project_id`
							)
							VALUES
							(
								'$this->title',
								'$this->description',
								'$this->end_date',
								'$this->status',
								'$this->the_user_id',
								'$this->project_id'
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
								"UPDATE `Task`SET
								`title` = '$this->title',
								`description` = '$this->description',
								`end_date` = '$this->end_date',
								`status` = '$this->status',
								`the_user_id` = '$this->the_user_id',
								`project_id` = '$this->project_id'
								where id = $this->id"
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
							"DELETE FROM Task where id=".$this->id.";"
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
                $res = $connection->con->query("SELECT * from Task");
                $i = 0;
                while($tab=$res->fetch(PDO::FETCH_NUM))
                {
                    $T[$i] = $Array = array
                    (
                        'id'=> $tab[0],
                        'title' => $tab[1],
                        'description' => $tab[2],
                        'end_date'=> $tab[3],
                        'status'=> $tab[4],
						'the_user_id' => $tab[5],
                        'project_id' => $tab[6]
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
		
		//toString()
		public function toString()
		{
			return 	json_encode
					(
						array
						(
							'id' => $this->id,
							'title' => $this->title,
							'description' => $this->description,
							'end_date' => $this->end_date,
							'status' => $this->status
						)
					);
		}
	}
?>