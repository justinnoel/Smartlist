<?php 
session_start(); 
include('../cred.php');
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "UPDATE login SET theme=".json_encode($_POST['color']). " WHERE id=".$_SESSION['id'];
  $stmt = $conn->prepare($sql);
  $stmt->execute();
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
header("Location: https://smartlist.ga/dashboard/beta");
?>