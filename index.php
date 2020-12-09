<?php
$user = "ebu_user";
$password = "K@jiado78??";
$database = "EBU_database";

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  echo "<h2>Connected Successfully</h2><ol>";
}

  catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>