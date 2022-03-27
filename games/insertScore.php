<?php

//5-16-17

include_once '../club_connect.php';

if(isset($_POST['game_new_score']))
{
    $i_game = mysqli_real_escape_string($dbc,
        trim($_POST['game']));
    $i_user_id = mysqli_real_escape_string($dbc,
        trim($_POST['user_id_score']));
    $i_score = mysqli_real_escape_string($dbc,
        trim($_POST['score_validate']));
    $q = "insert into scores(game, user_id, score)
      values('$i_game','$i_user_id','$i_score')";

    if($i_user_id > 0)
        $r = mysqli_query($dbc, $q);

    if($i_game == 1)
        header("Location: bamboofield.php");

    else if($i_game == 2)
        header("Location: zombiePanda.php");
}