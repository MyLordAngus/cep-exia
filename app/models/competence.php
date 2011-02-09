<?php
	class Competence{
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

		public static function selectAll(){
                $db = get_instance()->db;
		$listeCompetences = array();
		$requete = $db->get_where('competences');
		foreach($requete->result() as $reqCompetence){
			$Competence = new Competence();
			$Competence->ID = $reqCompetence->ID;
			$Competence->libelle = $reqCompetence->Libelle;
			array_push($listeCompetences, $Competence);
		}
		return $listeCompetences;
	}

}
?>
