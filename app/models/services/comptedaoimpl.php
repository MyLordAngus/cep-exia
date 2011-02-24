<?php

abstract class CompteDAOImpl implements CompteDAO{

	protected $db;

	public function __construct(){
		$this->db = &get_instance()->db;
	}

	public function connexion(string $login, string $password){
		$requete = $this->db->select('ID, Table')
                                    ->from('comptes')
                                    ->where(array('Login' => $login,
                                            'Password' => $password,
                                            'Actif' => 1));
		$response = $requete->get();
		$compte = null;
		if($response->num_rows() == 1){
			$compte = (object) $response->row();
		}
		return $compte;
	}

	public function compteExistant(string $login, string $email){
		$$this->db->select('id')
                          ->from('comptes')
                          ->where('comptes.Login =', $login)->or_where($table.'.Email =', $email);
		$requete = $this->db->get();
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
