<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Accesscheck{
	
	
	public function __construct(){
		;
	}
	
	public function index($params){
		require_once('permissions.php');
		$routing =& load_class('Router');
		$class = $routing->fetch_class();
		$method = $routing->fetch_method();
		
		
		if(!empty($doesNotRequireAuth[$class][$method]))
			return TRUE;
		else{
			if(!isset($_SESSION['userType'])){
				if(!empty($permissions[$_SESSION['userType']][$class][$method]) AND
					$permissions[$_SESSION['userType']][$class][$method]==TRUE){
					return TRUE;
				}
			}
		}
		throw new ErrorSession("AUTH", "Vous n'êtes pas authentifié");
		return FALSE;
		
	}
}
