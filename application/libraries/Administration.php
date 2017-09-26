<?php
	require_once("BaseModele.php");

	class Administration extends BaseModele
	{
		private $nom;
	    private $prenom;
	    private $dateNaissance;
	    private $email;
	    private $motPasse;

	    public static function init($data)
	    {
			$array = array();
			foreach ($data as $row)
			{
				$administration = new Administration();
				$administration->setId($row->id);
				$administration->setNom($row->nom);
				$administration->setPrenom($row->prenom);
				$administration->setDateNaissance($row->datenaissance);
				$administration->setEmail($row->email);
				$administration->setMotPasse($row->motpasse);

				array_push($array, $administration);
			}

			return $array;
	    }

		public function getNom(){
			return $this->nom;
		}

		public function setNom($nom){
			$this->nom = $nom;
		}

		public function getPrenom(){
			return $this->prenom;
		}

		public function setPrenom($prenom){
			$this->prenom = $prenom;
		}

		public function getDateNaissance(){
			return $this->dateNaissance;
		}

		public function setDateNaissance($dateNaissance){
			$this->dateNaissance = $dateNaissance;
		}

		public function getEmail(){
			return $this->email;
		}

		public function setEmail($email){
			$this->email = $email;
		}

		public function getMotPasse(){
			return $this->motPasse;
		}

		public function setMotPasse($motPasse){
			$this->motPasse = $motPasse;
		}
	}