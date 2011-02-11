<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "Site_controller";
//SITE
$route['site'] = "Site_controller";
$route['site/deconnexion'] = "Site_controller/deconnexion";
//OFFRE
$route['offres'] = "Offres_controller";
$route['offres/add'] = "Offres_controller/add";
$route['offres/description/offre-(:num)'] = "Offres_controller/description/$1";
//DEVIS
$route['devis'] = "Devis_controller";
$route['devis/description/devis-(:num)'] = "Devis_controller/description/$1";
$route['devis/tous-les-devis/offre-(:num)'] = "Devis_controller/index/$1";
//LOGIN
$route['login'] = "Login_controller";
$route['login/sinscrire'] = "Login_controller/sinscrire";
//PRESTATAIRE
$route['prestataire'] = "Prestataire_controller";
$route['resume-prestataire-(:num)'] = "Site_controller/resumePrestataire/$1";
//ENTREPRISE
$route['entreprise'] = "Entreprise_controller";
$route['resume-entreprise-(:num)'] = "Site_controller/resumeEntreprise/$1";
$route['scaffolding_trigger'] = "";

/* End of file routes.php */
/* Location: ./application/config/routes.php */
