<?php
/**
 *
 * @author SuperBen
 */
interface EntrepriseDAO {
    public function select($id);

    public function insert(Entreprise $e);

    public function update(Entreprise $e);

    public function selectAll();

    public function selectOwned($idEntreprise);
}
