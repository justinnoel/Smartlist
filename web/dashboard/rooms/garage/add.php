<?php
session_start();
$name = str_replace("?", "", str_replace("'", "", $_POST['name']));
$qty = str_replace("?", "", str_replace("'", "",$_POST['qty']));
// $price = $_POST['price'];
$loginId = $_SESSION['id'];
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO garage(name, qty, price, login_id) 
  VALUES('$name','$qty','1', '$loginId')";
  $conn->exec($sql);
  $last_id = $conn->lastInsertId();
  echo $last_id;
//   header("Location: https://smartlist.ga/dashboard/test.php?room=g");
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
