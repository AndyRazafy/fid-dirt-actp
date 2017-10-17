<?php
	require_once("Base_Model.php");

	class Prestataire_Model extends Base_Model
	{
		function __construct()
		{
			parent::__construct();
		}

		public function save($prestataire)
		{
			try
			{
				$data = array(
					"nom" => $prestataire->getNom()
				);
				
				if($this->db->insert('prestataire', $data))
				{
					return true;
				}
				else
				{
					throw new Exception("Echec de la creation.");
				}
			}
			catch(Exception $e)
			{
				throw $e;
			}
		}

		public function update($prestataire)
		{
			try
			{
				$data = array(
					"nom" => $prestataire->getNom()
				);

				$this->db->where(array('id' => $prestataire->getId()));
				if($this->db->update('prestataire', $data))
				{
					return true;
				}
				else
				{
					throw new Exception("Echec de la modification.");
				}
			}
			catch(Exception $e)
			{
				throw $e;
			}
		}

		public function delete($prestataire)
		{
			try
			{
				$this->db->where(array('id' => $prestataire->getId()));
				if($this->db->delete('prestataire'))
				{
					return true;
				}
				else
				{
					throw new Exception("Impossible de supprimer ce prestataire.");
				}
			}
			catch(Exception $e)
			{
				throw $e;
			}
		}

		public function findById($id)
		{
			$query = $this->db->get_where('prestataire', array('id' => $id));
			$result = $query->result();

			$this->load->library('Prestataire');
			$array = Prestataire::init($result);

			return $array[0];
		}

		public function findAll()
		{
			$this->db->select("*");
			$this->db->from("prestataire");
			$query = $this->db->get();        
			$result = $query->result();

			$this->load->library('Prestataire');
			$array = Prestataire::init($result);

			return $array;
		}

		public function find($columns, $conditions, $joins, $orderBy, $tableName)
		{
			try
			{
				$sql = "SELECT ";
			
				$len = sizeof($columns);

				$sql .= $columns[0];
				for($i = 1;$i < $len;$i++)
				{
					$sql .= ",";
					$sql .= $columns[$i];
				}
				
				$sql .= " FROM ".$tableName;
				$temp = sizeof($joins);
				
				if($temp != 0)
				{
					$len = sizeof($joins[0]);
					$rows = $temp;
					$j = 0;
					for($i = 0;$i < $len;$i++)
					{
						$sql .= " JOIN ";
						for($j = 0;$j < $rows;$j++)
						{
							$sql .= " ".$joins[$j][$i];
						}
					}
				}

				$sql .= " WHERE 1=1";

				$temp = sizeof($conditions);			
				if($temp != 0)
				{
					$len = sizeof($conditions[0]);
					$rows = $temp;
					$j = 0;
					
					for($i = 0;$i < $len;$i++)
					{
						$sql .= " AND ";
						for($j = 0;$j < $rows;$j++)
						{				
							$sql .= " ".$conditions[$j][$i];
						}
					}
				}

				if($orderBy != "")
				{
					$sql .= " ORDER BY ".$orderBy; 
				}

				//echo $sql;

				$query =  $this->db->query($sql);
				$result = $query->result();

				$this->load->library("Prestataire");
				$array = Prestataire::init($result);

				return $array;
			}
			catch(Exception $e)
			{
				throw $e;
			}
		}
	}