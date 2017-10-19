<?php
	require_once("Base_Controller.php");

	class AgencePaiement_Controller extends Base_Controller
	{
		public function __construct()
	 	{
			parent::__construct();
		}

		public function create()
		{
			$this->load->library("AgencePaiement");
			$this->load->model("AgencePaiement_Model");

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

					$agencePaiement = new AgencePaiement();
					$agencePaiement->setNom($nom);

					$this->AgencePaiement_Model->save($agencePaiement);
					$this->session->set_flashdata("info", "<div class='alert alert-success'><strong>Creation avec succes</strong></div>");
					redirect("AgencePaiement_Controller/fiche/?page=1");
				}
				else
				{
					throw new Exception("Creation interrompue. Vous ne disposez pas des droits pour cette creation.");
				}
			}
			catch(Exception $e)
			{
				$this->session->set_flashdata("info", "<div class='alert alert-danger'><strong>".$e->getMessage()."</strong></div>");
				redirect("AgencePaiement_Controller/recherche?page=1");
			}
		}

		public function update($id)
		{
			$this->load->model("AgencePaiement_Model");

			$agencePaiement = $this->AgencePaiement_Model->findById($id);

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
					$agencePaiement->setNom($nom);

					$this->AgencePaiement_Model->update($agencePaiement);
					$this->session->set_flashdata("info", "<div class='alert alert-success'><strong>Modification avec succes</strong></div>");
					redirect("AgencePaiement_Controller/fiche/".$agencePaiement->getId());
				}
				else
				{
					throw new Exception("Modification interrompue. Vous ne disposez pas des droits pour cette modification.");
				}
			}
			catch(Exception $e)
			{
				$this->session->set_flashdata("info", "<div class='alert alert-danger'><strong>".$e->getMessage()."</strong></div>");
				redirect("AgencePaiement_Controller/fiche/".$agencePaiement->getId());
			}
		}

		public function delete($id)
		{
			$this->load->library("AgencePaiement");
			$this->load->model("AgencePaiement_Model");

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
					$agencePaiement = $this->AgencePaiement_Model->findById($id);

					$this->AgencePaiement_Model->delete($agencePaiement);
					$this->session->set_flashdata("info", "<div class='alert alert-success'><strong>Suppression avec succes</strong></div>");
					redirect("AgencePaiement_Controller/recherche?page=1");
				}
				else
				{
					throw new Exception("Suppression interrompue. Vous ne disposez pas des droits pour supprimer.");
				}
			}
			catch(Exception $e)
			{
				$this->session->set_flashdata("info", "<div class='alert alert-danger'><strong>".$e->getMessage()."</strong></div>");
				redirect("AgencePaiement_Controller/recherche?page=1");
			}
		}

		public function fiche($id)
		{
			$this->load->model("AgencePaiement_Model");

			$session = $this->session->userdata;
			$template = $session["template"];

			$agencePaiement = $this->AgencePaiement_Model->findById($id);

			$data["agencePaiement"] = $agencePaiement;
			$data["contents"] = "fiche_agencePaiement_View";
			$this->load->view($template, $data);
		}

		public function recherche()
		{
			$this->load->library("AgencePaiement");
			$this->load->library("Pagination");
			$this->load->model("AgencePaiement_Model");
			

			$current_page = $this->input->get("page");
			$nom = $this->input->get("nom");

			$search_criteria["nom"] = $nom;
			$search_url = "nom=".$search_criteria["nom"];

			$key = array();
			$operand = array();
			$value = array();

			if($nom != "")
			{
				array_push($key, "UPPER(nom)");
				array_push($operand, "LIKE");
				array_push($value, "UPPER('%".$nom."%')");
			}

			$columns = array("*");
			$conditions = array(
				0 => $key,
				1 => $operand,
				2 => $value
			);
			$orderby = "id";
			$joins = array();
			$tableName = "agencepaiement";

			$agencePaiements = $this->AgencePaiement_Model->find($columns, $conditions, $joins, $orderby, $tableName);

			$pagination = new Pagination();
			$elements = 10;
			$nbpages = $pagination->getNombrePage($agencePaiements, $elements);
			$debutpage = $pagination->getDebut($current_page, $elements);

			$pages = $pagination->create($current_page, $nbpages);

			$agencePaiements = array_slice($agencePaiements, $debutpage-1, $elements);

			$data["search_criteria"] = $search_criteria;
			$data["search_url"] = $search_url;
			$data["debut"] = $debutpage;
			$data["pages"] = $pages;
			$data["agencePaiements"] = $agencePaiements;
			$data["contents"] = "recherche_agencePaiement_View";
			
			$session = $this->session->userdata;
			$template = $session["template"];
			$this->load->view($template, $data);
		}
	}