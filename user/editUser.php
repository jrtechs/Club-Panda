<?php

    if($admin)
    {
        $errors = array();
        
        if(isset($_POST['edit_user']))
        {
            $i_username = mysqli_real_escape_string($dbc, trim($_POST['edit_user_username']));
            
            $i_first = mysqli_real_escape_string($dbc, trim($_POST['edit_user_first']));
            
            $i_last = mysqli_real_escape_string($dbc, trim($_POST['edit_user_last']));
            
            $i_password = mysqli_real_escape_string($dbc, trim($_POST['edit_user_pass']));
            
            $i_admin = mysqli_real_escape_string($dbc, trim($_POST['edit_user_admin']));
            
            $passcom = $i_password . $i_first;
            
            $passcom = SHA1($passcom);
            
            if($i_admin)
            {
                $admin_temp = "true";
            }
            else
            {
                $admin_temp = "false";
            }
            
            $q = "select user_id from users where user_name ='$i_username'";
            $r = mysqli_query($dbc, $q);
            
            while($row = mysqli_fetch_array($r))
            {
                $q = "update users set first_name ='$i_first' where user_id='" . $row['user_id'] . "'";
                $r2 = mysqli_query($dbc, $q);
                
                $q = "update users set last_name ='$i_last' where user_id='" . $row['user_id'] . "'";
                $r2 = mysqli_query($dbc, $q);
                
                $q = "update users set pass ='$passcom' where user_id='" . $row['user_id'] . "'";
                $r2 = mysqli_query($dbc, $q);
                //echo $q;
                
                $q = "update users set admin =$admin_temp where user_id='" . $row['user_id'] . "'";
                $r2 = mysqli_query($dbc, $q);
                //echo $q;
                
            }
            
            header("Location: admin.php");
        }
        
        echo '<h1 class="w3-text-teal"><center>Edit User</center></h1>';
        
        echo '<form action="admin.php" method ="post" class="w3-container w3-card-4">';
        
        $q = "select user_name from users";
        $r = mysqli_query($dbc, $q);
        echo '<select class="w3-select" name ="edit_user_username">';
        
        while($row = mysqli_fetch_array($r))
        {
            echo '<option value="' . $row['user_name'] . '">';
            
            echo $row['user_name'] . '</option>';
        }
        
        echo '</select>';

        echo '<div class="w3-group">
            <input class="w3-input" type="text" name="edit_user_first" required>
            <label class="w3-label w3-validate">First Name</label>
        </div>
        <div class="w3-group">
            <input class="w3-input" type="text" name="edit_user_last" required>
            <label class="w3-label w3-validate">Last Name</label>
        </div>
        <div class="w3-group">
            <input class="w3-input" type="password" name="edit_user_pass" maxlength="20" required>
            <label class="w3-label w3-validate">Password</label>
        </div>

        <input class="w3-check" type="checkbox" name="edit_user_admin">
        <label class="w3-validate">Admin<label>


        <p><input type="submit" name="Submit" value="Edit User" class="w3-padding-16 w3-hover-dark-grey w3-btn-block w3-center-align" /></p>
        <input type="hidden" name="edit_user" value="TRUE" />
            
        
        </form>';
        
        foreach($errors as $msg)
        {
            echo " - $msg<br />";
        }
    }
       
?>