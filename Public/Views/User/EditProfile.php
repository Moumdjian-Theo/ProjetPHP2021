<?php

$listStyles = ['EditProfil'];
$listJS = ['sign'];

ob_start();

?>

<main>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edition du profil</title>
    <link rel="stylesheet" href="Asset\css\EditProfil.css">
</head>
<body>
    <div class="MainContent">
    <h2>Edition du profil</h2>

    <div>
        <form method="POST" enctype="multipart/form-data">
            <div class="container">
                <div class="inputT">
                    <label>Pseudo :</label>
                    <input type="text" name="newPseudo"  value="" />
                </div>
                <input type="submit" name="action" value="Modifier le pseudo" /><br /><br />
            </div>

            <div class="container">
                <div class="inputT">
                    <label>Mail :</label>
                    <input type="text" name="newEMail"  />
                </div>
                <input type="submit" name="action" value="Modifier l'email" /><br /><br />
            </div>

            <div class="pwd">
                <div class="inputT">
                    <label>Mot de passe :</label>
                    <input type="password" name="newPwd" /><br /><br />                
                </div>
                <div class="inputT">
                    <label>Confirmation - mot de passe :</label>
                    <input type="password" name="pwdVerif"  />
                </div>
                <input type="submit" name="action" value="Modifier le mot de passe" /><br /><br />
            </div>


        </form>
    </div>
</div>
</div>


</body>
<main>

<?php
    $content = ob_get_clean();
    require_once __DIR__.'/../template.php';
?>