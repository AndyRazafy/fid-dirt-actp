<?php
	require_once("BaseModele.php");
	
	class District extends BaseModele
	{
		private $nom;

		public static function init($data)
		{
			$array = array();
			foreach ($data as $row)
			{
				$district = new District();
				$district->setId($row->id);
				$district->setNom($row->nom);

				array_push($array, $district);
			}

			return $array;
		}

		public function getNom()
		{
			return $this->nom;
		}

		public function setNom($nom)
		{
			$this->nom = $nom;
		}
	}