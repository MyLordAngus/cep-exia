<?php

class CategorieDAOImpl extends AbstractCepDAO implements CategorieDAO{

	public function __construct(){
		parent::__construct();
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
}