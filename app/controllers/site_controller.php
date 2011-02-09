<?php
/**
 * Description of site_controller
 *
 * @author SuperBen
 */
class Site_controller extends Controller {
    private $offreDAO;
    public function  __construct() {
        parent::Controller();
        $this->offreDAO = new Offre();
    }
    public function index(){
        $data['titre'] = "Index";
        $data['contenu'] = 'home_view';
        $data['menu'] = Menu::get();
        $data['offres'] = $this->offreDAO->selectOffresByPages(0, 6);
        $data['articles'] = $this->getTumblrPosts();
        $this->load->view('inc/template', $data);
    }

    public function resumeEntreprise($id=1){
        $entreprise = new Entreprise();
        $entreprise->select($id);
        $entreprise->selectOwned();
        $data['titre'] = "Résumé de ".$entreprise->raisonSoc;
        $data['entreprise'] = $entreprise;
        $data['contenu'] = 'user/entreprise/resume';
        $data['menu'] = Menu::get();
        $this->load->view('inc/template', $data);
    }

    public function resumePrestataire($id=1){
        $prestataire = new Prestataire();
        $prestataire->select($id);
        $prestataire->selectOwned();
        $data['titre'] = "Résumé de ".$prestataire->prenom." ".$prestataire->prenom;
        $data['prestataire'] = $prestataire;
        $data['contenu'] = 'user/prestataire/resume';
        $data['menu'] = Menu::get();
        $this->load->view('inc/template', $data);
    }

    public function deconnexion(){
        $this->session->sess_destroy();
        redirect();
    }

    private function getTumblrPosts(){
        $xml = NULL;
        $url = rawurlencode("http://communaute-exars-prestataires.tumblr.com/api/read");
        if(file_exists($url)){
            $xml = simplexml_load_file($url);
        }
        if($xml !== NULL)
            return $xml->posts;
        return NULL;

    }
}
