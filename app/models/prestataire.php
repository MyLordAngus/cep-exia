<?php

class Prestataire extends Compte{

    private $nom;
    private $prenom;
    private $listeCompetences;
    private $listeDevis;

    public function __construct(){
	parent::__construct();
	$this->nom = "";
	$this->prenom = "";
	$this->listeCompetences = array();
	$this->listeDevis = array();
    }

    public function __destruct(){
	$this->listeDevis = null;
	$this->listeDevis = null;
    }

    /*     * * Accesseur ** */

    public function __get($attribut){
	return $this->$attribut;
    }

    /*     * * Mutateur ** */

    public function __set($attribut, $valeur){
	$this->$attribut = $valeur;
    }

    public function getType(){
	return strtolower(__CLASS__);
    }

    /*     * * Méthodes d'accès à la base de données ** */

    public function select($idObject){
	parent::select($idObject);
	$requete = $this->db->get_where('prestataires', array('ID' => $idObject));

	if($requete->num_rows() == 1){
	    $Prestataire = $requete->row();
	    $this->nom = $Prestataire->Nom;
	    $this->prenom = $Prestataire->Prenom;

	    $this->db->select('*')
		    ->from('prestatairesCompetences')
		    ->join('competences', 'competences.ID = prestatairesCompetences.IDCompetence')
		    ->where('prestatairesCompetences.IDPrestataire', $this->ID);
	    $requete = $this->db->get();

	    foreach($requete->result_object() as $reqCompetence){
		$Competence = new Competence();
		$Competence->ID = $reqCompetence->IDCompetence;
		$Competence->libelle = $reqCompetence->Libelle;
		$this->listeCompetences[] = $Competence;
	    }
	}
	return $this;
    }

    public function selectAll($db){
	$db->select('*')
		->from('entreprise');
	$requete = $db->get();
	return $requete->result();
    }
    
    public function insert($model){
	parent::insert($model);
	$data = array('ID' => $model->ID,
	    'Nom' => $model->nom,
	    'Prenom' => $model->prenom);
	$this->db->insert('prestataires', $data);
    }

    public function update($model){
	parent::update($model);
	$data = array('Nom' => $model->nom,
	    'Prenom' => $model->prenom);
	$this->db->where('ID', $model->ID);
	$this->db->update('prestataires', $data);
	$this->db->where('IDPrestataire', $model->ID);
	$this->db->delete('prestatairesCompetences');

	foreach($model->listeCompetences as $Competence){
	    $data = array('IDPrestataire' => $model->ID, 'IDCompetence' => $Competence->ID);
	    $this->db->insert('prestatairesCompetences', $data);
	}
    }

    /*     * * Renvoie une liste de devis en fonction de l'ID du prestataire ** */

    public function selectOwned(){
	$this->listeDevis = array();
	$this->db->order_by('Date', 'Desc');
	$requete = $this->db->get_where('devis',
			array('IDPrestataire' => $this->ID));

	foreach($requete->result() as $reqDevis){
	    $Devis = new Devis();
	    $Devis->numero = $reqDevis->ID;
	    $Devis->date = $reqDevis->Date;
	    $Devis->montant = $reqDevis->Montant;
	    $Devis->duree = $reqDevis->Duree;
	    $Devis->Offre->numero = $reqDevis->IDOffre;
	    $Devis->description = $reqDevis->Description;
	    $Devis->etat = $reqDevis->Etat;
	    $Devis->Prestataire = $reqDevis->IDPrestataire;
	    array_push($this->listeDevis, $Devis);
	}
	return $this->listeDevis;
    }

    /*     * * Sérialisation **
      public function __sleep(){
      foreach($this->listeCompetences as $Competence){
      $Competence = serialize($Competence);
      }
      $this->$listeCompetences = serialize($this->$ListeCompetences);

      foreach($this->listeDevis as $Devis){
      $Devis = serialize($Devis);
      }
      $this->$listeDevis = serialize($this->listeDevis);

      }

      public function __wakeup(){
      $this->listeOffres = unserialize($this->listeOffres);
      $this->listeDevis = unserialize($this->LlisteDevis);
      } */
}

?>
