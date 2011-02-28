<?php
class Competence extends AbstractEntity{
    private $libelle;

    public function __construct(){
	$this->mapping['table'] = 'competences';
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
