<?php

$listStyles = ['Donation'];
$listJS = [''];

ob_start();

?>


<main>
<script src="https://www.blockonomics.co/js/pay_button.js"></script>

<div class="content">
<div class="MainContent">

<h1>Faire une Donation</h1>
<a href="" class="blockoPayBtn" data-toggle="modal" data-uid=74b2d406615a11eb><img width=160 src="https://www.blockonomics.co/img/pay_with_bitcoin_medium.png"></a>
</div>
</div>
</main>

<?php
    $content = ob_get_clean();
    require_once __DIR__.'/../template.php';
?>