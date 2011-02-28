<div class="grid_16" id="contenu">
    <div class="grid_8 alpha">
        <h5>Derniers projets ajoutés</h5>
        <ul id="offres">
        <?php
            foreach($offres as $offre){
        ?>
            <li>
                <a href="<?php echo base_url()."index.php/offres/description/offre-".$offre->id; ?>.html">
                    <div class="grid_6 alpha">
                        <h6><?php echo $offre->titre; ?></h6>
                        <span>
                            <?php echo strip_tags(substr($offre->description, 0, 100)); ?>
                        </span>
                    </div>
                    <span class="grid_1 omega"><?php $offre->montant; ?></span>
                </a>
            </li>
        <?php
            }
        ?>
        </ul>
        <a href="<?php echo base_url()."index.php/offres.html" ?>">Voir toutes les offres</a>
    </div>
    <div class="grid_8 omega">
        <h5>Posts du blog</h5>
        <div class="radius-5" style="padding: 20px;">
            <?php
            if($articles){
                foreach($articles->post as $a){
                    echo '<div>';
                    echo '<h6>'.$a->{'regular-title'}.'</h6>';
                    echo '<p class="grid_5">'.substr($a->{'regular-body'},0,250).'... <a href="'.$a['url'].'">->Lire la suite</a></p>';
                    echo '</div>';
                    echo '<div class="separator"></div>';
                }
            }
            ?>
        </div>
    </div>
</div>
