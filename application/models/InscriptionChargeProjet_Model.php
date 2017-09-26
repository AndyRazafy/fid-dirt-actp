<?php
	require_once("Base_Model.php");

	class InscriptionChargeProjet_Model extends Base_Model
	{
		function __construct()
		{
			parent::__construct();
		}

		public function save($inscription)
		{
			
			try
			{
				$data = array(
					"nom" => $inscription->getNom(),
					"prenom" => $inscription->getPrenom(),
					"datenaissance" => $inscription->getDateNaissance(),
					"pseudo" => $inscription->getPseudo(),
					"email" => $inscription->getEmail(),
					"motpasse" => $inscription->getMotPasse(),
					"token" => $inscription->getToken(),
					"denregistrement" => $inscription->getDateEnregistrement()
				);

				$this->db->insert('inscriptionchargeprojet', $data);
			}
			catch(Exception $e)
			{
				throw $e;
			}
		}

		public function update()
		{
		}

		public function delete($inscription)
		{
			try
			{
				$this->db->where(array('id' => $inscription->getId()));
				$this->db->delete('inscriptionchargeprojet');
			}
			catch(Exception $e)
			{
				throw $e;
			}
		}

		public function findById($id)
		{
			$query = $this->db->get_where('inscriptionchargeprojet', array('id' => $id));
			$result = $query->result();
			
			$this->load->library("InscriptionChargeProjet");
			$array = InscriptionChargeProjet::init($result);

			return $array[0];
		}

		public function findAll()
		{
			$this->db->select("*");
			$this->db->from("inscriptionchargeprojet");
			$query = $this->db->get();        
			$result = $query->result();

			$this->load->library("InscriptionChargeProjet");
			$array = InscriptionChargeProjet::init($result);

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

			$this->load->library('InscriptionChargeProjet');

			$array = InscriptionChargeProjet::init($result);

			return $array;
		}
	}