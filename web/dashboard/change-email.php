<?php 
session_start();
include('cred.php');
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "UPDATE login SET email=".json_encode(strip_tags(encrypt($_GET['email'])))." WHERE id=".$_SESSION['re_id'];
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  echo $stmt->rowCount() . " records UPDATED successfully";
  $_SESSION['re_email'] = $_GET['email'];
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>