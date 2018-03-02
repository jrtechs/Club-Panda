<?php

//5-16-17

//ini_set('display_errors', 1);
include 'includes/header.php';

echo '<br><div class="w3-row">
     <div class="w3-half w3-container ">';
include('games/bamboofield.html');


echo '</div><div class="w3-half w3-container">';
include('games/zombiePanda.html');

echo '</div></div>';

include 'includes/footer.php';