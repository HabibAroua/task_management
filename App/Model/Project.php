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
			$this->id = $id;
		}
		
		//project_name
		public function getProject_name()
		{
			return $this->project_name;
		}
		
		public function setProject_name($project_name)
		{
			$this->project_name = $project_name;
		}
		
		//description
		public function getDescription()
		{
			return $this->description;
		}
		
		public function setDescription($description)
		{
			$this->description = $description;
		}
		
		//start_date
		public function getStart_date()
		{
			return $this->start_date;
		}
		
		public function setStart_date($start_date)
		{
			$this->start_date = $start_date;
		}
		
		//end_date
		public function getEnd_date()
		{
			return $this->end_date;
		}
		
		public function setEnd_date($end_date)
		{
			$this->end_date = $end_date;
		}
		
		//price
		public function getPrice()
		{
			return $this->price;
		}
		
		public function setPrice($price)
		{
			$this->price = $price;
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