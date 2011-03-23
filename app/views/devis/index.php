<div class="grid_16" id="contenu">
    <h3><?php echo $titre?></h3>
    <div class="offre">
        <div class="grid_6 alpha shadow-5 radius-5">
            <div class="grid_6" id="icon_offre">
                <img alt="icon_offre" title="Offre" src="<?php echo base_url()?>public/img/icon_offre.png" />
            </div>
            <h4>Fiche de l'offre :</h4>
            <ul>
                <li class="grid_5">
                    Titre :
                    <?php echo $offre->titre?>
                </li>
                <li class="grid_5">
                    Date de dépos :
                    <?php echo $offre->date?>
                </li>
                <li class="grid_5">
                    Catégorie :
                    <?php echo $offre->Categorie?>
                </li>
                <li class="grid_5">
                    Description :
                    <?php echo $offre->description?>
                </li>
            </ul>
            <p class="grid_6"></p>
        </div>
        <div class="grid_10 omega">
            <?php foreach ($offre->listeDevis as $devis): ?>
                <div class="grid_9 shadow-5 radius-5">
                    <div class="entete-boite radius-5">
                        <span>
                            Posté le <?php echo date('d/m/Y \à H\H',$devis->date);?>
                            par <a href="<?php echo base_url()."index.php/prestataire_controller/show/".$devis->Prestataire->id;?>">
                                <?php echo $devis->Prestataire->prenom;?>
                                <?php echo $devis->Prestataire->nom;?>
                            </a> d'un montant de 
                            <?php echo $devis->montant;?> €
                        </span>
                    </div>
                    <div class="grid_8">
                        <p><?php echo $devis->description?></p>
                    </div>
                    <div>
                        <?php if($devis->etat == 0): ?>
                        <a href="<?php echo base_url()."index.php/devis_controller/accepter/". $devis->id."/".$offre->id; ?>">
                            <h4>Accepter</h4>
                        </a>
                        <?php elseif($devis->etat == 1): ?>
			    <h4 class="accepted">Accepté</h4>
                        <?php else: ?>
			    <h4 class="denied">Refusé</h4>
                        <?php endif; ?>
                    </div>
                </div>
                <p class="grid_9"></p>
            <?php endforeach; ?>
        </div>
    </div>
</div>
