<?php


    $listStyles = ['CardPost'];
    $listJS = ['Acceuil'];

    ob_start();

?>

<?php

    $content = ob_get_clean();

    require_once __DIR__.'/../template.php';


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

    <div class="Container">
        <div class="card">
            <div class="textPosition">
                <span class="date">25 Janvier 2021</span>
                <div class="title">Hello!</div>
                    <div class="text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa assumenda, quisquam reiciendis aliquam illum eum architecto dolorum. Praesentium, ullam nesciunt! Modi illo aut dolore culpa vel molestiae esse. Tempore totam odit explicabo reiciendis error ducimus, quos ipsa placeat earum fugit repudiandae non illum eligendi officiis iure dolorum praesentium perferendis, eum laboriosam et veniam quaerat corporis, rerum provident! Sed, a fugiat?</div>
                        <div class="buttonContainer">                                                        
                                    <i class="far fa-kiss-wink-heart"></i>
                                    <span class="number">9</span>                             
                                <i class="far fa-grin-hearts"></i>
                                <span class="number">12</span> 
                            <i class="far fa-heart"></i>
                            <span class="number">2</span> 
                            <i class="far fa-hand-spock"></i>
                            <span class="number">2</span> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="textPosition">
                <span class="date">25 Janvier 2021</span>
                <div class="title">Matrix 4 enfin !!!</div>
                      
                    <img src="https://image-uniservice.linternaute.com/image/450/3/2032628355/3997919.jpg" class="img"/>
                   
                    <div class="text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa assumenda, quisquam reiciendis aliquam illum eum architecto dolorum. Praesentium, ullam nesciunt! Modi illo aut dolore culpa vel molestiae esse. Tempore totam odit explicabo reiciendis error ducimus, quos ipsa placeat earum fugit repudiandae non illum eligendi officiis iure dolorum praesentium perferendis, eum laboriosam et veniam quaerat corporis, rerum provident! Sed, a fugiat?</div>
                        <div class="buttonContainer">                                                        
                                    <i class="far fa-kiss-wink-heart"></i>
                                    <span class="number">9</span>                             
                                <i class="far fa-grin-hearts"></i>
                                <span class="number">12</span> 
                            <i class="far fa-heart"></i>
                            <span class="number">2</span> 
                            <i class="far fa-hand-spock"></i>
                            <span class="number">2</span> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        
    </body>
    </html>




