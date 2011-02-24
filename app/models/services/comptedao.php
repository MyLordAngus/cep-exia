<?php

interface CompteDAO{
	public function connexion(string $login, string $password);
	public function compteExistant(string $login, string $email);
}
