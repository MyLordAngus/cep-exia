<?php
class Devis extends AbstractEntity{
    private $date;
    private $montant;
    private $duree;
    private $description;
    private $etat;
    private $Offre;
    private $Prestataire;

    public function __construct(){
        $this->mapping['table'] = 'devis';
        $this->mapping['hasOne'][] = 'Offre';
        $this->mapping['hasOne'][] = 'Prestataire';
		$this->Offre = new Offre();
		$this->Prestataire = new Prestataire();
    }


    public function __get($attribut){
		if($attribut == 'etat'){
			switch($this->$attribut){
				case 0 : return 'En attente de validation';
				case 1 : return 'Accepté';
				default : return 'Refusé';
			}
		}
            return $this->$attribut;
    }
    public function __set($attribut, $valeur){
            $this->$attribut = $valeur;
    }
    public function __toString() {

    }
}
