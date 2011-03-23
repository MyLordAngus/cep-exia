<div id="contenu" class="grid_16">
    <div class="grid_4 alpha radius-5 shadow-5">
        <!--<img alt="icon_company" title="Entreprise" src="<?php echo URL_BASE;?>public/img/icon_company.png" />-->
        <h4 class="entete-boite radius-5 shadow-5">Actions</h4>
        <ul>
			<li>
				<a href="#offres_profil">
				Mes offres
				</a>
			</li>
			<li>
				<a href="#conversations">
				Mes conversations
				</a>
			</li>
            <li>
                <a href="<?php echo base_url()."index.php/offres_controller/add";?>">Ajouter une offre</a>
            </li>
            <li>
                <a href="<?php echo base_url()."index.php/offres_controller/";?>">Consulter toutes les offres</a>
            </li>
            <li>
                <a href="#">
                    Rechercher un prestataire par compétence
                </a>
            </li>
            <li>
                <a href="<?php echo base_url()."index.php/site_controller/deconnexion";?> ">
                    Se déconnecté
                </a>
            </li>
        </ul>
    </div>
    <div class="grid_12 omega shadow-5 radius-5">
        <form id="form_profil" method="post" action="<?php echo base_url()."index.php/entreprise_controller/save";?>">
            <div class="grid_11">
                <h3>Profil <?php echo $user->login?></h3>
                <p class="info">Vous pouvez modifier vos données personnelles en cliquant sur
                    "modifier" qui transformera votre profil en un formulaire.
                </p>
                <div class="grid_5 alpha">
                    <p>
                        <label for="raisonSoc">Raison Sociale :</label>
                        <input type="text" name="raisonSoc" id="raisonSoc" value="<?php echo $user->raisonSoc?>" disabled />
                    </p>
                </div>
                <div class="grid_5 omega">
                    <p>
                        <label for="adresse">Adresse :</label>
                        <input type="text" name="adresse" id="adresse" value="<?php echo $user->adresse?>" disabled />
                    </p>
                </div>
                <div class="grid_5 alpha">
                    <p>
                        <label for="telephone">Téléphone :</label>
                        <input type="text" name="telephone" id="telephone" value="<?php echo $user->telephone?>" disabled />
                    </p>
                </div>
                            <div class="grid_5 omega">
                    <p>
                        <label for="codePostal">Code Postal :</label>
                        <input type="text" name="codePostal" id="codePostal" value="<?php echo $user->codePostal?>" disabled />
                    </p>
                </div>
                            <div class="grid_5 alpha">
                    <p>
                                            <label for="email">Email :</label>
                        <input type="text" maxlenght="10" name="email" id="email" value="<?php echo $user->email?>" disabled />
                    </p>
                </div>

                            <div class="grid_5 omega">
                    <p>
                        <label for="ville">Ville :</label>
                        <input type="text" name="ville" id="ville" value="<?php echo $user->ville?>" disabled />
                    </p>
                </div>
                <div class="grid_5 alpha">
                    <p>
                        <label for="domaine">Siret :</label>
                        <input type="text" name="siret" id="siret" value="<?php echo $user->siret?>" disabled />
                    </p>
                </div>
                <div class="grid_5 omega">
                    <p>
                        <label for="domaine">Domaine :</label>
                        <input type="text" name="domaine" id="domaine" value="<?php echo $user->domaine?>" disabled />
                    </p>
                </div>
				<p class="grid_11"></p>
				<div class="grid_11">
					<h6>Description de votre entreprise :</h6>
					<textarea name="description" rows="8" id="editor1" cols="125">
						<?php echo $user->description ?>
					</textarea>
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
				<h6 class="entete-boite radius-5 shadow-5">Conversation avec <?php echo $r->Prestataire->login;?></h6>
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
	<p class="grid_15"></p>
	<div >
            <h6 class="">Offres déposés :</h6>
            <table id="offres_profil">
                <thead>
                    <th>Titre</th>
                    <th>Prix</th>
                    <th>Catégorie</th>
                    <th>Statut</th>
                    <th>Nb devis</th>
                    <th></th>
                    <th></th>
                </thead>
                <?php
                foreach($listeOffres as $o){
                    echo '<tr>
                            <td>'.$o->titre.'</td>
                            <td>'.$o->montantMoyen().'</td>
                            <td >'.$o->Categorie.'</td>
                            <td >'.$o->Statut.'</td>
                            <td>'.$o->compteDevis().'</td>';
					if($o->Statut->libelle != 'Validation'){
						echo '<td><a href="'.base_url()."index.php/offres_controller/edit/".$o->id.'">
                                Editer
                            </a></td>';
						
					}else{
						echo '<td></td>';
					}
					echo '<td><a href="'.base_url()."index.php/devis/tous-les-devis/offre-".$o->id.'.html">
                                Voir
                            </a></td>
                       </tr>';
                }
                ?>
            </table>
        </div>
</div>
