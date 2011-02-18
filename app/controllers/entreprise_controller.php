<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EntrepriseController
 *
 * @author SuperBen
 */
class Entreprise_controller extends CI_Controller {
    private $userDAO;

    public function  __construct() {
        parent::__construct();
        $this->userDAO = new Entreprise();
        $this->userDAO->select($this->session->userdata('id'));
        $this->userDAO->selectOwned();
    }

    public function index(){
        if($this->session->flashdata('error'))
            $data['messages']['error'] = $this->session->flashdata('error');
        $data['titre'] = $this->session->userdata('login')." profil";
        $data['user'] = $this->userDAO;
        $data['contenu'] = 'user/entreprise/profil';
        $data['menu'] = Menu::get();
        $this->load->view('inc/template', $data);
    }

    public function save(){
        $Entreprise = $this->userDAO;
        $Entreprise->raisonSoc = $this->input->post('raisonSoc');
        $Entreprise->telephone = $this->input->post('telephone');
        $Entreprise->email = $this->input->post('email');
        $Entreprise->siret = $this->input->post('siret');
        $Entreprise->adresse = $this->input->post('adresse');
        $Entreprise->codePostal = $this->input->post('codePostal');
        $Entreprise->ville = $this->input->post('ville');
        $Entreprise->domaine = $this->input->post('domaine');
        $this->userDAO->update($Entreprise);
        $this->index();
    }

    public function show($idEntreprise){
//        $Entreprise = new Entreprise();
	$this->userDAO->select($idEntreprise);
	$data['entreprise'] = $this->userDAO;
	$data['contenu'] = 'user/entreprise/resume';
	$data['titre'] = "Entreprise \"".$this->userDAO.'"';
	$data['menu'] = Menu::get();
	$this->load->view('inc/template', $data);
    }
}
