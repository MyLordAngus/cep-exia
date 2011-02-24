<?php
	class Competence{
		private $ID;
		private $libelle;
		
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

    public function getType() {
        return __CLASS__;
    }
}
?>
