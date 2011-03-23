<?php
/**
 *
 * @author SuperBen
 */
interface PrestataireDAO {
    public function select($id);

    public function insert(Prestataire $p);

    public function update(Prestataire $p);

    public function selectAll();

    public function selectOwned($idPrestatire);
	
	public function selectRelations($idPrestatire);
}
