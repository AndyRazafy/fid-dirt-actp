<?php
	require_once("BaseModele.php");

	class Paiement extends BaseModele
	{
		private $datePrevue;
		private $dateReelle;
		private $intervention;
		private $rang;

		public static function init($data)
		{
			$CI =& get_instance();
			$CI->load->model("Intervention_Model");

			$array = array();
			foreach ($data as $row)
			{
				$paiement = new Paiement();
				$paiement->setId($row->id);
				$paiement->setDatePrevue($row->dateprevue);
				$paiement->setDateReelle($row->datereelle);
				$paiement->setRang($row->rang);

				$intervention = $CI->Intervention_Model->findById($row->intervention_id);
				$paiement->setIntervention($intervention);
				
				array_push($array, $paiement);
			}

			return $array;
		}

		public function getDatePrevue(){
			if($this->datePrevue != null)
				return $this->datePrevue;
			else
				return null;
		}

		public function setDatePrevue($datePrevue){
			$this->datePrevue = $datePrevue;
		}

		public function getDateReelle(){
			if($this->dateReelle != null)
				return $this->dateReelle;
			else
				return null;
		}

		public function setDateReelle($dateReelle){
			$this->dateReelle = $dateReelle;
		}

		public function getIntervention(){
			return $this->intervention;
		}

		public function setIntervention($intervention){
			$this->intervention = $intervention;
		}

		public function getRang(){
			return $this->rang;
		}

		public function setRang($rang){
			$this->rang = $rang;
		}
	}