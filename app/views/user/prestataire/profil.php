<div id="contenu" class="grid_16">
    <div class="grid_4 alpha shadow-5 radius-5" id="icon_user">
         <h4 class="entete-boite">Actions</h4>
        <ul>
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
    <div class="grid_11 omega shadow-5 radius-5">
        <form id="form_profil" method="post" action="<?php echo base_url()."index.php/prestataire_controller/save";?>">
            <div class="grid_10">
                <h3>Profil utilisateur : <?php echo $user->login?></h3>
                <p class="info">Vous pouvez modifier vos données personnelles en cliquant sur
                    "modifier" qui transformera votre profil en un formulaire.
                </p>
            </div>
            <div class="grid_10">
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
            <div class="grid_6">
                <h5>Nouvelles compétences :</h5>
                <ul>
                    <?php
                    foreach($allCompetences as $Competence){
                    ?>
                            <li><input type="checkbox" 
                                       name="competences[]"
                                       value="<?php echo $Competence->ID; ?>"
                                       <?php
                                       if(in_array($Competence->libelle, $listeCompetences))
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
        <div>
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
                <?php
                foreach($devis as $d){
                    echo '<tr>
                            <td>'.date("d/m/y",$d->date).'</td>
                            <td>'.$d->montant.'</td>
                            <td>'.substr($d->description,0 , 250).'</td>
                            <td>'.$d->etatToString().'</td>
                            <td><a href="'.base_url().'index.php/offres/description/offre-'.$d->Offre->numero.'">Aperçu</a></td>
                            <td><a href="'.base_url().'index.php/devis_controller/edit/'.$d->numero.'">Editer</a></td>
                          </tr>';
                }
                ?>
            </table>
        </div>
    </div>
</div>
