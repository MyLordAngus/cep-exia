<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of Accesscheck
 *
 * @author SuperBen
 */
class Accesscheck {

    private $baseURL;
    private $class;
    private $method;
    
    public function  __construct() {
        if(!isset($_SESSION))
            session_start();
        $this->baseURL = $GLOBALS['CFG']->config['base_url'];
        $routing =& load_class('Router');
        $this->class = strtolower($routing->fetch_class());
        $this->method = strtolower($routing->fetch_method());
    }

    public function before($params) {
        require_once('permissions.php');

        if(!empty($doesNotRequireAuth[$this->class][$this->method])){
            return true;
        }
        else{
            if(!isset($_SESSION['user'])){
                echo "coucou1";exit;
                $this->redirect(2);
            }
            else{
                $user = $_SESSION['user'];
                $userType = $user->type;
                if(empty ($permissions[$userType][$this->class][$this->method]) OR
                        $permissions[$userType][$this->class][$this->method] != true){
                    $this->redirect(3);
                }
            }
        }
        //$this->redirect(1);
    }

    public function after() {
        $form_validation =& get_instance()->form_validation;
        $form_validation->set_error_delimiters('<p class="error">', '</p>');
        if(isset($_SESSION['error'])){
            $data = array();
            $output =& get_instance()->output;
            $data['messages']['error'] = $_SESSION['error'];
            $output->append_output($data);
            unset ($_SESSION['error']);
        }
    }

    private function redirect(int $error) {
        switch ($error) {
            case 1:
                $_SESSION['error'] = "Vous n'avez pas accès à cette partie du site";
                break;
            case 2:
                $_SESSION['error'] = "Vous devez vous authentifier";
                break;
            case 3:
                $_SESSION['error'] = "Vos droits ne vous permettent pas d'accèder à cette partie";
                break;
            default:
        }
        header("location: {$this->baseURL}index.php/login.html");
        exit;
    }
}
