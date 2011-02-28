<?php
/**
 *
 * @author SuperBen
 */
interface OffreDAO {
    public function select($id);

    public function insert(Offre $o);

    public function update(Offre $o);

    public function delete($id);

    public function selectAll();

    public function selectLimit($limitInf, $limitNombre);
}
?>
