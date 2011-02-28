<?php

class Categorie extends AbstractEntity{
    private $libelle;

    public function __construct(){
        $this->mapping['table'] = 'categories';
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
