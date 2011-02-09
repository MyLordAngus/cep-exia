<?php
if(!isset($login))
    $login = "";
?>
<div class="grid_15" id="contenu">
    <div class="grid_15" id="login_form">
        <h2>Connexion</h2>
        <form method="post" action="">
            <p class="grid_10">
                <label for="login">Login : </label>
                <input type="text" name="login" maxlength="30" value="<?php echo $login?>"/>
            </p>
            <p class="grid_10">
                <label for="mdp">Mot de passe : </label>
                <input type="password" name="mdp" maxlength="30" value=""/>
            </p>
            <p class="grid_10">
                <label for="">&nbsp;</label>
                <input type="submit" value="Se connecter"/>
                <?php
                echo "".anchor('login_controller/sinscrire', 'Créer un compte')."";
                ?>
            </p>
        </form>
    </div>
</div>
