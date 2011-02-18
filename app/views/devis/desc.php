<div class="grid_16" id="contenu">
    <div class="offre">
        <div class="grid_8 shadow-5 radius-5 alpha">
			<h4 class="entete-boite shadow-5 radius-5">Fiche offre : <?php echo $devis->Offre->titre;?></h4>
            <ul>
                <li>
                    <a href="<?php echo URL_BASE ?>index.php/entreprise_controller/show/<?php echo $devis->Offre->Entreprise->ID ?>">
                        <?php
                        echo $devis->Offre->Entreprise->raisonSoc;
                        ?>
                    </a>
                </li>
                <li>
                    <?php echo $devis->Offre->Entreprise->email;?>
                </li>
                <li>
                    <?php //echo "\n".$devis->Offre->Entreprise->adresse.", ".$devis->Offre-Entreprise->codePostal."\n".$devis->Offre->Entreprise->ville?>
                </li>
                <li>
                    Tel :
                    <?php echo $devis->Offre->Entreprise->telephone ?>
                </li>
                <li>
                    Catégorie :
                    <?php echo $devis->Offre->Categorie ?>
                </li>
            </ul>
            <div class="grid_7">
                <p><?php echo $devis->Offre->description ?></p>
            </div>
        </div>
        <div class="grid_8 shadow-5 radius-5 omega">
            <h4 class="entete-boite shadow-5 radius-5">
                <?php echo $titre ?>
                - <?php echo $devis->duree ?> heures
                -  montant : <?php echo $devis->montant ?>€</h4>
            <div class="grid_7">
                <p><?php echo $devis->description ?></p>
            </div>
        </div>
    </div>
</div>
