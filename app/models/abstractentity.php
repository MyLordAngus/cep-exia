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
                            'hasMany'=>array(),
                            'table'=>null
                        );

    public function __get($attribut){
            return $this->$attribut;
    }
    public function __set($attribut, $valeur){
            $this->$attribut = $valeur;
    }
    public function getClassName() {
        $object = new ReflectionObject($this);
        return $object->getName();
    }
    public function getHasOne() {
        return $this->mapping['hasOne'];
    }
    public function getHasMany() {
        return $this->mapping['hasMany'];
    }
    public static function cast(AbstractEntity $object) {
       return $object;
    }
    public function getMappedTable() {
       return $this->mapping['table'];
    }
    
    abstract public function __toString();
}
