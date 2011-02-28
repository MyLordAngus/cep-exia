<?php
/**
 * Description of abstractcepdao
 *
 * @author SuperBen
 */
abstract class AbstractCepDAO {
    protected $dbTemplate;

    public function  __construct() {
        $this->dbTemplate = DbTemplate::getInstance();
    }
}
