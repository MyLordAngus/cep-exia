<?php
/**
 * Description of entity
 *
 * @author SuperBen
 */
abstract class AbstractEntity {
    protected $id;
    protected $mapping = array(
                            'hasOne'=>array(),
                            'hasMany'=>array()
                        );

    public function __get($attribut){
            return $this->$attribut;
    }
    public function __set($attribut, $valeur){
            $this->$attribut = $valeur;
    }
    public function getType() {
        return __CLASS__;
    }
    abstract public function __toString();
    public function getHasOne() {
        return $this->mapping['hasOne'];
    }
    public function getHasMany() {
        return $this->mapping['hasMany'];
    }
   public static function cast(AbstractEntity $object) {
       return $object;
   }
}