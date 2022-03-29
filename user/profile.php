<?php

$errors = array();

if(isset($_POST['logout']))
{
    $_SESSION = array();

    echo '<h3>You are now logged out</h3>';

    if($dir == 2)
        header("Location: ../index.php");

    else
        header("Location: index.php");
}

if(isset($_POST['log_in']))
{
    //echo 'Login procces';
    if(isset($_POST['user_name']))
        $i_username = $db->escapeString(
            trim($_POST['user_name']));
    else
        $errors['User Name'] = 'You need to enter a user name!';

    if(isset($_POST['password']))
        $i_password = $db->escapeString(
            trim($_POST['password']));
    else
        $errors['password'] = "You need to enter a password!";


    if($i_password && $i_username)
    {
        //valid username
        $q3 = "select * from users where user_name='$i_username'";
        $r3 = $db->querySingle($q3, true);

        if($r3) //not empty
        {
            $firstName = $r3['first_name'];

            $q2 = "select * from users where user_name = 
                  '$i_username' and pass ='"  . SHA1($i_password
                    . $firstName) .   "'";

            $r2 = $db->querySingle($q2, true);
            if($r2)
            {
                $_SESSION['use'] = true;
                $_SESSION['fname'] = $firstName;
                $_SESSION['user_id'] = $r2['user_id'];
                $_SESSION['username'] = $r2['user_name'];
                $_SESSION['agent'] = md5($_SERVER['HTTP_USERAGENT'] . 'salt');

                if($dir == 2)
                    header("Location: ../index.php");
                else
                    header("Location: index.php");

            }
            else
            {
                $errors['password'] = "You entered an invalid password";
            }
        }
        else
        {
            $errors['user'] = "You entered an invalid user name!";
        }
    }
}

echo '<h1 class="w3-text-teal">';

echo '<center>';

if($loggedIn)
    echo 'Profile';
else
    echo 'Log In';

echo '</center></h1>';


echo '<div class ="w3-card-4 w3-container w3-padding-16">';
if($loggedIn)
{
    echo '<h3 class="w3-center">Welcome ' . $_SESSION['fname'] . '</h3>';

    if($dir == 2)
    {
        echo '<form action="../index.php" method ="post">
        <input class="w3-padding-16 w3-hover-dark-grey
         w3-btn-block w3-center-align" type="submit" name ="logout" 
         value="logout" />
        <input type="hidden" name="logout" value="TRUE" />
        </form>';
    }
    else
    {
        echo '<form action="index.php" method ="post">
        <input class="w3-padding-16 w3-hover-dark-grey w3-btn-block 
        w3-center-align" type="submit" name ="logout" value="logout" />
        <input type="hidden" name="logout" value="TRUE" />
        </form>';
    }
}
else
{
    if($dir == 2)
        echo '<form action ="../index.php" method ="post">';
    else
        echo '<form action ="index.php" method ="post">';

    echo '
        <div class="w3-group">
        <input class="w3-input" type="text" value="" name="user_name" 
        class="w3-container w3-card-4" required/>
        <label class="w3-label w3-validate">User Name</label>
        </div>
        
        <div class="w3-group">
        <input class="w3-input" type="password" value="" name="password" 
        class="w3-container w3-card-4" required/>
        <label class="w3-label w3-validate">Password</label>
        </div>
        
        <input type="submit" name="login" value="login" 
        class="w3-padding-16 w3-hover-dark-grey w3-btn-block w3-center-align"/>
        <input type="hidden" name="log_in" value="TRUE"/>
        </form>';

}
foreach($errors as $msg)
    echo " - $msg<br />";

echo '</div>';
