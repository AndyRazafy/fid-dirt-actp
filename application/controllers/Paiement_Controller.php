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

		// public function create()
		// {
		// 	try
		// 	{
		// 		$this->load->model("Intervention_Model");
		// 		$interventions = $this->Intervention_Model->findAll();

		// 		foreach ($interventions as $row)
		// 		{
		// 			$this->load->model("GroupeTravail_Model");
		// 			$groupeTravail = $this->GroupeTravail_Model->findById($row->getGroupeTravail()->getId());

		// 			$this->load->model("Terroir_Model");
		// 			$terroir = $this->Terroir_Model->findById($groupeTravail->getTerroir()->getId());

		// 			$limite = $terroir->getNbPaiement();

		// 			$this->load->library("Paiement");
		// 			$this->load->model("Paiement_Model");
		// 			for($i = 0;$i < $limite;$i++)
		// 			{
		// 				$paiement = new Paiement();
		// 				$paiement->setIntervention($row);

		// 				$this->Paiement_Model->save($paiement);
		// 			}
		// 		}
		// 	}
		// 	catch(Exception $e)
		// 	{
				
		// 	}
		// }

		public function create($intervention_id)
		{
			try
			{
				$this->load->model("Intervention_Model");
				$intervention = $this->Intervention_Model->findbyId($intervention_id);

				$this->load->model("GroupeTravail_Model");
				$groupeTravail = $this->GroupeTravail_Model->findById($intervention->getGroupeTravail()->getId());

				$this->load->model("Terroir_Model");
				$terroir = $this->Terroir_Model->findById($groupeTravail->getTerroir()->getId());

				$limite = $terroir->getNbPaiement();

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

		// public function create()
		// {
		// 	try
		// 	{
		// 		$this->load->model("Intervention_Model");
		// 		$interventions = $this->Intervention_Model->findAll();

		// 		$this->load->model("Paiement_Model");

		// 		foreach ($interventions as $row)
		// 		{
		// 			$key = array();
		// 			$operand = array();
		// 			$value = array();

		// 			array_push($key, "intervention_id");
		// 			array_push($operand, "=");
		// 			array_push($value, $row->getId());

		// 			$columns = array("p.*");
		// 			$conditions = array(
		// 				0 => $key,
		// 				1 => $operand,
		// 				2 => $value
		// 			);

		// 			$orderby = "";
		// 			$joins = array();
		// 			$tableName = "paiement p";

		// 			$paiements = $this->Paiement_Model->find($columns, $conditions, $joins, $orderby, $tableName);

		// 			$rang = 1;
		// 			foreach ($paiements as $p)
		// 			{
		// 				$p->setRang($rang);
		// 				$this->Paiement_Model->update($p);
						
		// 				$rang++;
		// 			}
		// 		}
		// 	}
		// 	catch(Exception $e)
		// 	{
		// 		throw $e;
		// 	}
		// }
	}