<?php
/**
 *
 * @author SuperBen
 */
interface DevisDAO {
    public function select($id);

    public function update(Devis $d);

    public function insert(Devis $d);
}
