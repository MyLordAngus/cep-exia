<?php

class Entreprise extends Compte{

	private $raisonSoc;
	private $adresse;
	private $codePostal;
	private $ville;
	private $domaine;
	private $listeOffres;

	public function __construct(){
		parent::__construct();
		$this->raisonSoc = "";
		$this->adresse = "";
		$this->codePostal = "";
		$this->ville = "";
		$this->domaine = "";
		$this->listeOffres = array();
	}

	public function __destruct(){
		$this->listeOffres = null;
	}

	/*	 * * Accesseur ** */

	public function __get($attribut){
		return $this->$attribut;
	}

	/*	 * * Mutateur ** */

	public function __set($attribut, $valeur){
		$this->$attribut = $valeur;
	}

	public function getType(){
		return strtolower(__CLASS__);
	}

	/*	 * * Méthodes d'accès à la base de données ** */

	public function select($idObject){
		parent::select($idObject);
		$requete = $this->db->get_where('entreprises', array('ID' => $idObject));
		if($requete->num_rows() == 1){
			$Entreprise = $requete->row();
			$this->raisonSoc = $Entreprise->RaisonSoc;
			$this->adresse = $Entreprise->Adresse;
			$this->codePostal = $Entreprise->CodePostal;
			$this->ville = $Entreprise->Ville;
			$this->domaine = $Entreprise->Domaine;
		}
		return $this;
	}

	public static function selectAll($db){
		$listeEntreprise = array();

		$db->select('*')
				->from('entreprise');
		$requete = $db->get();

		foreach($requete->result() as $reqEntreprise){
			$Entreprise = new Entreprise();
			$Entreprise->ID = $reqEntreprise->ID;
			$Entreprise->raisonSoc = $reqEntreprise->RaisonSoc;
			array_push($listeEntreprise, $Entreprise);
		}
		return $listeEntreprise;
	}

	public function insert($model){
		parent::insert($model);
		$data = array('ID' => $this->ID,
			'RaisonSoc' => $model->raisonSoc,
			'Adresse' => $model->adresse,
			'CodePostal' => $model->codePostal,
			'Ville' => $model->ville,
			'Domaine' => $model->domaine);
		$this->db->insert('entreprises', $data);
	}

	public function update($model){
		parent::update($model);
		$data = array('RaisonSoc' => $model->raisonSoc,
			'Adresse' => $model->adresse,
			'CodePostal' => $model->codePostal,
			'Ville' => $model->ville,
			'Domaine' => $model->domaine);
		$this->db->where('ID', $model->ID);
		$this->db->update('entreprises', $data);
	}

	/*	 * * Renvoie la liste d'offres en fonction de l'ID de l'entreprise ** */

	public function selectOwned(){
		$this->db->select('ID');
		$this->db->order_by('Date', 'Desc');
		$requete = $this->db->get_where('offres', array('IDEntreprise' => $this->ID));
		foreach($requete->result() as $reqOffre){
			$Offre = new Offre();
			$Offre->select($reqOffre->ID);
			$Offre->selectDevis();
			array_push($this->listeOffres, $Offre);
		}
		return $this->listeOffres;
	}

	/*	 * * Méthodes de sérialisation **
	  public function __sleep(){
	  foreach($this->listeOffres as $Offre){
	  $Offre = serialize($Offre);
	  }
	  $this->listeOffres = serialize($this->listeOffres);
	  }

	  public function __wakeup(){
	  $this->listeOffres = unserialize($this->listeOffres);
	  } */

	public function __toString(){
		return $this->raisonSoc;
	}

}