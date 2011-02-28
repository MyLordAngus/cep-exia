<?php

/**
 * Description of PrestataireController
 *
 * @author SuperBen
 */
class Prestataire_controller extends CI_Controller{
    private $prestataireDAO;
    private $competenceDAO;
    private $user;

    public function __construct(){
	parent::__construct();
        $this->db->cache_off();
        $this->prestataireDAO = new PrestataireDAOImpl();
        $this->competenceDAO = new CompetenceDAOImpl();
        $this->user = $this->prestataireDAO->select($_SESSION['user']->id);
    }

    public function index(){
	$data['titre'] = $this->user->login.' profil';
	$data['user'] = $this->user;
	$data['userCompetences'] = array();
	foreach($this->user->listeCompetences as $c)
	    $data['userCompetences'][] = $c->id;
	$data['allCompetences'] = $this->competenceDAO->selectAll();
	$data['devis'] = $this->prestataireDAO->selectOwned($this->user->id);
	$data['contenu'] = 'user/prestataire/profil';
	$data['menu'] = Menu::get();
	$this->load->view('inc/template', $data);$this->output->enable_profiler(true);
    }

    public function save(){
	$prestataire = $this->user;
	$prestataire->nom = $this->input->post('nom');
	$prestataire->prenom = $this->input->post('prenom');
	$prestataire->telephone = $this->input->post('telephone');
	$prestataire->email = $this->input->post('email');
	$prestataire->siret = $this->input->post('siret');

	$listeCompetences = array();
	if($this->input->post('competences')){
	    foreach($this->input->post('competences') as $postCompetence){
		$Competence = new Competence();
		$Competence->id = $postCompetence;
		array_push($listeCompetences, $Competence);
	    }
	}
	$prestataire->listeCompetences = $listeCompetences;
	$this->prestataireDAO->update($prestataire);
	redirect('prestataire');
    }

    public function show($idPrestataire){
	$p = $this->prestataireDAO->select($idPrestataire);
	$p->listeDevis = $this->prestataireDAO->selectOwned($idPrestataire);
	$data['prestataire'] = $p;
	$data['contenu'] = 'user/prestataire/resume';
	$data['titre'] = 'Résumé '.$p->prenom.' '.$p->nom;
	$data['menu'] = Menu::get();
	$this->load->view('inc/template', $data);
    }
}
