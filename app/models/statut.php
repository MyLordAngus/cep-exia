<?php

class Statut implements ICrudModel{

    private $ID;
    private $libelle;
    private $db;

    public function __construct(){
	$this->db = &get_instance()->db;
	$this->ID = 0;
	$this->libelle = "";
    }

    /*     * * Accesseur ** */

    public function __get($attribut){
	if(!isset($this->$attribut))
	    exit($attribut." n'existe pas dans la classe ".__CLASS__);

	return $this->$attribut;
    }

    /*     * * Mutateur ** */

    public function __set($attribut, $valeur){
// 		if(!isset($this->$attribut))
// 			exit($attribut." n'existe pas dans la classe ".__CLASS__);

	$this->$attribut = $valeur;
    }

    public function select($idObject){
	$requete = $this->db->get_where('statuts', array('ID' => $idObject));
	if($requete->num_rows() == 1){
	    $Statut = $requete->row();
	    $this->ID = $Statut->ID;
	    $this->libelle = $Statut->Libelle;
	}
	return $this;
    }

    /*     * * Méthodes d'accès à la base de données ** */

    public static function selectAll($db){
	$listeStatuts = array();
	$requete = $this->db->get_where('statuts');
	foreach($this->db->result($requete) as $reqStatut){
	    $Statut = new Statut();
	    $Statut->__set('ID', $reqStatut->ID);
	    $Statut->__set('Libelle', $reqStatut->libelle);
	    array_push($listeStatuts, $Statut);
	}
	return $listeStatuts;
    }

    public function __toString(){
	return $this->libelle;
    }

    public function getType(){
	return __CLASS__;
    }

    public function insert($model){
	echo "Not implemented";
	exit();
    }

    public function update($model){
	echo "Not implemented";
	exit();
    }

}

?>
