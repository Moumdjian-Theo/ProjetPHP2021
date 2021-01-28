<?php


    $listStyles = ['CardPost'];
    $listJS = ['Acceuil'];

    ob_start();

?>

<?php

    $content = ob_get_clean();
    if(isset($_SESSION['user']))
    {
        require_once __DIR__.'/../templateConnected.php';
    }
    else
    {
        require_once __DIR__.'/../template.php';
    }
        


?>


<main>

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
        echo "<span class=\"number\">".$post->getLove()."</span>";
        echo "<i class=\"far fa-grin-hearts\"></i>";                        
        echo "<span class=\"number\">".$post->getCute()."</span>";
        echo "<i class=\"far fa-heart\"></i>";
        echo "<span class=\"number\">".$post->getTrop_stylé()."</span>";
        echo "<i class=\"far fa-hand-spock\"></i>"; 
        echo "<span class=\"number\">".$post->getSwag()."</span>"; 
        
        echo"</div>
        </div>
        </div>
        </div>
        </div>";
    }
?> 
</main>


