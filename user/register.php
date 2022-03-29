<?php

if(!$loggedIn)
{
    $errors = array();

    if(isset($_POST['newUser']))
    {

        $i_first = $db->escapeString(trim($_POST['first']));
        $i_last = $db->escapeString(trim($_POST['last']));
        $i_pass = $db->escapeString(trim($_POST['pass']));
        $i_user = $db->escapeString(trim($_POST['user_name']));

        if($i_first && $i_last && $i_pass && $i_user)
        {
            $q = "select user_id from users where user_name='$i_user'";
            $r = $db->query($q);

            if($r->numColumns() && $r->columnType(0) != SQLITE3_NULL)
            {
                $errors['name'] = "That user name is already in use.";
            }
        }
        else
        {
            $errors['input'] = "Please fill in all fields!";
        }


        if(empty($errors))
        {
            $passcom = $i_pass . $i_first;
            $passcom = SHA1($passcom);

            if(isset($_POST['admin']))
            {
                $adminn = "true";
            }
            else
            {
                $adminn = "false";
            }

            $q = "insert into users(first_name, last_name, user_name, pass, 
                    registration_date, admin) values ('$i_first', '$i_last' 
                    , '$i_user', '$passcom', date('now'), false)";
            $r = $db->query($q);
            header("Location: index.php");

        }
    }

    echo '<h1 class="w3-text-teal"><center>Register</center></h1>';

    echo '<form action="index.php" method ="post" class="w3-container 
            w3-card-4">
        
        <div class="w3-group">
            <input class="w3-input" type="text" name="user_name" required>
            <label class="w3-label w3-validate">User Name</label>
        </div>
        <div class="w3-group">
            <input class="w3-input" type="text" name="first" required>
            <label class="w3-label w3-validate">First Name</label>
        </div>
        <div class="w3-group">
            <input class="w3-input" type="text" name="last" required>
            <label class="w3-label w3-validate">Last Name</label>
        </div>
        

        <div class="w3-group">
            <input class="w3-input" type="password" name="pass" 
            maxlength="20" required>
            <label class="w3-label w3-validate">Password</label>
        </div>
        

        <p><input type="submit" name="Submit" value="Register" 
        class="w3-padding-16 w3-hover-dark-grey w3-btn-block 
        w3-center-align" /></p>
        <input type="hidden" name="newUser" value="TRUE" />
    </form>';

    foreach($errors as $msg)
        echo " - $msg<br />";

}