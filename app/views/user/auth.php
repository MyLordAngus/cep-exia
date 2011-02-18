<?php
if(!isset($login))
    $login = "";
?>
<div class="grid_16" id="contenu">
    <div class="grid_5 shadow-5 radius-5" id="login_form">
        <h4 class="entete-boite shadow-5 radius-5">Connexion</h4>
        <form method="post" action="">
            <p class="grid_5">
                <label for="login">Login : </label>
                <input type="text" name="login" maxlength="30" value="<?php echo $login?>"/>
            </p>
            <p class="grid_5">
                <label for="mdp">Mot de passe : </label>
                <input type="password" name="mdp" maxlength="30" value=""/>
            </p>
            <p class="grid_5">
                <label for="">&nbsp;</label>
                <input type="submit" value="Se connecter"/>
            </p>
			<p class="grid_5">
                <label for="">&nbsp;</label>
                <?php
                echo "".anchor('login_controller/sinscrire', 'Créer un compte')."";
                ?>
			</p>
        </form>
    </div>
</div>
