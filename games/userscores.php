<?php
        
    //5-17-17

    if($loggedIn)
    {
        echo '<h1 class="w3-text-teal"><center>User\'s Personal Records</center></h1>';

        $q = "select * from scores where user_id='" . $_SESSION['user_id'] . "' and game='$game_id' order by score desc limit 20";
        $r = mysqli_query($dbc, $q);
        echo '<div class="w3-responsive w3-card-4"><table class="w3-table w3-striped w3-bordered"><thead>';
        echo '<tr class="w3-theme">
            <td>User Name</td>
            <td>Score</td>
            </tr></thead><tbody>';

        while($row = mysqli_fetch_array($r))
        {
            echo '<tr>';


            echo '<td>';

            $q2 = "select user_name from users where user_id='". $row['user_id'] . "' limit 1";
            $r2 = mysqli_query($dbc, $q2);

            while($row2 = mysqli_fetch_array($r2))
            {
                echo $row2['user_name'];
            }

            echo '</td>';

            //score
            echo '<td>' . $row['score'] . '</td>';

            echo '</tr>';
        }
        echo '</tbody></table></div>';
    }



?>