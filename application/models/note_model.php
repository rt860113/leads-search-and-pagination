<?php
	/**
	*  model
	*/
	class Note_model extends CI_model
	{
		
		public function add_note($value)
		{
			$query="INSERT INTO posts (description,created_at) VALUES (?,?)";
			$array=array($value,date('Y-m-d,H:i:s'));
			$this->db->query($query,$array);
		}
		public function display_note()
		{
			$query="SELECT description FROM posts";
			return $this->db->query($query)->result_array();
		}
	}
?>