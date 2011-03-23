<?php
/**
 * Description of Site_controller
 *
 * @author SuperBen
 */
class Site_controller extends CI_Controller {
    private $offreDAO;
    public function  __construct() {
        parent::__construct();
        $this->offreDAO = new OffreDAOImpl();
    }
    public function index(){
        $data['titre'] = "Index";
        $data['contenu'] = 'home_view';
        $data['menu'] = Menu::get();
        $data['offres'] = $this->offreDAO->selectLimit(0, 6);
        $data['articles'] = $this->getTumblrPosts();
        $this->load->view('inc/template', $data);
    }

    public function deconnexion(){
        session_destroy();
        $this->db->cache_delete_all();
        redirect();
    }

    private function getTumblrPosts(){
        $xml = NULL;
        $url = rawurlencode("http://communaute-exars-prestataires.tumblr.com/api/read");
        if($xml = simplexml_load_file($url)){
            return $xml->posts;
        }
        return NULL;

    }
}
