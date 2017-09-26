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

		public function update()
		{
		}

		public function delete()
		{
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

		public function find($columns, $conditions, $link, $joins, $orderBy, $tableName)
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
					$sql .= " ".$link." ";
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