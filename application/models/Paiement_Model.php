<?php
	require_once("Base_Model.php");

	class Paiement_Model extends Base_Model
	{
		function __construct()
		{
			parent::__construct();
		}

		public function save($paiement)
		{
			try
			{
				$data = array(
					"dateprevue" => $paiement->getDatePrevue(),
					"datereelle" => $paiement->getDateReelle(),
					"rang" => $paiement->getRang(),
					"intervention_id" => $paiement->getIntervention()->getId()
				);

				$this->db->insert('paiement', $data);
			}
			catch(Exception $e)
			{
				throw $e;
			}
		}

		public function update($paiement)
		{
			try
			{
				$data = array(
					"dateprevue" => $paiement->getDatePrevue(),
					"datereelle" => $paiement->getDateReelle(),
					"rang" => $paiement->getRang(),
					"intervention_id" => $paiement->getIntervention()->getId()
				);

				$this->db->where(array('id' => $paiement->getId()));
				$this->db->update('paiement', $data);
			}
			catch(Exception $e)
			{
				throw $e;
			}
		}

		public function delete($paiement)
		{
			try
			{
				$this->db->where(array('id' => $paiement->getId()));
				$this->db->delete('paiement');
			}
			catch(Exception $e)
			{
				throw $e;
			}
		}

		public function findById($id)
		{
			try
			{
				$query = $this->db->get_where('paiement', array('id' => $id));
				$result = $query->result();

				$this->load->library("Paiement");
				$array = Paiement::init($result);

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
				$this->db->from("paiement");
				$query = $this->db->get();        
				$result = $query->result();

				$this->load->library("Paiement");
				$array = Paiement::init($result);

				return $array;
			}
			catch(Exception $e)
			{
				throw $e;
			}
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

				$this->load->library("Paiement");
				$array = Paiement::init($result);

				return $array;
			}
			catch(Exception $e)
			{
				throw $e;
			}
		}
	}