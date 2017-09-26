<?php
	require_once("Base_Model.php");

	class Unite_Model extends Base_Model
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
			try
			{
				$query = $this->db->get_where('unite', array('id' => $id));
				$result = $query->result();

				$this->load->library('Unite');
				$array = Unite::init($result);
				
				return $array[0];
			}
			catch(Exception $e)
			{
				throw $e;
			}
		}

		public function findAll()
		{
			try
			{
				$this->db->select("*");
				$this->db->from("unite");
				$query = $this->db->get();        
				$result = $query->result();

				$this->load->library('Unite');
				$array = Unite::init($result);
				
				return $array;
			}
			catch(Exception $e)
			{
				throw $e;
			}
		}

		public function find()
		{
		}
	}