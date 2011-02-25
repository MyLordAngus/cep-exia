<?php
/**
 * Description of dbtemplate
 *
 * @author SuperBen
 */
class DbTemplate {
    private $db;
    private static $instance = null;

    /**
     * Singleton
     * @return DbTemplate
     */
    public static function getInstance(){
        if(!self::$instance)
            self::$instance = new DbTemplate();
        return self::$instance;
    }

    private function  __construct() {
        $this->db = get_instance();
    }

    /**
     * Methode de chargement générique pour un objet en fonction de son id.
     * L'objet de retour doit être casté en fonction de l'objet désiré.
     * @param string $objectType
     * @param int $id
     * @return AbstractEntity
     */
    public function load(string $class, int $id){
        $classModel = new ReflectionClass($class);
        $instance = AbstractEntity::cast(new $class);
        $rqt = $this->db->get_where($this->getTableName($class), array('id'=> $id));
        $row = $rqt->row();
        foreach($classModel->getProperties() as $attribut){
            $attrName = $attribut->getName();
            if(array_key_exists($attrName, $instance->getHasOne())){
                $Objet = AbstractEntity::cast(new $attrName);
                $instance->$attrName = $this->load($Objet->getType(), $row->${ID.$attrName});
            }
            else if(array_key_exists($attrName, $instance->getHasMany())){
                $liste = array();

            }
            else{
                $instance->$attrName = $row->$attrName;
            }
        }
    }

    public function loadAll(string $class) {
        $liste = array();
        $rqt = $this->db->get($this->getTableName($class));

    }

    /**
     * Methode d'update générique
     * @param object $model
     * @return void
     */
    public function update(AbstractEntity $model) {
        
        $this->db->update($this->getTableName($model->getType()),$model)
                 ->where($model->id);
    }

    /**
     * Methode d'insertion générique
     * @param AbstractEntity $model
     * @return void
     */
    public function insert(AbstractEntity $model) {
        $this->db->insert($this->getTableName($model->getType()), $model);
    }

    /**
     * Methode de suppression générique
     * @param int $id
     */
    public function delete(int $id) {
        $this->db->delete($this->getTableName($model->getType()))
                 ->where('id', $id);
    }

    /**
     * Retourne le nom de la table correspondante à la classe.
     * @param string $class
     * @return <type>
     */
    private function getTableName(string $class) {
        return strtolower($class->getType()).'s';
    }
    
    /*
     * Getter
     */
    public function getDb(){
        return $this->db;
    }
}