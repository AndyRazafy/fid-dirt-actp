<?php
	require_once("BaseModele.php");

	class AgencePaiement extends BaseModele
	{
		private $nom;

		public static function init($data)
		{
			$array = array();
			foreach ($data as $row)
			{
				$agencePaiement = new AgencePaiement();
				$agencePaiement->setId($row->id);
				$agencePaiement->setNom($row->nom);

				array_push($array, $agencePaiement);
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