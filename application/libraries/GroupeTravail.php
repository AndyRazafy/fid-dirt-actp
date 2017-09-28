<?php
	require_once("BaseModele.php");

	class GroupeTravail extends BaseModele
	{
		private $nom;
		private $codeChantier;
		private $terroir;
		private $interventions;

		public static function init($data)
		{
			$CI =& get_instance();
			$CI->load->model("Terroir_Model");

			$array = array();
			foreach ($data as $row)
			{
				$groupeTravail = new GroupeTravail();
				$groupeTravail->setId($row->id);
				$groupeTravail->setNom($row->nom);
				$groupeTravail->setCodeChantier($row->codechantier);
				
				$terroir = $CI->Terroir_Model->findById($row->terroir_id);
				$groupeTravail->setTerroir($terroir);
				
				array_push($array, $groupeTravail);
			}

			return $array;
		}

		public function getNom(){
			return $this->nom;
		}

		public function setNom($nom){
			$this->nom = $nom;
		}

		public function getCodeChantier(){
			return $this->codeChantier;
		}

		public function setCodeChantier($codeChantier){
			$this->codeChantier = $codeChantier;
		}

		public function getTerroir(){
			return $this->terroir;
		}

		public function setTerroir($terroir){
			$this->terroir = $terroir;
		}

		public function getInterventions(){
			return $this->interventions;
		}

		public function setInterventions($interventions){
			$this->interventions = $interventions;
		}

		public function getPhase()
		{
			$temp = end($this->interventions);
			$result = "";

			if($temp != null)
			{
				$valeur = $temp->getPhase()->getValeur();
				$result = $valeur.$temp->getRang(); 
			}
			else
			{
				$result = "-";
			}

			return $result;
		}
	}