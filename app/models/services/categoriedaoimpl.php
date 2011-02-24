<?php

class CategorieDAOImpl implements CepDAO{

	private $db;

	public function __construct(){
		$this->db = &get_instance()->db;
		
	}

	public function select(int $idObject){
		$requete = $this->db->get_where('categories', array('ID' => $idObject));
		if($requete->num_rows() == 1){
			$Objet = $requete->row();
			$Categorie = new Categorie();
			$Categorie->ID = $Objet->ID;
			$Categorie->libelle = $Objet->Libelle;
			return $Categorie;
		}
		return NULL;
	}

	public function selectAll(){
		$listeCategories = array();
		$requete = $this->db->get('categories');
		foreach($requete->result_object() as $reqCategorie){
			$Categorie = new Categorie();
			$Categorie->ID = $reqCategorie->ID;
			$Categorie->libelle = $reqCategorie->Libelle;
			array_push($listeCategories, $Categorie);
		}
		return $listeCategories;
	}
	
	public function update(object $model){
		echo __METHOD__." is not implemented";exit;
	}
	public function insert(object $model){
		echo __METHOD__." is not implemented";exit;
	}
}

?>
