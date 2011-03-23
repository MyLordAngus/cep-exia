<?php
/**
 * Description of EntrepriseController
 *
 * @author SuperBen
 */
class Entreprise_controller extends CI_Controller {
    private $entrepriseDAO;
	private $relationDAO;
    private $user;

    public function __construct(){
	parent::__construct();
        $this->db->cache_off();
        $this->entrepriseDAO = new EntrepriseDAOImpl();
		$this->relationDAO = new RelationDAOImpl();
        $this->user = $this->entrepriseDAO->select($_SESSION['user']->id);
    }


    public function index(){
        $data['titre'] = $this->user->login." profil";
        $data['user'] = $this->user;
        $data['listeOffres'] = $this->entrepriseDAO->selectOwned($this->user->id);
		$data['listeRelations'] = $this->entrepriseDAO->selectRelations($_SESSION['user']->id);
        $data['contenu'] = 'user/entreprise/profil';
        $data['menu'] = Menu::get();
        $this->load->view('inc/template', $data);
    }

    public function save(){
        $Entreprise = $this->user;
        $Entreprise->raisonSoc = $this->input->post('raisonSoc');
        $Entreprise->telephone = $this->input->post('telephone');
        $Entreprise->email = $this->input->post('email');
        $Entreprise->siret = $this->input->post('siret');
        $Entreprise->adresse = $this->input->post('adresse');
        $Entreprise->codePostal = $this->input->post('codePostal');
        $Entreprise->ville = $this->input->post('ville');
        $Entreprise->domaine = $this->input->post('domaine');
        $Entreprise->description = $this->input->post('description');
        $this->entrepriseDAO->update($Entreprise);
        $this->index();
    }

    public function show($idEntreprise){
	//$Entreprise = new Entreprise();
	$e = $this->entrepriseDAO->select($idEntreprise);
	$e->listeOffres = $this->entrepriseDAO->selectOwned($idEntreprise);
	$data['entreprise'] = $e;
	$data['contenu'] = 'user/entreprise/resume';
	$data['titre'] = "Résumé ".$e->raisonSoc;
	$data['menu'] = Menu::get();
	$this->load->view('inc/template', $data);
    }
}
