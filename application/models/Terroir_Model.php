<?php
	require_once("Base_Model.php");

	class Terroir_Model extends Base_Model
	{
		function __construct()
		{
			parent::__construct();
		}

		public function save()
		{
			
		}

		public function update($terroir)
		{
			try
			{
				$data = array(
					"nom" => $terroir->getNom(),
					"dir_id" => $terroir->getDir()->getId(),
					"district_id" => $terroir->getDistrict()->getId(),
					//"nbbenef" => $terroir->getNbBenef(),
					//"nbinapte" => $terroir->getNbInapte(),
					"nbsa" => $terroir->getNbsa(),
					
					"dpengplan" => $terroir->getDpEngPlan(),
					"drengplan" => $terroir->getDrEngPlan(),
					"codemarcheplan" => $terroir->getCodemarchePlan(),
					"dpfinplan" => $terroir->getDpFinPlan(),
					"drfinplan" => $terroir->getDrFinPlan(),
					"montantreelplan" => $terroir->getMontantReelPlan(),
					"dpapprobpamo" => $terroir->getDpApprobPamo(),
					"drapprobpamo" => $terroir->getDrApprobPamo(),
					"montanttotalpamo" => $terroir->getMontantTotalPamo(),
					
					"dpengcible" => $terroir->getDpEngCible(),
					"drengcible" => $terroir->getDrEngCible(),
					"codemarchecible" => $terroir->getCodemarcheCible(),
					"dpfincible" => $terroir->getDpFinCible(),
					"drfincible" => $terroir->getDrFinCible(),
					"montantreelcible" => $terroir->getMontantReelCible(),
					"dvalidcom" => $terroir->getDValidCom(),

					"dpengagec" => $terroir->getDpEngAgec(),
					"drengagec" => $terroir->getDrEngAgec(),
					"codemarcheagec" => $terroir->getCodemarcheAgec(),
					"dpfinagec" => $terroir->getDpFinAgec(),
					"drfinagec" => $terroir->getDrFinAgec(),
					"montanttotalagec" => $terroir->getMontantTotalAgec(),
					"montanttotalconfieagec" => $terroir->getMontantTotalConfieAgec(),

					"codemarchepaie" => $terroir->getCodemarchePaie(),
					"montantreelpaie" => $terroir->getMontantReelPaie(),

					//"prevsurftraiteeces" => $terroir->getPrevSurfTraiteeCes(),
					//"realsurftraiteeces" => $terroir->getRealSurfTraiteeCes(),
					//"prevsurfreboiseefsp" => $terroir->getPrevSurfReboiseeFsp(),
					//"realsurfreboiseefsp" => $terroir->getRealSurfReboiseeFsp(),

					"libelleautreindic" => $terroir->getLibelleAutreIndic(),
					"prevautreindic" => $terroir->getPrevAutreIndic(),
					"realautreindic" => $terroir->getRealAutreIndic(),
					"observationindic" => $terroir->getObservation(),

					"prestataireplan_id" => $terroir->getPrestatairePlan()->getId(),
					"prestatairecible_id" => $terroir->getPrestataireCible()->getId(),
					"prestataireagec_id" => $terroir->getPrestataireAgec()->getId(),
					"agencepaiement_id" => $terroir->getAgencePaiement()->getId()
				);

				$this->db->where(array('id' => $terroir->getId()));
				$this->db->update('terroir', $data);
			}
			catch(Exception $e)
			{
				throw $e;
			}
		}

		public function delete()
		{
		}

		public function findById($id)
		{
			$query = $this->db->get_where('terroir', array('id' => $id));
			$result = $query->result();

			$this->load->library("Terroir");
			$array = Terroir::init($result);

			return $array[0];
		}

		public function findAll()
		{
			$this->db->select("*");
			$this->db->from("terroir");
			$query = $this->db->get();        
			$result = $query->result();

			$this->load->library("Terroir");
			$array = Terroir::init($result);

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

			$this->load->library("Terroir");
			$array = Terroir::init($result);

			return $array;
		}

		public function nBGroupeTravail($id)
		{
			$this->db->select("*");
			$this->db->from("groupetravail");
			$this->db->where("terroir_id", $id);
			$query = $this->db->get();        
			$result = $query->result();

			return sizeof($result);
		}

		public function droit($user_id, $terroir_id)
		{
			$this->db->select("*");
			$this->db->from("terroir");
			$this->db->where("id", $terroir_id);
			$this->db->where("cp_id", $user_id);
			$query = $this->db->get();
			$result = $query->result();  
			
			return $result;
		}
	}