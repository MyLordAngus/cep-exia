<div class="grid_16" id="contenu">
    <div class="offre">
        <div class="grid_4 alpha shadow-5 radius-5">
            <h4 class="entete-boite radius-5">Fiche de l'entreprise :</h4>
            <div class="" id="icon_offre">
                <img alt="icon_offre" title="Offre" src="<?php echo URL_BASE;?>public/img/icon_company.png" />
            </div>
            <ul>
                <li>
                    <a href="<?php echo URL_BASE;?>index.php/entreprise_controller/show/<?php echo $entreprise->ID;?>">
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
		    <?php echo $offre->Categorie;?>
                    </li>
                </ul>
            </div>
            <div class="grid_12 omega shadow-5 radius-5">
                <div class="grid_11">
                    <h3>Offre : <?php echo $offre->titre;?></h3>
                    <p>Déposée le <?php echo $offre->date;?></p
                    <p><?php echo $offre->description;?></p>
                    <p class="grid_8"></p>
                </div>
                <div>
		<?php if($userType == 'prestataire'){
?>
	    		<a href="<?php echo base_url()."index.php/devis_controller/add/".$offre->numero;?>">
	    		    <h4>Postuler ici</h4>
	    		</a>
<?php };?>
            </div>
        </div>
    </div>
</div>
