<?php
	require_once("Base_Model.php");

	class Intitule_Model extends Base_Model
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
			$query = $this->db->get_where('intitule', array('id' => $id));
			$result = $query->result();

			$this->load->library('Intitule');
			$array = Intitule::init($result);
			
			return $array[0];
		}

		public function findAll()
		{
			$this->db->select("*");
			$this->db->from("intitule");
			$query = $this->db->get();        
			$result = $query->result();

			$this->load->library('Intitule');
			$array = Intitule::init($result);
			
			return $array;
		}

		public function find()
		{
		}
	}