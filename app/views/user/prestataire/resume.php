<div id="contenu" class="grid_16">
    <h3 class="grid_15">Résumé du prestataire <?php echo $prestataire->login?></h3>
    <div class="grid_3 alpha">
        <img src="<?php echo base_url()."public/img/icon_user.png"; ?>" alt="Icone Entreprise" title="<?php echo $prestataire->login ?>" />
    </div>
    <div class="grid_12 omega">
        <p class="grid_11"></p>
        <p class="grid_11"></p>
        <div class="grid_11">
            <div class="grid_5 alpha"> Nom : <?php echo $prestataire->nom; ?></div>
            <div class="grid_5 omega"> Prénom : <?php echo $prestataire->prenom; ?></div>
            <div class="grid_5 alpha"> Email : <?php echo $prestataire->email; ?></div>
            <div class="grid_5 omega"> Siret : <?php echo $prestataire->siret; ?></div>
            <div class="grid_5 alpha"> Téléphone : <?php echo $prestataire->telephone; ?></div>
            <p class="grdi_10"></p>
            <div class="grid_3 shadow-5 radius-5">
                <h5 class="entete-boite radius-5">Compétences</h5>
                <ul>
                <?php
                foreach($prestataire->listeCompetences as $c){
                    echo '<li>'.$c->libelle.'</li>';
                }
                ?>
                </ul>
            </div>
            <div class="grid_7 shadow-5 radius-5">
                <h5 class="entete-boite radius-5">Devis accepté</h5>
                <ul>
                <?php
                foreach($prestataire->listeDevis as $d){
                    echo '<li class="grid_7">De '.$d->montant.' €, déposé le
                            '.date('d/m/y',$d->date).' et se déroulant pendant '.$d->duree.' heures
                          </li>';
                }
                ?>
                    <li class="grid_7">&nbsp;</li>
                </ul>
            </div>
        </div>
        <p class="grid_11"></p>
        <p class="grid_11"></p>
    </div>
</div>
