<?php
session_start(); //otvorenie session

//zistenie ci je session nastavene
if(isset($_SESSION['username']) ) {
    echo '<link rel="stylesheet" href="welcome.css">';
    echo 'Welcome '.$_SESSION['username'].'<br>';

    echo 'Click here to <a href = "logout.php" tite = "Logout">logout.';//odkaz na odhlasenie
}
?>