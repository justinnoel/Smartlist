<?php
session_start();
include('../cred.php');
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "DELETE FROM trash WHERE login=".$_SESSION['id'];
  $conn->exec($sql);
  echo "<script>M.toast({html: 'Permanently deleted ".$_GET['item_count']." items'});sm_page('News')</script>";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
