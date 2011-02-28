<?php

class Devis_Controller extends CI_Controller{

    private $devisDAO;
    private $offreDAO;

    public function __construct(){
	parent::__construct();
	$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	$this->devisDAO = new DevisDAOImpl();
	$this->offreDAO = new OffreDAOImpl();
    }

    public function index($idOffre){
	$o = $this->offreDAO->select($idOffre);
	$o->listeDevis = $this->offreDAO->selectDevis($o->id);
	$data['menu'] = Menu::get();
	$data['offre'] = $o;
	$data['titre'] = "Index des devis";
	$data['contenu'] = 'devis/index';
	$this->load->view('inc/template', $data);
    }

    public function add($idOffre=1){
	$o = $this->offreDAO->select($idOffre);
	if(!$this->form_validation->run("devis_add")){
	    $o->listeDevis = $this->offreDAO->selectDevis($idOffre);
	    $data['menu'] = Menu::get();
	    $data['offre'] = $o;
	    $data['titre'] = "Creation d'un devis";
	    $data['contenu'] = 'devis/add';
	    $this->load->view('inc/template', $data);
	}else{
	    $Devis = new Devis();
	    $Devis->montant = $this->input->post('montant');
	    $Devis->Offre = $o;
	    $Devis->Prestataire->id = $_SESSION['user']->id;
	    $Devis->description = $this->input->post('description');
	    $Devis->duree = $this->input->post('duree');
	    $this->devisDAO->insert($Devis);
	    redirect('offres/description/offre-'.$Devis->Offre->id);
	}
    }

    public function edit($idDevis=0){
	$d = $this->devisDAO->select($idDevis);
	if(!$this->form_validation->run("devis_add")){
	    $data['menu'] = Menu::get();
	    $data['devis'] = $d;
	    $data['titre'] = "Creation d'un devis";
	    $data['contenu'] = 'devis/edit';
	    $this->load->view('inc/template', $data);
	}else{
	    $devis = $d;
	    $devis->montant = $this->input->post('montant');
	    $devis->Prestataire->id = $_SESSION['user']->id;
	    $devis->description = $this->input->post('description');
	    $devis->duree = $this->input->post('duree');
	    $this->devisDAO->update($devis);
	    redirect('prestataire_controller');
	}
    }

    public function accepter($idDevis, $idOffre){
	$offre = $this->offreDAO->select($idOffre);
	$listeDevis = $this->offreDAO->selectDevis();
	foreach($listeDevis as $d){
	    if($d->numero == $idDevis)
		$d->etat = 1;
	    else
		$d->etat = -1;
	    $this->devisDAO->update($d);
	}
	redirect('devis/tous-les-devis/offre-'.$offre->numero);
    }

    public function show($idDevis){
	$d = $this->devisDAO->select($idDevis);
	$data['titre'] = 'Aperçu du devis';
	$data['devis'] = $d;
	$data['contenu'] = "devis/desc";
	$data['menu'] = Menu::get();
	$this->load->view("inc/template", $data);
    }

}
