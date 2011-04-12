<?php
/**
 * Description of usersession
 *
 * @author SuperBen
 */
class UserSession{
    private $id;
    private $login;
    private $type;
    protected $actif;
    private $listeOwned;

    public function  __construct() {
        $this->id = 0;
        $this->login = "";
        $this->type = "";
        $this->actif = 0;
        $this->listeOwned = array();
    }

    public function addOwnObject(AbstractEntity $obj){
        $this->listeOwned[$obj->getClassName()][]["ID"] = $obj->id;
    }

    public function __get($attribut){
            return $this->$attribut;
    }
    public function __set($attribut, $valeur){
            $this->$attribut = $valeur;
    }
}
