<?php

    $doesNotRequireAuth = array();
    $permissions = array();

    //ne requiert aucune authentification
    $doesNotRequireAuth['site_controller']['index']=TRUE;
    $doesNotRequireAuth['login_controller']['index']=TRUE;
    $doesNotRequireAuth['login_controller']['sinscrire']=TRUE;
    $doesNotRequireAuth['offres_controller']['index']=TRUE;

    //permissions utilisateur
    $permissions['prestataire']['site_controller']['deconnexion']=TRUE;
    $permissions['entreprise']['site_controller']['deconnexion']=TRUE;
    $permissions['prestataire']['prestataire_controller']['index']=TRUE;
    $permissions['prestataire']['prestataire_controller']['save']=TRUE;
    $permissions['entreprise']['entreprise_controller']['index']=TRUE;
    $permissions['entreprise']['entreprise_controller']['save']=TRUE;
    $permissions['prestataire']['offres_controller']['description']=TRUE;
    $permissions['entreprise']['offres_controller']['add']=TRUE;
    $permissions['prestataire']['devis_controller']['add']=TRUE;
    $permissions['prestataire']['devis_controller']['edit']=TRUE;
    $permissions['entreprise']['devis_controller']['index']=TRUE;
    $permissions['entreprise']['site_controller']['resumePrestataire']=TRUE;
    $permissions['prestataire']['site_controller']['resumeEntreprise']=TRUE;
