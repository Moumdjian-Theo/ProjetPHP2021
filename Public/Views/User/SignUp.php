<?php


    $listStyles = ['sign'];
    $listJS = ['sign'];

    ob_start();

?>

<main>

    <form action="" method="POST">
        <p class="signTitle">
            S'inscrire
        </p>

        <div class="inputContainer">
            <label for="usernameInput">Pseudo</label>
            <input type="text" name="usernameInput" id="usernameInput">
        </div>

        <div class="inputContainer">
            <label for="mailInput">Adresse E-mail</label>
            <input type="email" name="mailInput" id="mailInput">
        </div>


        <div class="inputContainer">
            <label for="passwordInput">Mot de passe</label>
            <div class="pwdInput">
                <input type="password" name="passwordInput" id="passwordInput">
                <button class="pwdTrigger" data-toggle="passwordInput" type="button">
                    <i class="far fa-eye"></i>
                </button>
            </div>
        </div>

        <div class="inputContainer">
            <label for="RpasswordInput">Confirmer le mot de passe</label>
            <div class="pwdInput">
                <input type="password" name="RpasswordInput" id="RpasswordInput">
                <button class="pwdTrigger" data-toggle="RpasswordInput" type="button">
                    <i class="far fa-eye"></i>
                </button>
            </div>
        </div>

        <div class="buttonContainer">
            <button type="submit" name="submit" value="submit">
                Inscription
            </button>
        </div>

    </form>
</main>

<?php
    $content = ob_get_clean();
    require_once __DIR__.'/../template.php';
?>
