<?php
/**
 * Description of OffresController
 *
 * @author SuperBen
 */
class Offres_controller extends CI_Controller {
    private $offreDAO;
    public function __construct(){
        parent::__construct();
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
        $this->offreDAO = new Offre();
    }

    public function index(){
        $this->page();
    }

    public function page($page=0){
        if($this->session->flashdata('redirect'))
            $data['messages']['error'] = $this->session->flashdata('redirect');
        $this->load->library('pagination');
        //Pagination en place
        $config['base_url'] = base_url()."index.php/offres/page/";
        $config['total_rows'] = $this->offreDAO->compteOffres();
        $config['per_page'] = '10';
        $data['offres'] = $this->offreDAO->selectOffresByPages($page, $config['per_page']);
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['titre'] = "Offres";
        $data['contenu'] = "offre/index";
        $data['menu'] = Menu::get();
	$data['categories'] = Categorie::selectAll($this->db);

        $this->load->view("inc/template", $data);

    }

    public function search($page=0){
        $this->load->library('pagination');
        $data['offres'] = Offre::selectOffresRecherche($this->input->post('entreprise'), $this->input->post('categorie'), $this->db);

        $data['pagination'] = null;
        $data['titre'] = "Offres";
        $data['contenu'] = "offre/index";
        $data['menu'] = Menu::get();
	$data['categories'] = Categorie::selectAll($this->db);
        $this->load->view("inc/template", $data);

    }

    public function edit($idOffre){
        $this->offreDAO->select($idOffre);
        if(!$this->form_validation->run('offres_add')){
            if(validation_errors ())
                $data['messages']['error'] = validation_errors ();

	    $data['titre'] = "Edition de l'offre \"".$this->offreDAO->titre.'"';
            $data['offre'] = $this->offreDAO;
            $data['contenu'] = 'offre/edit';
            $data['menu'] = Menu::get();
            $cat = new Categorie();
            $data['categories'] = $cat->selectAll($this->db);
            $this->load->view('inc/template', $data);
        }
        else{
            $offre = $this->offreDAO;
            $offre->titre = $this->input->post('titre');
            $offre->description = $this->input->post('description');
            $offre->Categorie->ID = $this->input->post('categorie');
            $this->offreDAO->update($offre);
            redirect('offres_controller/description/'.$this->offreDAO->numero);
        }
    }

    public function description($idOffre){
        $this->offreDAO->select($idOffre);echo $idOffre;
        $data['titre'] = $this->offreDAO->titre;
	$data['userType'] = $this->session->userdata('type');
        //Infos Entreprise
        $data['entreprise'] = $this->offreDAO->Entreprise;
        $data['offre'] = $this->offreDAO;
        $data['contenu'] = "offre/desc";
        $data['menu'] = Menu::get();
        $this->load->view("inc/template", $data);
    }

    /*** Fonction pour afficher le formulaire de creation d'une nouvelle offre par une entreprise ***/
    public function add(){
        if(!$this->form_validation->run('offres_add')){
                if(validation_errors ())
                    $data['messages']['error'] = validation_errors ();
                $data['titre'] = "Creation d'une offre";
                $data['offre'] = $this->offreDAO;
                $data['contenu'] = 'offre/add';
                $data['menu'] = Menu::get();
                $data['categories'] = Categorie::selectAll($this->db);
                $this->load->view('inc/template', $data);
        }
        else{
            $offre = $this->offreDAO;
            $offre->titre = $this->input->post('titre');
            $offre->description = $this->input->post('description');
            $offre->Categorie->ID = $this->input->post('categorie');
            $offre->Entreprise->ID = $this->session->userdata('id');
            $this->offreDAO->insert($offre);
            redirect('entreprise');
        }
    }

}
