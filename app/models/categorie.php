<?php

class Categorie{

	private $ID;
	private $libelle;
	private $db;

	public function __construct(){
		$this->db = &get_instance()->db;

		$this->ID = 0;
		$this->libelle = "";
	}

	/*	 * * Accesseur ** */

	public function __get($attribut){
		return $this->$attribut;
	}

	/*	 * * Mutateur ** */

	public function __set($attribut, $valeur){
		$this->$attribut = $valeur;
	}

	/*	 * * Méthodes d'accès à la base de données ** */

	public function select($idObject){
		$requete = $this->db->get_where('categories', array('ID' => $idObject));
		if($requete->num_rows() == 1){
			$Categorie = $requete->row();
			$this->ID = $Categorie->ID;
			$this->libelle = $Categorie->Libelle;
		}
		return $this;
	}

	public static function selectAll($db){
		$listeCategories = array();
		$requete = $db->get('categories');
		foreach($requete->result_object() as $reqCategorie){
			$Categorie = new Categorie();
			$Categorie->ID = $reqCategorie->ID;
			$Categorie->libelle = $reqCategorie->Libelle;
			array_push($listeCategories, $Categorie);
		}
		return $listeCategories;
	}

	public function __toString(){
		return $this->libelle;
	}

}

?>
