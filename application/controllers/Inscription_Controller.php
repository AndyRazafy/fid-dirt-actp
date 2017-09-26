<?php
	require_once("Base_Controller.php");

	class Inscription_Controller extends Base_Controller
	{
	 	public function __construct()
	 	{
			parent::__construct();
		}
	 
		public function index()
		{
			$data["nom"] = "";
			$data["prenom"] = "";
			$data["pseudo"] = "";
			$data["datenaissance"] = null;
			$data["email"] = "";
		   	$this->load->view("inscription_View", $data);
		}

		public function validation()
		{
			$lien = $this->input->get("lien");

			$this->load->library("InscriptionChargeProjet");
			$this->load->model("InscriptionChargeProjet_Model");

			$key = array();
			$operand = array();
			$value = array();

			array_push($key, "token");
			array_push($operand, "=");
			array_push($value, "'".$lien."'");

			$columns = array("*");
			$conditions = array(
				0 => $key,
				1 => $operand,
				2 => $value
			);
			$orderby = "";
			$joins = array();
			$tableName = "inscriptionchargeprojet";

			$result = $this->InscriptionChargeProjet_Model->find($columns, $conditions, $joins, $orderby, $tableName);

			if(sizeof($result) == 1)
			{
				$this->load->library("ChargeProjet");
				$this->load->model("ChargeProjet_Model");

				$chargeProjet = new ChargeProjet();

				$chargeProjet->setNom($result[0]->getNom());
				$chargeProjet->setPrenom($result[0]->getPrenom());
				$chargeProjet->setPseudo($result[0]->getPseudo());
				$chargeProjet->setDateNaissance($result[0]->getDateNaissance());
				$chargeProjet->setEmail($result[0]->getEmail());
				$chargeProjet->setMotPasse($result[0]->getMotPasse());

				$this->ChargeProjet_Model->save($chargeProjet);

				$this->load->model("InscriptionChargeProjet_Model");
				$this->InscriptionChargeProjet_Model->delete($result[0]);

				redirect("Inscription_Controller/compteValide");
			}
			else
			{
				redirect("Inscription_Controller/erreurValidation");
			}
		}

		public function inscription()
		{
			$nom = $this->input->post("nom");
			$prenom = $this->input->post("prenom");
			$pseudo = $this->input->post("pseudo");
			$dateNaissance = $this->input->post("datenaissance");
			$email = $this->input->post("email");
			$motPasse1 = $this->input->post("motpasse1");
			$motPasse2 = $this->input->post("motpasse2");

			$data["nom"] = $nom;
			$data["prenom"] = $prenom;
			$data["pseudo"] = $pseudo;
			$data["datenaissance"] = $dateNaissance;
			$data["email"] = $email;

			try
			{
				if($motPasse1 == $motPasse2)
				{
					$this->load->library("ChargeProjet");
					

					$nouveauChargeProjet = new ChargeProjet();
					$nouveauChargeProjet->setNom($nom);
					$nouveauChargeProjet->setPrenom($prenom);
					$nouveauChargeProjet->setPseudo($pseudo);
					$nouveauChargeProjet->setDateNaissance($dateNaissance);
					$nouveauChargeProjet->setEmail($email);
					$motPasse1 = sha1($motPasse1);
					$nouveauChargeProjet->setMotPasse($motPasse1);

					$this->verifierChargeProjetExistant($nouveauChargeProjet);

					$this->load->library("InscriptionChargeProjet");

					$inscription = new InscriptionChargeProjet();
					$inscription->setNom($nouveauChargeProjet->getNom());
					$inscription->setPrenom($nouveauChargeProjet->getPrenom());
					$inscription->setPseudo($nouveauChargeProjet->getPseudo());
					$inscription->setDateNaissance($nouveauChargeProjet->getDateNaissance());
					$inscription->setEmail($nouveauChargeProjet->getEmail());
					$inscription->setMotPasse($nouveauChargeProjet->getMotPasse());

					$token = sha1(uniqid(rand()));
					date_default_timezone_set('Africa/Nairobi'); //set timezone
					$now = date('Y-m-d');

					$inscription->setToken($token);
					$inscription->setDateEnregistrement($now);

					$this->enregistrer($inscription);

					$this->envoyeMail($inscription);

					//redirect("Inscription_Controller/consulterEmail");
				}
				else
				{
					throw new Exception("mot de passe non identique");
				}
			}
			catch(Exception $e)
			{
				$this->session->set_flashdata('error', '<div class="alert alert-danger"><strong>'.$e->getMessage().'</strong></div>');
				$this->load->view("inscription_View", $data);
			}
		}

		public function verifierChargeProjetExistant($chargeProjet)
		{
			$this->load->model("ChargeProjet_Model");
			
			$key = array();
			$operand = array();
			$value = array();

			array_push($key, "UPPER(pseudo)");
			array_push($operand, "LIKE");
			array_push($value, "UPPER('".$chargeProjet->getPseudo()."')");

			array_push($key, "UPPER(email)");
			array_push($operand, "LIKE");
			array_push($value, "UPPER('".$chargeProjet->getEmail()."')");

			$columns = array("*");
			$conditions = array(
				0 => $key,
				1 => $operand,
				2 => $value
			);
			$link = "OR";
			$orderby = "";
			$joins = array();
			$tableName = "chargeprojet";

			$cp = $this->ChargeProjet_Model->find($columns, $conditions, $link, $joins, $orderby, $tableName);

			foreach ($cp as $row) 
			{
				if($row->getPseudo() == $chargeProjet->getPseudo())
				{
					throw new Exception("Pseudo deja utilise");
				}
				if($row->getEmail() == $chargeProjet->getEmail())
				{
					throw new Exception("Email deja utilise");
				}
			}
		}

		public function enregistrer($inscription)
		{
			$this->load->model("InscriptionChargeProjet_Model");
			
			try
			{
				$this->InscriptionChargeProjet_Model->save($inscription);
			}
			catch(Exception $e)
			{
				throw $e;
			}
		}

		public function envoyeMail($inscription)
		{
			$config = Array(
			    'protocol' => 'smtp',
			    'smtp_host' => "ssl://smtp.googlemail.com",
			    'smtp_port' => 465,
			    'smtp_user' => 'andy.narazafy@gmail.com',
			    'smtp_pass' => 'performatyourbest',
			    'mailtype'  => 'html'
			);      

	        $this->load->library("email", $config);

			$this->email->from("andy.narazafy@gmail.com", "FID-DIRT");
			$this->email->to($inscription->getEmail());
			$this->email->subject("Validation inscription - FID-DIRT-ACTP app");

			$lien = site_url('Inscription_Controller/validation?lien='.$inscription->getToken());

			$message = "<html>
						<head>
							<title>Inscription</title>
						</head>
						<body>
							<p>Validation d'inscription de ".$inscription->getNom()." ".$inscription->getPrenom()."</p>
							<a href='".$lien."'>valider</a>
						</body>
					</html>";

			$this->email->message($message);

			if($this->email->send())
			{
				$this->consulterEmail();
			}
			else
			{
				throw new Exception("Email interrompu!");
			}
		}

		public function consulterEmail()
		{
			$this->load->view("inscription_email_View");
		}

		public function compteValide()
		{
			$this->load->view("inscription_valide_View");
		}

		public function erreurValidation()
		{
			$this->load->view("inscription_erreur_View");
		}
	}