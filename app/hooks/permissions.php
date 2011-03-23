<?php

    $doesNotRequireAuth = array();
    $permissions = array();
    $errors = array();

    //ne requiert aucune authentification
    $doesNotRequireAuth['site_controller']['index']=true;
    $doesNotRequireAuth['login_controller']['index']=true;
    $doesNotRequireAuth['login_controller']['sinscrire']=true;
    $doesNotRequireAuth['offres_controller']['index']=true;
    $doesNotRequireAuth['offres_controller']['page']=true;
    $doesNotRequireAuth['offres_controller']['search']=true;
    $doesNotRequireAuth['site_controller']['deconnexion']=true;

    //permissions Entreprise
    $permissions['entreprise']['site_controller']['deconnexion']=true;
    $permissions['entreprise']['entreprise_controller']['index']=true;
    $permissions['entreprise']['entreprise_controller']['save']=true;
    $permissions['entreprise']['offres_controller']['add']=true;
    $permissions['entreprise']['offres_controller']['edit']=true;
    $permissions['entreprise']['devis_controller']['accepter']=true;
    $permissions['entreprise']['devis_controller']['index']=true;
    $permissions['entreprise']['prestataire_controller']['show']=true;
    $permissions['entreprise']['chat_controller']['index']=true;
    $permissions['entreprise']['chat_controller']['post']=true;
	
	//permissions Prestataire
    $permissions['prestataire']['site_controller']['deconnexion']=true;
    $permissions['prestataire']['prestataire_controller']['index']=true;
    $permissions['prestataire']['prestataire_controller']['save']=true;
    $permissions['prestataire']['offres_controller']['description']=true;
    $permissions['prestataire']['devis_controller']['add']=true;
    $permissions['prestataire']['devis_controller']['edit']=true;
    $permissions['prestataire']['devis_controller']['show']=true;
    $permissions['prestataire']['entreprise_controller']['show']=true;
    $permissions['prestataire']['chat_controller']['index']=true;
    $permissions['prestataire']['chat_controller']['post']=true;
