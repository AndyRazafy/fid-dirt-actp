<?php
	require_once("Base_Controller.php");

	class Login_Controller extends Base_Controller
	{
	 	public function __construct()
	 	{
			parent::__construct();
		}
	 
		function index()
		{
		   	redirect("Base_Controller");
		}

		public function chargeProjetLogin($email, $password)
		{
			$key = array("email", "motpasse");
			$operand = array("=", "=");
			$value = array("'".$email."'", "'".$password."'");

			$columns = array("*");
			$conditions = array(
				0 => $key,
				1 => $operand,
				2 => $value
			);
			$link = " AND ";
			$joins = array();
			$orderBy = "";
			$tableName = "chargeprojet";

			$this->load->model("ChargeProjet_Model");
			$result = $this->ChargeProjet_Model->find($columns, $conditions, $link, $joins, $orderBy, $tableName);
			
			return $result;
		}

		public function AdministrationLogin($email, $password)
		{
			$key = array("email", "motpasse");
			$operand = array("=", "=");
			$value = array("'".$email."'", "'".$password."'");

			$columns = array("*");
			$conditions = array(
				0 => $key,
				1 => $operand,
				2 => $value
			);
			$joins = array();
			$orderBy = "";
			$tableName = "administration";

			$this->load->model("Administration_Model");
			$result = $this->Administration_Model->find($columns, $conditions, $joins, $orderBy, $tableName);
			
			return $result;
		}

		public function connexion()
		{
			$email = $this->input->post("email");
			$motdepasse = $this->input->post("motdepasse");

			$result = $this->chargeProjetLogin($email, $motdepasse);
			if(sizeof($result) == 1)
			{
				$this->session->set_userdata('type', "cp");
				$this->session->set_userdata('template', "cp_template");
				$this->session->set_userdata('user_id', $result[0]->getId());
				$this->session->set_userdata('nom', $result[0]->getNom());
				$this->session->set_userdata('prenom', $result[0]->getPrenom());
				$this->session->set_userdata('pseudo', $result[0]->getPseudo());
				$this->session->set_userdata('dateNaissance', $result[0]->getDateNaissance());
				$this->session->set_userdata('email', $result[0]->getEmail());

				//echo $_SESSION["prenom"];
				redirect("ChargeProjet_Controller/dashboard");
			}
			else
			{
				$result = $this->AdministrationLogin($email, $motdepasse);
				if(sizeof($result) == 1)
				{
					$this->session->set_userdata('type', "admin");
					$this->session->set_userdata('user_id', $result[0]->getId());
					$this->session->set_userdata('nom', $result[0]->getNom());
					$this->session->set_userdata('prenom', $result[0]->getPrenom());
					$this->session->set_userdata('dateNaissance', $result[0]->getDateNaissance());
					$this->session->set_userdata('email', $result[0]->getEmail());
					
					redirect('Administration_Controller');
				}
				else
				{
					$this->session->set_flashdata('error', '<div class="alert alert-danger"><strong>Email ou mot de passe non valide</strong></div>');
					redirect('Base_Controller');
				}
			}
		}

		public function inscription()
		{
			$this->load->View('inscription_View');
		}

		public function deconnexion()
		{
			$this->session->sess_destroy();
			redirect('Base_Controller');
		}
	}