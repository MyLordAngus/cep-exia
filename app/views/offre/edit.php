<div class="grid_16" id="contenu">
    <div class="grid_3 shadow-5 radius-5">
        <img alt="icon_company" title="Entreprise" src="<?php echo URL_BASE;?>public/img/icon_offre.png" />
        <h4 class="entete-boite">Actions</h4>
        <ul>
            <li>
                - <a href="<?php echo base_url()."index.php/entreprise_controller/";?> ">
                   Revenir au profil
                </a>
            </li>
            <li>
                - <a href="<?php echo base_url()."index.php/offres_controller/add";?>">Ajouter une offre</a>
            </li>
            <li>
                - <a href="<?php echo base_url()."index.php/offres_controller/";?>">Voir les offres</a>
            </li>
            <li>
                - <a href="<?php echo base_url()."index.php/site_controller/deconnexion";?> ">
                    Se déconnecté
                </a>
            </li>
        </ul>
    </div>
    <div class="grid_12 shadow-5 radius-5" id="offre_form">
        <h3><?php echo $titre ?></h3>
        <form method="post" action='<?php echo base_url()."index.php/offres_controller/edit/".$offre->numero;?>' >
            <br>
            <p class="grid_8">
                    <label for="titre">Titre</label>
                    <input type="text" name="titre" maxlength="30" value="<?php echo $offre->titre ?>" />
            </p>
            <p class="grid_8">
                    <label for="categorie">Catégorie</label>
                    <select name="categorie">
            <?php
                    foreach($categories as $Categorie){
            ?>
                            <option value="<?php echo $Categorie->ID; ?>" ><?php echo $Categorie->libelle; ?></option>
            <?php
                    }
            ?>
                    </select>
            </p>
            <p class="grid_11">
                <label for="description">Description</label>
                <textarea name="description" rows="4" id="editor1" cols="80"><?php echo $offre->description ?></textarea>
                <script type="text/javascript">
                        CKEDITOR.replace( 'editor1', {toolbar : 'Basic'} );
                </script>
            </p>
            <p class="grid_8">
                <input type="submit" value="Sauvegarder" />
            </p>
            <br>
        </form>
    </div>
</div>
