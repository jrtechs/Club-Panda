<?php
    //11-24-16
    
    if($admin)
    {
        
        if(isset($_POST['delUser']))
        {
            $i_id = mysqli_real_escape_string($dbc, trim($_POST['del_user_id']));
            
            $q = "delete from users where user_id='$i_id'";
            
            $r = mysqli_query($dbc, $q);
            
            header("Location: admin.php");
        }
        echo '<h1 class="w3-text-teal"><center>Users</center></h1>';
        
        $q = "select * from users order by first_name asc";
        $r = mysqli_query($dbc, $q);
        
        echo '<div class="w3-responsive w3-card-4"><table class="w3-table w3-striped w3-bordered"><thead>';
        echo '<tr class="w3-theme">
            <td>First Name</td>
            <td>Last Name</td>
            <td>User Name</td>
            <td>Admin</td>
            <td><center>Delete User<center></td>
            </tr></thead><tbody>';
        
        while($row = mysqli_fetch_array($r))
        {
            echo '<tr>';
            
            //first name
            echo '<td>' . $row['first_name'] . '</td>';
            
            //last name
            echo '<td>' . $row['last_name'] . '</td>';
            
            //username
            echo '<td>' . $row['user_name'] . '</td>';
            
            //admin
            if($row['admin'])
            {
                echo '<td>True</td>';
            }
            else
            {
                echo '<td>False</td>';
            }
            
            
            //del
            echo '<td>';
            echo '<form action = "admin.php" method = "post">
            <input type = "submit" name="Delete" value="Delete" class="w3-padding-16 w3-hover-dark-grey w3-btn-block w3-center-align"/>
            <input type="hidden" name="delUser" value="TRUE">
            <input type="hidden" name="del_user_id" value=' . $row['user_id'] . '>
             </form>';
            echo '</td>';
            
            
            echo '</tr>';
        }
        
        echo '</tbody></table></div>';
    }

?>