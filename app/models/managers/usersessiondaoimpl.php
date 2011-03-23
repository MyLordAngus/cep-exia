<?php

class UserSessionDAOImpl extends AbstractCepDAO implements UserSessionDAO{

    public function __construct(){
        parent::__construct();
    }

    public function connexion($login, $password){
        $requete = $this->dbTemplate->getDb()->select('ID, Type')
                            ->from('comptes')
                            ->where(array('Login' => $login,
                                          'Password' => $password,
                                          'Actif' => 1));
        $response = $requete->get();
        $compte = null;
        if($response->num_rows() == 1){
            $compteType = (string) $response->row()->Type;
            $compteType = AbstractEntity::cast(new $compteType);
            $compte = $this->dbTemplate->load($compteType->getClassName(), $response->row()->ID);
        }
        return $compte;
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
