<?php

//5-17-17

if($loggedIn)
{
    echo '<h1 class="w3-text-teal"><center>User\'s Personal Records
            </center></h1>';
    $q = "select score, users.user_name username from scores inner join users on users.user_id=scores.user_id where scores.user_id='" . $_SESSION['user_id']
        . "' and game='$game_id' order by score desc limit 20";
    $r = $db->query($q);
    echo '<div class="w3-responsive w3-card-4"><table 
            class="w3-table w3-striped w3-bordered"><thead>';
    echo '<tr class="w3-theme">
        <td>User Name</td>
        <td>Score</td>
        </tr></thead><tbody>';

    while($row = $r->fetchArray())
    {
        echo '<tr>';
        echo '<td>' . $row['username'] . '</td>';
        echo '<td>' . $row['score'] . '</td></tr>';
    }
    echo '</tbody></table></div>';
}