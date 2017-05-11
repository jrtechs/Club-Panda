<?php
    //ini_set('display_errors', 1);
    
    
    include 'includes/header.php';
    
    if($loggedIn)
    {
        //profile
        echo '<div class="w3-row w3-padding-32">';
        echo '<div class="w3-half w3-container">';
        
        
        //new game or something
        include 'games/bamboofield.html';
        
        echo '</div><div class="w3-half w3-container">';
        //profile
        include('user/profile.php');
        echo '</div></div>';
    }
    else
    {
        //profile(login) & register
        echo '<div class="w3-row w3-padding-32">';
        echo '<div class="w3-half w3-container">';
        
        
        //register
        include('user/register.php');
        
        echo '</div><div class="w3-half w3-container">';
        //profile
        include('user/profile.php');
        echo '</div></div>';
    }
    
    include 'includes/footer.php';
    
?>