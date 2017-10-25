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
			$this->load->library("Terroir");
			$this->load->library("Prestataire");
			$this->load->library("AgencePaiement");
			$this->load->library("ChargeProjet");
			
			$this->load->model("Terroir_Model");
			$this->load->model("Dir_Model");
			$this->load->model("District_Model");
			$this->load->model("Prestataire_Model");
			$this->load->model("AgencePaiement_Model");
			$this->load->model("ChargeProjet_Model");

			$id = $this->input->post("id");

			$droit = 0;
			$session = $this->session->userdata;
			if($session["type"] == "admin")
			{
				$droit = 1;
			}
			else
			{
				$user_id = $session["user_id"];
				$droit = $this->droit($user_id, $id);
			}

			try
			{
				if($droit == 1)
				{
					$nom = $this->input->post("nom");
					$dir_id = $this->input->post("dir");
					$district_id = $this->input->post("district");
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

					$libelleAutreIndic = $this->input->post("libelleAutreIndic");
					$prevAutreIndic = $this->input->post("prevAutreIndic");
					$realAutreIndic = $this->input->post("realAutreIndic");
					$observation = $this->input->post("observation");

					$prestatairePlan = $this->input->post("prestatairePlan");
					$prestataireCible = $this->input->post("prestataireCible");
					$prestataireAgec = $this->input->post("prestataireAgec");
					$agencePaiement = $this->input->post("agencePaiement");
					$cp = $this->input->post("cp");

					$terroir = new Terroir();
		
					$terroir->setId($id);
					$terroir->setNom($nom);

					$dir = $this->Dir_Model->findById($dir_id);
					$terroir->setDir($dir);

					$district = $this->District_Model->findById($district_id);
					$terroir->setDistrict($district);

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

					$terroir->setLibelleAutreIndic($libelleAutreIndic);
					$terroir->setPrevAutreIndic($prevAutreIndic);
					$terroir->setRealAutreIndic($realAutreIndic);
					$terroir->setObservation($observation);
				
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
			$this->load->model("GroupeTravail_Model");
			$this->load->model("Intervention_Model");
			$this->load->model("Prestataire_Model");
			$this->load->model("AgencePaiement_Model");
			$this->load->model("ChargeProjet_Model");
			$this->load->model("Phase_Model");

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

				$interventions = $this->Intervention_Model->find($columns, $conditions, $joins, $orderby, $tableName);
				$row->setInterventions($interventions);
			}
			
			$prestataires = $this->Prestataire_Model->findAll();
			$agencePaiements = $this->AgencePaiement_Model->findAll();
			$cps = $this->ChargeProjet_Model->findAll();

			$maxRang = 0;
			foreach ($terroir->getGroupeTravails() as $gt)
			{
				foreach ($gt->getInterventions() as $inter)
				{
					$temp = $inter->getRang();
					if($maxRang < $temp)
					{
						$maxRang = $temp;
					}
				}
			}

			$phases = $this->Phase_Model->findAll(); 
			$etatPhase = array();

			foreach ($phases as $phase)
			{
				$index = $phase->getValeur();
				$etatPhase[$index] = array();

				for($i = 1;$i <= $maxRang;$i++)
				{
					$etatPhase[$index][$i] = array();
				}
				
				foreach ($terroir->getGroupeTravails() as $gt) 
				{
					foreach($gt->getInterventions() as $inter)
					{
						if($phase == $inter->getPhase())
						{
							$rang = $inter->getRang();
							array_push($etatPhase[$index][$rang], $inter);
						}
					}
				}
			}

			$etatBenef = array();
			$etatInapte = array();
			$etatTravailleur = array();

			for($i = 1;$i <= $maxRang;$i++)
			{
				$benef = 0;
				$inapte = 0;
				foreach ($terroir->getGroupeTravails() as $gt)
				{
					foreach ($gt->getInterventions() as $inter)
					{
						if($inter->getRang() == $i)
						{
							$benef += $inter->getNbReelBenef();
							$inapte += $inter->getNbBenefInapte();
							break;
						}
					}
				}
				$etatBenef[0][$i] = $benef;
				$etatInapte[0][$i] = $inapte;
				$etatTravailleur[0][$i] = $benef - $inapte;
			}

			$droit = 0;
			$session = $this->session->userdata;
			if($session["type"] == "admin")
			{
				$droit = 1;
			}
			else
			{
				$user_id = $session["user_id"];
				$droit = $this->droit($user_id, $terroir->getId());
			}

			$data["droit"] = $droit;
			$data["etatTravailleur"] = $etatTravailleur;
			$data["etatInapte"] = $etatInapte;
			$data["etatBenef"] = $etatBenef;
			$data["etatPhase"] = $etatPhase;
			$data["phases"] = $phases;
			$data["max_rang"] = $maxRang;
			$data["cps"] = $cps;
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
			$this->load->library("Terroir");
			$this->load->model("Terroir_Model");
			$this->load->library("Pagination");

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

			$terroirs = $this->Terroir_Model->find($columns, $conditions, $joins, $orderby, $tableName);

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

		public function exportToExcel($id)
		{
			$this->load->library("excel/PHPExcel.php");
			$this->load->model("Terroir_Model");
			$this->load->model("GroupeTravail_Model");
			$this->load->model("Intervention_Model");
			$this->load->model("Paiement_Model");

			$terroir = $this->Terroir_Model->findById($id);

			$key = array();
			$operand = array();
			$value = array();

			array_push($key, "terroir_id");
			array_push($operand, "=");
			array_push($value, $terroir->getId());

			$columns = array("*");
			$conditions = array(
				0 => $key,
				1 => $operand,
				2 => $value
			);
			$joins = array();
			$orderby = "id";
			$tableName = "groupetravail";

			$groupeTravails = $this->GroupeTravail_Model->find($columns, $conditions, $joins, $orderby, $tableName);

			$maxRang = 0;

			foreach ($groupeTravails as $row1)
			{
				$key = array();
				$operand = array();
				$value = array();

				array_push($key, "groupetravail_id");
				array_push($operand, "=");
				array_push($value, $row1->getId());

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
				
				foreach ($interventions as $row2)
				{
					$key = array();
					$operand = array();
					$value = array();

					array_push($key, "intervention_id");
					array_push($operand, "=");
					array_push($value, $row2->getId());

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
					$row2->setPaiements($paiements);
				}

				$row1->setInterventions($interventions);

				foreach ($interventions as $row)
				{
					if($row->getRang() > $maxRang)
					{
						$maxRang = $row->getRang();
					}
				}
			}

			/** Error reporting */
			error_reporting(E_ALL);
			ini_set('display_errors', TRUE);
			ini_set('display_startup_errors', TRUE);
			date_default_timezone_set('Europe/London');

			if (PHP_SAPI == 'cli')
				die('This example should only be run from a Web Browser');

			// Create new PHPExcel object
			$objPHPExcel = new PHPExcel();

			// Set document properties
			$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
										 ->setLastModifiedBy("Maarten Balliauw")
										 ->setTitle("Office 2007 XLSX Test Document")
										 ->setSubject("Office 2007 XLSX Test Document")
										 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
										 ->setKeywords("office 2007 openxml php")
										 ->setCategory("Test result file");

			$entete = array(
				"DIR",
				"DIRSTRICT",
				"UTB",
				"NOM GROUPE DE TRAVAIL (GT)",
				"CODE CHANTIER",
				"PHASE Chantier ACTUELLE",
				"AGEC"
			);

			for($i = 1;$i <= $maxRang;$i++)
			{
				array_push($entete, "Intitulés CHANTIER ou activité - ACTP".$i);
				array_push($entete, "Nature CHANTIER activité - ACTP".$i);
				array_push($entete, "Phase chantier activité- ACTP".$i);
				array_push($entete, "Durée des travaux activité - ACTP".$i);
				array_push($entete, "Date prévue début travaux activité - ACTP".$i);
				array_push($entete, "Date réelle début travaux activité - ACTP".$i);
				array_push($entete, "Date prévue RTX activité - ACTP".$i);
				array_push($entete, "Date réelle RTX activité - ACTP".$i);
				array_push($entete, "Nombre Prév de bénéficiaires  par GT - ACTP".$i);
				array_push($entete, "Nombre Réel de bénéficiaires par GT - ACTP".$i);
				array_push($entete, "Nombre Réel de bénéficiaires apte par GT - ACTP".$i);
				array_push($entete, "dont nombre femmes bénéficiaires apte par GT - ACTP".$i);
				array_push($entete, "dont nombre bénéficiaires inaptes par GT - ACTP".$i);
				array_push($entete, "Nombre Prév d'Hommes jour aptes crées par GT - ACTP".$i);
				array_push($entete, "Nombre Réel d'Hommes jour aptes crées activité - ACTP".$i);
				array_push($entete, "Prévision superficie “traitées” avec mesures CES (Hectare(Ha)) activité - ACTP".$i);
				array_push($entete, "Réalisation superficie “traitées” avec mesures CES (Hectare(Ha)) activité - ACTP".$i);
				array_push($entete, "Prévision  superficie re/boisée par des activités FSP (Hectare(Ha)) activité - ACTP".$i);
				array_push($entete, "Réalisation  superficie re/boisée par des activités FSP (Hectare(Ha)) activité - ACTP".$i);
				array_push($entete, "Libellé autre indicateur à préciser activité - ACTP".$i);
				array_push($entete, "Prévision autre indicateur à préciser activité - ACTP".$i);
				array_push($entete, "Réalisation autre indicateur à préciser activité - ACTP".$i);
				array_push($entete, "Unité des autres indicateurs".$i);
				array_push($entete, "Obsevations sur les indicateurs - ACTP".$i);
			}

			$colonne = "A";
			$ligne = 1;

			$limite = sizeof($entete);
			$sheet = $objPHPExcel->getActiveSheet();

			$borders = array(
	            'allborders' => array(
	                'style' => PHPExcel_Style_Border::BORDER_THIN,
	                'color' => array('rgb' => '000000')
	            )
	        );

			$enteteStyle = array(
		        'fill' => array(
		            'type' => PHPExcel_Style_Fill::FILL_SOLID,
		            'color' => array('rgb' => 'FFF4AA')
		        ),
		        'borders' => $borders
		    );
		
			for($i = 0;$i < $limite;$i++)
			{
				$cellule = $colonne.$ligne;
				$sheet->setCellValue($cellule, $entete[$i]);
				$sheet->getColumnDimension($colonne)->setWidth(10);
				$sheet->getRowDimension($ligne)->setRowHeight(100);
				$sheet->getStyle($cellule)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
															->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)
															->setWrapText(true);
				$sheet->getStyle($cellule)->applyFromArray($enteteStyle);
				$colonne++;
			}
			            
			$ligne = 2;
			$colonne = 'A';
	        foreach ($groupeTravails as $gt)
	        {
	        	$cellule = $colonne.$ligne;
	        	$objPHPExcel->getActiveSheet()
	        				->setCellValue($cellule, $gt->getTerroir()->getDir()->getNom());

	        	$colonne++;
				$cellule = $colonne.$ligne;
	        	$objPHPExcel->getActiveSheet()
	        				->setCellValue($cellule, $gt->getTerroir()->getDistrict()->getNom());

	        	$colonne++;
	        	$cellule = $colonne.$ligne;
	        	$objPHPExcel->getActiveSheet()
	        				->setCellValue($cellule, $gt->getTerroir()->getNom());

	        	$colonne++;
	        	$cellule = $colonne.$ligne;
	        	$objPHPExcel->getActiveSheet()
	        				->setCellValue($cellule, $gt->getNom());

	        	$colonne++;
	        	$cellule = $colonne.$ligne;
	        	$objPHPExcel->getActiveSheet()
	        				->setCellValue($cellule, $gt->getCodeChantier());

	        	$colonne++;
	        	$cellule = $colonne.$ligne;
	        	$objPHPExcel->getActiveSheet()
	        				->setCellValue($cellule, $gt->getPhase());

	        	$colonne++;
	        	$cellule = $colonne.$ligne;
	        	$objPHPExcel->getActiveSheet()
	        				->setCellValue($cellule, $gt->getTerroir()->getPrestataireAgec()->getNom());

	        	foreach ($gt->getInterventions() as $inter) 
	        	{
	        		$colonne++;
	        		$cellule = $colonne.$ligne;
	        		$objPHPExcel->getActiveSheet()
	        				->setCellValue($cellule, $inter->getIntitule()->getNom());

	        		$colonne++;
	        		$cellule = $colonne.$ligne;
	        		$objPHPExcel->getActiveSheet()
	        				->setCellValue($cellule, "");

	        		$colonne++;
	        		$cellule = $colonne.$ligne;
	        		$objPHPExcel->getActiveSheet()
	        				->setCellValue($cellule, $inter->getPhase()->getValeur());

	        		$colonne++;
	        		$cellule = $colonne.$ligne;
	        		$objPHPExcel->getActiveSheet()
	        				->setCellValue($cellule, $inter->getDureeTravaux());

	        		$colonne++;
	        		$cellule = $colonne.$ligne;
	        		$objPHPExcel->getActiveSheet()
	        				->setCellValue($cellule, $inter->getDPrevDebut() ? date("d/m/Y", strtotime($inter->getDPrevDebut())) : "");

	        		$colonne++;
	        		$cellule = $colonne.$ligne;
	        		$objPHPExcel->getActiveSheet()
	        				->setCellValue($cellule, $inter->getDReelDebut() ? date("d/m/Y", strtotime($inter->getDReelDebut())) : "");

	        		$colonne++;
	        		$cellule = $colonne.$ligne;
	        		$objPHPExcel->getActiveSheet()
	        				->setCellValue($cellule, $inter->getDPrevRTX() ? date("d/m/Y", strtotime($inter->getDPrevRTX())) : "");

	        		$colonne++;
	        		$cellule = $colonne.$ligne;
	        		$objPHPExcel->getActiveSheet()
	        				->setCellValue($cellule, $inter->getDReelRTX() ? date("d/m/Y", strtotime($inter->getDReelRTX())) : "");

	        		$colonne++;
	        		$cellule = $colonne.$ligne;
	        		$objPHPExcel->getActiveSheet()
	        				->setCellValue($cellule, $inter->getNbPrevBenef());

	        		$colonne++;
	        		$cellule = $colonne.$ligne;
	        		$objPHPExcel->getActiveSheet()
	        				->setCellValue($cellule, $inter->getNbReelBenef());

	        		$colonne++;
	        		$cellule = $colonne.$ligne;
	        		$objPHPExcel->getActiveSheet()
	        				->setCellValue($cellule, $inter->getNbReelBenefApte());

	        		$colonne++;
	        		$cellule = $colonne.$ligne;
	        		$objPHPExcel->getActiveSheet()
	        				->setCellValue($cellule, $inter->getNbFemmeBenefApte());

	        		$colonne++;
	        		$cellule = $colonne.$ligne;
	        		$objPHPExcel->getActiveSheet()
	        				->setCellValue($cellule, $inter->getNbBenefInapte());

	        		$colonne++;
	        		$cellule = $colonne.$ligne;
	        		$objPHPExcel->getActiveSheet()
	        				->setCellValue($cellule, $inter->getNbPrevHommeJourApte());

	        		$colonne++;
	        		$cellule = $colonne.$ligne;
	        		$objPHPExcel->getActiveSheet()
	        				->setCellValue($cellule, $inter->getNbReelHommeJourApte());

	        		$colonne++;
	        		$cellule = $colonne.$ligne;
	        		$objPHPExcel->getActiveSheet()
	        				->setCellValue($cellule, $inter->getPrevSurfTraiteeCES());

	        		$colonne++;
	        		$cellule = $colonne.$ligne;
	        		$objPHPExcel->getActiveSheet()
	        				->setCellValue($cellule, $inter->getRealSurfTraiteeCES());

	        		$colonne++;
	        		$cellule = $colonne.$ligne;
	        		$objPHPExcel->getActiveSheet()
	        				->setCellValue($cellule, $inter->getPrevSurfBoiseeFSP());

	        		$colonne++;
	        		$cellule = $colonne.$ligne;
	        		$objPHPExcel->getActiveSheet()
	        				->setCellValue($cellule, $inter->getRealSurfBoiseeFSP());

	        		$colonne++;
	        		$cellule = $colonne.$ligne;
	        		$objPHPExcel->getActiveSheet()
	        				->setCellValue($cellule, $inter->getLibelleAutreIndic());

	        		$colonne++;
	        		$cellule = $colonne.$ligne;
	        		$objPHPExcel->getActiveSheet()
	        				->setCellValue($cellule, $inter->getPrevAutreIndic());

	        		$colonne++;
	        		$cellule = $colonne.$ligne;
	        		$objPHPExcel->getActiveSheet()
	        				->setCellValue($cellule, $inter->getRealAutreIndic());

	        		$colonne++;
	        		$cellule = $colonne.$ligne;
	        		$objPHPExcel->getActiveSheet()
	        				->setCellValue($cellule, $inter->getUniteAutreIndic()->getValeur());

	        		$colonne++;
	        		$cellule = $colonne.$ligne;
	        		$objPHPExcel->getActiveSheet()
	        				->setCellValue($cellule, $inter->getObservationIndic());
	        	}

	        	$ligne++;
	        	$colonne = 'A';
	        }

			// Rename worksheet
			$objPHPExcel->getActiveSheet()->setTitle('Suivi chantier&indicateurs');


			// Set active sheet index to the first sheet, so Excel opens this as the first sheet
			$objPHPExcel->setActiveSheetIndex(0);

			// Redirect output to a client’s web browser (Excel5)
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'.$terroir->getNom().'.xls"');
			header('Cache-Control: max-age=0');
			// If you're serving to IE 9, then the following may be needed
			header('Cache-Control: max-age=1');

			// If you're serving to IE over SSL, then the following may be needed
			header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
			header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
			header ('Pragma: public'); // HTTP/1.0

			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			$objWriter->save('php://output');
			exit;
		}
	}