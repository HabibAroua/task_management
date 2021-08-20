<?php

	class Project
	{
		private $id;
		private $project_name;
		private $description;
		private $start_date;
		private $end_date;
		private $price;
		
		//id
		public function getId()
		{
			return $this->id;
		}
		
		public function setId($id)
		{
			$this->id = addslashes($id);
		}
		
		//project_name
		public function getProject_name()
		{
			return $this->project_name;
		}
		
		public function setProject_name($project_name)
		{
			$this->project_name = addslashes($project_name);
		}
		
		//description
		public function getDescription()
		{
			return $this->description;
		}
		
		public function setDescription($description)
		{
			$this->description = addslashes($description);
		}
		
		//start_date
		public function getStart_date()
		{
			return $this->start_date;
		}
		
		public function setStart_date($start_date)
		{
			$this->start_date = addslashes($start_date);
		}
		
		//end_date
		public function getEnd_date()
		{
			return $this->end_date;
		}
		
		public function setEnd_date($end_date)
		{
			$this->end_date = addslashes($end_date);
		}
		
		//price
		public function getPrice()
		{
			return $this->price;
		}
		
		public function setPrice($price)
		{
			$this->price = addslashes($price);
		}
		
		//add
		public function add()
		{
			try
			{
				global $connection;
				$req = $connection->con->exec
						(
							"INSERT INTO `Project`
							(
								`project_name`,
								`description`,
								`start_date`,
								`end_date`,
								`price`
							)
							VALUES
							(
								'$this->project_name',
								'$this->description',
								'$this->start_date',
								'$this->end_date',
								'$this->price'
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
								"UPDATE `Project`SET
								`project_name`='$this->project_name',
								`description`='$this->description',
								`start_date`='$this->start_date',
								`end_date`='$this->end_date',
								`price`='$this->price'
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
							"DELETE FROM Project where id=".$this->id.";"
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
                $res = $connection->con->query("SELECT * from Project");
                $i = 0;
                while($tab=$res->fetch(PDO::FETCH_NUM))
                {
                    $T[$i] = $Array = array
                    (
                        'id'=> $tab[0],
                        'project_name' => $tab[1],
                        'description' => $tab[2],
                        'start_date'=> $tab[3],
                        'end_date'=> $tab[4],
                        'price' => $tab[5]
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
		
		//findById()
		public function findById($id)
		{
			try
			{
				global $connection;
                $T = array();
                $res = $connection->con->query("SELECT * from Project where id = $id");
				$tab = $res->fetch(PDO::FETCH_NUM);
				$this->id = $tab[0];
				$this->project_name = $tab[1];
				$this->description = $tab[2];
				$this->start_date = $tab[3];
				$this->end_date = $tab[4];
				$this->price = $tab[5];
				return array
						(
							'id' => $this->id,
							'project_name' => $this->project_name,
							'description' => $this->description,
							'start_date' => $this->start_date,
							'end_date' => $this->end_date,
							'price' => $this->price
						);
				//return $res->fetch(PDO::FETCH_NUM)[0];
			}
			catch(Exception $e)
			{
				echo "Error : ".$e;
				return null;
			}
		}
		
		//
		private function percent_calcul($total, $nb)
		{
			try
			{
				return ($nb/$total) * 100; //ken fama exception wa9tili $total = 0
			}
			catch(Exception $e)
			{
				echo "Error : ".$e;
				return -1;
			}
		}
		
		//toString()
		public function toString()
		{
			return 	json_encode
					(
						array
						(
							[
								'id' => $this->id,
								'project_name' => $this->project_name ,
								'description' => $this->description,
								'start_date' => $this->start_date,
								'end_date' => $this->end_date,
								'price' => $this->price
							]
						)
					);
		}
		
	}
?>