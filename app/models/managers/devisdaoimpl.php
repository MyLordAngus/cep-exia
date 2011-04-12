<?php
class DevisDAOImpl extends AbstractCepDAO implements DevisDAO{
    public function __construct(){
        parent::__construct();
    }

    public function select($id){
        $d = new Devis();
        return $this->dbTemplate->load($d->getClassName(), $id);
    }

    public function update(Devis $d) {
        $data = array('Montant'=> $d->montant,
                      'Duree'=> $d->duree,
                      'Etat'=> $d->etat,
                      'Description'=> $d->description,
                      'IDPrestataire'=> $d->Prestataire->id);
        $this->dbTemplate->getDb()->where('ID', $d->id)
								->update('devis', $data);
            $d->id = $this->dbTemplate->getDb()->insert_id();
    }

    public function insert(Devis $d){
        $data = array('Date'=> time(),
                      'IDOffre'=> $d->Offre->id,
                      'Montant'=> $d->montant,
                      'Duree'=> $d->duree,
                      'Description'=> $d->description,
                      'IDPrestataire'=> $d->Prestataire->id);
        $this->dbTemplate->getDb()->insert('devis', $data);
        $data = array('IDStatut'=> 2);
        $this->dbTemplate->getDb()->where('ID', $d->Offre->id)
								->update('offres', $data);
    }
}
