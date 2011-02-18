<div class="grid_16" id="contenu">
    <div class="grid_3" id="icon_devis">
        <img alt="icon_devis" title="Devis" src="<?php echo URL_BASE;?>public/img/icon_devis.png" />
        <h4>L'offre</h4>
        <ol>
            <li>
               <?php echo $devis->Offre->titre ?>
            </li>
            <li>
               <?php echo $devis->Offre->Categorie ?>
            </li>
            <li>
               <?php echo $devis->Offre->Entreprise->raisonSoc ?>
            </li>
        </ol>
    </div>
    <div class="grid_12 shadow-5" id="devis_form">
        <h2>Création d'un Devis</h2>
        <form method="post" action='<?php echo base_url()."index.php/devis_controller/edit/".$devis->numero;?>' >
            <p class="grid_11">
                    <label for="montant">Montant</label>
                    <input type="text" name="montant" maxlength="10" value="<?php echo $devis->montant ?>" /> €
            </p>
            <p class="grid_11">
                    <label for="description">Description</label>
                    <textarea name="description" rows="4" id="editor1" cols="80">
                            <?php echo $devis->description; ?>
                    </textarea>
                    <script type="text/javascript">
                            CKEDITOR.replace( 'editor1', {toolbar : 'Basic'} );
                    </script>
            </p>
            <p class="grid_11">
                    <label for="duree">Durée en heures</label>
                    <input type="text" name="duree" maxlength="10" value="<?php echo $devis->duree ?>" />
            </p>
            <p class="grid_11">
                    <input type="submit" value="Ajouter ce devis à l'offre" />
            </p>
        </form>
    </div>
</div>
