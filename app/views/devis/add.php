<div class="grid_16" id="contenu">
    <div class="grid_4 shadow-5 radius-5 alpha" id="icon_devis">
        <img alt="icon_devis" title="Devis" src="<?php echo URL_BASE;?>public/img/icon_devis.png" />
        <h4 class="entete-boite">Récap de l'entreprise</h4>
        <ul>
            <li>
                <strong>Raison sociale : </strong><?php echo $offre->Entreprise->raisonSoc; ?>
            </li>
            <li>
               <strong>Adresse : </strong><?php echo $offre->Entreprise->adresse; ?><br/>
               <?php echo $offre->Entreprise->codePostal; ?><br/>
               <?php echo $offre->Entreprise->ville; ?>
            </li>
            <li>
               <strong>Email : </strong><?php echo $offre->Entreprise->email; ?>
            </li>
            <li>
               <strong>Tel : </strong><?php echo $offre->Entreprise->telephone; ?>
            </li>
            <li>
                <strong>Site internet : </strong><?php echo $offre->Entreprise->domaine; ?>
            </li>
        </ul>
    </div>
    <div class="grid_11 shadow-5 radius-5 omega">
        <h4 class="entete-boite shadow-5 radius-5"><?php echo $offre->titre?></h4>
        <div class="grid_10">
            <p><?php echo $offre->description?></p>
            <p>Moyenne des montant des devis : <?php echo $offre->montantMoyen()?> €</p>
            <p>Nombre de devis : <?php echo $offre->compteDevis()?> </p>
        </div>
    </div>
    <p class="grid_15"></p>
    <div class="grid_15 shadow-5 radius-5" id="devis_form">
        <h4 class="entete-boite shadow-5 radius-5">Création d'un Devis</h4>
        <form method="post" action='<?php echo base_url()."index.php/devis_controller/add/".$offre->id;?>' >
            <p class="grid_11">
                    <label for="montant">Montant</label>
                    <input type="text" name="montant" maxlength="10" value="" /> €
            </p>
            <p class="grid_11">
                    <label for="description">Description</label>
                    <textarea name="description" rows="4" id="editor1" cols="70">
                    </textarea>
                    <script type="text/javascript">
                            CKEDITOR.replace( 'editor1', {toolbar : 'Basic', width : 860} );
                    </script>
            </p>
            <p class="grid_11">
                    <label for="duree">Durée en heures</label>
                    <input type="text" name="duree" maxlength="10" value="" />
            </p>
            <p class="grid_11">
                    <input type="submit" value="Ajouter ce devis à l'offre" />
            </p>
        </form>
    </div>
</div>
