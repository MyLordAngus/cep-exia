<?php
/**
 * Description of LoginController
 *
 * @author SuperBen
 */
class Login_controller extends CI_Controller {
    public function  __construct() {
        parent::__construct();
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
    }
    public function index(){
		if(!empty($_SESSION['error'])){
			
		}
        if($this->form_validation->run('login')){
            $user = Compte::connexion($this->input->post('login'),  $this->input->post('mdp'));
            if($user){
                $data = array(
                    'id' => $user->ID,
                    'login' => $user->login,
                    'type' => $user->getType(),
                    'isLoged' => true,
                    'listeDroits' => $user->listeDroits
                );
				$_SESSION['userType'] = $user->getType();
                $this->session->set_userdata($data);
                if($this->session->flashdata('redirect'))
                    redirect ($this->session->flashdata('redirect'));
                else
                    redirect($user->getType());
            }
            else{
                $data['messages']['error'] = "Combinaison login+mot-de-passe invalide.";
            }
        }
        else{
            if(validation_errors())
                $data['messages']['error'] = validation_errors();
        }
        $data['titre'] = "Login";
        $data['login'] = $this->input->post("login");
        $data['menu'] = Menu::get();
        $data['contenu'] = "user/auth";
        $this->load->view('inc/template', $data);
    }
    public function sinscrire($type=""){
        if($this->form_validation->run()){
            if($type == 'entreprise'){
                $user = new Entreprise();
                $user->raisonSoc = $this->input->post('raisonSoc');
                $user->adresse = $this->input->post('adresse');
                $user->codePostal = $this->input->post('cp');
                $user->ville = $this->input->post('ville');
                $user->domaine = $this->input->post('domaine');
            }
            else{
                $user = new Prestataire();
                $user->nom = $this->input->post('nom');
                $user->prenom = $this->input->post('prenom');
            }
            $user->login = $this->input->post('login');
            $user->password = $this->input->post('mdp_confirm');
            $user->telephone = $this->input->post('tel');
            $user->email = $this->input->post('email');
            $user->siret = $this->input->post('siret');
            if($user->insert()){
                $data = array(
                    'login' => $user->Compte->login,
                    'type' => $user->Compte->type,
                    'isLoged' => true
                );
                $this->session->set_userdata($data);
                $data['messages']['info'] = "Votre inscription a été validée.";
                redirect($user->getType());
            }
            else{
                $data['messages']['error'] = "Votre login ou votre e-mail est déjà utilisé.";
            }
        }
        else{
            $data['messages']['error'] = validation_errors();
        }
        $data['menu'] = Menu::get();
        $data['titre'] = "Inscription";
        $data['contenu'] = "user/add";
        $this->load->view('inc/template', $data);
    }
}
