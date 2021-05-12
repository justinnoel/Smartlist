<?php
session_start();
include('cred.php');
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "UPDATE products SET name=".json_encode(encrypt($_POST['name'])).", qty=".json_encode(encrypt($_POST['qty'])).", price=".json_encode(encrypt($_POST['price']))." WHERE id=".$_POST['id'];
  $stmt = $conn->prepare($sql);
  $stmt->execute();
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>