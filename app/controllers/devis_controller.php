<?php
class Devis_Controller extends Controller{
    private $devisDAO;
    private $offreDAO;
    public function __construct(){
        parent::Controller();
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
        $this->devisDAO = new Devis();
        $this->offreDAO = new Offre();
    }

    public function index($idOffre) {
        $this->offreDAO->select($idOffre);
        $this->offreDAO->selectDevis();
        $data['menu'] = Menu::get();
        $data['offre'] = $this->offreDAO;
        $data['titre'] = "Index des devis";
        $data['contenu'] = 'devis/index';
        $this->load->view('inc/template', $data);
    }

    public function add($idOffre=1){
        $this->offreDAO->select($idOffre);
        if(!$this->form_validation->run("devis_add")){
            $this->offreDAO->selectDevis();
            $data['menu'] = Menu::get();
            $data['offre'] = $this->offreDAO;
            $data['titre'] = "Creation d'un devis";
            $data['contenu'] = 'devis/add';
            $this->load->view('inc/template', $data);
        }else{
            $Devis = new Devis();
            $Devis->montant = $this->input->post('montant');
            $Devis->Offre = $this->offreDAO;
            $Devis->Prestataire->ID = $this->session->userdata('id');
            $Devis->description = $this->input->post('description');
            $Devis->duree = $this->input->post('duree');
            $this->devisDAO->insert($Devis);
            redirect('offres/description/offre-'.$Devis->Offre->numero);
        }
    }

    public function edit($idDevis=0) {
        $this->devisDAO->select($idDevis);
        if(!$this->form_validation->run("devis_add")){
            $data['menu'] = Menu::get();
            $data['devis'] = $this->devisDAO;
            $data['titre'] = "Creation d'un devis";
            $data['contenu'] = 'devis/edit';
            $this->load->view('inc/template', $data);
        }else{
            $devis = $this->devisDAO;
            $devis->montant = $this->input->post('montant');
            $devis->Prestataire->ID = $this->session->userdata('id');
            $devis->description = $this->input->post('description');
            $devis->duree = $this->input->post('duree');
            $this->devisDAO->update($devis);
            redirect('prestataire');
        }
    }
    
    public function accepter($idDevis, $idOffre) {
        $offre = $this->offreDAO->select($idOffre);
        $listeDevis = $this->offreDAO->selectDevis();
        foreach ($listeDevis as $d) {
            if($d->numero == $idDevis)
                $d->etat = 1;
            else
                $d->etat = -1;
            $this->devisDAO->update($d);
        }
        redirect('devis/tous-les-devis/offre-'.$offre->numero);
    }
}
