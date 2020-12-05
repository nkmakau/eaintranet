<?php

$mysql_host = '172.28.227.31';
$mysql_dbname= 'CMINTRANET';
$mysql_user = 'cmintranet';
$mysql_password = 'S#f#r1c0m';

$link = mysqli_connect($mysql_host, $mysql_user, $mysql_password,$mysql_dbname) or die("Unable to Connect to server");
mysqli_select_db($link,$mysql_dbname) or die("Could not open the database");

?>
