<?php
    if (isset($_SESSION['popup'])) {

        echo $_SESSION['popup']->display();
        unset($_SESSION['popup']);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
    <link rel="stylesheet" href="/ProjetPHP2021/Public/assets/css/Acceuil.css">
    <script src="https://kit.fontawesome.com/b18ab37082.js" crossorigin="anonymous"></script>
    <?php foreach ($listStyles as $key => $value) { ?>
        <link rel="stylesheet" href="/ProjetPHP2021/Public/assets/css/<?=$value?>.css">
    <?php } ?>
    <?php foreach ($listJS as $key => $value) { ?>
        <script src="/ProjetPHP2021/Public/assets/js/<?= $value ?>.js" defer></script>
    <?php } ?>
    <script src="/ProjetPHP2021/Public/assets/js/Acceuil.js"defer></script>
</head>
<body>
    <nav>
        <div class="menu-icon">
            <span class="fas fa-bars"></span>
        </div>

        <div class="logo">Vanestarre</div>

        <div class="nav-items">
            <li><a href="#">Acceuil</a></li>
            <li><a href="#">Donations</a></li>
            <li><a href="#">Profil</a></li>
            <li><a href="#">Inscription</a></li>
            <li><a href="#">Connexion</a></li>
        </div>
        <div class="search-icon">
            <span class="fa fa-search"></span>
        </div>
        <div class="cancel-icon">
            <span class="fas fa-times"></span>
        </div>
        <form action="#">
            <input type="search" class="search-data" placeholder="Rechercher" required>
            <button type="submit" class="fas fa-search"></button>
        </form>
    </nav>


    <?= $content ?>

</body>
</html>

