<?php
    try
    {
        $dbc = mysqli_connect("clubdb", "root", 'password', "clubpanda");
    } catch (Exception $ex) 
    {
        echo 'Bad things just happened';
    }
    
?>
