<?php
	require_once("BaseModele.php");

	class Intitule extends BaseModele
	{
		private $nom;

		public static function init($data)
		{
			$array = array();
			foreach ($data as $row)
			{
				$intitule = new Intitule();
				$intitule->setId($row->id);
				$intitule->setNom($row->nom);

				array_push($array, $intitule);
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