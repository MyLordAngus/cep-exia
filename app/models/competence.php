<?php
	class Competence implements ICrudModel{
		private $ID;
		private $libelle;
                private $db;
		
    public function __construct(){
        $this->db = &get_instance()->db;

        $this->ID = 0;
        $this->libelle = "";
    }

    /*** Accesseur ***/
    public function __get($attribut){
        if(!isset($this->$attribut))
                return;

        return $this->$attribut;
    }

    /*** Mutateur ***/
    public function __set($attribut, $valeur){
        if(!isset($this->$attribut))
                return;

        $this->$attribut = $valeur;
    }

    /*** Méthodes d'accès à la base de données ***/
    public function selectAll(){
        $listeCompetences = array();
        $requete = $this->db->get_where('competences');
        foreach($requete->result() as $reqCompetence){
                $Competence = new Competence();
                $Competence->ID = $reqCompetence->ID;
                $Competence->libelle = $reqCompetence->Libelle;
                array_push($listeCompetences, $Competence);
        }
        return $listeCompetences;
    }

    public function getType() {
        return __CLASS__;
    }

    public function insert($model) {
        echo "Not implemented";exit();
    }

    public function select($idObject) {
        echo "Not implemented";exit();
    }

    public function update($model) {
        echo "Not implemented";exit();
    }

}
?>
