<?php
	require_once("BaseModele.php");

	class Unite extends BaseModele
	{
		private $valeur;

		public static function init($data)
		{
			$array = array();
			foreach ($data as $row)
			{
				$dir = new Unite();
				$dir->setId($row->id);
				$dir->setValeur($row->valeur);

				array_push($array, $dir);
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