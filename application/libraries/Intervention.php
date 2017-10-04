<?php
	require_once("BaseModele.php");

	class Intervention extends BaseModele
	{
		private $intitule;
		private $dureeTravaux;
		private $dPrevDebut;
		private $dReelDebut;

		private $dPrevRTX;
		private $dReelRTX;

		private $nbPrevBenef;
	    private $nbReelBenef;
	    private $nbReelBenefApte;
	    private $nbFemmeBenefApte;
	    private $nbBenefInapte;
	    private $nbPrevHommeJourApte;
	    private $nbReelHommeJourApte;
	    
	    private $prevSurfTraiteeCES;
	    private $realSurfTraiteeCES;
	    private $prevSurfBoiseeFSP;
	    private $realSurfBoiseeFSP;
	    
	    private $libelleAutreIndic;
	    private $prevAutreIndic;
	    private $realAutreIndic;
	    private $uniteAutreIndic;
	    private $observationIndic;

	    private $dPrevPaiement1;
	    private $dReelPaiement1;
	    private $dPrevPaiement2;
	    private $dReelPaiement2;
	    private $dPrevPaiement3;
	    private $dReelPaiement3;

	    private $groupeTravail;
	    private $rang;
	    private $phase;

	    private $paiements;
	    private $intitules;

	    public static function init($data)
	    {
	    	$CI =& get_instance();
	    	$CI->load->library("Unite");
			$CI->load->model("GroupeTravail_Model");
			$CI->load->model("Phase_Model");
			$CI->load->model("Intitule_Model");
			$CI->load->model("Unite_Model");

	    	$array = array();
			foreach ($data as $row)
			{
				$intervention = new Intervention();
				
				$intervention->setId($row->id);
				$intervention->setDureeTravaux($row->dureetravaux);
				$intervention->setDPrevDebut($row->dpdebut);
				$intervention->setDReelDebut($row->drdebut);
				
				$intervention->setDPrevRTX($row->dprtx);
				$intervention->setDReelRTX($row->drrtx);
				
				$intervention->setNbPrevBenef($row->nbpbenef);
				$intervention->setNbReelBenef($row->nbrbenef);
				$intervention->setNbReelBenefApte($row->nbrbenefapte);
				$intervention->setNbFemmeBenefApte($row->nbfemmebenefapte);
				$intervention->setNbBenefInapte($row->nbbenefinapte);
				$intervention->setNbPrevHommeJourApte($row->nbphommejourapte);
				$intervention->setNbReelHommeJourApte($row->nbrhommejourapte);
				
				$intervention->setPrevSurfTraiteeCES($row->psurftraiteeces);
				$intervention->setRealSurfTraiteeCES($row->rsurftraiteeces);
				$intervention->setPrevSurfBoiseeFSP($row->psurfboiseefsp);
				$intervention->setRealSurfBoiseeFSP($row->rsurfboiseefsp);

				$intervention->setLibelleAutreIndic($row->libelleautreindic);
				$intervention->setPrevAutreIndic($row->prevautreindic);
				$intervention->setRealAutreIndic($row->realautreindic);
				$intervention->setObservationIndic($row->observationindic);

				// $intervention->setDPrevPaiement1($row->dppaiement1);
				// $intervention->setDPrevPaiement2($row->dppaiement2);
				// $intervention->setDPrevPaiement3($row->dppaiement3);
				// $intervention->setDReelPaiement1($row->drpaiement1);
				// $intervention->setDReelPaiement2($row->drpaiement2);
				// $intervention->setDReelPaiement3($row->drpaiement3);

				$intervention->setRang($row->rang);

				$groupeTravail = $CI->GroupeTravail_Model->findById($row->groupetravail_id);
				$intervention->setGroupeTravail($groupeTravail);
				
				$phase = $CI->Phase_Model->findById($row->phase_id);
				$intervention->setPhase($phase);

				$intitule = $CI->Intitule_Model->findById($row->intitule_id);
				$intervention->setIntitule($intitule);

				$unite = $CI->Unite_Model->findById($row->uniteautreindic);
				$intervention->setUniteAutreIndic($unite);
				
				array_push($array, $intervention);
			}

			return $array;
	    }

	    public function getIntitule(){
			return $this->intitule;
		}

		public function setIntitule($intitule){
			$this->intitule = $intitule;
		}

    	public function getDureeTravaux(){
			return $this->dureeTravaux;
		}

		public function setDureeTravaux($dureeTravaux){
			$this->dureeTravaux = $dureeTravaux;
		}

		public function getDPrevDebut(){
			if($this->dPrevDebut != null)
				return $this->dPrevDebut;
			else
				return null;
		}

		public function setDPrevDebut($dPrevDebut){
			$this->dPrevDebut = $dPrevDebut;
		}

		public function getDReelDebut(){
			if($this->dReelDebut != null)
				return $this->dReelDebut;
			else
				return null;
		}

		public function setDReelDebut($dReelDebut){
			$this->dReelDebut = $dReelDebut;
		}

		public function getDPrevRTX(){
			if($this->dPrevRTX != null)
				return $this->dPrevRTX;
			else
				return null;
		}

		public function setDPrevRTX($dPrevRTX){
			$this->dPrevRTX = $dPrevRTX;
		}

		public function getDReelRTX(){
			if($this->dReelRTX != null)
				return $this->dReelRTX;
			else
				return null;
		}

		public function setDReelRTX($dReelRTX){
			$this->dReelRTX = $dReelRTX;
		}

		public function getNbPrevBenef(){
			return $this->nbPrevBenef;
		}

		public function setNbPrevBenef($nbPrevBenef){
			$this->nbPrevBenef = $nbPrevBenef;
		}

		public function getNbReelBenef(){
			return $this->nbReelBenef;
		}

		public function setNbReelBenef($nbReelBenef){
			$this->nbReelBenef = $nbReelBenef;
		}

		public function getNbReelBenefApte(){
			return $this->nbReelBenefApte;
		}

		public function setNbReelBenefApte($nbReelBenefApte){
			$this->nbReelBenefApte = $nbReelBenefApte;
		}

		public function getNbFemmeBenefApte(){
			return $this->nbFemmeBenefApte;
		}

		public function setNbFemmeBenefApte($nbFemmeBenefApte){
			$this->nbFemmeBenefApte = $nbFemmeBenefApte;
		}

		public function getNbBenefInapte(){
			return $this->nbBenefInapte;
		}

		public function setNbBenefInapte($nbBenefInapte){
			$this->nbBenefInapte = $nbBenefInapte;
		}

		public function getNbPrevHommeJourApte(){
			return $this->nbPrevHommeJourApte;
		}

		public function setNbPrevHommeJourApte($nbPrevHommeJourApte){
			$this->nbPrevHommeJourApte = $nbPrevHommeJourApte;
		}

		public function getNbReelHommeJourApte(){
			return $this->nbReelHommeJourApte;
		}

		public function setNbReelHommeJourApte($nbReelHommeJourApte){
			$this->nbReelHommeJourApte = $nbReelHommeJourApte;
		}

		public function getPrevSurfTraiteeCES(){
			return $this->prevSurfTraiteeCES;
		}

		public function setPrevSurfTraiteeCES($prevSurfTraiteeCES){
			$this->prevSurfTraiteeCES = $prevSurfTraiteeCES;
		}

		public function getRealSurfTraiteeCES(){
			return $this->realSurfTraiteeCES;
		}

		public function setRealSurfTraiteeCES($realSurfTraiteeCES){
			$this->realSurfTraiteeCES = $realSurfTraiteeCES;
		}

		public function getPrevSurfBoiseeFSP(){
			return $this->prevSurfBoiseeFSP;
		}

		public function setPrevSurfBoiseeFSP($prevSurfBoiseeFSP){
			$this->prevSurfBoiseeFSP = $prevSurfBoiseeFSP;
		}

		public function getRealSurfBoiseeFSP(){
			return $this->realSurfBoiseeFSP;
		}

		public function setRealSurfBoiseeFSP($realSurfBoiseeFSP){
			$this->realSurfBoiseeFSP = $realSurfBoiseeFSP;
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

		public function getUniteAutreIndic(){
			return $this->uniteAutreIndic;
		}

		public function setUniteAutreIndic($uniteAutreIndic){
			$this->uniteAutreIndic = $uniteAutreIndic;
		}

		public function getObservationIndic(){
			return $this->observationIndic;
		}

		public function setObservationIndic($observationIndic){
			$this->observationIndic = $observationIndic;
		}

		public function getGroupeTravail(){
			return $this->groupeTravail;
		}

		public function setGroupeTravail($groupeTravail){
			$this->groupeTravail = $groupeTravail;
		}

		public function getRang(){
			return $this->rang;
		}

		public function setRang($rang){
			$this->rang = $rang;
		}

		public function getPhase(){
			return $this->phase;
		}

		public function setPhase($phase){
			$this->phase = $phase;
		}

		public function setDPrevPaiement1($dPrevPaiement1){
			$this->dPrevPaiement1 = $dPrevPaiement1;
		}

		public function getDPrevPaiement1(){
			if($this->dPrevPaiement1 != null)
				return $this->dPrevPaiement1;
			else
				return null;
		}

		public function setDReelPaiement1($dReelPaiement1){
			$this->dReelPaiement1 = $dReelPaiement1;
		}

		public function getDReelPaiement1(){
			if($this->dReelPaiement1 != null)
				return $this->dReelPaiement1;
			else
				return null;
		}

		public function setDPrevPaiement2($dPrevPaiement2){
			$this->dPrevPaiement2 = $dPrevPaiement2;
		}

		public function getDPrevPaiement2(){
			if($this->dPrevPaiement2 != null)
				return $this->dPrevPaiement2;
			else
				return null;
		}

		public function setDReelPaiement2($dReelPaiement2){
			$this->dReelPaiement2 = $dReelPaiement2;
		}

		public function getDReelPaiement2(){
			if($this->dReelPaiement2 != null)
				return $this->dReelPaiement2;
			else
				return null;
		}

		public function setDPrevPaiement3($dPrevPaiement3){
			$this->dPrevPaiement3 = $dPrevPaiement3;
		}

		public function getDPrevPaiement3(){
			if($this->dPrevPaiement3 != null)
				return $this->dPrevPaiement3;
			else
				return null;
		}

		public function setDReelPaiement3($dReelPaiement3){
			$this->dReelPaiement3 = $dReelPaiement3;
		}

		public function getDReelPaiement3(){
			if($this->dReelPaiement3 != null)
				return $this->dReelPaiement3;
			else
				return null;
		}

		public function getPaiements(){
			return $this->paiements;
		}

		public function setPaiements($paiements){
			$this->paiements = $paiements;
		}

		public function dateDifference($date_1, $date_2, $diff_format = "%a")
		{
			$datetime1 = date_create($date_1);
			$datetime2 = date_create($date_2);

			$interval = date_diff($datetime1, $datetime2);

			if($datetime1 > $datetime2)
			{
				if($interval->days >= 0 && $interval->days <= 30)
					return $interval->format("dans ".$interval->days." jour(s)");
				else
					return $interval->format("dans %m mois(s)");
			}
			else if($datetime1 == $datetime2)
			{
				return "aujourd'hui";
			}
			else
			{
				if($interval->days >= 0 && $interval->days <= 30)
					return $interval->format("il y a ".$interval->days." jour(s)");
				else
					return $interval->format("il y a %m moi(s)");
			}			
		}

		public function getIntitules(){
			return $this->intitules;
		}

		public function setIntitules($intitules){
			$this->intitules = $intitules;
		}
	}