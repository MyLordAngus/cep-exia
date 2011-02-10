<?php
class Devis implements ICrudModel{
    private $numero;
    private $date;
    private $Offre;
    private $montant;
    private $duree;
    private $description;
    private $etat;
    private $Prestataire;
    private $db;

    public function __construct(){
        $this->db = &get_instance()->db;

        $this->numero = 0;
        $this->date = 0;
        $this->Offre = new Offre();
        $this->montant = 0;
        $this->duree = 0;
        $this->description = '';
        $this->etat = 0;
        $this->Prestataire = new Prestataire();
    }

    public function __destruct(){
        $this->Prestataire = null;
        $this->Offre = null;
    }

    /*** Accesseur ***/
    public function __get($attribut){
        return $this->$attribut;
    }

    /*** Mutateur ***/
    public function __set($attribut, $valeur){
        $this->$attribut = $valeur;
    }

    /*** Méthodes d'accés à la base de données ***/
    public function select($idObject){
        $requete = $this->db->get_where('devis', array('ID' => $idObject));
        if($requete->num_rows() == 1){
            $Devis = $requete->row();
            $this->numero = $Devis->ID;
            $this->date = date('d/m/y',$Devis->Date);
            $this->Offre->select($Devis->IDOffre);
            $this->montant = $Devis->Montant;
            $this->duree = $Devis->Duree;
            $this->description = $Devis->Description;
            $this->Prestataire->select($Devis->IDPrestataire);
            $this->etat = $Devis->Etat;
        }
        return $this;
    }

    public function update($model) {
        $data = array('Date'=> time(),
                      'Montant'=> $model->montant,
                      'Duree'=> $model->duree,
                      'Etat'=> $model->etat,
                      'Description'=> $model->description,
                      'IDPrestataire'=> $model->Prestataire->ID);
        $this->db->where('ID', $model->numero);
        $this->db->update('devis', $data);
    }

    public function insert($model){
        $data = array('Date'=> time(),
                      'IDOffre'=> $model->Offre->numero,
                      'Montant'=> $model->montant,
                      'Duree'=> $model->duree,
                      'Description'=> $model->description,
                      'IDPrestataire'=> $model->Prestataire->ID);
        $this->db->insert('devis', $data);
        $data = array('IDStatut'=> 2);
        $this->db->where('ID', $model->Offre->numero);
        $this->db->update('offres', $data);
    }
    public function etatToString(){
        switch ($this->etat) {
            case 1:
                return "Accepté";
            case -1:
                return "Refusé";
            default:
                return "En attente";
        }
    }
    public function getType(){
        return __CLASS__;
    }

    public function selectAll() {

    }
}
