<?php
	require_once("Base_Controller.php");

	class Prestataire_Controller extends Base_Controller
	{
		public function __construct()
	 	{
			parent::__construct();
		}

		public function create()
		{
			$this->load->library("Prestataire");
			$this->load->model("Prestataire_Model");

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

					$prestataire = new Prestataire();
					$prestataire->setNom($nom);

					$this->Prestataire_Model->save($prestataire);
					$this->session->set_flashdata("info", "<div class='alert alert-success'><strong>Creation avec succes</strong></div>");
					redirect("Prestataire_Controller/recherche?page=1");
				}
				else
				{
					throw new Exception("Creation interrompue. Vous ne disposez pas des droits pour cette creation.");
				}
			}
			catch(Exception $e)
			{
				$this->session->set_flashdata("info", "<div class='alert alert-danger'><strong>".$e->getMessage()."</strong></div>");
				redirect("Prestataire_Controller/recherche?page=1");
			}
		}

		public function update($id)
		{
			$this->load->model("Prestataire_Model");

			$prestataire = $this->Prestataire_Model->findById($id);

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
					$prestataire->setNom($nom);

					$this->Prestataire_Model->update($prestataire);
					$this->session->set_flashdata("info", "<div class='alert alert-success'><strong>Modification avec succes</strong></div>");
					redirect("Prestataire_Controller/fiche/".$prestataire->getId());
				}
				else
				{
					throw new Exception("Modification interrompue. Vous ne disposez pas des droits pour cette modification.");
				}
			}
			catch(Exception $e)
			{
				$this->session->set_flashdata("info", "<div class='alert alert-danger'><strong>".$e->getMessage()."</strong></div>");
				redirect("Prestataire_Controller/fiche/".$prestataire->getId());
			}
		}

		public function delete($id)
		{
			$this->load->library("Prestataire");
			$this->load->model("Prestataire_Model");

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
					$prestataire = $this->Prestataire_Model->findById($id);
					$this->Prestataire_Model->delete($prestataire);
					
					$this->session->set_flashdata("info", "<div class='alert alert-success'><strong>Suppression avec succes</strong></div>");
					redirect("Prestataire_Controller/recherche?page=1");
				}
				else
				{
					throw new Exception("Suppression interrompue. Vous ne disposez pas des droits pour supprimer.");
				}
			}
			catch(Exception $e)
			{
				$this->session->set_flashdata("info", "<div class='alert alert-danger'><strong>".$e->getMessage()."</strong></div>");
				redirect("Prestataire_Controller/fiche/".$prestataire->getId());
			}
		}

		public function fiche($id)
		{
			$this->load->model("Prestataire_Model");

			$session = $this->session->userdata;
			$template = $session["template"];

			$prestataire = $this->Prestataire_Model->findById($id);

			$data["prestataire"] = $prestataire;
			$data["contents"] = "fiche_prestataire_View";
			$this->load->view($template, $data);
		}

		public function recherche()
		{
			$this->load->library("Prestataire");
			$this->load->library("Pagination");
			$this->load->model("Prestataire_Model");
			

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
			$tableName = "prestataire";

			$prestataires = $this->Prestataire_Model->find($columns, $conditions, $joins, $orderby, $tableName);

			$pagination = new Pagination();
			$elements = 10;
			$nbpages = $pagination->getNombrePage($prestataires, $elements);
			$debutpage = $pagination->getDebut($current_page, $elements);

			$pages = $pagination->create($current_page, $nbpages);

			$prestataires = array_slice($prestataires, $debutpage-1, $elements);

			$data["search_criteria"] = $search_criteria;
			$data["search_url"] = $search_url;
			$data["debut"] = $debutpage;
			$data["pages"] = $pages;
			$data["prestataires"] = $prestataires;
			$data["contents"] = "recherche_prestataire_View";
			
			$session = $this->session->userdata;
			$template = $session["template"];
			$this->load->view($template, $data);
		}
	}