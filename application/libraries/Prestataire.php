<?php
	require_once("BaseModele.php");

	class Prestataire extends BaseModele
	{
		private $nom;

		public static function init($data)
		{
			$array = array();
			foreach ($data as $row)
			{
				$prestataire = new Prestataire();
				$prestataire->setId($row->id);
				$prestataire->setNom($row->nom);

				array_push($array, $prestataire);
			}

			return $array;
		}

		public function getNom(){
			return $this->nom;
		}

		public function setNom($nom){
			$this->nom = $nom;
		}
	}