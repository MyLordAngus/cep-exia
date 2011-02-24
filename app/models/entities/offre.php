<?php

class Offre{

	private $numero;
	private $date;
	private $titre;
	private $Categorie;
	private $description;
	private $listeDevis;
	private $Statut;
	private $montant;
	private $Entreprise;

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

	public function compteDevis(){
		return count($this->listeDevis);
	}

	/*	 * * Renvoie le montant moyen pour la somme des devis de l'offre ** */

	public function montantMoyen(){
		$montantTotal = NULL;
		foreach($this->listeDevis as $d){
			$montantTotal += $d->montant;
		}
		if($montantTotal)
			return $montantTotal / count($this->listeDevis);
		return 0;
	}

	public function getType(){
		return __CLASS__;
	}

}
