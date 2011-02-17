<?php

	$permissions = array();
	$doesNotRequireAuth = array();
	
	$doesNotRequireAuth['Site_controller']['index']=true;
	$doesNotRequireAuth['Login_controller']['index']=true;
	$doesNotRequireAuth['Login_controller']['sinscrire']=true;
	$doesNotRequireAuth['Offres_controller']['index']=true;
	$doesNotRequireAuth['Offres_controller']['page']=true;
	$permissions['auth']['Site_controller']['deconnexion']=true;
	$permissions['prestataire']['Devis_controller']['add']=true;
	$permissions['prestataire']['Devis_controller']['edit']['owner']=true;
	$permissions['prestataire']['Offres_controller']['desc']=true;
	$permissions['entreprise']['Offres_controller']['add']=true;
	$permissions['entreprise']['Offres_controller']['edit']['owner']=true;
	$permissions['entreprise']['Devis_controller']['index']['owner']=true;
	$permissions['entreprise']['Entreprise_controller']['index']=true;
	$permissions['entreprise']['Entreprise_controller']['edit']['owner']=true;
	$permissions['prestataire']['Prestataire_controller']['index']=true;
	$permissions['prestataire']['Prestataire_controller']['edit']['owner']=true;
