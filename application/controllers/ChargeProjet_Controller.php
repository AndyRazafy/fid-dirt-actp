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
	}