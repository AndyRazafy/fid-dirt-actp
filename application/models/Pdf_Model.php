<?php
	require_once("Base_Model.php");

	class Pdf_Model extends Base_Model
	{
	
		function __construct() 
		{
			parent::__construct();
		}
		
		public function get_data_pdf($idclient)
		{
			$sql = "select idclient, nom, prenom, nomta, nomaction, nomemploye, dateappel, dureeappel, dateaction, commentaireaction from detailappel where idclient=$idclient";
			$query = $this->db->query($sql);
			$retour = $query->result();
			return $retour;
		}


		
		public function get_table_pdf()
		{
			$pdf = new PDFTABLE('L', 'mm', array(300, 200));
			$header = array('Nom', 'Prenom', 'Email', 'Date Appel', 'duree', 'Client', 'Numero', 'Action');

			$this->load->model('AgentAppel_Model');

			for($i = 1;$i<=30;$i++)
			{
				$this->load->model('Agent_Model');
				$agent = $this->Agent_Model->findById($i);
				$data = $this->AgentAppel_Model->findByAgentId($agent->getId());
				$pdf->AddPage();
				$pdf->SetFont('Arial', '', 10);

				$pdf->FancyTable($header, $data);
			}
			$pdf->Output();
		}
	}

	class PDFTABLE extends FPDF 
	{
		function FancyTable($header, $data) 
		{
			$this->Cell(0, 10, "", 0, 0, 'L');
			$this->Ln();
			$this->SetFillColor(101,171,119);
			$this->SetTextColor(255);
			$this->SetDrawColor(128,0,0);
			$this->SetLineWidth(.3);
			$this->SetFont('','B');
	    
			$w = array(25, 25, 55, 40, 20, 35, 35, 45);
			for($i = 0; $i < count($header); $i++) $this->Cell($w[$i],8,$header[$i],1,0,'C',true);
			$this->Ln();
	    
			$this->SetFillColor(224,235,255);
			$this->SetTextColor(0);
			$this->SetFont('');
	    
			$fill = false;
			foreach($data as $row) 
			{
				$this->Cell($w[0],6,$row->getNom(),'LR',0,'L',$fill);
				$this->Cell($w[1],6,$row->getPrenom(),'LR',0,'L',$fill);
				$this->Cell($w[2],6,$row->getEmail().' s','LR',0,'L',$fill);
				$this->Cell($w[3],6,$row->getDateAppel(),'LR',0,'L',$fill);
				$this->Cell($w[4],6,$row->getDuree(),'LR',0,'L',$fill);
				$this->Cell($w[5],6,$row->getClient(),'LR',0,'L',$fill);
				$this->Cell($w[6],6,$row->getNumero(),'LR',0,'L',$fill);
				$this->Cell($w[7],6,$row->getAction(),'LR',0,'L',$fill);
				$this->Ln();
				$fill = !$fill;
			}
	    
			$this->Cell(array_sum($w),0,'','T');
		}
	}