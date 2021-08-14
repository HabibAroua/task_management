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