<?php 
    ob_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Jost:wght@300&display=swap');


        .LogoContainer {
            width : 100vw;

            display : flex;
            flex-direction : column;
            align-items : center;

            text-align : center;

            margin-bottom : 20px;
        }
        .logo {
            margin-left : auto;
            margin-right : auto; 
            text-align : center;
            height : 50px;
        }

        main {
            width : 100vw;
            display : flex;
            flex-direction : column;
            align-items : center;
        }

        .mainText {
            font-family: 'Jost', sans-serif;
            font-size : 15px;
            color : #212121;

            padding : 10px;

            text-align : justify;
        }

        .activateAccount {
            padding : 10px;
            background-color : #5e6896;
            color : #fff !important;
            font-family: 'Jost', sans-serif;
            font-size : 15px;
            transition : 0.2s;

            text-decoration : none !important;

            margin-left : auto;
            margin-right : auto;

            margin-top : 20px;
        }
        .activateAccount:hover {
            background-color : #4e598c;
            cursor : pointer;
            transition : 0.2s;
        }

        .buttonContainer {
            width : 100vw;
            display : flex;
            flex-direction : row;
            justify-content : center;

            text-align : center;

            margin-top : 25px;
        }

        .complMEssage {
            text-align : center;
            font-size : 12px;
            margin-top : 20px;
        }
    </style>

</head>
<body>    
    <main>
        <div class="LogoContainer">
            <img src="https://media.discordapp.net/attachments/785412538833436692/801053910562635776/unknown.png" class="logo" alt="Vanestarre">
        </div>

        <div class="maintext">
            Votre compte a bien été créé.
        
        </div>
    

        <div class="complMEssage">
            Si vous n'êtes pas à l'origine de ce mail, merci de supprimer ce mail.
        </div>
    </main>

</body>
</html>




<?php

    $content = ob_get_clean();

?>