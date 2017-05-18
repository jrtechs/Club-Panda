<?php

    $dir = 2;

    //ini_set('display_errors', 1);
    include '../includes/header.php';

    
    echo '<div class="w3-row w3-padding-32">';
    echo '<div class="w3-half w3-container">';
    include('bamboofield.html');


    echo '</div><div class="w3-half w3-container">';
    //include('../includes/profile.php');
    include('highscore.php');
    
    
    echo '</div></div>';

    echo '<div class="w3-row w3-padding-32">';
    echo '<div class="w3-half w3-container">';

    //edit user
    include('../user/profile.php');


    echo '</div><div class="w3-half w3-container">';
    include('userscores.php');
    echo '</div></div>';


    include '../includes/footer.php';
    
?>