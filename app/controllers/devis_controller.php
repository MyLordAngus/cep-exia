<?php

class Devis_Controller extends CI_Controller{

    private $devisDAO;
    private $offreDAO;

    public function __construct(){
	parent::__construct();
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
		if($o->Statut->id < 2){
			if(!$this->form_validation->run("devis_add")){
				$o->listeDevis = $this->offreDAO->selectDevis($idOffre);
				$data['menu'] = Menu::get();
				$data['offre'] = $o;
				$data['titre'] = "Creation d'un devis";
				$data['contenu'] = 'devis/add';
				$this->load->view('inc/template', $data);
			}else{
				$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
				$_SESSION['error'] = validation_errors();
				$Devis = new Devis();
				$Devis->montant = $this->input->post('montant');
				$Devis->Offre = $o;
				$Devis->Prestataire->id = $_SESSION['user']->id;
				$Devis->description = $this->input->post('description');
				$Devis->duree = $this->input->post('duree');
				$this->devisDAO->insert($Devis);
				redirect('offres/description/offre-'.$Devis->Offre->id);
			}
		}else{
			$_SESSION['error'] = "L'offre ${$o->titre} est cloturée.";
				redirect('offres');
		}
    }

    public function edit($idDevis=0){
		$d = $this->devisDAO->select($idDevis);
		if($d->etat < 1){
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
		}else{
			$_SESSION['error'] = "Le devis n'est plus modifiable.";
			redirect('prestataire');
		}
    }

    public function accepter($idDevis, $idOffre){
	$offre = $this->offreDAO->select($idOffre);
	$listeDevis = $this->offreDAO->selectDevis($idOffre);
	foreach($listeDevis as $d){
	    if($d->id == $idDevis)
		$d->etat = 1;
	    else
		$d->etat = -1;
	    $this->devisDAO->update($d);
	}
	redirect('devis/tous-les-devis/offre-'.$offre->id);
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
