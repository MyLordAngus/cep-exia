<div id="contenu" class="grid_16">
    <h3 class="grid_15">Résumé de l'entreprise <?php echo $entreprise->raisonSoc?></h3>
    <div class="grid_3 alpha shadow-5 radius-5">
        <img src="<?php echo base_url()."public/img/icon_company.png"; ?>" alt="Icone Entreprise" title="<?php echo $entreprise->raisonSoc ?>" />
    </div>
    <div class="grid_12 omega shadow-5 radius-5">
        <p class="grid_11"></p>
        <p class="grid_11"></p>
        <div class="grid_11">
            <div class="grid_5 alpha"> Adresse : <?php echo $entreprise->adresse; ?></div>
            <div class="grid_5 omega"> Code Postal : <?php echo $entreprise->codePostal; ?></div>
            <div class="grid_5 alpha"> Ville : <?php echo $entreprise->ville; ?></div>
            <div class="grid_5 omega"> Domaine : <?php echo $entreprise->domaine; ?></div>
            <div class="grid_5 alpha"> Téléphone : <?php echo $entreprise->telephone; ?></div>
            <div class="grid_5 omega"> Email : <?php echo $entreprise->email; ?></div>

        </div>
        <p class="grid_11"></p>
        <p class="grid_11"></p>
        <table class="grid_11" id="offres_profil">
            <thead>
                <th>Date</th>
                <th>Titre</th>
                <th>Montant moyen</th>
                <th>Catégorie</th>
                <th>Etat</th>
                <th></th>
            </thead>
            <?php
            foreach($entreprise->listeOffres as $o){
                    echo '<tr>
                            <td >'.$o->date.'</td>
                            <td >'.$o->titre.'</td>
                            <td >'.$o->montantMoyen().'</td>
                            <td>'.$o->Categorie->toString().'</td>
                            <td width="150">'.$o->Statut->toString().'</td>
                            <td><a href="'.base_url()."index.php/offres/description/offre-".$o->numero.'.html">
                                Afficher
                            </a></td>
                       </tr>';
                }

            ?>
        </table>
    </div>
</div>
