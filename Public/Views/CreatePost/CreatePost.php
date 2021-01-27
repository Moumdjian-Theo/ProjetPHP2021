<?php

$listStyles = ['EditProfil'];
$listJS = ['sign'];

ob_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creer Post</title>
</head>
<body>

<h1>Creer un Post</h1>
<form action="" method="post">
    <div class="formContainer">
        <input type="text" name="title" placeholder="Titre du Post">
        </div>
        <div class="formText">
        <textarea  maxlength="50" name="text" placeholder="Ecrivez votre Post"></textarea>
        </div>
        <input type="file" name="img" class="imagebutton">
        <input class="btn" type="submit" name="action" value="Creer Post">
</form>


<body\>
</html>