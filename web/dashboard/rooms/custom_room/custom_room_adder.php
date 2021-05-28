<?php
session_start();
include('../../cred.php');
$loginId = $_SESSION['id'];
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO custom_room_items(name, qty, price, login_id, label, star) 
  VALUES(".json_encode(encrypt($_POST["name"])).",".json_encode(encrypt($_POST["qty"])).",".json_encode($_POST["price"]).", ".json_encode($_SESSION["id"]).", ".json_encode($_POST["label"]).", 0)";
  $conn->exec($sql);
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>