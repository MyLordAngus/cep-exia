<div id="contenu" class="grid_16">
    <h2>Liste des Offres</h2>

	<div>
		<!-- Moteur de recherche des offres -->
		<form method="post" action="<?php echo URL_BASE; ?>index.php/offres_controller/pageRecherche">
			<label for="entreprise">Entreprise</label>
			<input type="text" name="entreprise" ID="entreprise" value="" />

			<label for="categorie">Catégorie</label>
			<select name="categorie" id="categorie" >

			</select>
			<input type="submit" value="Rechercher" />
		</form>
	</div>

    <p class="pagination">
	<?php echo $pagination; ?>
    </p>
    <ul id="offres">
        <li class="en-tetes">
            <span class="grid_2 alpha">date</span>
            <span class="grid_9 ">Description</span>
            <span class="grid_2">Catégorie</span>
            <span class="grid_3 omega">Montant (indicatif)</span>
        </li>
    <?php
    $i=0;
        foreach($offres as $offre){
    ?>
        <li>
            <a href="<?php echo URL_BASE."index.php/offres/description/offre-".$offre->numero; ?>.html">
                <span class="grid_2 alpha">&nbsp;&nbsp;&nbsp;<?php echo $offre->date; ?></span>
                <div class="grid_9 ">
                    <h6><?php echo $offre->titre; ?></h6>
                    <p>
                        <?php echo strip_tags(substr($offre->description, 0, 155)); ?>
                    </p>
                </div>
                <span class="grid_3"><?php echo $offre->Categorie->libelle; ?></span>
                <span class="grid_2 omega"><?php echo $offre->montant; ?></span>
            </a>
        </li>
    <?php
        $i++;
        }
    ?>
    </ul>
    <p class="pagination">
	<?php echo $pagination; ?>
    </p>
</div>
