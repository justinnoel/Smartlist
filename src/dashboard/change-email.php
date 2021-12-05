<?php 
session_start();
include('cred.php');
// Updates the email on the signup page

try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("UPDATE login SET email=:email WHERE id=:sessid");

  $sql->execute(array(
      ':email' => strip_tags(encrypt($_GET['email'])),
      ':sessid' => intval($_POST['re_id'])
  ));
  $_SESSION['re_email'] = $_GET['email'];
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
?>