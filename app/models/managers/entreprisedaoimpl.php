<?php

class EntrepriseDAOImpl extends Compte{

	public function __construct(){
		parent::__construct();
	}
	
	public function select(int $idObject){
		parent::select($idObject);
		$requete = $this->db->get_where('entreprises', array('ID' => $idObject));
		
		if($requete->num_rows() == 1){
			$Objet = $requete->row();
			$Entreprise = new Entreprise();
			$Entreprise->raisonSoc = $Objet->RaisonSoc;
			$Entreprise->adresse = $Objet->Adresse;
			$Entreprise->codePostal = $Objet->CodePostal;
			$Entreprise->ville = $Objet->Ville;
			$Entreprise->domaine = $Objet->Domaine;
		}
		return $Entreprise;
	}

	public function selectAll(){
		$listeEntreprise = array();

		$this->db->select('*')
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

	public function insert(object $model){
		parent::insert($model);
		$data = array('ID' => $this->ID,
			'RaisonSoc' => $model->raisonSoc,
			'Adresse' => $model->adresse,
			'CodePostal' => $model->codePostal,
			'Ville' => $model->ville,
			'Domaine' => $model->domaine);
		$this->db->insert('entreprises', $data);
	}

	public function update(object $model){
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
}