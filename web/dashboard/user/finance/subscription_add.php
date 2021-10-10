<?php
session_start();
include('../../cred.php');
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO payment_subs (name, login_id, price, date, type)
  VALUES (".json_encode(encrypt($_POST['name'])).", ".json_encode(($_SESSION['id'])).", ".json_encode(encrypt($_POST['price'])).",	".json_encode(encrypt($_POST['date'])).", ".json_encode(encrypt($_POST['type'])).")";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>