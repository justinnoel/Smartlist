<?php session_start(); ?>
<?php
include('../../cred.php');
$name = str_replace("<", "",str_replace("?", "", str_replace("'", "", $_POST['name'])));
$qty = str_replace("<", "",str_replace("?", "", str_replace("'", "",$_POST['qty'])));
$price = $_POST['price'];
$loginId = $_SESSION['id'];
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO laundry(name, qty, price, login_id) 
VALUES(".json_encode(encrypt($name)).",".json_encode(encrypt($qty)).", ".json_encode(encrypt(1)).", ".json_encode($loginId).")";
  $conn->exec($sql);
  header("Location: https://smartlist.ga/dashboard/test.php?room=laundry");
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>