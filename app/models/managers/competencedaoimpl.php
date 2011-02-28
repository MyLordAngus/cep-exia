<?php
class CompetenceDAOImpl extends AbstractCepDAO implements CompetenceDAO{

    public function  __construct() {
        parent::__construct();
    }
    public function selectAll(){
        $c = new Competence();
        return $this->dbTemplate->loadAll($c->getClassName());
    }
}
?>
