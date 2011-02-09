<?php
    define('URL_BASE', base_url());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?php echo $titre;?> | Communauté Exars Prestataires</title>
	<link rel="stylesheet" href="<?php echo URL_BASE;?>public/css/reset.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo URL_BASE;?>public/css/960.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo URL_BASE;?>public/css/text.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo URL_BASE;?>public/css/style.css" type="text/css" media="screen" />
        <?php if(isset($titre) && ($titre == "Index" || $titre == "Accueil")){ ?>
        <link rel="stylesheet" href="<?php echo URL_BASE;?>public/css/home.css" type="text/css" media="screen" />
        <?php }?>
	<!--<link rel="icon" type="image/png" href="<?php echo URL_BASE;?>public/img/icone.png" />-->
        <script type="text/javascript" src="<?php echo URL_BASE;?>public/js/lib/jquery.js"></script>
        <script type="text/javascript" src="<?php echo URL_BASE;?>public/js/slideshow.js"></script>
        <script type="text/javascript" src="<?php echo URL_BASE;?>public/js/lib/plugin/validation.js"></script>
        <script type="text/javascript" src="<?php echo URL_BASE;?>public/js/inscription.js"></script>
        <script type="text/javascript" src="<?php echo URL_BASE;?>public/js/profil.js"></script>
        <script type="text/javascript" src="<?php echo URL_BASE;?>public/js/ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <div class="container_16" id="global">
