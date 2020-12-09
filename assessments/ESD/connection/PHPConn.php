<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_PHPConn = "localhost";
$database_PHPConn = "EBU_database";
$username_PHPConn = "ebu_user";
$password_PHPConn = "K@jiado78??";
$PHPConn = mysql_pconnect($hostname_PHPConn, $username_PHPConn, $password_PHPConn) or trigger_error(mysql_error(),E_USER_ERROR); 
?>