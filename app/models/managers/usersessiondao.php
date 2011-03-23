<?php

interface UserSessionDAO{
    public function connexion($login, $password);
    public function compteExistant($login, $email);
}
