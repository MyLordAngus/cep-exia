<?php
/**
 * Description of relation
 *
 * @author SuperBen
 */
class Relation extends AbstractEntity {
    private $Prestataire;
    private $Entreprise;
    private $termine;
    private $listeMessages;

    public function  __construct() {
        $this->mapping['table'] = 'relations';
        $this->mapping['hasOne'][] = 'Prestataire';
        $this->mapping['hasOne'][] = 'Entreprise';
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
