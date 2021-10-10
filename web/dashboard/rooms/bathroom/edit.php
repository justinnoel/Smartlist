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
  $sql = "UPDATE bathroom SET name=".json_encode(encrypt($name)).", qty=".json_encode(encrypt($qty)).", price=".json_encode(encrypt($_POST["price"])).", date=".json_encode(($_POST["date"]))." WHERE id=".json_encode($id);
  $stmt = $conn->prepare($sql);
  $stmt->execute();
//   echo $stmt->rowCount() . " records UPDATED successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
header("Location: https://smartlist.ga/dashboard/beta");
?>