<?php
session_start();
include('../../cred.php');
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO products (name, qty, price, login_id, star)
  VALUES (".json_encode(encrypt($_GET['name'])).", ".json_encode(encrypt(1)).", '".json_encode(encrypt('Fruits, Veggies, etc.'))."', ".json_encode($_SESSION['id']).", 0)";
  $conn->exec($sql);
//   echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>