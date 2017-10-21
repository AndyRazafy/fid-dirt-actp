<?php
	require_once("BaseModele.php");

	class Terroir extends BaseModele
	{
		private $nom;
		private $dir;
		private $district;
		private $nbBenef;
		private $nbInapte;
		private $nbsa;
		
		private $dpEngPlan;
		private $drEngPlan;
		private $codemarchePlan;
		private $dpFinPlan;
		private $drFinPlan;
		private $montantReelPlan;
		private $dpApprobPamo;
		private $drApprobPamo;
		private $montantTotalPamo;
		
		private $dpEngCible;
		private $drEngCible;
		private $codemarcheCible;
		private $dpFinCible;
		private $drFinCible;
		private $montantReelCible;
		private $dValidCom;

		private $dpEngAgec;
		private $drEngAgec;
		private $codemarcheAgec;
		private $dpFinAgec;
		private $drFinAgec;
		private $montantTotalAgec;
		private $montantTotalConfieAgec;

		private $codemarchePaie;
		private $montantReelPaie;

		private $prevSurfTraiteeCes;
		private $realSurfTraiteeCes;
		private $prevSurfBoiseeFsp;
		private $realSurfBoiseeFsp;

		private $libelleAutreIndic;
		private $prevAutreIndic;
		private $realAutreIndic;
		private $observation;

		private $prestatairePlan;
		private $prestataireCible;
		private $prestataireAgec;
		private $agencePaiement;

		private $cp;

		private $groupeTravails;

		public static function init($data)
		{
			$CI =& get_instance();
			$CI->load->library('Prestataire');
			$CI->load->library('AgencePaiement');
			$CI->load->library('ChargeProjet');
			$CI->load->model("Dir_Model");
			$CI->load->model("District_Model");
			$CI->load->model('Prestataire_Model');
			$CI->load->model('AgencePaiement_Model');
			$CI->load->model('ChargeProjet_Model');

			$array = array();
			foreach ($data as $row)
			{
				$terroir = new Terroir();
				$terroir->setId($row->id);
				$terroir->setNom($row->nom);

				$dir = $CI->Dir_Model->findById($row->dir_id);
				$terroir->setDir($dir);
				
				$district = $CI->District_Model->findById($row->district_id);
				$terroir->setDistrict($district);

				if($row->prestataireplan_id != null)
				{
					$prestatairePlan = $CI->Prestataire_Model->findById($row->prestataireplan_id);
					$terroir->setPrestatairePlan($prestatairePlan);
				}
				else
					$terroir->setPrestatairePlan(new Prestataire());

				if($row->prestatairecible_id != null)
				{
					$prestataireCible = $CI->Prestataire_Model->findById($row->prestatairecible_id);
					$terroir->setPrestataireCible($prestataireCible);
				}
				else
					$terroir->setPrestataireCible(new Prestataire());

				if($row->prestataireagec_id != null)
				{
					$prestataireAgec = $CI->Prestataire_Model->findById($row->prestataireagec_id);
					$terroir->setPrestataireAgec($prestataireAgec);
				}
				else
					$terroir->setPrestataireAgec(new Prestataire());

				if($row->agencepaiement_id != null)
				{
					$agencePaiement = $CI->AgencePaiement_Model->findById($row->agencepaiement_id);
					$terroir->setAgencePaiement($agencePaiement);
				}
				else
					$terroir->setAgencePaiement(new AgencePaiement());

				if($row->cp_id != null)
				{
					$cp = $CI->ChargeProjet_Model->findById($row->cp_id);
					$terroir->setCp($cp);
				}
				else
					$terroir->setCp(new ChargeProjet());
				
				$terroir->setNbsa($row->nbsa);
				
				$terroir->setDpEngPlan($row->dpengplan);
				$terroir->setDrEngPlan($row->drengplan);
				$terroir->setCodemarchePlan($row->codemarcheplan);
				$terroir->setDpFinPlan($row->dpfinplan);
				$terroir->setDrFinPlan($row->drfinplan);
				$terroir->setMontantReelPlan($row->montantreelplan);
				$terroir->setDpApprobPamo($row->dpapprobpamo);
				$terroir->setDrApprobPamo($row->drapprobpamo);
				$terroir->setMontantTotalPamo($row->montanttotalpamo);

				$terroir->setDpEngCible($row->dpengcible);
				$terroir->setDrEngCible($row->drengcible);
				$terroir->setCodemarcheCible($row->codemarchecible);
				$terroir->setDpFinCible($row->dpfincible);
				$terroir->setMontantReelCible($row->montantreelcible);
				$terroir->setDValidCom($row->dvalidcom);

				$terroir->setDpEngAgec($row->dpengagec);
				$terroir->setDrEngAgec($row->drengagec);
				$terroir->setCodemarcheAgec($row->codemarcheagec);
				$terroir->setDpFinAgec($row->dpfinagec);
				$terroir->setMontantTotalAgec($row->montanttotalagec);
				$terroir->setMontantTotalConfieAgec($row->montanttotalconfieagec);

				$terroir->setCodemarchePaie($row->codemarchepaie);
				$terroir->setMontantReelPaie($row->montantreelpaie);

				$terroir->setLibelleAutreIndic($row->libelleautreindic);
				$terroir->setPrevAutreIndic($row->prevautreindic);
				$terroir->setRealAutreIndic($row->realautreindic);
				$terroir->setObservation($row->observationindic);

				array_push($array, $terroir);
			}

			return $array;
		}

		public function getNom(){
			return $this->nom;
		}

		public function setNom($nom){
			$this->nom = $nom;
		}

		public function getDir(){
			return $this->dir;
		}

		public function setDir($dir){
			$this->dir = $dir;
		}

		public function getDistrict(){
			return $this->district;
		}

		public function setDistrict($district){
			$this->district = $district;
		}

		public function getNbBenef(){
			if($this->nbBenef != null)
			{
				return $this->nbBenef;
			}
			else
			{
				$nb = 0;
				foreach ($this->getGroupeTravails() as $gt)
				{
					foreach ($gt->getInterventions() as $inter)
					{
						$nb += $inter->getNbReelBenef();
					}
				}
				$this->nbBenef = $nb;
				return $this->nbBenef;
			}
		}

		public function setNbBenef($nbBenef){
			$this->nbBenef = $nbBenef;
		}

		public function getNbInapte(){
			if($this->nbInapte != null)
			{
				return $this->nbInapte;
			}
			else
			{
				$nb = 0;
				foreach ($this->getGroupeTravails() as $gt)
				{
					foreach ($gt->getInterventions() as $inter)
					{
						$nb += $inter->getNbBenefInapte();
					}
				}
				$this->nbInapte = $nb;
				return $this->nbInapte;
			}
		}

		public function setNbInapte($nbInapte){
			$this->nbInapte = $nbInapte;
		}

		public function getNbsa(){
			return $this->nbsa;
		}

		public function setNbsa($nbsa){
			$this->nbsa = $nbsa;
		}

		public function getDpEngPlan(){
			if($this->dpEngPlan != null)
				return $this->dpEngPlan;
			else
				return null;
		}

		public function setDpEngPlan($dpEngPlan){
			$this->dpEngPlan = $dpEngPlan;
		}

		public function getDrEngPlan(){
			if($this->drEngPlan != null)
				return $this->drEngPlan;
			else
				return null;
		}

		public function setDrEngPlan($drEngPlan){
			$this->drEngPlan = $drEngPlan;
		}

		public function getCodemarchePlan(){
			return $this->codemarchePlan;
		}

		public function setCodemarchePlan($codemarchePlan){
			$this->codemarchePlan = $codemarchePlan;
		}

		public function getDpFinPlan(){
			if($this->dpFinPlan != null)
				return $this->dpFinPlan;
			else
				return null;
		}

		public function setDpFinPlan($dpFinPlan){
			$this->dpFinPlan = $dpFinPlan;
		}

		public function getDrFinPlan(){
			if($this->drFinPlan != null)
				return $this->drFinPlan;
			else
				return null;
		}

		public function setDrFinPlan($drFinPlan){
			$this->drFinPlan = $drFinPlan;
		}

		public function getMontantReelPlan(){
			return $this->montantReelPlan;
		}

		public function setMontantReelPlan($montantReelPlan){
			$this->montantReelPlan = $montantReelPlan;
		}

		public function getDpApprobPamo(){
			if($this->dpApprobPamo != null)
				return $this->dpApprobPamo;
			else
				return null;
		}

		public function setDpApprobPamo($dpApprobPamo){
			$this->dpApprobPamo = $dpApprobPamo;
		}

		public function getDrApprobPamo(){
			if($this->drApprobPamo != null)
				return $this->drApprobPamo;
			else
				return null;
		}

		public function setDrApprobPamo($drApprobPamo){
			$this->drApprobPamo = $drApprobPamo;
		}

		public function getMontantTotalPamo(){
			return $this->montantTotalPamo;
		}

		public function setMontantTotalPamo($montantTotalPamo){
			$this->montantTotalPamo = $montantTotalPamo;
		}

		public function getDpEngCible(){
			if($this->dpEngCible != null)
				return $this->dpEngCible;
			else
				return null;
		}

		public function setDpEngCible($dpEngCible){
			$this->dpEngCible = $dpEngCible;
		}

		public function getDrEngCible(){
			if($this->drEngCible != null)
				return $this->drEngCible;
			else
				return null;
		}

		public function setDrEngCible($drEngCible){
			$this->drEngCible = $drEngCible;
		}

		public function getCodemarcheCible(){
			return $this->codemarcheCible;
		}

		public function setCodemarcheCible($codemarcheCible){
			$this->codemarcheCible = $codemarcheCible;
		}

		public function getDpFinCible(){
			if($this->dpFinCible != null)
				return $this->dpFinCible;
			else
				return null;
		}

		public function setDpFinCible($dpFinCible){
			$this->dpFinCible = $dpFinCible;
		}

		public function getDrFinCible(){
			if($this->drFinCible != null)
				return $this->drFinCible;
			else
				return null;
		}

		public function setDrFinCible($drFinCible){
			$this->drFinCible = $drFinCible;
		}

		public function getMontantReelCible(){
			return $this->montantReelCible;
		}

		public function setMontantReelCible($montantReelCible){
			$this->montantReelCible = $montantReelCible;
		}

		public function getDValidCom(){
			if($this->dValidCom != null)
				return $this->dValidCom;
			else
				return null;
		}

		public function setDValidCom($dValidCom){
			$this->dValidCom = $dValidCom;
		}

		public function getDpEngAgec(){
			if($this->dpEngAgec != null)
				return $this->dpEngAgec;
			else
				return null;
		}

		public function setDpEngAgec($dpEngAgec){
			$this->dpEngAgec = $dpEngAgec;
		}

		public function getDrEngAgec(){
			if($this->drEngAgec != null)
				return $this->drEngAgec;
			else
				return null;
		}

		public function setDrEngAgec($drEngAgec){
			$this->drEngAgec = $drEngAgec;
		}

		public function getCodemarcheAgec(){
			return $this->codemarcheAgec;
		}

		public function setCodemarcheAgec($codemarcheAgec){
			$this->codemarcheAgec = $codemarcheAgec;
		}

		public function getDpFinAgec(){
			if($this->dpFinAgec != null)
				return $this->dpFinAgec;
			else
				return null;
		}

		public function setDpFinAgec($dpFinAgec){
			$this->dpFinAgec = $dpFinAgec;
		}

		public function getDrFinAgec(){
			if($this->drFinAgec != null)
				return $this->drFinAgec;
			else
				return null;
		}

		public function setDrFinAgec($drFinAgec){
			$this->drFinAgec = $drFinAgec;
		}

		public function getMontantTotalAgec(){
			return $this->montantTotalAgec;
		}

		public function setMontantTotalAgec($montantTotalAgec){
			$this->montantTotalAgec = $montantTotalAgec;
		}

		public function getMontantTotalConfieAgec(){
			return $this->montantTotalConfieAgec;
		}

		public function setMontantTotalConfieAgec($montantTotalConfieAgec){
			$this->montantTotalConfieAgec = $montantTotalConfieAgec;
		}

		public function getCodemarchePaie(){
			return $this->codemarchePaie;
		}

		public function setCodemarchePaie($codemarchePaie){
			$this->codemarchePaie = $codemarchePaie;
		}

		public function getMontantReelPaie(){
			return $this->montantReelPaie;
		}

		public function setMontantReelPaie($montantReelPaie){
			$this->montantReelPaie = $montantReelPaie;
		}

		public function getPrevSurfTraiteeCes()
		{
			$nb = 0;
			foreach ($this->getGroupeTravails() as $gt)
			{
				foreach ($gt->getInterventions() as $inter)
				{
					$nb += $inter->getPrevSurfTraiteeCes();
				}
			}
			return $nb;
		}

		public function setPrevSurfTraiteeCes($prevSurfTraiteeCes){
			$this->prevSurfTraiteeCes = $prevSurfTraiteeCes;
		}

		public function getRealSurfTraiteeCes()
		{
			$nb = 0;
			foreach ($this->getGroupeTravails() as $gt)
			{
				foreach ($gt->getInterventions() as $inter)
				{
					$nb += $inter->getRealSurfTraiteeCes();
				}
			}
			return $nb;
		}

		public function setRealSurfTraiteeCes($realSurfTraiteeCes){
			$this->realSurfTraiteeCes = $realSurfTraiteeCes;
		}

		public function getPrevSurfBoiseeFsp()
		{
			$nb = 0;
			foreach ($this->getGroupeTravails() as $gt)
			{
				foreach ($gt->getInterventions() as $inter)
				{
					$nb += $inter->getPrevSurfBoiseeFSP();
				}
			}
			return $nb;
		}

		public function setPrevSurfBoiseeFsp($prevSurfBoiseeFsp){
			$this->prevSurfBoiseeFsp = $prevSurfBoiseeFSP;
		}

		public function getRealSurfBoiseeFsp()
		{
			$nb = 0;
			foreach ($this->getGroupeTravails() as $gt)
			{
				foreach ($gt->getInterventions() as $inter)
				{
					$nb += $inter->getRealSurfBoiseeFSP();
				}
			}
			return $nb;
		}

		public function setRealSurfBoiseeFsp($realSurfBoiseeFsp){
			$this->realSurfBoiseeFsp = $realSurfBoiseeFsp;
		}

		public function getLibelleAutreIndic(){
			return $this->libelleAutreIndic;
		}

		public function setLibelleAutreIndic($libelleAutreIndic){
			$this->libelleAutreIndic = $libelleAutreIndic;
		}

		public function getPrevAutreIndic(){
			return $this->prevAutreIndic;
		}

		public function setPrevAutreIndic($prevAutreIndic){
			$this->prevAutreIndic = $prevAutreIndic;
		}

		public function getRealAutreIndic(){
			return $this->realAutreIndic;
		}

		public function setRealAutreIndic($realAutreIndic){
			$this->realAutreIndic = $realAutreIndic;
		}

		public function getObservation(){
			return $this->observation;
		}

		public function setObservation($observation){
			$this->observation = $observation;
		}

		public function getPrestataireAgec(){
			return $this->prestataireAgec;
		}

		public function setPrestataireAgec($prestataireAgec){
			$this->prestataireAgec = $prestataireAgec;
		}

		public function getPrestatairePlan(){
			return $this->prestatairePlan;
		}

		public function setPrestatairePlan($prestatairePlan){
			$this->prestatairePlan = $prestatairePlan;
		}

		public function getPrestataireCible(){
			return $this->prestataireCible;
		}

		public function setPrestataireCible($prestataireCible){
			$this->prestataireCible = $prestataireCible;
		}

		public function getAgencePaiement(){
			return $this->agencePaiement;
		}

		public function setAgencePaiement($agencePaiement){
			$this->agencePaiement = $agencePaiement;
		}

		public function getCp(){
			return $this->cp;
		}

		public function setCp($cp){
			$this->cp = $cp;
		}

		public function getNbPrevHommeJourApte()
		{
			$nb = 0;
			foreach ($this->getGroupeTravails() as $gt)
			{
				foreach ($gt->getInterventions() as $inter)
				{
					$nb += $inter->getNbPrevHommeJourApte();
				}
			}
			return $nb;
		}

		public function getNbReelHommeJourApte()
		{
			$nb = 0;
			foreach ($this->getGroupeTravails() as $gt)
			{
				foreach ($gt->getInterventions() as $inter)
				{
					$nb += $inter->getNbReelHommeJourApte();
				}
			}
			return $nb;
		}

		public function setGroupeTravails($groupeTravails)
		{
			$this->groupeTravails = $groupeTravails;
		}

		public function getGroupeTravails()
		{
			return $this->groupeTravails;
		}
	}