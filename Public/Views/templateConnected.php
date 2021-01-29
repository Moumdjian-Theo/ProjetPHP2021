<?php
    if (isset($_SESSION['popup'])) {

        echo $_SESSION['popup']->display();
        unset($_SESSION['popup']);
    }

?>

<?php

if (isset($_SESSION['user']))
    {
        $username = $_SESSION['user']->getPseudo();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="/Public/assets/css/Accueil.css">
    <link rel="stylesheet" href="/Public/assets/css/popup.css">
    <script src="/Public/assets/js/popup.js" defer></script>
    <script src="https://kit.fontawesome.com/b18ab37082.js" crossorigin="anonymous"></script>
    <?php foreach ($listStyles as $key => $value) { ?>
        <link rel="stylesheet" href="/Public/assets/css/<?=$value?>.css">
    <?php } ?>
    <?php foreach ($listJS as $key => $value) { ?>
        <script src="/Public/assets/js/<?= $value ?>.js" defer></script>
    <?php } ?>
    <script src="/Public/assets/js/Accueil.js"defer></script>
</head>
<body>
    <nav>
        <div class="menu-icon">
            <span class="fas fa-bars"></span>
        </div>

        <div class="logo">Vanestarre</div>

        <div class="nav-items">
            <li><a href="/accueil">Accueil</a></li>
            <li><a href="/Donation">Donations</a></li>
            <li><a href="/EditProfile">Profil</a></li>
            <li><a href="/Deconnexion"> Se déconnecter</a></li>
        </div>
        <div class="search-icon">
            <span class="fa fa-search"></span>
        </div>
        <div class="cancel-icon">
            <span class="fas fa-times"></span>
        </div>
        <form method="post" action="/searchpost">
            <input type="search" name ="search-data" class="search-data" placeholder="Rechercher" required>
            <button type="submit" name ="searchsubmit"class="fas fa-search"></button>
        </form>
    </nav>

    <?= $content ?>

</body>

<footer>
   
 <div class="pseudo"><?php echo $_SESSION['user']->getPseudo() ?></div> 

</footer>
</html>

