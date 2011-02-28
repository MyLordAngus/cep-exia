<?php

class Statut extends AbstractEntity{
    private $libelle;

    public function __construct(){
        $this->mapping['table'] = 'statuts';
    }


    public function __get($attribut){
            return $this->$attribut;
    }
    public function __set($attribut, $valeur){
            $this->$attribut = $valeur;
    }
    public function __toString(){
            return $this->libelle;
    }
}

?>
