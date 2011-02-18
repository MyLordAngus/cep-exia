<?php
/**
 * Description of icrudmodel
 *
 * @author SuperBen
 */
interface  ICrudModel {
    public function select($idObject);
    public function insert($model);
    public function update($model);
    public static function selectAll($db);
    public function getType();
}
