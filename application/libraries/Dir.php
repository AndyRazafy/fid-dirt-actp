<?php
	require_once("BaseModele.php");

	class Dir extends BaseModele
	{
		private $nom;

		public static function init($data)
		{
			$array = array();
			foreach ($data as $row)
			{
				$dir = new Dir();
				$dir->setId($row->id);
				$dir->setNom($row->nom);

				array_push($array, $dir);
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