<?php
	require_once("BaseModele.php");

	class GroupeTravail extends BaseModele
	{
		private $nom;
		private $codeChantier;
		private $terroir;
		private $interventions;

		private $nbBenef;
		private $nbInapte;

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

		public function getNbBenef(){
			if($this->nbBenef != null)
			{
				return $this->nbBenef;
			}
			else
			{
				$nb = 0;
				foreach ($this->getInterventions() as $inter)
				{
					$nb += $inter->getNbReelBenef();
				}
				$this->nbBenef = $nb;
				return $this->nbBenef;
			}
		}

		public function setNbBenef($nbBenef){
			$this->nbBenef = $nbBenef;
		}

		public function getNbInapte(){
			if($this->nbInapte != null)
			{
				return $this->nbInapte;
			}
			else
			{
				$nb = 0;
				foreach ($this->getInterventions() as $inter)
				{
					$nb += $inter->getNbBenefInapte();
				}
				$this->nbInapte = $nb;
				return $this->nbInapte;
			}
		}

		public function setNbInapte($nbInapte){
			$this->nbInapte = $nbInapte;
		}
	}