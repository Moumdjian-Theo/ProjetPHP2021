<?php

$listStyles = ['sign'];
$listJS = ['sign'];

ob_start();

?>

<main>
   

    <a href="" class="backButton">
        <i class="fas fa-chevron-left"></i>
    </a>
    <form action="" method="POST">
        <p class="signTitle">
            Connectez-vous
        </p>

        <div class="inputContainer">
            <label for="mailInput">Adresse E-mail</label>
            <input type="email" name="mailInput">
        </div>

        <div class="inputContainer">
            <label for="pwdInput">Mot de passe</label>
            <div class="pwdInput">
                <input type="password" name="pwdInput" id="pwdInput">
                <button class="pwdTrigger" data-toggle="pwdInput" type="button">
                    <i class="far fa-eye"></i>
                </button>
            </div>
        </div>

        <div class="buttonContainer">
            <button type="submit" name="submit" value="submit">
                Connexion
            </button>
        </div>

    </form>
    
    <p><a class="link" href="Public\Views\User\SignUp.php">Pas de compte ? s'inscrire</a></p>
    <p><a class="link" href="SignUp.php">Mot de passe oublié ?</a></p>
    
</main>


<?php
$content = ob_get_clean();
require_once __DIR__.'/../template.php';
?>