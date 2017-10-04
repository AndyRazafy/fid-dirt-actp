<?php
	require_once("Base_Controller.php");

	class GroupeTravail_Controller extends Base_Controller
	{
	 	public function __construct()
	 	{
			parent::__construct();
		}
	 
		public function index()
		{	
			
		}

		public function update()
		{
			$id = $this->input->post("id");

			$this->load->model("GroupeTravail_Model");
			$groupeTravail = $this->GroupeTravail_Model->findById($id);

			$session = $this->session->userdata;
			$user_id = $session["user_id"];

			try
			{
				if($this->droit($user_id, $id) == 1)
				{
					$nom = $this->input->post("nom");
					$codeChantier = $this->input->post("codechantier");
					$terroir_id = $this->input->post("terroir");
					$phase_id = $this->input->post("phase");	

					$groupeTravail->setId($id);
					$groupeTravail->setNom($nom);
					$groupeTravail->setCodeChantier($codeChantier);

					$this->load->model("Terroir_Model");
					$groupeTravail->setTerroir($this->Terroir_Model->findById($terroir_id));

					$this->load->model("GroupeTravail_Model");
				
					$this->GroupeTravail_Model->update($groupeTravail);

					$this->session->set_flashdata("info", "<div class='alert alert-success'><strong>Modification avec succes</strong></div>");
					redirect("GroupeTravail_Controller/fiche/".$id);
				}
				else
				{
					throw new Exception("Modification interrompue. Vous ne disposez pas des droits pour modifier ce groupe de travail.");
				}
			}
			catch(Exception $e)
			{
				$this->session->set_flashdata("info", "<div class='alert alert-danger'><strong>".$e->getMessage()."</strong></div>");
				redirect("GroupeTravail_Controller/fiche/".$groupeTravail->getId());
			}
		}

		public function fiche($id)
		{
			try 
			{
				$this->load->library("GroupeTravail");
				$this->load->model("GroupeTravail_Model");

				$gt = $this->GroupeTravail_Model->findById($id);

				$this->load->model("Intervention_Model");

				$key = array();
				$operand = array();
				$value = array();

				array_push($key, "groupetravail_id");
				array_push($operand, "=");
				array_push($value, $id);

				$columns = array("*");
				$conditions = array(
					0 => $key,
					1 => $operand,
					2 => $value
				);
				$joins = array();
				$orderby = "rang";
				$tableName = "intervention";

				$interventions = $this->Intervention_Model->find($columns, $conditions, $joins, $orderby, $tableName);
				$gt->setInterventions($interventions);

				$this->load->model("InterventionIntitule_Model");

				foreach ($interventions as $row) 
				{
					$key = array();
					$operand = array();
					$value = array();
					
					array_push($key, "intervention_id");
					array_push($operand, "=");
					array_push($value, $row->getId());

					$columns = array("*");
					$conditions = array(
						0 => $key,
						1 => $operand,
						2 => $value
					);
					$joins = array();
					$orderby = "id";
					$tableName = "interventionintitule";

					$result = $this->InterventionIntitule_Model->find($columns, $conditions, $joins, $orderby, $tableName);
					$row->setIntitules($result);
				}

				$this->load->model("Paiement_Model");
				foreach ($interventions as $row)
				{
					$key = array();
					$operand = array();
					$value = array();

					array_push($key, "intervention_id");
					array_push($operand, "=");
					array_push($value, $row->getId());

					$columns = array("*");
					$conditions = array(
						0 => $key,
						1 => $operand,
						2 => $value
					);
					$joins = array();
					$orderby = "id";
					$tableName = "paiement";

					$paiements = $this->Paiement_Model->find($columns, $conditions, $joins, $orderby, $tableName);
					$row->setPaiements($paiements);
				}

				// $nbPaiement = sizeof($interventions[0]->getPaiements());

				$this->load->model("Phase_Model");
				$phases = $this->Phase_Model->findAll();

				$key = array();
				$operand = array();
				$value = array();

				array_push($key, "terroir_id");
				array_push($operand, "=");
				array_push($value, $gt->getTerroir()->getId());

				$this->load->model("Unite_Model");
				$unites = $this->Unite_Model->findAll();

				$this->load->model("Intitule_Model");
				$intitules = $this->Intitule_Model->findAll();

				$columns = array("*");
				$conditions = array(
					0 => $key,
					1 => $operand,
					2 => $value
				);
				$joins = array();
				$orderby = "id";
				$tableName = "groupetravail";

				$gts = $this->GroupeTravail_Model->find($columns, $conditions, $joins, $orderby, $tableName);
				$liste = $gts;

				$this->load->library("Pagination");
				$pagination = new Pagination();

				$suivant = $pagination->suivant($liste, $gt);
				$precedent = $pagination->precedent($liste, $gt);

				$session = $this->session->userdata;
				$user_id = $session["user_id"];

				$droit = $this->droit($user_id, $gt->getId());

				$data["droit"] = $droit;
				$data["suivant"] = $suivant->getId();
				$data["precedent"] = $precedent->getId();
				$data["intervention_rang_suiv"] = sizeof($interventions) + 1;
				$data["phases"] = $phases;
				$data["intitules"] = $intitules;
				$data["unites"] = $unites;
				$data["interventions"] = $interventions;
				$data["groupetravail"] = $gt;
				$data["contents"] = "fiche_groupetravail_View";

				$template = $session["template"];
				$this->load->view($template, $data);
			} 
			catch (Exception $e) 
			{
				$this->session->set_flashdata("info", "<div class='alert alert-danger'><strong>".$e->getMessage()."</strong></div>");
				redirect("Base_Controller");
			}
		}

		public function droit($user_id, $gt_id)
		{
			$this->load->model("GroupeTravail_Model");
			$gt = $this->GroupeTravail_Model->findById($gt_id);

			$this->load->model("Terroir_Model");
			$terroir = $this->Terroir_Model->droit($user_id, $gt->getTerroir()->getId());

			return sizeof($terroir);
		}

		public function recherche()
		{
			$current_page = $this->input->get("page");
			$gt_nom = $this->input->get("gt_nom");
			$gt_codechantier = $this->input->get("gt_codechantier");
			$terroir_nom = $this->input->get("terroir_nom");
			$agec_nom = $this->input->get("agec_nom");
			$cp_pseudo = $this->input->get("cp_pseudo");
			$tri = $this->input->get("tri");

			$this->load->library("GroupeTravail");
			$this->load->model("GroupeTravail_Model");

			$search_criteria["gtnom"] = $gt_nom;
			$search_criteria["gtcodechantier"] = $gt_codechantier;
			$search_criteria["terroirnom"] = $terroir_nom;
			$search_criteria["agecnom"] = $agec_nom;
			$search_criteria["cppseudo"] = $cp_pseudo;

			$search_url = "gt_nom=".$search_criteria["gtnom"]."&gt_codechantier=".$search_criteria["gtcodechantier"]."&terroir_nom=".$search_criteria["terroirnom"]."&agec_nom=".$search_criteria["agecnom"]."&cp_pseudo=".$search_criteria["cppseudo"]."&tri=".$tri;
			
			$key = array();
			$operand = array();
			$value = array();

			if($gt_nom != "")
			{
				array_push($key, "gt.nom");
				array_push($operand, "LIKE");
				array_push($value, "UPPER('%".$gt_nom."%')");
			}

			if($gt_codechantier != "")
			{
				array_push($key, "UPPER(gt.codechantier)");
				array_push($operand, "LIKE");
				array_push($value, "UPPER('".$gt_codechantier."')");
			}

			if($terroir_nom != "")
			{
				array_push($key, "t.nom");
				array_push($operand, "LIKE");
				array_push($value, "UPPER('%".$terroir_nom."%')");
			}

			if($agec_nom != "")
			{
				array_push($key, "agec.nom");
				array_push($operand, "LIKE");
				array_push($value, "UPPER('%".$agec_nom."%')");
			}

			if($cp_pseudo != "")
			{
				array_push($key, "UPPER(cp.pseudo)");
				array_push($operand, "LIKE");
				array_push($value, "UPPER('%".$cp_pseudo."%')");
			}

			$joinskey = array("terroir t", "prestataire agec", "chargeprojet cp");
			$joinsrelation = array("ON gt.terroir_id = t.id", "ON t.prestataireagec_id = agec.id", "ON cp.id = t.cp_id");

			$columns = array("gt.id", "gt.nom", "gt.codechantier", "gt.terroir_id");
			$conditions = array(
				0 => $key,
				1 => $operand,
				2 => $value
			);
			$orderby = $tri;
			$joins = array(
				0 => $joinskey,
				1 => $joinsrelation
			);
			$tableName = "groupetravail gt";

			$groupeTravails = $this->GroupeTravail_Model->find($columns, $conditions, $joins, $orderby, $tableName);

			$this->load->model("Intervention_Model");
			foreach ($groupeTravails as $row)
			{
				$key = array();
				$operand = array();
				$value = array();

				array_push($key, "groupetravail_id");
				array_push($operand, "=");
				array_push($value, $row->getId());

				$columns = array("*");
				$conditions = array(
					0 => $key,
					1 => $operand,
					2 => $value
				);
				$orderby = "rang";
				$joins = array();
				
				$tableName = "intervention";

				$result = $this->Intervention_Model->find($columns, $conditions, $joins, $orderby, $tableName);
				$row->setInterventions($result);
			}

			$this->load->library("Pagination");
			$pagination = new Pagination();
			$elements = 10;
			$nbpages = $pagination->getNombrePage($groupeTravails, $elements);
			$debutpage = $pagination->getDebut($current_page, $elements);

			$pages = $pagination->create($current_page, $nbpages);

			$groupeTravails = array_slice($groupeTravails, $debutpage-1, $elements);

			$data["search_criteria"] = $search_criteria;
			$data["search_url"] = $search_url;
			$data['debut'] = $debutpage;
			$data["pages"] = $pages;
			$data["groupetravails"] = $groupeTravails;
			$data["contents"] = "recherche_groupetravail_View";

			$session = $this->session->userdata;
			$template = $session["template"];
			$this->load->view($template, $data);
		}

		public function etat()
		{

			$data["contents"] = "etat_View";

			$session = $this->session->userdata;
			$template = $session["template"];
			$this->load->view($template, $data);
		}
	}