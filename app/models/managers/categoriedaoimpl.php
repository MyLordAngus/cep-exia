<?php

class CategorieDAOImpl extends AbstractCepDAO implements CategorieDAO{

    public function __construct(){
        parent::__construct();
    }

    public function select($id){
        $c = new Categorie();
        return $this->dbTemplate->load($c->getClassName(), $id);
    }

    public function selectAll(){
        $c = new Categorie();
        return $this->dbTemplate->loadAll($c->getClassName());
    }
}
