<?php

$mysql_host = 'localhost';
$mysql_dbname= 'cmintranet';
$mysql_user = 'ebu_user';
$mysql_password = 'K@jiado78??';

$link = mysqli_connect($mysql_host, $mysql_user, $mysql_password,$mysql_dbname) or die("Unable to Connect to server");
mysqli_select_db($link,$mysql_dbname) or die("Could not open the database");

?>

