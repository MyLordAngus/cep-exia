<?php
/**
 * Description of RelationDAOImpl
 *
 * @author SuperBen
 */
class RelationDAOImpl extends AbstractCepDAO implements RelationDAO{


    public function __construct(){
        parent::__construct();
    }

    public function select($id) {
        $r = new Relation();
        return $this->dbTemplate->load($r->getClassName(), $id);
    }

    public function selectMessages($idRelation) {
		$listeMessages = array();
        $db = $this->dbTemplate->getDb();
        $db->from('messages')
		   ->where('IDRelation', $idRelation)
		   ->order_by('Date', 'Desc');
		foreach($db->get()->result() as $reqMessage){
			$m = new Message();
			$m->id = $reqMessage->ID;
			$m->message = $reqMessage->Message;
			$m->date = $reqMessage->Date;
			$c = new Compte();
			$m->Compte = $this->dbTemplate->load($c->getClassName(), $reqMessage->IDCompte);
			array_push($listeMessages, $m);
		}
        return $listeMessages;
    }

    public function selectLastMessage($idRelation) {
        $db = $this->dbTemplate->getDb();
        $db->from('messages')
           ->where('IDRelation', $idRelation)
           ->order_by('ID', 'Desc')
           ->limite(1);
        $result = $db->get()->row();
        $m = new Message();
		if($result != null){
			$m->id = $result->ID;
			$m->message = $result->Message;
			$m->date = $result->Date;
			$c = new Compte();
			$m->Compte = $this->dbTemplate->load($c->getClassName(), $result->IDCompte);
		}
        return $m;
    }

    public function add(Relation $r) {

    }

    public function addMessage($idRelation, Message $m) {
		$data = array('IDCompte'=> $m->Compte->id,
                      'Message'=> $m->message,
                      'IDRelation'=> $idRelation,
                      'Date'=> time());
        $this->dbTemplate->getDb()->insert('messages', $data);
        $m->id = $this->dbTemplate->getDb()->insert_id();
    }

    public function delete($idRelation) {

    }

    public function deleteMessage($idMessage) {

    }
}
