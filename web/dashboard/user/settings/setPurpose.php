<?php 
ini_set("display_errors", 1);
session_start(); 
include('../../cred.php');

try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("UPDATE login SET purpose=:v WHERE id=:sessid");

  $sql->execute(array(
      ':v' => $_GET['value'],
      ':sessid' => intval($_SESSION['id'])
  ));
} catch(PDOException $e) {
  echo "<br>" . $e->getMessage();
}
?>