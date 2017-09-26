<?php
	require_once("Base_Model.php");

	class Dir_Model extends Base_Model
	{
		function __construct()
		{
			parent::__construct();
		}

		public function save()
		{
			
		}

		public function update()
		{
		}

		public function delete()
		{
		}

		public function findById($id)
		{
			$query = $this->db->get_where('dir', array('id' => $id));
			$result = $query->result();

			$this->load->library('Dir');
			$array = Dir::init($result);
			
			return $array[0];
		}

		public function findAll()
		{
			$this->db->select("*");
			$this->db->from("dir");
			$query = $this->db->get();        
			$result = $query->result();

			$this->load->library('Dir');
			$array = Dir::init($result);
			
			return $array;
		}

		public function find()
		{
		}
	}