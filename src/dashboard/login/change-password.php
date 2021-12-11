<?php
ini_set("display_errors", 1);
session_start();
include("/home/smartlis/public_html/dashboard/cred.php");
if(!isset($_SESSION['forgotPasswordId'])) {
  die('false');
}
try {
  $dbh = new PDO("mysql:host=".App::server.";dbname=".App::database, App::username, App::password);
  $sql = $dbh->prepare("UPDATE login SET password=:password WHERE id=:sessid");

  $sql->execute(array(
      ':password' => password_hash($_POST["password"], PASSWORD_ARGON2I),
      ':sessid' => $_SESSION['forgotPasswordSessionId']
  ));
} catch(PDOException $e) {
  echo "<br>" . $e->getMessage();
}
?>Success