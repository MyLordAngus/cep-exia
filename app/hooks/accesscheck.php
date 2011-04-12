<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of Accesscheck
 *
 * @author SuperBen
 */
class Accesscheck {

    private $baseURL;
    private $class;
    private $method;
    private $id;

    public function __construct() {
        if (!isset($_SESSION))
            session_start();
        $this->baseURL = $GLOBALS['CFG']->config['base_url'];
        $routing = & load_class('Router');
        $uri = & load_class('URI');
        $this->class = strtolower($routing->fetch_class());
        $this->method = strtolower($routing->fetch_method());
        $this->id = strtolower($uri->rsegment(3));
    }

    public function before($params) {
        include_once('permissions.php');
        if (!empty($doesNotRequireAuth[$this->class][$this->method])) {
            return true;
        } else {
            if (!isset($_SESSION['user'])) {
                $this->redirect(2);
            } else {
                $user = $_SESSION['user'];
                $userType = $user->type;
                if (!empty($permissions[$userType][$this->class][$this->method]) &&
                        $permissions[$userType][$this->class][$this->method] == true) {
                    return true;
                } else if (!empty($ownerRequirement[$userType][$this->class][$this->method])) {
                    $objet = $ownerRequirement[$userType][$this->class][$this->method];
                    if (in_array($objet, $user->listeOwned)) {
                        foreach ($user->listeOwned[$objet] as $row) {
                            if ($row['ID'] == $this->id) {
                                return true;
                            }
                        }
                        $this->redirect(4);
                    }
                }
                $this->redirect(3);
            }
        }
        $this->redirect(1);
    }

    public function after() {
        $CI = & get_instance();
        $_SESSION['lastPageViewed'] = $CI->uri->uri_string();
    }

    private function redirect(int $error) {
        switch ($error) {
            case 1:
                $_SESSION['error'] = "Vous n'avez pas accès à cette partie du site";
                break;
            case 2:
                $_SESSION['error'] = "Vous devez vous authentifier";
                header("location: {$this->baseURL}index.php/login.html");
                exit;
                break;
            case 3:
                $_SESSION['error'] = "Vos droits ne vous permettent pas d'accèder à cette partie";
                break;
            case 4:
                $_SESSION['error'] = "Cet objet ne vous appartient pas.";
                break;
            default:
        }
        header("location: {$this->baseURL}index.php/" . $_SESSION['lastPageViewed'] . '.html');
        exit;
    }

}
