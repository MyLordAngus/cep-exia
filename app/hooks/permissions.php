<?php

    $doesNotRequireAuth = array();
    $permissions = array();
    $errors = array();

    //ne requiert aucune authentification
    $doesNotRequireAuth['site_controller']['index']=true;
    $doesNotRequireAuth['login_controller']['index']=true;
    $doesNotRequireAuth['login_controller']['sinscrire']=true;
    $doesNotRequireAuth['offres_controller']['index']=true;
    $doesNotRequireAuth['site_controller']['deconnexion']=true;

    //permissions utilisateur
    //$permissions['prestataire']['site_controller']['deconnexion']=true;
    //$permissions['entreprise']['site_controller']['deconnexion']=true;
    $permissions['prestataire']['prestataire_controller']['index']=true;
    $permissions['prestataire']['prestataire_controller']['save']=true;
    $permissions['entreprise']['entreprise_controller']['index']=true;
    $permissions['entreprise']['entreprise_controller']['save']=true;
    $permissions['prestataire']['offres_controller']['description']=true;
    $permissions['entreprise']['offres_controller']['add']=true;
    $permissions['prestataire']['devis_controller']['add']=true;
    $permissions['prestataire']['devis_controller']['edit']=true;
    $permissions['entreprise']['devis_controller']['index']=true;
    $permissions['entreprise']['site_controller']['resumePrestataire']=true;
    $permissions['prestataire']['site_controller']['resumeEntreprise']=true;
