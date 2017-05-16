<?php
    //5-16-17

    $dir = 2;

    include '../includes/header.php';

    echo '<br><div class="w3-row">
         <div class="w3-twothird w3-container ">';
    include('zombiePanda.html');


    echo '</div><div class="w3-third w3-container">';
    
    //high scores
    include('../includes/profile.php');

    echo '</div>';
    echo '</div>';


    include '../includes/footer.php';
    
?>