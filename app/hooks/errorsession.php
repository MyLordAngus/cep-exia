<?php

class ErrorSession{
	private $message;
	private $urlToRedirectAfterLogin;
	
	public function __construct(string $code, string $message, string $urlToRedirectAfterLogin=NULL){
		$baseURL = $GLOBALS['CFG']->config['base_url'];
		$this->message = $message;
		$this->urlToRedirectAfterLogin = $urlToRedirectAfterLogin;
		log_message('error', $message);
		$_SESSION['error'][$code] = $this;
		header("location: {$baseURL}index.php/login.html");
		exit();
	}
	
	/*** Accesseur ***/
	public function __get($attribut){
			return $this->$attribut;
	}

	/*** Mutateur ***/
	public function __set($attribut, $valeur){
			$this->$attribut = $valeur;
	}
}
