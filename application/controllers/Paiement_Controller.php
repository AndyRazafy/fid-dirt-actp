<?php
	require_once("Base_Controller.php");

	class Paiement_Controller extends Base_Controller
	{
	 	public function __construct()
	 	{
			parent::__construct();
		}
	 
		public function index()
		{	
			
		}

		public function create($intervention_id)
		{
			try
			{
				$this->load->model("Intervention_Model");
				$intervention = $this->Intervention_Model->findbyId($intervention_id);

				$limite = $intervention->getNbPaiement();

				$this->load->library("Paiement");
				$this->load->model("Paiement_Model");
				for($i = 0;$i < $limite;$i++)
				{
					$paiement = new Paiement();
					$paiement->setIntervention($intervention);

					$this->Paiement_Model->save($paiement);
				}
			}
			catch(Exception $e)
			{
				throw $e;
			}
		}

		public function etatPaiement()
		{
			$this->load->library("Pagination");
			$this->load->model("Paiement_Model");

			$cpId = "";

			$session = $this->session->userdata;
			if($session["type"] == "cp")
			{
				$cpId = $session["user_id"];
			}

			$current_page = $this->input->get("page");
			$intervention = $this->input->get("intervention");
			$paiement = $this->input->get("paiement");
			$gtNom = $this->input->get("gtnom");
			$tri = $this->input->get("tri");

			$search_criteria["intervention"] = $intervention;
			$search_criteria["paiement"] = $paiement;
			$search_criteria["gtnom"] = $gtNom;
			$search_criteria["tri"] = $tri;

			$search_url = "intervention=".$search_criteria["intervention"]."&gtnom=".$search_criteria["gtnom"]."&paiement=".$paiement."&tri=".$tri;

			$key = array();
			$operand = array();
			$value = array();

			// if($rang != "" && $rang != "all")
			// {
			// 	array_push($key, "rang");
			// 	array_push($operand, "=");
			// 	array_push($value, $rang);
			// }

			if($cpId != "")
			{
				array_push($key, "t.cp_id");
				array_push($operand, "=");
				array_push($value, $cpId);
			}

			if($intervention != "" && $intervention != "tout")
			{
				array_push($key, "i.rang");
				array_push($operand, "=");
				array_push($value, $intervention);
			}

			if($paiement != "" && $paiement != "tout")
			{
				array_push($key, "p.rang");
				array_push($operand, "=");
				array_push($value, $paiement);
			}

			if($gtNom != "")
			{
				array_push($key, "UPPER(gt.nom)");
				array_push($operand, "LIKE");
				array_push($value, "UPPER('%".$gtNom."%')");
			}

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

			$orderby = $tri;
			$joins = array(
				0 => $joinskey,
				1 => $joinsrelation
			);
			$tableName = "paiement p";

			$paiements = $this->Paiement_Model->find($columns, $conditions, $joins, $orderby, $tableName);

			$pagination = new Pagination();
			$elements = 20;
			$nbpages = $pagination->getNombrePage($paiements, $elements);
			$debutpage = $pagination->getDebut($current_page, $elements);

			$pages = $pagination->create($current_page, $nbpages);

			$paiements = array_slice($paiements, $debutpage-1, $elements);

			$data["search_criteria"] = $search_criteria;
			$data["search_url"] = $search_url;
			//$data["max_rang"] = $maxRang;
			$data["debut"] = $debutpage;
			$data["pages"] = $pages;
			$data["paiements"] = $paiements;
			$data["contents"] = "etat_paiement_View";

			$session = $this->session->userdata;
			$template = $session["template"];
			$this->load->view($template, $data);
		}
	}