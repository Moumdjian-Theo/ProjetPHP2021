<?php


    $listStyles = ['CardPost'];
    $listJS = ['Accueil'];

    ob_start();

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
        if (strlen($post->getPicture()) != 0) {
            echo "<img src=\"/projetphp2021/Public/assets/imgs/".$post->getPicture()."\"class=\"img\">";
        }           
        echo "<div class=\"text\">".$post->getBody()."</div>";
        echo "<div class=\"tags\">".$post->getTag()."</div>";
        
        echo "<form method=\"post\" action=\"/projetphp2021/incrementer.php?id=".$post->getId()."\">";
        echo "<div class=\"buttonContainer\">"; 
        echo "<button name=\"button1\" type=\"submit\" class=\"buttonEmoji\"> <i class=\"far fa-kiss-wink-heart\"></i>";
        echo "<span class=\"number\">".$post->getCute()."</span> </button>";

        echo "<button name=\"button2\" type=\"submit\" class=\"buttonEmoji\"> <i class=\"far fa-grin-hearts\"></i>";                        
        echo "<span class=\"number\">".$post->getTrop_Stylé()."</span> </button>";
        echo "<button name=\"button3\" type=\"submit\" class=\"buttonEmoji\">  <i class=\"far fa-heart\"></i>";
        echo "<span class=\"number\">".$post->getLove()."</span> </button>";
        echo "<button name=\"button4\" type=\"submit\" class=\"buttonEmoji\">  <i class=\"far fa-hand-spock\"></i>"; 
        echo "<span class=\"number\">".$post->getSwag()."</span> </button>"; 
        echo "</form>";
        
        echo"</div>
        </div>
        </div>
        </div>
        </div>";
    }
?>

</main>



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