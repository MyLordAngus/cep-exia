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
                //$this->redirect(2);
            }
            else{
                $user = (object)$_SESSION['user'];
                $userType = $user->type;
                echo $userType;exit;
                if(empty ($permissions[$userType][$this->class][$this->method]) OR
                        $permissions[$userType][$this->class][$this->method] != true){
                    //$this->redirect(3);
                }
            }
        }
        //$this->redirect(1);
    }

    public function after($params) {
        //get_instance()->form_validation->set_error_delimiters('<p class="error">', '</p>');
    }

    private function redirect(int $error) {
        header("location: {$this->baseURL}index.php/login.html");
        exit;
    }
}
