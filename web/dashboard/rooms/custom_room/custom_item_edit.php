<?php 
session_start(); 
include('../../cred.php');
$id = $_POST['id'];
$name = $_POST['name'];
$qty = $_POST['qty'];
$price = $_POST['price'];	
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "UPDATE custom_room_items SET name=".json_encode(encrypt($name)).", qty=".json_encode(encrypt($qty)).", date=".json_encode($_POST["date"]).", label=".json_encode(encrypt($_POST["price"]))." WHERE id=".json_encode($id);
  $stmt = $conn->prepare($sql);
  $stmt->execute();
//   echo $stmt->rowCount() . " records UPDATED successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>