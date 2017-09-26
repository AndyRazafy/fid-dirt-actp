<?php
	require_once("BaseModele.php");

	class ChargeProjet extends BaseModele
	{
		private $nom;
	    private $prenom;
	    private $dateNaissance;
	    private $email;
	    private $motPasse;
	    private $pseudo;

	    public static function init($data)
		{
			$array = array();
			foreach ($data as $row) 
			{
				$chargeProjet = new ChargeProjet();
				$chargeProjet->setId($row->id);
				$chargeProjet->setNom($row->nom);
				$chargeProjet->setPrenom($row->prenom);
				$chargeProjet->setDateNaissance($row->datenaissance);
				$chargeProjet->setEmail($row->email);
				$chargeProjet->setMotPasse($row->motpasse);
				$chargeProjet->setPseudo($row->pseudo);

				array_push($array, $chargeProjet);
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

		public function getPseudo(){
			return $this->pseudo;
		}

		public function setPseudo($pseudo){
			$this->pseudo = $pseudo;
		}
	}