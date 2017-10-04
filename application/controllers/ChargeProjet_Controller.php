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
			$data["contents"] = "cp_dashboard_View";
		   	$this->load->view('cp_template', $data);
		}

		public function dashboard()
		{
			$session = $this->session->userdata;
			$user_id = $session["user_id"];
			$template = $session["template"];

			$key = array();
			$operand = array();
			$value = array();

			array_push($key, "cp_id");
			array_push($operand, "=");
			array_push($value, $user_id);

			$columns = array("*");
			$conditions = array(
				0 => $key,
				1 => $operand,
				2 => $value
			);
			$joins = array();
			$orderby = "";
			$tableName = "terroir";

			$this->load->model("Terroir_Model");
			$terroirs = $this->Terroir_Model->find($columns, $conditions, $joins, $orderby, $tableName);

			$count = 0;

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

				$this->load->model("GroupeTravail_Model");
				$groupetravails = $this->GroupeTravail_Model->find($columns, $conditions, $joins, $orderby, $tableName);
				$row->setGroupeTravails($groupetravails);

				$count += sizeof($row->getGroupeTravails());
			}

			$data["nbGt"] = $count;
			$data["terroirs"] = $terroirs;
			$data["contents"] = "cp_dashboard_View";
			$this->load->view($template, $data);
		}
	}