<?php
	require_once("Base_Controller.php");

	class Administration_Controller extends Base_Controller
	{
	 	public function __construct()
	 	{
			parent::__construct();
		}
	 
		public function index()
		{	
			$data["contents"] = "admin_dashboard_View";
		   	$this->load->view('admin_template', $data);
		}
	}