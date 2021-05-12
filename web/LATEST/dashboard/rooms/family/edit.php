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
  $sql = "UPDATE family SET name=".json_encode($name).", qty=".json_encode($qty)." WHERE id=".json_encode($id);
  $stmt = $conn->prepare($sql);
  $stmt->execute();
//   echo $stmt->rowCount() . " records UPDATED successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
header("Location: https://smartlist.ga/dashboard/beta");
?>