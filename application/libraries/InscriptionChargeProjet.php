<?php
	require_once("BaseModele.php");

	class InscriptionChargeProjet extends BaseModele
	{
		private $nom;
	    private $prenom;
	    private $dateNaissance;
	    private $pseudo;
	    private $email;
	    private $motPasse;
	    private $token;
	    private $dateEnregistrement;

	    public static function init($data)
	    {
			$array = array();
			foreach ($data as $row)
			{
				$objet = new InscriptionChargeProjet();
				$objet->setId($row->id);
				$objet->setNom($row->nom);
				$objet->setPrenom($row->prenom);
				$objet->setDateNaissance($row->datenaissance);
				$objet->setPseudo($row->pseudo);
				$objet->setEmail($row->email);
				$objet->setMotPasse($row->motpasse);
				$objet->setToken($row->token);
				$objet->setDateEnregistrement($row->denregistrement);

				array_push($array, $objet);
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

		public function getPseudo(){
			return $this->pseudo;
		}

		public function setPseudo($pseudo){
			$this->pseudo = $pseudo;
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

		public function getToken(){
			return $this->token;
		}

		public function setToken($token){
			$this->token = $token;
		}

		public function getDateEnregistrement(){
			return $this->dateEnregistrement;
		}

		public function setDateEnregistrement($dateEnregistrement){
			$this->dateEnregistrement = $dateEnregistrement;
		}
	}