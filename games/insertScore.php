<?php

//5-16-17

include_once '../club_connect.php';

if(isset($_POST['game_new_score']))
{
    $i_game = $db->escapeString(
        trim($_POST['game']));
    $i_user_id = $db->escapeString(
        trim($_POST['user_id_score']));
    $i_score = $db->escapeString(
        trim($_POST['score_validate']));
    $q = "insert into scores(game, user_id, score)
      values('$i_game','$i_user_id','$i_score')";

    if($i_user_id > 0)
        $r = $db->query($q);

    if($i_game == 1)
        header("Location: bamboofield.php");

    else if($i_game == 2)
        header("Location: zombiePanda.php");
}