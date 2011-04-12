<?php

class OffreDAOImpl extends AbstractCepDAO implements OffreDAO{

    public function __construct(){
        parent::__construct();
    }

    public function select($id){
        $o = new Offre();
        return $this->dbTemplate->load($o->getClassName(), $id);
    }

    public function insert(Offre $o){
            $data = array('Titre' => $o->titre,
                    'Date' => time(),
                    'IDEntreprise' => $o->Entreprise->id,
                    'IDCategorie' => $o->Categorie->id,
                    'IDStatut' => $o->Statut->id,
                    'Description' => $o->description);
            $this->dbTemplate->getDb()->insert('offres', $data);
            $o->id = $this->dbTemplate->getDb()->insert_id();
    }

    public function update(Offre $o){
            $data = array('Titre' => $o->titre,
                    'Date' => time(),
                    'IDCategorie' => $o->Categorie->id,
                    'IDStatut' => $o->Statut->id,
                    'Description' => $o->description);
            $this->dbTemplate->getDb()->where('ID', $o->id)
                             ->update('offres', $data);
    }

    public function compteOffres(){
            return $this->dbTemplate->getDb()->count_all('offres');
    }

    public function selectLimit($limitInf, $limitNombre){
            $listeOffres = array();
            $requete = $this->dbTemplate->getDb()->select('ID')
                                        ->order_by('Date', 'Desc')
                                        ->get('offres', $limitNombre, $limitInf);
            foreach($requete->result() as $reqOffre){
                    $Offre = new Offre();
                    $Offre = $this->dbTemplate->load($Offre->getClassName(), $reqOffre->ID);
                    array_push($listeOffres, $Offre);
            }
            return $listeOffres;
    }

    public function selectOffresRecherche($raisonSoc, $IDCategorie = 0){
            $listeOffres = array();
            $this->dbTemplate->getDb()->select('*')
                            ->from('offres')->join('entreprises', 'entreprises.ID = offres.IDEntreprise')
                            ->where('offres.ID != ', 0);

            if(!empty($raisonSoc))
                     $this->dbTemplate->getDb()->where('entreprises.raisonSoc LIKE ', "'%".$raisonSoc."%'", FALSE);

            if($IDCategorie != 0)
                     $this->dbTemplate->getDb()->where('offres.IDCategorie = ', $IDCategorie);

            $requete =  $this->dbTemplate->getDb()->get();
            foreach($requete->result() as $reqOffre){
                    $Offre = new Offre();
                    $Offre->id = $reqOffre->ID;
                    $Offre->date = $reqOffre->Date;
                    $Offre->titre = $reqOffre->Titre;
                    $Offre->description = $reqOffre->Description;
                    $Offre->Categorie = $this->dbTemplate->load($Offre->Categorie->getClassName(), $reqOffre->IDCategorie);
                    $Offre->Statut->id = $reqOffre->IDStatut;
                    $Offre->montant = $reqOffre->Montant;
                    array_push($listeOffres, $Offre);
            }
            return $listeOffres;
    }

    public function selectDevis($idOffre){
        $listeDevis = array();
        $requete = $this->dbTemplate->getDb()->order_by('Etat', 'Desc')
                                  ->order_by('Date', 'Desc')
                                  ->select('ID')
                                  ->get_where('devis', array('IDOffre' => $idOffre));
        foreach($requete->result() as $reqDevis){
            $Devis = new Devis();
            $Devis = $this->dbTemplate->load($Devis->getClassName(), $reqDevis->ID);
            array_push($listeDevis, $Devis);
        }
        return $listeDevis;
    }

    public function delete($id) {
        $o = new Offre();
        $this->dbTemplate->delete($o->getClassName(), $id);
    }

    public function selectAll() {
        $o = new Offre();
        return $this->dbTemplate->loadAll($o->getClassName());
    }

}
