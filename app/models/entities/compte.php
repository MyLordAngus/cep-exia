<?php

abstract class Compte{

	protected $ID;
	protected $login;
	protected $password;
	protected $email;
	protected $siret;
	protected $telephone;

	public function __construct(){
	
	}

	/*	 * * Accesseur ** */

	public function __get($attribut){
		return $this->$attribut;
	}

	/*	 * * Mutateur ** */

	public function __set($attribut, $valeur){
		$this->$attribut = $valeur;
	}

	public function getType(){
		return strtolower(__CLASS__);
	}
}

?>
