<?php

class Prestataire extends Compte{

    private $nom;
    private $prenom;
    private $listeCompetences;
    private $listeDevis;

    public function  __construct() {
        parent::__construct();
        $this->mapping['table'] = 'prestataires';
        $this->mapping['hasMany'][] = 'Devis';
        //$this->mapping['hasMany'][] = 'Competence';
    }

    public function __get($attribut){
            return $this->$attribut;
    }
    public function __set($attribut, $valeur){
            $this->$attribut = $valeur;
    }
    public function __toString() {

    }
}

?>
