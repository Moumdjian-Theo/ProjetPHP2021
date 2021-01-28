<?php


    $listStyles = ['CardPost'];
    $listJS = ['Accueil'];

    ob_start();

?>

<?php

    $content = ob_get_clean();

    require_once __DIR__.'/../templateadmin.php';


?>

<main>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/b18ab37082.js" crossorigin="anonymous"></script>
        <title>Acceuil</title>
    </head>
    <body>

 <?php 
    foreach($postlist as $post)
    {
        echo "<div class=\"Container\">";
        echo "<div class=\"card\">";
        echo "<div class=\"textPosition\">";
        echo "<span class=\"date\">".$post->getDate()."</span>";
        echo "<div class=\"title\">".$post->getTitle()."</div>";
        echo "<img src=".$post->getPicture()." class=\"img\"/>";
        echo "<div class=\"text\">".$post->getBody()."</div>";
        echo "<div class=\"tags\">".$post->getTag()."</div>";
        echo "<div class=\"buttonContainer\">"; 
        echo "<i class=\"far fa-kiss-wink-heart\"></i>";
        echo "<span class=\"number\">".$post->getCute()."</span>";
        echo "<i class=\"far fa-grin-hearts\"></i>";                        
        echo "<span class=\"number\">".$post->getTrop_Stylé()."</span>";
        echo "<i class=\"far fa-heart\"></i>";
        echo "<span class=\"number\">".$post->getLove()."</span>";
        echo "<i class=\"far fa-hand-spock\"></i>"; 
        echo "<span class=\"number\">".$post->getSwag()."</span>"; 
        
        echo"</div>
        </div>
        </div>
        </div>
        </div>";
    }
?>
</body>
</html>










































