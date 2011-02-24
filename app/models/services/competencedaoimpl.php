<?php
	class CompetenceDAOImpl implements CepDAO{
		private $db;
		
    public function __construct(){
        $this->db = &get_instance()->db;
    }

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

    public function insert(object $model) {
        echo "Not implemented";exit();
    }

    public function select(int $idObject) {
        echo "Not implemented";exit();
    }

    public function update(object $model) {
        echo "Not implemented";exit();
    }

}
?>
