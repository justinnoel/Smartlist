<?php 
ini_set("display_errors", 1);
session_start(); 
include('../cred.php');

try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("UPDATE login SET remind=:remind WHERE id=:sessid");

  $sql->execute(array(
      ':remind' => $_GET['remind'],
      ':sessid' => intval($_SESSION['id'])
  ));
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
?>