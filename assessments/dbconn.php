<?php
$user = "ebu_user";
$password = "K@jiado78??";

try {
  $db = new PDO("mysql:host=localhost", $user, $password);
  echo "<h2>Connected Successfully!!</h2><ol>";
  }
  
catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>