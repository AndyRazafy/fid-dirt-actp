<?php
	require_once("BaseModele.php");

	class InterventionIntitule extends BaseModele
	{
		private $intervention;
		private $intitule;

		public static function init($data)
	    {
	    	$CI =& get_instance();
			$CI->load->model("Intervention_Model");
			$CI->load->model("Intitule_Model");

			$array = array();
			foreach ($data as $row)
			{
				$interventionIntitule = new InterventionIntitule();
				$interventionIntitule->setId($row->id);

				$intervention = $CI->Intervention_Model->findById($row->intervention_id);
				$interventionIntitule->setIntervention($intervention);

				$intitule = $CI->Intitule_Model->findById($row->intitule_id);
				$interventionIntitule->setIntitule($intitule);

				array_push($array, $interventionIntitule);
			}

			return $array;
	    }

		public function getIntervention(){
			return $this->intervention;
		}

		public function setIntervention($intervention){
			$this->intervention = $intervention;
		}

		public function getIntitule(){
			return $this->intitule;
		}

		public function setIntitule($intitule){
			$this->intitule = $intitule;
		}
	}