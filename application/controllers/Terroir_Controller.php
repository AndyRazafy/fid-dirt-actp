<?php
	require_once("Base_Controller.php");

	class Terroir_Controller extends Base_Controller
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

			$session = $this->session->userdata;
			$user_id = $session["user_id"];

			try
			{
				if($this->droit($user_id, $id) == 1)
				{
					$nom = $this->input->post("nom");
					$dir_id = $this->input->post("dir");
					$district_id = $this->input->post("district");
					$nbBenef = $this->input->post("nbBenef");
					$nbInapte = $this->input->post("nbInapte");
					$nbsa = $this->input->post("nbsa");
					
					$dpEngPlan = $this->input->post("dpEngPlan");
					$drEngPlan = $this->input->post("drEngPlan");
					$codemarchePlan = $this->input->post("codemarchePlan");
					$dpFinPlan = $this->input->post("dpFinPlan");
					$drFinPlan = $this->input->post("drFinPlan");
					$montantReelPlan = $this->input->post("montantReelPlan");
					$dpApprobPamo = $this->input->post("dpApprobPamo");
					$drApprobPamo = $this->input->post("drApprobPamo");
					$montantTotalPamo = $this->input->post("montantTotalPamo");
					
					$dpEngCible = $this->input->post("dpEngCible");
					$drEngCible = $this->input->post("drEngCible");
					$codemarcheCible = $this->input->post("codemarcheCible");
					$dpFinCible = $this->input->post("dpFinCible");
					$drFinCible = $this->input->post("drFinCible");
					$montantReelCible = $this->input->post("montantReelCible");
					$dValidCom = $this->input->post("dValidCom");

					$dpEngAgec = $this->input->post("dpEngAgec");
					$drEngAgec = $this->input->post("drEngAgec");
					$codemarcheAgec = $this->input->post("codemarcheAgec");
					$dpFinAgec = $this->input->post("dpFinAgec");
					$drFinAgec = $this->input->post("drFinAgec");
					$montantTotalAgec = $this->input->post("montantTotalAgec");
					$montantTotalConfieAgec = $this->input->post("montantTotalConfieAgec");

					$codemarchePaie = $this->input->post("codemarchePaie");
					$montantReelPaie = $this->input->post("montantReelPaie");

					$prevSurfTraiteeCes = $this->input->post("prevSurfTraiteeCes");
					$realSurfTraiteeCes = $this->input->post("realSurfTraiteeCes");
					$prevSurfReboiseeFsp = $this->input->post("prevSurfReboiseeFsp");
					$realSurfReboiseeFsp = $this->input->post("realSurfReboiseeFsp");

					$libelleAutreIndic = $this->input->post("libelleAutreIndic");
					$prevAutreIndic = $this->input->post("prevAutreIndic");
					$realAutreIndic = $this->input->post("realAutreIndic");
					$observation = $this->input->post("observation");

					$prestatairePlan = $this->input->post("prestatairePlan");
					$prestataireCible = $this->input->post("prestataireCible");
					$prestataireAgec = $this->input->post("prestataireAgec");
					$agencePaiement = $this->input->post("agencePaiement");
					$cp = $this->input->post("cp");

					$this->load->library("Terroir");
					$terroir = new Terroir();
		
					$terroir->setId($id);
					$terroir->setNom($nom);

					$this->load->model("Dir_Model");

					$dir = $this->Dir_Model->findById($dir_id);
					$terroir->setDir($dir);

					$this->load->library("District");
					$this->load->model("District_Model");
					
					$district = $this->District_Model->findById($district_id);
					$terroir->setDistrict($district);

					$this->load->library("Prestataire");
					$this->load->model("Prestataire_Model");

					$this->load->library("AgencePaiement");
					$this->load->model("AgencePaiement_Model");

					$this->load->library("ChargeProjet");
					$this->load->model("ChargeProjet_Model");

					if($prestatairePlan != null)
					{
						$prestatairePlan = $this->Prestataire_Model->findById($prestatairePlan);
						$terroir->setPrestatairePlan($prestatairePlan);
					}
					else
						$terroir->setPrestatairePlan(new Prestataire());

					if($prestataireCible != null)
					{
						$prestataireCible = $this->Prestataire_Model->findById($prestataireCible);
						$terroir->setPrestataireCible($prestataireCible);
					}
					else
						$terroir->setPrestataireCible(new Prestataire());

					if($prestataireAgec != null)
					{
						$prestataireAgec = $this->Prestataire_Model->findById($prestataireAgec);
						$terroir->setPrestataireAgec($prestataireAgec);
					}
					else
						$terroir->setPrestataireAgec(new Prestataire());

					if($agencePaiement != null)
					{
						$agencePaiement = $this->AgencePaiement_Model->findById($agencePaiement);
						$terroir->setAgencePaiement($agencePaiement);
					}
					else
						$terroir->setAgencePaiement(new AgencePaiement());

					if($cp != null)
					{
						$cp = $this->ChargeProjet_Model->findById($cp);
						$terroir->setCp($cp);
					}
					else
						$terroir->setCp(new ChargeProjet());
					
					$terroir->setNbBenef($nbBenef);
					$terroir->setNbInapte($nbInapte);
					$terroir->setNbsa($nbsa);
					
					$terroir->setDpEngPlan($dpEngPlan);
					$terroir->setDrEngPlan($drEngPlan);
					$terroir->setCodemarchePlan($codemarchePlan);
					$terroir->setDpFinPlan($dpFinPlan);
					$terroir->setDrFinPlan($drFinPlan);
					$terroir->setMontantReelPlan($montantReelPlan);
					$terroir->setDpApprobPamo($dpApprobPamo);
					$terroir->setDrApprobPamo($drApprobPamo);
					$terroir->setMontantTotalPamo($montantTotalPamo);

					$terroir->setDpEngCible($dpEngCible);
					$terroir->setDrEngCible($drEngCible);
					$terroir->setCodemarcheCible($codemarcheCible);
					$terroir->setDpFinCible($dpFinCible);
					$terroir->setMontantReelCible($montantReelCible);
					$terroir->setDValidCom($dValidCom);

					$terroir->setDpEngAgec($dpEngAgec);
					$terroir->setDrEngAgec($drEngAgec);
					$terroir->setCodemarcheAgec($codemarcheAgec);
					$terroir->setDpFinAgec($dpFinAgec);
					$terroir->setMontantTotalAgec($montantTotalAgec);
					$terroir->setMontantTotalConfieAgec($montantTotalConfieAgec);

					$terroir->setCodemarchePaie($codemarchePaie);
					$terroir->setMontantReelPaie($montantReelPaie);
					
					$terroir->setPrevSurfTraiteeCes($prevSurfTraiteeCes);
					$terroir->setRealSurfTraiteeCes($realSurfTraiteeCes);
					$terroir->setPrevSurfReboiseeFsp($prevSurfReboiseeFsp);
					$terroir->setRealSurfReboiseeFsp($realSurfReboiseeFsp);

					$terroir->setLibelleAutreIndic($libelleAutreIndic);
					$terroir->setPrevAutreIndic($prevAutreIndic);
					$terroir->setRealAutreIndic($realAutreIndic);
					$terroir->setObservation($observation);

					$this->load->model("Terroir_Model");
				
					$this->Terroir_Model->update($terroir);
					$this->session->set_flashdata("info", "<div class='alert alert-success'><strong>Modification avec succes</strong></div>");
					redirect("Terroir_Controller/fiche/".$id);
				}
				else
				{
					throw new Exception("Modification interrompue. Vous ne disposez pas des droits pour modifier cette UTB.");
				}
			}
			catch(Exception $e)
			{
				$this->session->set_flashdata("info", "<div class='alert alert-danger'><strong>".$e->getMessage()."</strong></div>");
				redirect("Terroir_Controller/fiche/".$id);
			}
		}

		public function fiche($id)
		{
			$this->load->library("Terroir");
			$this->load->model("Terroir_Model");

			$terroir = $this->Terroir_Model->findById($id);

			$key = array();
			$operand = array();
			$value = array();

			array_push($key, "terroir_id");
			array_push($operand, "=");
			array_push($value, $id);

			$columns = array("*");
			$conditions = array(
				0 => $key,
				1 => $operand,
				2 => $value
			);
			$joins = array();
			$orderby = "";
			$tableName = "groupetravail";

			$this->load->model("GroupeTravail_Model");
			$groupetravails = $this->GroupeTravail_Model->find($columns, $conditions, $joins, $orderby, $tableName);

			$terroir->setGroupeTravails($groupetravails);

			foreach ($terroir->getGroupeTravails() as $row)
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
				$joins = array();
				$orderby = "";
				$tableName = "intervention";

				$this->load->model("Intervention_Model");
				$interventions = $this->Intervention_Model->find($columns, $conditions, $joins, $orderby, $tableName);
				$row->setInterventions($interventions);
			}

			$this->load->model("Prestataire_Model");
			$prestataires = $this->Prestataire_Model->findAll();

			$this->load->model("AgencePaiement_Model");
			$agencePaiements = $this->AgencePaiement_Model->findAll();

			$session = $this->session->userdata;
			$user_id = $session["user_id"];

			$droit = $this->droit($user_id, $terroir->getId());

			$data["droit"] = $droit;
			$data["agencepaiements"] = $agencePaiements;
			$data["prestataires"] = $prestataires;
			$data["terroir"] = $terroir;
			$data["contents"] = "fiche_terroir_View";

			$session = $this->session->userdata;
			$template = $session["template"];
			$this->load->view($template, $data);
		}

		public function droit($user_id, $terroir_id)
		{
			$this->load->model("Terroir_Model");
			$terroir = $this->Terroir_Model->droit($user_id, $terroir_id);

			return sizeof($terroir);
		}

		public function recherche()
		{
			$current_page = $this->input->get("page");
			$terroir_nom = $this->input->get("nom");
			$cp_pseudo = $this->input->get("cp_pseudo");

			$search_criteria["nom"] = $terroir_nom;
			$search_criteria["cp_pseudo"] = $cp_pseudo;
			$search_url = "nom=".$search_criteria["nom"]."&pseudo=".$search_criteria["cp_pseudo"];

			$key = array();
			$operand = array();
			$value = array();

			if($terroir_nom != "")
			{
				array_push($key, "UPPER(t.nom)");
				array_push($operand, "LIKE");
				array_push($value, "UPPER('%".$terroir_nom."%')");
			}

			if($cp_pseudo != "")
			{
				array_push($key, "UPPER(cp.pseudo)");
				array_push($operand, "LIKE");
				array_push($value, "UPPER('%".$cp_pseudo."%')");
			}

			$joinskey = array("chargeprojet cp");
			$joinsrelation = array("ON cp.id = t.cp_id");

			$columns = array("t.*");
			$conditions = array(
				0 => $key,
				1 => $operand,
				2 => $value
			);
			$orderby = "";
			$joins = array(
				0 => $joinskey,
				1 => $joinsrelation
			);
			$tableName = "terroir t LEFT ";

			$this->load->library("Terroir");
			$this->load->model("Terroir_Model");

			$terroirs = $this->Terroir_Model->find($columns, $conditions, $joins, $orderby, $tableName);

			$this->load->library("Pagination");
			$pagination = new Pagination();
			$elements = 10;
			$nbpages = $pagination->getNombrePage($terroirs, $elements);
			$debutpage = $pagination->getDebut($current_page, $elements);

			$pages = $pagination->create($current_page, $nbpages);

			$terroirs = array_slice($terroirs, $debutpage-1, $elements);

			$data["search_criteria"] = $search_criteria;
			$data["search_url"] = $search_url;
			$data["debut"] = $debutpage;
			$data["pages"] = $pages;
			$data["terroirs"] = $terroirs;
			$data["contents"] = "recherche_terroir_View";
			
			$session = $this->session->userdata;
			$template = $session["template"];
			$this->load->view($template, $data);
		}
	}