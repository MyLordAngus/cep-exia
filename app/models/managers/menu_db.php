<?php
class Menu_DB{
	private $arrayMenu;
        private $db;
	
	public function __construct(){
		$this->arrayMenu = array();
                $this->db = get_instance()->db;
	}

	public function getMenuByCode($arrayCode = array()){
		$this->arrayMenu = array();
		$this->db->select('*');
		$this->db->from('menu');
		$where = 'Code = 0';
		foreach($arrayCode as $code){
			$where .= ' OR Code = '.$code;
		}
		$this->db->where($where);
		$requete = $this->db->get();

		foreach($requete->result() as $reqMenu){
		    array_push($this->arrayMenu, array('libelle' => $reqMenu->Libelle, 'lien' => $reqMenu->Lien));	
		}
		return $this->arrayMenu;
	}
}