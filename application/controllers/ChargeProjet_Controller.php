<?php
	require_once("Base_Controller.php");

	class ChargeProjet_Controller extends Base_Controller
	{
		public function __construct()
	 	{
			parent::__construct();
		}
	 
		public function index()
		{	
			
		}

		public function update($id)
		{
			$this->load->model("ChargeProjet_Model");

			$chargeProjet = $this->ChargeProjet_Model->findById($id);

			$droit = 0;
			$session = $this->session->userdata;
			if($session["type"] == "admin")
			{
				$droit = 1;
			}

			try
			{
				if($droit == 1)
				{
					$nom = $this->input->post("nom");
					$chargeProjet->setNom($nom);

					$this->ChargeProjet_Model->update($chargeProjet);
					$this->session->set_flashdata("info", "<div class='alert alert-success'><strong>Modification avec succes</strong></div>");
					redirect("ChargeProjet_Controller/fiche/".$chargeProjet->getId());
				}
				else
				{
					throw new Exception("Modification interrompue. Vous ne disposez pas des droits pour cette modification.");
				}
			}
			catch(Exception $e)
			{
				$this->session->set_flashdata("info", "<div class='alert alert-danger'><strong>".$e->getMessage()."</strong></div>");
				redirect("ChargeProjet_Controller/fiche/".$chargeProjet->getId());
			}
		}

		public function delete($id)
		{
			$this->load->model("ChargeProjet_Model");

			$droit = 0;
			$session = $this->session->userdata;
			if($session["type"] == "admin")
			{
				$droit = 1;
			}

			try
			{
				if($droit == 1)
				{
					$chargeProjet = $this->ChargeProjet_Model->findById($id);
					$this->ChargeProjet_Model->delete($chargeProjet);

					$this->session->set_flashdata("info", "<div class='alert alert-success'><strong>Suppression avec succes</strong></div>");
					redirect("ChargeProjet_Controller/recherche?page=1");
				}
				else
				{
					throw new Exception("Suppression interrompue. Vous ne disposez pas des droits pour supprimer.");
				}
			}
			catch(Exception $e)
			{
				$this->session->set_flashdata("info", "<div class='alert alert-danger'><strong>".$e->getMessage()."</strong></div>");
				redirect("ChargeProjet_Controller/fiche/".$id);
			}
		}

		public function fiche($id)
		{
			$this->load->model("ChargeProjet_Model");
			$this->load->model("Terroir_Model");

			$session = $this->session->userdata;
			$template = $session["template"];

			$cp = $this->ChargeProjet_Model->findById($id);

			$key = array();
			$operand = array();
			$value = array();

			array_push($key, "t.cp_id");
			array_push($operand, "=");
			array_push($value, $cp->getId());

			$columns = array("*");
			$conditions = array(
				0 => $key,
				1 => $operand,
				2 => $value
			);
			$joins = array();
			$orderby = "";
			$tableName = "terroir t";

			$terroirs = $this->Terroir_Model->find($columns, $conditions, $joins, $orderby, $tableName);

			$data["cp"] = $cp;
			$data["terroirs"] = $terroirs;
			$data["contents"] = "fiche_chargeProjet_View";
			$this->load->view($template, $data);
		}

		public function dashboard()
		{
			$this->load->model("Terroir_Model");
			$this->load->model("GroupeTravail_Model");
			$this->load->model("Paiement_Model");

			$session = $this->session->userdata;
			$userId = $session["user_id"];
			$template = $session["template"];

			$key = array();
			$operand = array();
			$value = array();

			array_push($key, "cp_id");
			array_push($operand, "=");
			array_push($value, $userId);

			$columns = array("*");
			$conditions = array(
				0 => $key,
				1 => $operand,
				2 => $value
			);
			$joins = array();
			$orderby = "";
			$tableName = "terroir";

			$terroirs = $this->Terroir_Model->find($columns, $conditions, $joins, $orderby, $tableName);

			$gts = array();

			foreach ($terroirs as $row)
			{
				$key = array();
				$operand = array();
				$value = array();

				array_push($key, "terroir_id");
				array_push($operand, "=");
				array_push($value, $row->getId());

				$columns = array("*");
				$conditions = array(
					0 => $key,
					1 => $operand,
					2 => $value
				);
				$joins = array();
				$orderby = "";
				$tableName = "groupetravail";

				$groupetravails = $this->GroupeTravail_Model->find($columns, $conditions, $joins, $orderby, $tableName);
				$row->setGroupeTravails($groupetravails);

				$gts = array_merge($gts, $groupetravails);
			}

			$key = array();
			$operand = array();
			$value = array();

			array_push($key, "t.cp_id");
			array_push($operand, "=");
			array_push($value, $userId);

			array_push($key, "datereelle is null");
			array_push($operand, "");
			array_push($value, "");

			$columns = array("p.*");
			$conditions = array(
				0 => $key,
				1 => $operand,
				2 => $value
			);

			$joinskey = array("intervention i", "groupetravail gt", "terroir t");
			$joinsrelation = array("ON p.intervention_id = i.id", "ON gt.id = i.groupetravail_id", "ON t.id = gt.terroir_id");

			$orderby = "";
			$joins = array(
				0 => $joinskey,
				1 => $joinsrelation
			);
			$tableName = "paiement p";

			$paiements = $this->Paiement_Model->find($columns, $conditions, $joins, $orderby, $tableName);

			$data["paiements"] = $paiements;
			$data["groupeTravails"] = $gts;
			$data["terroirs"] = $terroirs;
			$data["contents"] = "dashboard_cp_View";
			$this->load->view($template, $data);
		}

		public function recherche()
		{
			$this->load->library("ChargeProjet");
			$this->load->model("ChargeProjet_Model");
			$this->load->library("Pagination");

			$current_page = $this->input->get("page");
			$nom = $this->input->get("nom");
			$prenom = $this->input->get("prenom");
			$pseudo = $this->input->get("pseudo");

			$search_criteria["nom"] = $nom;
			$search_criteria["prenom"] = $prenom;
			$search_criteria["pseudo"] = $pseudo;
			$search_url = "nom=".$search_criteria["nom"]."&prenom=".$search_criteria["prenom"]."&pseudo=".$search_criteria["pseudo"];

			$key = array();
			$operand = array();
			$value = array();

			if($nom != "")
			{
				array_push($key, "UPPER(cp.nom)");
				array_push($operand, "LIKE");
				array_push($value, "UPPER('%".$nom."%')");
			}

			if($prenom != "")
			{
				array_push($key, "UPPER(cp.prenom)");
				array_push($operand, "LIKE");
				array_push($value, "UPPER('%".$prenom."%')");
			}

			if($pseudo != "")
			{
				array_push($key, "UPPER(cp.pseudo)");
				array_push($operand, "LIKE");
				array_push($value, "UPPER('%".$pseudo."%')");
			}

			$columns = array("*");
			$conditions = array(
				0 => $key,
				1 => $operand,
				2 => $value
			);
			$orderby = "";
			$joins = array();
			$tableName = "chargeprojet cp";

			$cps = $this->ChargeProjet_Model->find($columns, $conditions, $joins, $orderby, $tableName);

			$pagination = new Pagination();
			$elements = 10;
			$nbpages = $pagination->getNombrePage($cps, $elements);
			$debutpage = $pagination->getDebut($current_page, $elements);

			$pages = $pagination->create($current_page, $nbpages);

			$cps = array_slice($cps, $debutpage-1, $elements);

			$data["search_criteria"] = $search_criteria;
			$data["search_url"] = $search_url;
			$data["debut"] = $debutpage;
			$data["pages"] = $pages;
			$data["cps"] = $cps;
			$data["contents"] = "recherche_chargeProjet_View";
			
			$session = $this->session->userdata;
			$template = $session["template"];
			$this->load->view($template, $data);
		}
	}