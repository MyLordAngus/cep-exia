<?php
$config = array(
                //Formulaire de login
             'login' => array(
                            array(
                                    'field' => 'login',
                                    'label' => 'login',
                                    'rules' => 'required'
                                 ),
                            array(
                                    'field' => 'mdp',
                                    'label' => 'mot de passe',
                                    'rules' => 'required'
                                 )
                            ),
              //Formulaire d'offres
             'offres_add' => array(
                                array(
                                        'field' => 'titre',
                                        'label' => 'titre',
                                        'rules' => 'required'
                                     ),
                                array(
                                        'field' => 'description',
                                        'label' => 'description',
                                        'rules' => 'required'
                                     ),
                            ),
                //Formulaire de devis
             'devis_add' => array(
                                array(
                                        'field' => 'montant',
                                        'label' => 'montant',
                                        'rules' => 'required'
                                     ),
                                array(
                                        'field' => 'description',
                                        'label' => 'description',
                                        'rules' => 'required'
                                     ),
                                array(
                                        'field' => 'duree',
                                        'label' => 'duree',
                                        'rules' => 'required'
                                     )
                            ),
            //Formulaire d'inscription Entreprise
             'login_controller/sinscrire/entreprise' => array(
                            array(
                                    'field' => 'login',
                                    'label' => 'Login',
                                    'rules' => 'required'
                                 ),
                            array(
                                    'field' => 'mdp',
                                    'label' => 'Mot de passe',
                                    'rules' => 'required'
                                 ),
                            array(
                                    'field' => 'mdp_confirm',
                                    'label' => 'Confirmation du mot de passe',
                                    'rules' => 'required|matches[mdp]'
                                 ),
                            array(
                                    'field' => 'raisonSoc',
                                    'label' => 'Raison sociale',
                                    'rules' => 'required'
                                 ),
                            array(
                                    'field' => 'tel',
                                    'label' => 'Téléphone',
                                    'rules' => 'required|numeric'
                                 ),
                            array(
                                    'field' => 'siret',
                                    'label' => 'Code siret',
                                    'rules' => 'required|numeric'
                                 ),
                            array(
                                    'field' => 'adresse',
                                    'label' => 'Adresse',
                                    'rules' => 'required'
                                 ),
                            array(
                                    'field' => 'ville',
                                    'label' => 'Ville',
                                    'rules' => 'required|alpha'
                                 ),
                            array(
                                    'field' => 'email',
                                    'label' => 'Adresse email',
                                    'rules' => 'required|valid_email'
                                 )
                            ),
            //Formulaire d'inscription Prestataire
             'login_controller/sinscrire/prestataire' => array(
                            array(
                                    'field' => 'login',
                                    'label' => 'Login',
                                    'rules' => 'required'
                                 ),
                            array(
                                    'field' => 'mdp',
                                    'label' => 'Mot de passe',
                                    'rules' => 'required'
                                 ),
                            array(
                                    'field' => 'mdp_confirm',
                                    'label' => 'Confirmation du mot de passe',
                                    'rules' => 'required|matches[mdp]'
                                 ),
                            array(
                                    'field' => 'nom',
                                    'label' => 'Nom',
                                    'rules' => 'required'
                                 ),
                            array(
                                    'field' => 'prenom',
                                    'label' => 'Prenom',
                                    'rules' => 'required'
                                 ),
                            array(
                                    'field' => 'tel',
                                    'label' => 'Téléphone',
                                    'rules' => 'required|numeric'
                                 ),
                            array(
                                    'field' => 'siret',
                                    'label' => 'Code siret',
                                    'rules' => 'required|numeric'
                                 ),
                            array(
                                    'field' => 'email',
                                    'label' => 'Adresse email',
                                    'rules' => 'required|valid_email'
                                 )
                            )
           );
?>
