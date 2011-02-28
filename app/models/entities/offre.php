<?php

class Offre extends AbstractEntity{
    private $date;
    private $titre;
    private $Categorie;
    private $description;
    private $listeDevis;
    private $Statut;
    private $montant;
    private $Entreprise;

    public function __construct(){
        $this->mapping['table'] = 'offres';
        $this->mapping['hasOne'][] = 'Categorie';
        $this->mapping['hasOne'][] = 'Statut';
        $this->mapping['hasOne'][] = 'Entreprise';
		$this->Categorie = new Categorie();
		$this->listeDevis = array();
		$this->Statut = new Statut();
		$this->Entreprise = new Entreprise();
    }


    public function __get($attribut){
            return $this->$attribut;
    }
    public function __set($attribut, $valeur){
            $this->$attribut = $valeur;
    }
    public function __toString() {

    }
    public function compteDevis(){
		return count($this->listeDevis);
	}
	public function montantMoyen(){
		$montantTotal = NULL;
		foreach($this->listeDevis as $d){
			$montantTotal += $d->montant;
		}
		if($montantTotal)
			return $montantTotal / count($this->listeDevis);
		return 0;
	}
}
