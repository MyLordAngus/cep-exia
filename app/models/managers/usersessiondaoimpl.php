<?php

class UserSessionDAOImpl extends AbstractCepDAO implements UserSessionDAO{

    public function __construct(){
        parent::__construct();
    }

    public function connexion($login, $password){
        $us = null;
        $db = $this->dbTemplate->getDb();
        $requete = $db->select('ID, Login, Type')
                            ->from('comptes')
                            ->where(array('Login' => $login,
                                          'Password' => $password,
                                          'Actif' => 1));
        $response = $requete->get();
        if($response->num_rows() == 1){
            $us = new UserSession();
            $row = $response->row();
            $us->id =$row->ID;
            $us->login = $row->Login;
            $us->type = $row->Type;
            $listeOwned = array('Devis','Offre','Message','Relation');
            $listeOwned['Devis'] = $db->select('ID')
               ->from('devis')
               ->where('IDPrestataire', $us->id)
               ->get()->result_array();
            $listeOwned['Offre'] = $db->select('ID')
               ->from('offres')
               ->where('IDEntreprise', $us->id)
               ->get()->result_array();
            $listeOwned['Relation'] = $db->select('ID')
               ->from('relations')
               ->where('IDEntreprise', $us->id)
               ->or_where('IDPrestataire', $us->id)
               ->get()->result_array();
            $listeOwned['Message'] = $db->select('ID')
               ->from('messages')
               ->where('IDCompte', $us->id)
               ->get()->result_array();
            $us->listeOwned = $listeOwned;
        }
        return $us;
    }

    public function compteExistant($login, $email){
        $requete = $this->dbTemplate->getDb()->select('id')
                  ->from('comptes')
                  ->where('comptes.Login =', $login)->or_where('comptes.Email =', $email)
                  ->get();
        
        if($requete->num_rows() == 0)
                return false;
        return true;
    }

    public function selectAll(){
        $this->db->select('*')
                 ->from('comptes');
        $requete = $db->get();
        return $requete->result();
    }
}

?>
