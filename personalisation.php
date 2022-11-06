<?php
$preference = $_GET['pref'];
setcookie("preference", $preference, time()+3600); /* expire dans 1 heure = 3600 secondes */
echo $_COOKIE['preference'];
?>