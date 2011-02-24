<?php

class Prestataire extends Compte{

	private $nom;
	private $prenom;
	private $listeCompetences;
	private $listeDevis;

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
}

?>
