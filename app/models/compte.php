<?php
    abstract  class Compte implements ICrudModel{
        protected $ID;
        protected $login;
        protected $password;
        protected $email;
        protected $siret;
        protected $telephone;
        protected $listeDroits;
        protected $db;


        public function __construct(){
		$this->db = &get_instance()->db;

                $this->ID = 0;
                $this->login = "";
                $this->password = "";
                $this->email = '';
                $this->siret = '';
                $this->telephone = '';
                $this->listeDroits = array();
        }

        public function __destruct(){}

        /*** Accesseur ***/
        public function __get($attribut){
                return $this->$attribut;
        }

        /*** Mutateur ***/
        public function __set($attribut, $valeur){
                $this->$attribut = $valeur;
        }

        /*** Méthode de connexion login-mot de passe ***/
        public static function connexion($login, $password){
            $db = get_instance()->db;
            $requete = $db->select('ID, Table')
                          ->from('comptes')
                          ->where(array('Login' => $login,
                                        'Password' => $password,
                                        'Actif' => 1));
            $response = $requete->get();
            $compte = null;
            if($response->num_rows() == 1){
                $row = $response->row();
                if($row->Table == "entreprise")
                    $compte = new Entreprise();
                else if($row->Table == "prestataire")
                    $compte = new Prestataire();
                $compte->select($row->ID);
            }
            return $compte;
        }

        /*** Méthode qui teste si un compte avec un même login ou un même email existe déjà dans la base de données ***/
        public static function compteExistant($login, $email){
            $db = get_instance()->db;
            $db->select('id');
            $db->from('comptes');
            $db->where('comptes.Login =', $login)->or_where($table.'.Email =', $email);
            $requete = $db->get();
            if($requete->num_rows() == 0)
                return false;
            return true;
        }

        public function getType() {
            return strtolower(__CLASS__);
        }

        public function insert($model){
            $data = array('Login' => $this->login,
                          'Password' => $this->password,
                          'Email' => $this->email,
                          'Siret' => $this->siret,
                          'Telephone' => $this->telephone,
                          'Table' => $this->getType());
            $this->db->insert('comptes', $data);
        }

        public function select($idObject) {
            $this->db->select('*');
            $this->db->from('comptes');
            $this->db->where('comptes.ID =', $idObject);
            $requete = $this->db->get();
            if($requete->num_rows() == 0)
                    return null;
            $row = $requete->row();
            $this->ID = $row->ID;
            $this->login = $row->Login;
            $this->password = $row->Password;
            $this->email = $row->Email;
            $this->siret = $row->Siret;
            $this->telephone = $row->Telephone;/*
            $requete = $this->db->get_where('droits', array('type_compte' => $this->getType()));
            foreach ($requete->result() as $droit){
                array_push ($this->listeDroits, $droit);
            }*/
        }

        public function selectAll() {
            $liste = array();
            $this->db->select('*');
            $this->db->from('comptes');
            $requete = $this->db->get();
            $liste = $requete->rows();
            return $liste;
        }

        public function update($model) {
            $data = array('Login' => $model->login,
                          'Password' => $model->password,
                          'Email' => $model->email,
                          'Siret' => $model->siret,
                          'Telephone' => $model->telephone);
            $this->db->where('ID', $model->ID);
            $this->db->update('comptes', $data);
        }

        public abstract function selectOwned();
    }
?>
