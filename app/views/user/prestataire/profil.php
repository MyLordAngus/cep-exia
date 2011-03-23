<div id="contenu" class="grid_16">
    <div class="grid_4 alpha shadow-5 radius-5" id="icon_user">
         <h4 class="entete-boite shadow-5 radius-5">Actions</h4>
        <ul>
            <li>
                <a href="#devis_profil">Mes devis</a>
            </li>
            <li>
                <a href="#conversations">Mes convrsations</a>
            </li>
            <li>
                <a href="<?php echo base_url()."index.php/offres_controller/";?>">Voir les offres</a>
            </li>
            <li>
                <a href="<?php echo base_url()."index.php/offres_controller/search";?>">Recherche par categorie</a>
            </li>
            <li>
                <a href="<?php echo base_url()."index.php/site_controller/deconnexion";?>">se déconnecter</a>
            </li>
        </ul>
    </div>
    <div class="grid_12 omega shadow-5 radius-5">
        <form id="form_profil" method="post" action="<?php echo base_url()."index.php/prestataire_controller/save";?>">
            <div class="grid_11">
                <h3>Profil utilisateur : <?php echo $user->login?></h3>
                <p class="info">Vous pouvez modifier vos données personnelles en cliquant sur
                    "modifier" qui transformera votre profil en un formulaire.
                </p>
            </div>
            <div class="grid_11">
                <div class="grid_5 alpha">
                    <p>
                        <label for="nom">Nom :</label>
                        <input type="text" name="nom" id="nom" value="<?php echo $user->nom?>" />
                    </p>
                </div>
                <div class="grid_5 omega">
                    <p>
                        <label for="prenom">Prenom :</label>
                        <input type="text" name="prenom" id="prenom" value="<?php echo $user->prenom?>" />
                    </p>
                </div>
                <div class="grid_5 alpha">
                    <p>
                                            <label for="telephone">Téléphone :</label>
                        <input type="text" maxlenght="10" name="telephone" id="telephone" value="<?php echo $user->telephone?>" />
                    </p>
                </div>
                <div class="grid_5 omega">
                    <p>
                        <label for="email">Email :</label>
                        <input type="text" name="email" id="email" value="<?php echo $user->email?>" />
                    </p>
                </div>
                <div class="grid_5 alpha">
                    <p>
                        <label for="siret">Siret :</label>
                        <input type="text" name="siret" id="siret" maxlength="15" value="<?php echo $user->siret?>" />
                    </p>
                </div>
                <div class="grid_5 omega">
                    <p>
                        <input type="button" name="modifier" class="modifier" value="Modifier"/>
                        <input type="submit" name="submit" class="submit" value="Enregistrer"/>
                        <input type="button" name="annuler" class="annuler" value="Annuler"/>
                    </p>
                    <p></p>
                </div>
            </div>
            <div class="grid_11">
                <h5>Compétences :</h5>
                <ul>
                    <?php
                    foreach($allCompetences as $Competence){
                    ?>
                            <li><input type="checkbox" 
                                       name="competences[]"
                                       value="<?php echo $Competence->id; ?>"
                                       <?php
                                       if(in_array($Competence->id, $userCompetences))
                                               echo 'checked';
                                       ?>
                                       />
                                    <?php echo $Competence->libelle; ?>
                            </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </form>
    </div>
	<p class="grid_15"></p>
	<div class="grid_16" id="conversations">
	<h5>Conversations en court :</h5>
		<?php 
		if(count($listeRelations) > 0){
			foreach($listeRelations as $r){
			?>
				<div class="grid_5 radius-5 shadow-5">
					<h6 class="entete-boite radius-5 shadow-5">Conversation avec <?php echo $r->Entreprise->login;?></h6>
					<a href="<?php echo URL_BASE.'index.php/chat_controller/index/'.$r->id?>">
					<?php 
						echo '<p class="grid_4">';
						foreach($r->listeMessages as $m){
							echo strip_tags(substr($m->message, 0, 150)).' <br/> le '.date('d/m/Y', $m->date).'
								à '.date('H', $m->date).'H </p>';
						}
					?>
					</a>
				</div>
			<?php 
			}
		}?>
	</div>
	<p class="grid_16">&nbsp;</p>
	<div id="offres_profil">
	<h5>Devis déposés :</h5>
		<table id="devis_profil">
			<tr>
				<th>Date de dépos</th>
				<th>Prix</th>
				<th>Description</th>
				<th>Etat</th>
				<th></th>
				<th></th>
			</tr>
			<?php foreach($devis as $d) : ?>
				<tr>
		<td><?php echo date("d/m/y",$d->date) ?></td>
					<td><?php echo $d->montant ?></td>
					<td><?php echo substr($d->description,0 , 250) ?></td>
					<td><?php echo $d->displayEtat() ?></td>
					<td><a href="<?php echo base_url() ?>index.php?devis_controller/show/<?php echo $d->id ?>.html">Aperçu</a></td>
					<td>
						<?php if($d->etat < 1){?>
						<a href="<?php echo base_url() ?>index.php?devis_controller/edit/<?php echo $d->id ?>">Editer</a>
						<?php }?>
					</td>
			   </tr>
			<?php endforeach ?>
		</table>
	</div>
</div>
