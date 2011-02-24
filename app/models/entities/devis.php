<?php
class Devis{
    private $numero;
    private $date;
    private $Offre;
    private $montant;
    private $duree;
    private $description;
    private $etat;
    private $Prestataire;

    public function __construct(){
	
    }
	
    /*** Accesseur ***/
    public function __get($attribut){
        return $this->$attribut;
    }

    /*** Mutateur ***/
    public function __set($attribut, $valeur){
        $this->$attribut = $valeur;
    }
	
	public function getType(){
		return strtolower(__CLASS__);
	}
}
