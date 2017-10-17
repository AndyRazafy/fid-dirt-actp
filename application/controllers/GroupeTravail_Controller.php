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
			$this->load->model("Terroir_Model");
			$this->load->model("GroupeTravail_Model");
			$this->load->model("GroupeTravail_Model");

			$id = $this->input->post("id");

			$groupeTravail = $this->GroupeTravail_Model->findById($id);

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
					$codeChantier = $this->input->post("codechantier");
					$terroir_id = $this->input->post("terroir");
					$phase_id = $this->input->post("phase");	

					$groupeTravail->setId($id);
					$groupeTravail->setNom($nom);
					$groupeTravail->setCodeChantier($codeChantier);
					
					$groupeTravail->setTerroir($this->Terroir_Model->findById($terroir_id));
				
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
				$this->load->library("Pagination");
				$this->load->model("GroupeTravail_Model");
				$this->load->model("Intervention_Model");
				$this->load->model("Paiement_Model");
				$this->load->model("Phase_Model");
				$this->load->model("Unite_Model");
				$this->load->model("Intitule_Model");

				$gt = $this->GroupeTravail_Model->findById($id);

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

				$phases = $this->Phase_Model->findAll();

				$key = array();
				$operand = array();
				$value = array();

				array_push($key, "terroir_id");
				array_push($operand, "=");
				array_push($value, $gt->getTerroir()->getId());

				$unites = $this->Unite_Model->findAll();

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

				$pagination = new Pagination();

				$suivant = $pagination->suivant($liste, $gt);
				$precedent = $pagination->precedent($liste, $gt);

				$droit = 0;
				$session = $this->session->userdata;
				if($session["type"] == "admin")
				{
					$droit = 1;
				}
				else
				{
					$user_id = $session["user_id"];
					$droit = $this->droit($user_id, $gt->getId());
				}

				$data["droit"] = $droit;
				$data["suivant"] = $suivant->getId();
				$data["precedent"] = $precedent->getId();
				$data["intervention_rang_suiv"] = sizeof($interventions) + 1;
				$data["phases"] = $phases;
				$data["intitules"] = $intitules;
				$data["unites"] = $unites;
				$data["interventions"] = $interventions;
				$data["derniere_intervention"] = end($interventions);
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
			$this->load->model("Terroir_Model");
			
			$gt = $this->GroupeTravail_Model->findById($gt_id);
			$terroir = $this->Terroir_Model->droit($user_id, $gt->getTerroir()->getId());

			return sizeof($terroir);
		}

		public function recherche()
		{
			$this->load->library("GroupeTravail");
			$this->load->model("GroupeTravail_Model");
			$this->load->model("Intervention_Model");
			$this->load->library("Pagination");

			$current_page = $this->input->get("page");
			$gt_nom = $this->input->get("gt_nom");
			$gt_codechantier = $this->input->get("gt_codechantier");
			$terroir_nom = $this->input->get("terroir_nom");
			$agec_nom = $this->input->get("agec_nom");
			$cp_pseudo = $this->input->get("cp_pseudo");
			$tri = $this->input->get("tri");

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

		public function exportToExcel()
		{
			$this->load->library("excel/PHPExcel.php");
			$this->load->model("GroupeTravail_Model");
			$this->load->model("Intervention_Model");
			$this->load->model("Paiement_Model");

			$key = array();
			$operand = array();
			$value = array();

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
			header('Content-Disposition: attachment;filename="BDD ACTP DIRT.xls"');
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