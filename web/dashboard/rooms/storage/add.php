<?php session_start(); ?>
<?php
include('../../cred.php');
$name = $_POST['name'];
$qty = str_replace("<", "",str_replace("?", "", str_replace("'", "",$_POST['qty'])));
$price = $_POST['price'];
$loginId = $_SESSION['id'];
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO storageroom(name, qty, price, login_id) 
  VALUES(".json_encode(encrypt($name)).",".json_encode(encrypt($qty)).", ".json_encode(encrypt(1)).", ".json_encode($loginId).")";
  $conn->exec($sql);
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>