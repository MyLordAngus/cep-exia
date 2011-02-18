<div class="grid_16" id="contenu">
    <div class="inscription grid_15">
        <div id="choix">
            <p class="grid_2 alpha">Etes-vous : </p>
            <a class="grid_6" id="entreprise" href="#">
                <img src="<?php echo URL_BASE;?>public/img/entreprise.png"  width="310" title="Entreprise" alt="Entreprise"/>
            </a>
            <a class="grid_6 omega" id="prestataire" href="#">
                <img src="<?php echo URL_BASE;?>public/img/prestataire.png" width="310" title="Prestataire" alt="Prestataire" />
            </a>
        </div>
        <div id="form_entreprise">
            <h3>Inscription entreprise</h3>
            <form  action="<?php echo URL_BASE;?>index.php/login_controller/sinscrire/entreprise" method="post">
                <div class="shadow-5 radius-5 grid_7 alpha">
					<h5 class="shadow-5 radius-5 entete-boite">Compte</h6>
					<p>
						<label for="login">Login</label>
						<input class="required input-10" type="text" name="login" value="" maxlength="20"/>
					</p>
					<p>
						<label for="mdp">Mot de passe</label>
						<input class="password required input-10" type="password" name="mdp" value="" maxlength="15"/>
					</p>
					<p>
						<label for="mdp_confirm">Confirmation du mot de passe</label>
						<input class="password_confirm input-10" type="password" name="mdp_confirm" value="" maxlength="15"/>
					</p>
				</div>
                <div class="shadow-5 radius-5 grid_8 omega">
					<h5 class="shadow-5 radius-5 entete-boite">Vous contacter</h6>
					<p>
						<label for="email">Adresse e-mail</label>
						<input class="email input-15" type="text" name="email" value="" maxlength="100"/>
					</p>
					<p>
						<label for="telephone">Téléphone</label>
						<input class="tel input-15" type="text" name="telephone" value="" maxlength="10"/>
					</p>
					<p>
						<label for="siret">Code siret</label>
						<input class="siret input-15" type="text" name="siret" value="" maxlength="15"/>
					</p>
				</div>
				<p class="grid_15"></p>
                <div class="shadow-5 radius-5 grid_15 alpha">
					<h5 class="shadow-5 radius-5 entete-boite">L'entreprise</h6>
					<div class="grid_8 alpha">
						<p>
							<label for="raisonSoc">Raison sociale</label>
							<input class="required input-15" type="text" name="raisonSoc" value="" maxlength="50"/>
						</p>
						<p>
							<label for="adresse">Adresse</label>
							<textarea class="required" name="adresse" cols="60" rows="2"></textarea>
						</p>
						<p>
							<label for="cp">Code postal</label>
							<input class="required cp input-5" type="text" name="cp" value="" maxlength="5"/>
						</p>
						<p>
							<label for="ville">Ville</label>
							<input class="required input-15" type="text" name="ville" value="" maxlength="50"/>
						</p>
						<p>
							<label for="domaine">Domaine</label>
							<select name="domaine">
								<option>Developpement Web</option>
							</select>
						</p>
					</div>
					<div class="grid_7 omega">
						<p>
							<textarea id="desc" name="desc"  cols="37" rows="4">Decrire ici votre société, domaines de compétences...</textarea>
							<script>
								CKEDITOR.replace( 'desc', {toolbar : 'Basic', width : 350} );
							</script>
						<p>
					</div>
				</div>
				<p class="grid_15"></p>
				<p>
					<input class="submit" type="submit" value="Valider et m'inscire" name="submit"/>
				</p>
                <p id="jserrors">

                </p>
            </form>
        </div>
        <div id="form_prestataire">
            <h3>Inscription prestataire</h3>
            <form action="<?php echo URL_BASE;?>index.php/login_controller/sinscrire/prestataire" method="post">
                <div class="shadow-5 radius-5 grid_7 alpha">
					<h5 class="shadow-5 radius-5 entete-boite">Compte</h6>
					<p>
						<label for="login">Login</label>
						<input class="required" type="text" name="login" value="" maxlength="20"/>
					</p>
					<p>
						<label for="mdp">Mot de passe</label>
						<input class="required password" id="mdp" type="password" name="mdp" value="" maxlength="15"/>
					</p>
					<p>
						<label for="mdp_confirm">Confirmation du mot de passe</label>
						<input class="password_confirm" id="mdp_confirm" type="password" name="mdp_confirm" value="" maxlength="15"/>
					</p>
				</div>
                <div class="shadow-5 radius-5 grid_8 omega">
					<h5 class="shadow-5 radius-5 entete-boite">Vous contacter</h6>
					<p>
						<label for="email">Adresse e-mail</label>
						<input class="required email" type="text" name="email" value="" maxlength="100"/>
					</p>
					<p>
						<label for="nom">Nom</label>
						<input class="required" type="text" name="nom" value="" maxlength="50"/>
					</p>
					<p>
						<label for="prenom">Prenom</label>
						<input class="required" type="text" name="prenom" value="" maxlength="50"/>
					</p>
					<p>
						<label for="tel">Téléphone</label>
						<input class="required tel" type="text" name="tel" value="" maxlength="10"/>
					</p>
					<p>
						<label for="siret">Code siret</label>
						<input class="required siret" type="text" name="siret" value="" maxlength="15"/>
					</p>
				</div>
					<p class="grid_15"></p>
				<div class="grid_7 alpha">
					<p></p>
				</div>
				<div class="grid_8 omega">
					<p>
						<input class="submit" type="submit" value="Valider et m'inscrire" name="submit"/>
					</p>
				</div>
                <p id="jserrors">

                </p>
            </form>
        </div>
    </div>
</div>
