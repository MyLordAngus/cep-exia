<?php
/**
 *
 * @author SuperBen
 */
interface RelationDAO {
    public function select($id);
    public function selectMessages($idRelation);
    public function selectLastMessage($idRelation);
    public function add(Relation $r);
    public function addMessage($idRelation, Message $m);
    public function delete($idRelation);
    public function deleteMessage($idMessage);
}
