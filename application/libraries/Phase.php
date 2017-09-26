<?php
	require_once("BaseModele.php");

	class Phase extends BaseModele
	{
		private $valeur;

		public static function init($data)
		{
			$array = array();
			foreach ($data as $row)
			{
				$phase = new Phase();
				$phase->setId($row->id);
				$phase->setValeur($row->valeur);
				
				array_push($array, $phase);
			}

			return $array;
		}

		public function getValeur()
		{
			return $this->valeur;
		}

		public function setValeur($valeur)
		{
			$this->valeur = $valeur;
		}
	}