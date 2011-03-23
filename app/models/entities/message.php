<?php
/**
 * Description of Message
 *
 * @author SuperBen
 */
class Message extends AbstractEntity{
    private $message;
    private $Compte;
    private $date;


    public function __construct(){
        $this->mapping['table'] = 'messages';
        $this->mapping['hasOne'][] = 'Compte';
    }


    public function __get($attribut){
            return $this->$attribut;
    }
    public function __set($attribut, $valeur){
            $this->$attribut = $valeur;
    }
    public function __toString(){

    }
}
?>
