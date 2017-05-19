<?php
    //ini_set('display_errors', 1);
    
    
    include 'includes/header.php';
    
    if($loggedIn)
    {
        //profile
        echo '<div class="w3-row w3-padding-32">';
        echo '<div class="w3-half w3-container">';
        
        
        //new game or something
        //include 'games/bamboofield.html';
        
        echo '</div><div class="w3-half w3-container">';
        //profile
        include('user/profile.php');
        echo '</div>';
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
        echo '</div>';
    }
    
    //4-row
    echo '<br><div class="w3-row w3-padding-32">';
    echo '<div class="w3-half w3-container"><div style=\'position: relative; width: 100%; height: 0px; padding-bottom: 60%;\'">';
    echo '<iframe src="https://www.youtube.com/embed/QhJYKBj3K08" frameborder="0" allowfullscreen style=\'position: absolute; left: 0px; top: 0px; width: 100%; height: 100%\'"></iframe>';
    echo '</div></div>';
    
    echo '<div class="w3-half w3-container"><div id="repo1">';
    echo '<script src="RepoJS/repo.js"></script>
    <script>
    $(\'#repo1\').repo({ user: \'jrtechs\', name: \'Panda-Quotes\' });
    </script>';
    echo '</div></div></div>';
    
    include 'includes/footer.php';
    
?>