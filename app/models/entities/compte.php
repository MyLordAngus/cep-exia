<?php

class Compte extends AbstractEntity{
    protected $login;
    protected $password;
    protected $email;
    protected $siret;
    protected $telephone;
    protected $type;
    protected $actif;
    protected $listeRelations;

    public function __construct(){
        $this->mapping['table'] = 'comptes';
        $this->mapping['hasMany'][] = 'Relation';
    }


    public function __get($attribut){
            return $this->$attribut;
    }
    public function __set($attribut, $valeur){
            $this->$attribut = $valeur;
    }
    public function __toString() {

    }
}

?>
