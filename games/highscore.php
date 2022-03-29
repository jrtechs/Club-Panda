<?php

//5-17-17

echo '<h1 class="w3-text-teal"><center>High Scores</center></h1>';

$q = "select * from scores where game = '$game_id' order by score desc limit 20";

$q = "select score, users.user_name username from scores  inner join users on users.user_id=scores.user_id where game = '$game_id' order by score desc limit 20";
$r = $db->query($q);
echo '<div class="w3-responsive w3-card-4"><table class="w3-table w3-striped 
w3-bordered"><thead>';
echo '<tr class="w3-theme">
    <td>Rank</td>
    <td>User Name</td>
    <td>Score</td>
    </tr></thead><tbody>';

$rank = 0;
while($row = $r->fetchArray())
{
    $rank ++;
    echo '<tr>';
    echo '<td>' . $rank . '</td>';
    echo '<td>' . $row['username'] . '</td>';
    echo '<td>' . $row['score'] . '</td>';
    echo '</tr>';
}
echo '</tbody></table></div>';
