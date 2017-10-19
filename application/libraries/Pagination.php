<?php
	class Pagination
	{
		public function getNombrePage($data, $division)
		{
			$taille = sizeof($data);
	        $nbpage = $taille / $division;
	        $reste = $taille % $division;
	        
	        if($reste != 0)  
	        	$nbpage++;
	        
	        return $nbpage;
		}

		public function getDebut($numeroPage, $taille)
		{
	        $debut = 1;
	        $i = 1;
	        $tmp = intval($taille - 1);

	        if($numeroPage > 1){
	           	$debut = $numeroPage;
	            while($i < $numeroPage){
	                $debut += $tmp;
	                $i++;
	            }
	        }
	        
	        return $debut;
    	}

    	public function create($index, $limit)
    	{
    		$array = array();
    		for($i = 1;$i <= $limit;$i++)
    		{
    			$page = new Page();
    			$page->setPage($i);

    			if($index == $i)
    				$page->setBootstrapClassName("active");

    			array_push($array, $page);
    		}

    		return $array;
    	}

    	public function suivant($liste, $element)
    	{
    		$suivant = null;
    		$taille = sizeof($liste);
    		for ($i=0; $i < $taille; $i++) 
    		{ 
    			if($liste[$i]->getId() == $element->getId())
    			{
    				if($i+1 < $taille)
    					$suivant = $liste[$i +1];
    				else
    					$suivant = $liste[0];
    			}
    		}
    		return $suivant;
    	}

    	public function precedent($liste, $element)
    	{
    		$precedent = null;
    		$taille = sizeof($liste);
    		for ($i=0; $i < $taille; $i++) 
    		{ 
    			if($liste[$i]->getId() == $element->getId())
    			{
    				if($i -1 > 0)
    					$precedent = $liste[$i -1];
    				else
    					$precedent = $liste[$taille -1];
    			}
    		}
    		return $precedent;
    	}
 	}

	class Page
	{
		private $page;
		private $bootstrapClassName;

    	public function getPage()
    	{
    		return $this->page;
    	}

    	public function getBootstrapClassName()
    	{
    		return $this->bootstrapClassName;
    	}

    	public function setPage($page)
    	{
    		$this->page = $page;
    	}

    	public function setBootstrapClassName($bootstrapClassName)
    	{
    		$this->bootstrapClassName = $bootstrapClassName;
    	}
	}