<?php
/**
 * Description of LoginController
 *
 * @author SuperBen
 */
class Login_controller extends CI_Controller {
    private $usersessionDAO;
    

    public function  __construct() {
        parent::__construct();
        $this->usersessionDAO = new UserSessionDAOImpl();
    }
    public function index(){
        if($this->form_validation->run('login')){
            $user = $this->usersessionDAO->connexion($this->input->post('login'),
                                                     $this->input->post('mdp'));
            if($user){
                $_SESSION['user'] = $user;
                $user = AbstractEntity::cast($user);
                redirect(strtolower($user->getClassName()));
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

    public function refuse(int $param) {
        switch ($param) {
            case 1:
                $data['error'] = "Vous ne possèdez pas les permissions requises.";
                break;

            case 2:
                $data['error'] = "Vous n'êtes pas connecté";
                break;

            case 3:
                $data['error'] = "Vous n'avez pas acces à cette partie";
                break;

            default:
                break;
        }
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
