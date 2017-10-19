<?php
	require_once("Base_Controller.php");

	class Intervention_Controller extends Base_Controller
	{
	 	public function __construct()
	 	{
			parent::__construct();
		}
	 
		public function index()
		{	
			
		}

		public function create()
		{
			$gtId = $this->input->post("gtid");
			$nbPaiement = $this->input->post("nbpaiement");
			$phaseId = $this->input->post("phaseid");
			$rang = $this->input->post("rang");

			$droit = 0;
			$session = $this->session->userdata;
			if($session["type"] == "admin")
			{
				$droit = 1;
			}
			else
			{
				$user_id = $session["user_id"];
				$droit = $this->droit($user_id, $gtId);
			}

			try
			{
				if($droit == 1)
				{
					$this->load->model("GroupeTravail_Model");
					$groupeTravail = $this->GroupeTravail_Model->findById($gtId);

					$this->load->model("Phase_Model");
					$phase = $this->Phase_Model->findById($phaseId);

					$this->load->library("Intervention");
					$this->load->model("Intervention_Model");

					$intervention = new Intervention();
					$intervention->setGroupeTravail($groupeTravail);
					$intervention->setPhase($phase);
					$intervention->setRang($rang);

					$intervention->setDureeTravaux(0);

					$intervention->setNbPrevBenef(0);
					$intervention->setNbReelBenef(0);
					$intervention->setNbReelBenefApte(0);
					$intervention->setNbFemmeBenefApte(0);
					$intervention->setNbBenefInapte(0);
					$intervention->setNbPrevHommeJourApte(0);
					$intervention->setNbReelHommeJourApte(0);
					
					$intervention->setPrevSurfTraiteeCES(0);
					$intervention->setRealSurfTraiteeCES(0);
					$intervention->setPrevSurfBoiseeFSP(0);
					$intervention->setRealSurfBoiseeFSP(0);

					$intervention->setPrevAutreIndic(0);
					$intervention->setRealAutreIndic(0);

					$this->load->model("Intitule_Model");
					$intitule = $this->Intitule_Model->findById(1);
					$intervention->setIntitule($intitule);

					$this->load->model("Unite_Model");
					$unite = $this->Unite_Model->findById(1);
					$intervention->setUniteAutreIndic($unite);
					
					$this->Intervention_Model->save($intervention);
					$intervention->setId($this->db->insert_id());

					$limite = $nbPaiement;

					$this->load->library("Paiement");
					$this->load->model("Paiement_Model");
					for($i = 0;$i < $limite;$i++)
					{
						$paiement = new Paiement();
						$paiement->setRang($i+1);
						$paiement->setIntervention($intervention);

						$this->Paiement_Model->save($paiement);
					}

					$this->session->set_flashdata("info", "<div class='alert alert-success'><strong>Creation ACTP".$rang." avec succes</strong></div>");
					redirect("GroupeTravail_Controller/fiche/".$gtId);
				}
				else
				{
					throw new Exception("Suppression interrompue. Vous ne disposez pas des droits pour creer ce groupe de travail.");
				}
			}
			catch(Exception $e)
			{
				$this->session->set_flashdata("info", "<div class='alert alert-danger'><strong>".$e->getMessage()."</strong></div>");
				redirect("GroupeTravail_Controller/fiche/".$intervention->getGroupeTravail()->getId());
			}
		}

		public function update($id)
		{
			$id = $this->input->post("id");

			$this->load->model("Intervention_Model");
			$intervention = $this->Intervention_Model->findById($id);

			$droit = 0;
			$session = $this->session->userdata;
			if($session["type"] == "admin")
			{
				$droit = 1;
			}
			else
			{
				$user_id = $session["user_id"];
				$droit = $this->droit($user_id, $intervention->getGroupeTravail()->getId());
			}

			try
			{
				if($droit == 1)
				{
					$intitule_id = $this->input->post("intitule");
					$intitules = $this->input->post("intitule_liste");
					$paiements = $this->input->post("paiements");

					$phase_id = $this->input->post("phase");
					$dureeTravaux = $this->input->post("dureeTravaux");
					
					$dPrevDebut = $this->input->post("dPrevDebut");
					$dReelDebut = $this->input->post("dReelDebut");
					$dPrevRXT = $this->input->post("dPrevRXT");
					$dReelRXT = $this->input->post("dReelRXT");
					
					$nbPrevBenef = $this->input->post("nbPrevBenef");
					$nbReelBenef = $this->input->post("nbReelBenef");
					$nbReelBenefApte = $this->input->post("nbReelBenefApte");
					$nbFemmeBenefApte = $this->input->post("nbFemmeBenefApte");
					$nbBenefInapte = $this->input->post("nbBenefInapte");
					$nbPrevHommeJourApte = $this->input->post("nbPrevHommeJourApte");
					$nbReelHommeJourApte = $this->input->post("nbReelHommeJourApte");

					$prevSurfTraiteeCes = $this->input->post("prevSurfTraiteeCES");
					$realSurfTraiteeCes = $this->input->post("realSurfTraiteeCES");
					$prevSurfReboiseeFsp = $this->input->post("prevSurfBoiseeFSP");
					$realSurfReboiseeFsp = $this->input->post("realSurfBoiseeFSP");

					$libelleAutreIndic = $this->input->post("libelleAutreIndic");
					$prevAutreIndic = $this->input->post("prevAutreIndic");
					$realAutreIndic = $this->input->post("realAutreIndic");

					$uniteAutreIndic = $this->input->post("uniteAutreIndic");
					$observation = $this->input->post("observationIndic");

					$intervention->setId($id);
					$intervention->setDureeTravaux($dureeTravaux);
					
					$intervention->setDPrevDebut($dPrevDebut);
					$intervention->setDReelDebut($dReelDebut);
					$intervention->setDPrevRTX($dPrevRXT);
					$intervention->setDReelRTX($dReelRXT);

					$intervention->setNbPrevBenef($nbPrevBenef);
					$intervention->setNbReelBenef($nbReelBenef);
					$intervention->setNbReelBenefApte($nbReelBenefApte);
					$intervention->setNbFemmeBenefApte($nbFemmeBenefApte);
					$intervention->setNbBenefInapte($nbBenefInapte);
					$intervention->setNbPrevHommeJourApte($nbPrevHommeJourApte);
					$intervention->setNbReelHommeJourApte($nbReelHommeJourApte);
					
					$intervention->setPrevSurfTraiteeCES($prevSurfTraiteeCes);
					$intervention->setRealSurfTraiteeCES($realSurfTraiteeCes);
					$intervention->setPrevSurfBoiseeFSP($prevSurfReboiseeFsp);
					$intervention->setRealSurfBoiseeFSP($realSurfReboiseeFsp);

					$intervention->setLibelleAutreIndic($libelleAutreIndic);
					$intervention->setPrevAutreIndic($prevAutreIndic);
					$intervention->setRealAutreIndic($realAutreIndic);
					$intervention->setObservationIndic($observation);

					$this->load->model("Intitule_Model");
					$intitule = $this->Intitule_Model->findById($intitule_id);
					$intervention->setIntitule($intitule);

					$this->load->model("Paiement_Model");
					foreach ($paiements as $row)
					{
						$paiement = $this->Paiement_Model->findById($row["id"][0]);

						$paiement->setDatePrevue($row["prev"][0]);
						$paiement->setDateReelle($row["reel"][0]);

						$this->Paiement_Model->update($paiement);
					}
					
					$this->load->model("Phase_Model");
					if($intervention->getDReelDebut() != null)
					{
						// phase : RT
						$phase = $this->Phase_Model->findById(4);
						$intervention->setPhase($phase);
					}
					if($intervention->getDReelRTX() != null)
					{
						// phase : RTX
						$phase = $this->Phase_Model->findById(3);
						$intervention->setPhase($phase);
					}

					$this->load->model("Unite_Model");
					$unite = $this->Unite_Model->findById($uniteAutreIndic);
					$intervention->setUniteAutreIndic($unite);

					$this->load->model("Intervention_Model");
					$this->Intervention_Model->update($intervention);

					$this->session->set_flashdata("info", "<div class='alert alert-success'><strong>Modification ACTP".$intervention->getRang()." avec succes</strong></div>");
					redirect("GroupeTravail_Controller/fiche/".$intervention->getGroupeTravail()->getId());
				}
				else
				{
					throw new Exception("Modification interrompue. Vous ne disposez pas des droits pour modifier ce groupe de travail.");
				}
			}
			catch(Exception $e)
			{
				$this->session->set_flashdata("info", "<div class='alert alert-danger'><strong>".$e->getMessage()."</strong></div>");
				redirect("GroupeTravail_Controller/fiche/".$intervention->getGroupeTravail()->getId());
			}
		}

		public function delete($id)
		{
			$this->load->model("Intervention_Model");
			$this->load->model("Paiement_Model");
			$intervention = $this->Intervention_Model->findById($id);

			$droit = 0;
			$session = $this->session->userdata;
			if($session["type"] == "admin")
			{
				$droit = 1;
			}
			else
			{
				$user_id = $session["user_id"];
				$droit = $this->droit($user_id, $intervention->getGroupeTravail()->getId());
			}

			try
			{
				if($droit == 1)
				{
					$key = array();
					$operand = array();
					$value = array();

					array_push($key, "intervention_id");
					array_push($operand, "=");
					array_push($value, $intervention->getId());

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

					foreach ($paiements as $row)
					{
						$this->Paiement_Model->delete($row);
					}
					
					$this->Intervention_Model->delete($intervention);

					$this->session->set_flashdata("info", "<div class='alert alert-success'><strong>Suppresion ACTP".$rang." avec succes</strong></div>");
					redirect("GroupeTravail_Controller/fiche/".$intervention->getGroupeTravail()->getId());
				}
				else
				{
					throw new Exception("Suppression interrompue. Vous ne disposez pas des droits pour supprimer cette intervention.");
				}
			}
			catch(Exception $e)
			{
				$this->session->set_flashdata("info", "<div class='alert alert-danger'><strong>".$e->getMessage()."</strong></div>");
				redirect("GroupeTravail_Controller/fiche/".$intervention->getGroupeTravail()->getId());
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

		public function etatPhase()
		{
			$this->load->model("Intervention_Model");
			$this->load->model("Phase_Model");
			
			$interventions = $this->Intervention_Model->findAll();  

			$maxRang = 0;
			foreach ($interventions as $row)
			{
				$temp = $row->getRang();
				if($maxRang < $temp)
				{
					$maxRang = $temp;
				}
			}

			$phases = $this->Phase_Model->findAll(); 

			$etat = array();

			foreach ($phases as $row1)
			{
				$index = $row1->getValeur();
				$etat[$index] = array();

				for($i = 1;$i <= $maxRang;$i++)
				{
					$etat[$index][$i] = array();
				}
				
				foreach($interventions as $row2)
				{
					if($row1 == $row2->getPhase())
					{
						$rang = $row2->getRang();
						array_push($etat[$index][$rang], $row2);
					}
				}
			}

			$data["etat"] = $etat;
			$data["phases"] = $phases;
			$data["max_rang"] = $maxRang;
			$data["contents"] = "etat_phase_View";

			$session = $this->session->userdata;
			$template = $session["template"];
			$this->load->view($template, $data);
		}
	}