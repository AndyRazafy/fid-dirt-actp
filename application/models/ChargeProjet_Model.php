<?php
	require_once("Base_Model.php");

	class ChargeProjet_Model extends Base_Model
	{
		function __construct()
		{
			parent::__construct();
		}

		public function save($chargeProjet)
		{
			
			$data = array(
				"nom" => $chargeProjet->getNom(),
				"prenom" => $chargeProjet->getPrenom(),
				"pseudo" => $chargeProjet->getPseudo(),
				"datenaissance" => $chargeProjet->getDateNaissance(),
				"email" => $chargeProjet->getEmail(),
				"motpasse" => $chargeProjet->getMotPasse()
			);

			$this->db->insert('chargeprojet', $data);
		}

		public function update($chargeProjet)
		{
			try
			{
				$data = array(
					"nom" => $chargeProjet->getNom(),
					"prenom" => $chargeProjet->getPrenom(),
					"email" => $chargeProjet->getEmail(),
					"datenaissance" => $chargeProjet->getDateNaissance(),
					"pseudo" => $chargeProjet->getPseudo()
				);

				$this->db->where(array('id' => $chargeProjet->getId()));
				if($this->db->update('chargeprojet', $data))
				{
					return true;
				}
				else
				{
					throw new Exception("Modification interrompu.");
				}
			}
			catch(Exception $e)
			{
				throw $e;
			}
		}

		public function delete($chargeProjet)
		{
			try
			{
				$this->db->where(array('id' => $chargeProjet->getId()));
				if($this->db->delete('chargeprojet'))
				{
					return true;
				}
				else
				{
					throw new Exception("Impossible de supprimer ce charge de projet.");
				}
			}
			catch(Exception $e)
			{
				throw $e;
			}
		}

		public function findById($id)
		{
			$query = $this->db->get_where('chargeprojet', array('id' => $id));
			$result = $query->result();
			
			$this->load->library("ChargeProjet");
			$array = ChargeProjet::init($result);

			return $array[0];
		}

		public function findAll()
		{
			$this->db->select("*");
			$this->db->from("chargeprojet");
			$query = $this->db->get();        
			$result = $query->result();

			$this->load->library("ChargeProjet");
			$array = ChargeProjet::init($result);

			return $array;
		}

		public function find($columns, $conditions, $joins, $orderBy, $tableName)
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
					for($j = 0;$j < $row;$j++)
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

			$this->load->library('ChargeProjet');

			$array = ChargeProjet::init($result);

			return $array;
		}
	}