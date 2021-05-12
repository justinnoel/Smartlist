<?php
session_start();
include('../../cred.php');
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO bm (name, qty, price, login_id)
  VALUES (".json_encode(encrypt(date('m/d/Y'))).", ".json_encode(encrypt($_GET['n'])).", ".json_encode(encrypt($_GET['n'])).", ".json_encode($_SESSION['id']).")";
  $conn->exec($sql);
//   header('Location: https://smartlist.ga/dashboard/test.php?bm');
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>