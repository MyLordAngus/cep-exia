<?php
/**
 * Description of icrudmodel
 *
 * @author SuperBen
 */
interface  CepDAO {
    public function select(int $idObject);
    public function insert(object $model);
    public function update(object $model);
    public function selectAll();
}
