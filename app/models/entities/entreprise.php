<?php

class Entreprise extends Compte{

    private $raisonSoc;
    private $adresse;
    private $codePostal;
    private $ville;
    private $domaine;
    private $listeOffres;
	private $description;

    public function __construct(){
        $this->mapping['table'] = 'entreprises';
        $this->mapping['hasMany'][] = 'Offre';
    }

    public function __get($attribut){
            return $this->$attribut;
    }
    public function __set($attribut, $valeur){
            $this->$attribut = $valeur;
    }
    public function __toString(){
            return $this->raisonSoc;
    }

}
