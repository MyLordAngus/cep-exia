<?php

class EntrepriseDAOImpl extends AbstractCepDAO implements EntrepriseDAO{

    public function __construct(){
        parent::__construct();
    }

    public function select($id){
        $e = new Entreprise();
        return $this->dbTemplate->load($e->getClassName(), $id);
    }

    public function selectAll(){
        $e = new Entreprise();
        return $this->dbTemplate->loadAll($e->getClassName());
    }

    public function insert(Entreprise $e){
        parent::insert($e);
        $data = array('ID' => $this->ID,
                'RaisonSoc' => $e->raisonSoc,
                'Adresse' => $e->adresse,
                'CodePostal' => $e->codePostal,
                'Ville' => $e->ville,
                'Domaine' => $e->domaine);
        $this->db->insert('entreprises', $data);
    }

    public function update(Entreprise $e){
         $data = array('Login' => $e->login,
                'Password' => $e->password,
                'Email' => $e->email,
                'Siret' => $e->siret,
                'Telephone' => $e->telephone);
        $this->dbTemplate->getDb()->where('ID', $e->id)
                                  ->update('comptes', $data);
        $data = array('RaisonSoc' => $e->raisonSoc,
                'Adresse' => $e->adresse,
                'CodePostal' => $e->codePostal,
                'Ville' => $e->ville,
                'Domaine' => $e->domaine);
        $this->dbTemplate->getDb()->where('ID', $e->id)
                                  ->update('entreprises', $data);

    }

    public function selectOwned($idEntreprise){
        $listeOffres = array();
        $requete = $this->dbTemplate->getDb()->select('ID')
                 ->order_by('Date', 'Desc')
                 ->get_where('offres', array('IDEntreprise' => $idEntreprise));
        foreach($requete->result() as $reqOffre){
            $o = new Offre();
            $o = $this->dbTemplate->load($o->getClassName(), $reqOffre->ID);
			$listeDevis = array();
			$requete2 = $this->dbTemplate->getDb()->select(array('montant', 'ID'))
					 ->get_where('devis', array('IDOffre' => $reqOffre->ID));
			foreach($requete2->result() as $reqDevis){
				$d = new Devis();
				$d->id = $reqDevis->ID;
				$d->montant = $reqDevis->montant;
				array_push($listeDevis, $d);
			}
			$o->listeDevis = $listeDevis;
            array_push($listeOffres, $o);
        }
        return $listeOffres;
    }
}
