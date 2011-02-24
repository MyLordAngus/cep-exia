<?php

class Entreprise extends Compte{

	private $raisonSoc;
	private $adresse;
	private $codePostal;
	private $ville;
	private $domaine;
	private $listeOffres;

	public function __construct(){
	
	}

	/*	 * * Accesseur ** */

	public function __get($attribut){
		return $this->$attribut;
	}

	/*	 * * Mutateur ** */

	public function __set($attribut, $valeur){
		$this->$attribut = $valeur;
	}

	public function getType(){
		return strtolower(__CLASS__);
	}

	public function __toString(){
		return $this->raisonSoc;
	}

}
