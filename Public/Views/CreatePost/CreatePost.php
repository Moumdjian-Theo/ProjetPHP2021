<?php

$listStyles = ['createpost'];
$listJS = [''];

ob_start();

?>


<main>

<div class="MainContent">

<h1>Creer un Post</h1>
<form action="" method="post">
    <div class="container">
        <input type="text" name="title" placeholder="Titre du Post">
        <input type="text" maxlength="50" name="tag" placeholder="Vos tags">
        
        <div class="formText">
        
        <textarea  maxlength="50" name="text" placeholder="Ecrivez votre Post"></textarea>
        
        </div>
        <input type="file" name="img" class="imagebutton">
        <input class="btn" type="submit" name="action" value="Creer Post">
        </div>
</form>
</div>


</main>

<?php
    $content = ob_get_clean();
    require_once __DIR__.'/../templateadmin.php';
?>