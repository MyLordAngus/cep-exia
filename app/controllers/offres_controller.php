<?php
/**
 * Description of OffresController
 *
 * @author SuperBen
 */
class Offres_controller extends CI_Controller {
    private $offreDAO;
    private $categorieDAO;

    public function __construct(){
        parent::__construct();
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
        $this->offreDAO = new OffreDAOImpl();
        $this->categorieDAO = new CategorieDAOImpl();
    }

    public function index(){
        $this->page();
    }

    public function page($page=0){
        $this->load->library('pagination');
        //Pagination en place
        $config['base_url'] = base_url()."index.php/offres_controller/page/";
        $config['total_rows'] = $this->offreDAO->compteOffres();
        $config['per_page'] = '5';
        $data['offres'] = $this->offreDAO->selectLimit($page, $config['per_page']);
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['titre'] = "Offres";
        $data['contenu'] = "offre/index";
        $data['menu'] = Menu::get();
	$data['categories'] = $this->categorieDAO->selectAll();
        $this->load->view("inc/template", $data);

    }

    public function search($page=0){
        $this->load->library('pagination');
        $data['offres'] = $this->offreDAO->selectOffresRecherche($this->input->post('entreprise'), $this->input->post('categorie'), $this->db);

        $data['pagination'] = null;
        $data['titre'] = "Offres";
        $data['contenu'] = "offre/index";
        $data['menu'] = Menu::get();
		$data['categories'] = $this->categorieDAO->selectAll();
        $this->load->view("inc/template", $data);

    }

    public function edit($idOffre){
        $o = $this->offreDAO->select($idOffre);
        if(!$this->form_validation->run('offres_add')){
            if(validation_errors ())
                $data['messages']['error'] = validation_errors ();

	    $data['titre'] = "Edition de l'offre \"".$o->titre.'"';
            $data['offre'] = $o;
            $data['contenu'] = 'offre/edit';
            $data['menu'] = Menu::get();
            $data['categories'] = $this->categorieDAO->selectAll();
            $this->load->view('inc/template', $data);
        }
        else{
            $offre = $this->offreDAO->select($idOffre);
            $offre->titre = $this->input->post('titre');
            $offre->description = $this->input->post('description');
            $offre->Categorie->ID = $this->input->post('categorie');
            $this->offreDAO->update($offre);
            $this->db->cache_delete('offres_controller', 'description');
            redirect('devis_controller/index/'.$offre->id);
        }
    }

    public function description($idOffre){
        $o = $this->offreDAO->select($idOffre);
        $data['titre'] = $o->titre;
		$data['userType'] = $_SESSION['user']->getClassName();
        //Infos Entreprise
        $data['entreprise'] = $o->Entreprise;
        $data['offre'] = $o;
        $data['contenu'] = "offre/desc";
        $data['menu'] = Menu::get();
        $this->load->view("inc/template", $data);
    }

    /*** Fonction pour afficher le formulaire de creation d'une nouvelle offre par une entreprise ***/
    public function add(){
        $o = new Offre();
		if(!$this->form_validation->run('offres_add')){
                if(validation_errors ())
                    $data['messages']['error'] = validation_errors ();
                $data['titre'] = "Creation d'une offre";
                $data['offre'] = $o;
                $data['contenu'] = 'offre/add';
                $data['menu'] = Menu::get();
                $data['categories'] = $this->categorieDAO->selectAll();
                $this->load->view('inc/template', $data);
        }
        else{
            $o->titre = $this->input->post('titre');
            $o->description = $this->input->post('description');
            $o->Categorie->id = $this->input->post('categorie');
            $o->Entreprise->id = $_SESSION['user']->id;
            $o->Statut->id = 1;
            $this->offreDAO->insert($o);
            redirect('entreprise');
        }
    }

}
