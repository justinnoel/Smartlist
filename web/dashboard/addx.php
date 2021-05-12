<?php session_start();
include('cred.php');
$name = encrypt($_POST['name']);
$qty = encrypt($_POST['qty']);
$price = encrypt($_POST['price']);
$loginId = $_SESSION['id'];
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO products(name, qty, price, login_id) 
  VALUES(".json_encode($name).",".json_encode($qty).", ".json_encode($price).", '$loginId')";
  $conn->exec($sql);
  header("Location: test.php");
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>