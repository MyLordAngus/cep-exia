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
        //session_start();
        $this->baseURL = $GLOBALS['CFG']->config['base_url'];
        $routing =& load_class('Router');
        $this->class = strtolower($routing->fetch_class());
        $this->method = strtolower($routing->fetch_method());
    }

    public function before($params) {
        require_once('permissions.php');return true;

        if(!empty($doesNotRequireAuth[$this->class][$this->method])){
            return TRUE;
        }
        else{
            if(!$_SESSION['userType']){
                $this->redirect($login=TRUE);
            }
            else{
                $userType = $_SESSION['userType'];
                if(empty ($permissions[$userType][$this->class][$this->method]) OR
                        $permissions[$userType][$this->class][$this->method] != TRUE){
                    $this->redirect();
                }
            }
        }
        $this->redirect();
    }

    public function after($params) {
        $_SESSION['lastPage'] = "{$this->baseURL}index.php/{$this->class}/{$this->method}";
    }

    private function redirect($login=NULL) {
        $_SESSION['error'][] = "Vous devez être connecté";
        if (!$login) {
            if(isset ($_SESSION['lastPage'])){
                header("location: {$_SESSION['lastPage']}");
                exit;
            }
        }
        header("location: {$this->baseURL}index.php/login.html");
        exit;
    }
}
