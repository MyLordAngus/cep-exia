<div class="grid_16" id="contenu">
    <div class="offre">
        <div class="grid_4 alpha">
            <div class="grid_3" id="icon_offre">
                <img alt="icon_offre" title="Offre" src="<?php echo URL_BASE;?>public/img/icon_offre.png" />
            </div>
            <ul class="grid_3">
                <li>
                    <a href="<?php echo URL_BASE;?>index.php/entreprise/resume-<?php echo $entreprise->ID;?>.html">
                        <?php
                        echo $entreprise->raisonSoc;
                        ?>
                    </a>
                </li>
                <li>
                    <?php echo $entreprise->email;?>
                </li>
                <li>
                    <?php echo "\n".$entreprise->adresse.", ".$entreprise->codePostal."\n".$entreprise->ville?>
                </li>
                <li>
                    Tel :
                    <?php echo $entreprise->telephone;?>
                </li>
                <li>
                    Catégorie :
                    <?php echo $offre->Categorie->toString();?>
                </li>
            </ul>
            <div class="grid_4">
                <a href="<?php echo base_url()."index.php/devis_controller/add/". $offre->numero; ?>">
                    <img width="230px" src="<?php echo URL_BASE;?>public/img/devis.png" />
                </a>
            </div>
        </div>
        <div class="grid_12 omega">
            <h4><?php echo $titre; ?></h4>
            <div class="grid_12">
                <p><?php echo $offre->description;?></p>
            </div>
        </div>
    </div>
</div>
