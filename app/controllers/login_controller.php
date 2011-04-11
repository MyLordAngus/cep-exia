<?php
/**
 * Description of LoginController
 *
 * @author SuperBen
 */
class Login_controller extends CI_Controller {
    private $usersessionDAO;
    private $entrepriseDAO;
    private $prestataireDAO;
    

    public function  __construct() {
        parent::__construct();
        $this->usersessionDAO = new UserSessionDAOImpl();
        $this->entrepriseDAO = new EntrepriseDAOImpl();
        $this->prestataireDAO = new PrestataireDAOImpl();
    }
    public function index(){
        if($this->form_validation->run('login')){
            $user = $this->usersessionDAO->connexion($this->input->post('login'),
                                                     $this->input->post('mdp'));
            if($user){
                $_SESSION['user'] = $user;
                redirect(strtolower($user->type));
            }
            else{
                $data['messages']['error'] = "Combinaison login+mot-de-passe invalide.";
            }
        }
        else{
            if(validation_errors()){				
				$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
				$_SESSION['error'] = validation_errors();
			}
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
                $user->description = $this->input->post('description');
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
            if(!$this->usersessionDAO->compteExistant($user->login, $user->email)){
                if($type == 'entreprise'){
                    $this->entrepriseDAO->insert($user);
                    $usersession = new UserSession();
                    $usersession->login = $user->login;
                    $usersession->type = "entreprise";
                    $_SESSION['user'] = $usersession;
                    redirect($usersession->type);
                }
                else{
                    $this->prestataireDAO->insert($user);
                    $data['messages']['error'] = "Votre inscription sera prise en compte prochainement par un administrateur.";
                    redirect("");
                }
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
