<?php
	require_once("Base_Model.php");

	class Phase_Model extends Base_Model
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
			$query = $this->db->get_where('phase', array('id' => $id));
			$result = $query->result();

			$this->load->library("Phase");
			$array = Phase::init($result);

			return $array[0];
		}

		public function findAll()
		{
			$this->db->select("*");
			$this->db->from("phase");
			$query = $this->db->get();        
			$result = $query->result();

			$this->load->library("Phase");
			$array = Phase::init($result);

			return $array;
		}
	}