<?php
/**
 * Description of PrestataireController
 *
 * @author SuperBen
 */
class Prestataire_controller extends Controller {
    private $user;

    public function  __construct() {
        parent::Controller();
        $this->user = new Prestataire();
        $this->user->select($this->session->userdata('id'));
    }

    public function index(){
        $data['titre'] = $this->session->userdata('login').' profil';
        $data['user'] = $this->user;
        $data['listeCompetences'] = array();
        foreach ($this->user->listeCompetences as $c)
                $data['listeCompetences'][] = $c->libelle;
        $data['allCompetences'] = Competence::selectAll();
        $data['devis'] = $this->user->selectOwned();
        $data['contenu'] = 'user/prestataire/profil';
        $data['menu'] = Menu::get();
        $this->load->view('inc/template', $data);
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
                $Competence->ID = $postCompetence;
                array_push($listeCompetences, $Competence);
            }
        }
        $prestataire->listeCompetences = $listeCompetences;
        $this->user->update($prestataire);
        redirect('prestataire');
    }

    public function resume($id=1){
        $prestataire = new Prestataire();
        $prestataire->select($id);
        $data['titre'] = "Résumé du prestataire ".$prestataire->nom.' '.$prestataire->prenom;
        $data['prestataire'] = $prestataire;
        $data['contenu'] = 'user/prestataire/resume';
        $data['menu'] = Menu::get();
        $this->load->view('inc/template', $data);
    }

}
