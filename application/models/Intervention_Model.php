<?php
	require_once("Base_Model.php");

	class Intervention_Model extends Base_Model
	{
		function __construct()
		{
			parent::__construct();
		}

		public function save($intervention)
		{
			try
			{
				$data = array(
					"groupetravail_id" => $intervention->getGroupeTravail()->getId(),
					"intitule_id" => $intervention->getIntitule()->getId(),
					"phase_id" => $intervention->getPhase()->getId(),
					"dureetravaux" => $intervention->getDureeTravaux(),

					"dpdebut" => $intervention->getDPrevDebut(),
					"drdebut" => $intervention->getDReelDebut(),
					"dprtx" => $intervention->getDPrevRTX(),
					"drrtx" => $intervention->getDReelRTX(),

					// "dppaiement1" => $intervention->getDPrevPaiement1(),
					// "drpaiement1" => $intervention->getDReelPaiement1(),
					// "dppaiement2" => $intervention->getDPrevPaiement2(),
					// "drpaiement2" => $intervention->getDReelPaiement2(),
					// "dppaiement3" => $intervention->getDPrevPaiement3(),
					// "drpaiement3" => $intervention->getDReelPaiement3(),

					"nbpbenef" => $intervention->getNbPrevBenef(),
					"nbrbenef" => $intervention->getNbReelBenef(),
					"nbrbenefapte" => $intervention->getNbReelBenefApte(),
					"nbfemmebenefapte" => $intervention->getNbFemmeBenefApte(),
					"nbbenefinapte" => $intervention->getNbBenefInapte(),
					"nbphommejourapte" => $intervention->getNbPrevHommeJourApte(),
					"nbrhommejourapte" => $intervention->getNbReelHommeJourApte(),

					"psurftraiteeces" => $intervention->getPrevSurfTraiteeCES(),
					"rsurftraiteeces" => $intervention->getRealSurfTraiteeCES(),
					"psurfboiseefsp" => $intervention->getPrevSurfBoiseeFSP(),
					"rsurfboiseefsp" => $intervention->getRealSurfBoiseeFSP(),

					"libelleautreindic" => $intervention->getLibelleAutreIndic(),
					"prevautreindic" => $intervention->getPrevAutreIndic(),
					"realautreindic" => $intervention->getRealAutreIndic(),
					"uniteautreindic" => $intervention->getUniteAutreIndic()->getId(),

					"observationindic" => $intervention->getObservationIndic(),
					"rang" => $intervention->getRang()
				);

				$this->db->insert('intervention', $data);
			}
			catch(Exception $e)
			{
				throw $e;
			}
		}

		public function update($intervention)
		{
			try
			{
				$data = array(
					"intitule_id" => $intervention->getIntitule()->getId(),
					"phase_id" => $intervention->getPhase()->getId(),
					"dureetravaux" => $intervention->getDureeTravaux(),

					"dpdebut" => $intervention->getDPrevDebut(),
					"drdebut" => $intervention->getDReelDebut(),
					"dprtx" => $intervention->getDPrevRTX(),
					"drrtx" => $intervention->getDReelRTX(),

					// "dppaiement1" => $intervention->getDPrevPaiement1(),
					// "drpaiement1" => $intervention->getDReelPaiement1(),
					// "dppaiement2" => $intervention->getDPrevPaiement2(),
					// "drpaiement2" => $intervention->getDReelPaiement2(),
					// "dppaiement3" => $intervention->getDPrevPaiement3(),
					// "drpaiement3" => $intervention->getDReelPaiement3(),

					"nbpbenef" => $intervention->getNbPrevBenef(),
					"nbrbenef" => $intervention->getNbReelBenef(),
					"nbrbenefapte" => $intervention->getNbReelBenefApte(),
					"nbfemmebenefapte" => $intervention->getNbFemmeBenefApte(),
					"nbbenefinapte" => $intervention->getNbBenefInapte(),
					"nbphommejourapte" => $intervention->getNbPrevHommeJourApte(),
					"nbrhommejourapte" => $intervention->getNbReelHommeJourApte(),

					"psurftraiteeces" => $intervention->getPrevSurfTraiteeCES(),
					"rsurftraiteeces" => $intervention->getRealSurfTraiteeCES(),
					"psurfboiseefsp" => $intervention->getPrevSurfBoiseeFSP(),
					"rsurfboiseefsp" => $intervention->getRealSurfBoiseeFSP(),

					"libelleautreindic" => $intervention->getLibelleAutreIndic(),
					"prevautreindic" => $intervention->getPrevAutreIndic(),
					"realautreindic" => $intervention->getRealAutreIndic(),
					"uniteautreindic" => $intervention->getUniteAutreIndic()->getId(),

					"observationindic" => $intervention->getObservationIndic(),
					"rang" => $intervention->getRang()
				);

				$this->db->where(array('id' => $intervention->getId()));
				$this->db->update('intervention', $data);
			}
			catch(Exception $e)
			{
				throw $e;
			}
		}

		public function delete($intervention)
		{
			try
			{
				$this->db->where(array('id' => $intervention->getId()));
				$this->db->delete('intervention');
			}
			catch(Exception $e)
			{
				throw $e;
			}
		}

		public function findById($id)
		{
			$query = $this->db->get_where('intervention', array('id' => $id));
			$result = $query->result();

			$this->load->library("Intervention");
			$array = Intervention::init($result);

			return $array[0];
		}

		public function findAll()
		{
			$this->db->select("*");
			$this->db->from("intervention");
			$query = $this->db->get();        
			$result = $query->result();

			$this->load->library("Intervention");
			$array = Intervention::init($result);

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

			$this->load->library("Intervention");
			$array = Intervention::init($result);

			return $array;
		}
	}