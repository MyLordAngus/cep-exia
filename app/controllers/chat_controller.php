<?php
/**
 * Description of chat_controller
 *
 * @author SuperBen
 */
class Chat_controller extends CI_Controller{
    private $relationDAO;

    public function  __construct() {
        parent::__construct();
        $this->relationDAO = new RelationDAOImpl();
    }

    public function index($idRelation){
        $relation = $this->relationDAO->select($idRelation);
        $relation->listeMessages = $this->relationDAO->selectMessages($idRelation);
        $data['relation'] = $relation;
		$data['contenu'] = 'user/chat';
        $data['menu'] = Menu::get();
		$data['titre'] = 'Conversation'; 
        $this->load->view('inc/template', $data);
    }

    public function post($idRelation){
		$this->form_validation->set_rules('post', 'Message', 'required');
        if($this->form_validation->run()){
			$m = new Message();
			$m->message = $this->input->post('post');
			$m->Compte = $_SESSION['user'];
			$this->relationDAO->addMessage($idRelation, $m);
                        $_SESSION['user']->addOwnObject($m);
		}else{
			$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
			$_SESSION['error'] = validation_errors();
		}
		redirect('chat_controller/index/'.$idRelation);
    }
}
