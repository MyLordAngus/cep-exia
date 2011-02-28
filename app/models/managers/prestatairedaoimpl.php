<?php

class PrestataireDAOImpl extends AbstractCepDAO implements PrestataireDAO{

    public function __construct(){
        parent::__construct();
    }

    public function select($id){
        $p = new Prestataire();
        $p = $this->dbTemplate->load($p->getClassName(), $id);
        $result = $this->dbTemplate->getDb()->select('*')
                                            ->from('prestatairescompetences')
                                            ->join('competences', 'competences.ID = prestatairescompetences.IDCompetence')
                                            ->where('prestatairescompetences.IDPrestataire', $id)
                                            ->get();
        $listeCompetences = array();
        foreach($result->result() as $reqCompetence){
            $Competence = new Competence();
            $Competence->id = $reqCompetence->IDCompetence;
            $Competence->libelle = $reqCompetence->Libelle;
            $listeCompetences[] = $Competence;
        }
        $p->listeCompetences = $listeCompetences;
        return $p;
    }

    public function insert(Prestataire $p){
        parent::insert($p);
        $data = array('ID' => $p->ID,
                'Nom' => $p->nom,
                'Prenom' => $p->prenom);
        $this->db->insert('prestataires', $data);
    }

    public function update(Prestataire $p){
        $data = array('Login' => $p->login,
                'Password' => $p->password,
                'Email' => $p->email,
                'Siret' => $p->siret,
                'Telephone' => $p->telephone);
        $this->dbTemplate->getDb()->where('ID', $p->id)
                                  ->update('comptes', $data);
        $data = array('Nom' => $p->nom,
                'Prenom' => $p->prenom);
        $this->dbTemplate->getDb()->where('ID', $p->id)
                                  ->update('prestataires', $data);
        $this->dbTemplate->getDb()->where('IDPrestataire', $p->id)
                                  ->delete('prestatairesCompetences');

        foreach($p->listeCompetences as $Competence){
                $data = array('IDPrestataire' => $p->id, 'IDCompetence' => $Competence->id);
                $this->dbTemplate->getDb()->insert('prestatairesCompetences', $data);
        }
    }

    public function selectOwned($idPrestataire){
        $listeDevis = array();
        $requete = $this->dbTemplate->getDb()->select('ID')
                                  ->order_by('Date', 'Desc')
                                  ->get_where('devis',
                                        array('IDPrestataire' => $idPrestataire))
                                  ->result();

        foreach($requete as $reqDevis){
            $Devis = new Devis();
            $Devis = $this->dbTemplate->load($Devis->getClassName(), $reqDevis->ID);
            array_push($listeDevis, $Devis);
        }
        return $listeDevis;
    }

    public function selectAll() {
        $p = new Prestataire();
        return $this->dbTemplate->loadAll($p->getClassName());
    }
}

?>
