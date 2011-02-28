<?php
/**
 * Description of dbtemplate
 * Cette classe met en place le pattern d'IoC (Invertion Of Control) si cher aux
 * frameworks Java (Spring, Hibernate, JPA). Grâce à celui-ci, elle permet
 * aux objets entités héritant de la classe AbstractEntity d'être persistants
 * en base de données.
 * On utilise pour beaucoup la classe de reflexivité ReflectionClass de php5 pour
 * connaitre la structure de la classe, si elle herite d'une autre classe.
 * http://php.net/manual/fr/class.reflectionclass.php
 * @author SuperBen
 * @version 0.3.0.6
 */
class DbTemplate {
    private $db;
    private $lastQueryResult = null;
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
        $this->db = get_instance()->db;
    }

    /**
     * Methode de chargement générique pour un objet en fonction de son id.
     * L'objet de retour doit être casté en fonction de l'objet désiré.
     *
     * @author SuperBen
     * @param string $objectType
     * @param int $id
     * @return AbstractEntity
     */
    public function load($class, $id){
        
        $classReflection = new ReflectionClass($class);
        $instance = AbstractEntity::cast(new $class);
        //Si la classe est dérivée d'une ou plusieurs parentes
        if($classReflection->getParentClass()){
            $parent = null;
            if(!$classReflection->getParentClass()->isAbstract()){
                //On récupère en base le parent avec sa table
                $parent = $this->load($classReflection->getParentClass()->getName(), $id);
                if($parent instanceof AbstractEntity){
                    $parentReflection = new ReflectionObject($parent);
                    //Et on assigne aux attributs hérités chaque valeur des attributs de la class mère
                    //Note: la classe mère ne doit pas être abstraite
                    foreach($parentReflection->getProperties() as $attribut){
                        if($attribut->getName() != 'mapping'){
                            $instance->{$attribut->getName()} = $parent->{$attribut->getName()};
                        }
                    }
                }
            }
        }

        //Requète sur la table mappée dans l'entity des champs à charger.
        $this->lastQueryResult = $this->db->from($instance->getMappedTable())
                                          ->where('ID', $id)
                                          ->get()->row();
        $row = $this->lastQueryResult;
        //Pour chaque champ récupèré dans la requete précèdente
        foreach ($row as $champ => $value) {
            if($champ != 'ID')
                $champ = strtolower($champ[0]).substr($champ, 1);
            else
                $champ = strtolower ($champ);
            //On test si l'attribut est de type primaire (ex: string, int, float, etc),
            //si il est primaire, il sa premiere lettre sera en minuscule par convention dans l'entity.
            if($classReflection->hasProperty($champ)){
                $instance->$champ = $value;
            }
        }
        //Tous les attributs de type primaire sont remplis.
        //On passe aux attributs contenant des instances d'objets.
        foreach ($instance->getHasOne() as $hasOneEntity) {
            $hasOneEntity = AbstractEntity::cast(new $hasOneEntity);
            //On charge récursivement l'objet et ses attributs.
            $instance->{$hasOneEntity->getClassName()} = $this->load($hasOneEntity->getClassName(),
                                                                      $row->{'ID'.$hasOneEntity->getClassName()});
        }
        //Les collection d'objets sont desactivées volontairement car celles-ci créent
        //des boucles infinies de chargement d'objet quand un objet de la collection
        //contient une référence vers l'objet parent.
        /*
        foreach($instance->getHasMany() as $hasManyEntity){
            $collection = array();
            $hasManyEntity = AbstractEntity::cast(new $hasManyEntity);
            $results = $this->db->select('ID')
                        ->from($hasManyEntity->getMappedTable())
                        ->where('ID'.$instance->getClassName(), $row->ID)
                        ->get()->result();
            foreach ($results as $row2) {
                array_push($collection, $this->load($hasManyEntity->getClassName(), $row2->ID));
            }
            $hasManyEntityAttributName = $hasManyEntity->getMappedTable();
            $hasManyEntityAttributName = strtoupper($hasManyEntityAttributName[0]).substr($hasManyEntityAttributName, 1);
            $instance->{'liste'.$hasManyEntityAttributName} = $collection;
        }*/
        $this->db->close();
        return $instance;
    }

    public function loadAll($class) {
        $instance = AbstractEntity::cast(new $class);
        $collection = array();
        $results = $this->db->select('ID')->get($instance->getMappedTable())->result();
        foreach($results as $row){
            $instance = $this->load($instance->getClassName(), $row->ID);
            array_push($collection, $instance);
        }
        $this->db->close(); 
        return $collection;
    }

    /**
     * Methode d'update générique
     * @param object $model
     * @return void
     */
    public function update(AbstractEntity $model) {
        
        $this->db->update($model->getMappedTable(),$model)
                 ->where($model->id);
    }

    /**
     * Methode d'insertion générique
     * @param AbstractEntity $model
     * @return void
     */
    public function insert(AbstractEntity $model) {
        $this->db->insert($model->getMappedTable(), $model);
    }

    /**
     * Methode de suppression générique
     * @param int $id
     */
    public function delete($class, $id) {
        $this->db->delete($class->getMappedTable())
                 ->where('ID', $id);
    }
    
    /*
     * Getter
     */
    public function getDb(){
        return $this->db;
    }
    public function getLastQueryResult(){
        return $this->lastQueryResult;
    }
}
