<?php

$loggedIn = false;
$admin = false;

session_start();
ob_start();

echo getcwd();
echo "$dir";
if($dir == 2)
{
    require_once("../club_connect.php");
    // require_once('insertScore.php');
}
else
{
    require_once("./club_connect.php");
    // require_once('./games/insertScore.php');
}


if((md5($_SERVER['HTTP_USERAGENT'] . 'salt')) == ($_SESSION['agent']) &&
    $_SESSION['use'] == true)
{
    $loggedIn = true;

    $q = "select admin from users where user_name='" .
        $_SESSION['username'] . "'";
    $r = $db->querySingle($q, true);

    if($r)
    {
        if($r['admin'])
            $admin = true;
    }
}


echo '<!DOCTYPE html>
<html>
<head>
<title>Club Panda</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">';

if($dir == 2)
{
    echo '<!DOCTYPE html>
    <html>
    <head>
    <title>Club Panda</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">';
    echo '<link rel="stylesheet" href="../includes/w3.css">'
    . '<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" >    
    </script>';
    echo '<link rel="stylesheet" 
        href="https://www.w3schools.com/lib/w3-theme-black.css">
    <link rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body id="myPage">

    <!-- Sidebar on click -->
    <nav class="w3-sidebar w3-bar-block w3-white w3-card-2 w3-animate-left w3-xxlarge" style="display:none;z-index:2" id="mySidebar">
      <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-display-topright w3-text-teal">Close
        <i class="fa fa-remove"></i>
      </a>
      <a href="bamboofield.php" class="w3-bar-item w3-button">Bamboo Field</a>
      <a href="zombiePanda.php" class="w3-bar-item w3-button">Zombie Pandas</a>
      <a href="#" class="w3-bar-item w3-button">Link 3</a>
      <a href="#" class="w3-bar-item w3-button">Link 4</a>
      <a href="#" class="w3-bar-item w3-button">Link 5</a>
    </nav>

    <!-- Navbar -->
    <div class="w3-top">
     <div class="w3-bar w3-theme-d2 w3-left-align">
      <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
      <a href="../index.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Home</a>
      <a href="../about.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">About</a>
        <div class="w3-dropdown-hover w3-hide-small">
        <button class="w3-button" title="Notifications">Games<i class="fa fa-caret-down"></i></button>     
        <div class="w3-dropdown-content w3-card-4 w3-bar-block">
          <a href="bamboofield.php" class="w3-bar-item w3-button">Bamboo Field</a>
          <a href="zombiePanda.php" class="w3-bar-item w3-button">Zombie Pandas</a>
        </div>
      </div>
     </div>

      <!-- Navbar on small screens -->
      <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
        <a href="../index.php" class="w3-bar-item w3-button">Home</a>
        <a href="../games.php" class="w3-bar-item w3-button">Games</a>
        <a href="../about.php" class="w3-bar-item w3-button">About</a>
      </div>
    </div>

    <!-- Image Header -->
    <div class="w3-display-container w3-animate-opacity">
      <img src="../includes/banner.png" alt="boat" style="width:100%;min-height:350px;">

    </div>';

}
else
{
    echo '<!DOCTYPE html>
    <html>
    <head>
    <title>Club Panda</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">';
    echo '<link rel="stylesheet" href="includes/w3.css">'
    . '<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" >    </script>';
        echo '<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body id="myPage">

<!-- Sidebar on click -->
<nav class="w3-sidebar w3-bar-block w3-white w3-card-2 w3-animate-left w3-xxlarge" style="display:none;z-index:2" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-display-topright w3-text-teal">Close
    <i class="fa fa-remove"></i>
  </a>
  <a href="games/bamboofield.php" class="w3-bar-item w3-button">Bamboo Field</a>
  <a href="games/zombiePanda.php" class="w3-bar-item w3-button">Zombie Pandas</a>
  <a href="#" class="w3-bar-item w3-button">Link 3</a>
  <a href="#" class="w3-bar-item w3-button">Link 4</a>
  <a href="#" class="w3-bar-item w3-button">Link 5</a>
</nav>

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="index.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Home</a>
  <a href="about.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">About</a>
    <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button" title="Notifications">Games<i class="fa fa-caret-down"></i></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block">
      <a href="games/bamboofield.php" class="w3-bar-item w3-button">Bamboo Field</a>
      <a href="games/zombiePanda.php" class="w3-bar-item w3-button">Zombie Pandas</a>
    </div>
  </div>
 </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
    <a href="index.php" class="w3-bar-item w3-button">Home</a>
    <a href="games.php" class="w3-bar-item w3-button">Games</a>
    <a href="about.php" class="w3-bar-item w3-button">About</a>
  </div>
</div>

<!-- Image Header -->
<div class="w3-display-container w3-animate-opacity">
  <img src="includes/banner.png" alt="boat" style="width:100%;min-height:350px;">

</div>';

}