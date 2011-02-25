<?php
class DevisDAOImpl implements CepDAO{
    private $db;

    public function __construct(){
        $this->db = &get_instance()->db;
    }

    public function select(int $idObject){
        $requete = $this->db->get_where('devis', array('ID' => $idObject));
		$Devis = NULL;
        if($requete->num_rows() == 1){
            $Objet = $requete->row();
			$Devis = new Devis();
            $Devis->numero = $Objet->ID;
            $Devis->date = date('d/m/y',$Objet->Date);
            $Devis->Offre->select($Objet->IDOffre);
            $Devis->montant = $Objet->Montant;
            $Devis->duree = $Objet->Duree;
            $Devis->description = $Objet->Description;
            $Devis->Prestataire->select($Objet->IDPrestataire);
            $Devis->etat = $Objet->Etat;
        }
        return $Devis;
    }

    public function update(object $model) {
        $data = array('Montant'=> $model->montant,
                      'Duree'=> $model->duree,
                      'Etat'=> $model->etat,
                      'Description'=> $model->description,
                      'IDPrestataire'=> $model->Prestataire->ID);
        $this->db->where('ID', $model->numero);
        $this->db->update('devis', $data);
    }

    public function insert(object $model){
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
		echo __METHOD__." is not implemented";exit;
    }
}
