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
			$data["contents"] = "cp_dashboard_View";
			$this->load->view($template, $data);
		}
	}