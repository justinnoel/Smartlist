<?php session_start(); 
include('../cred.php');
$name = str_replace("<", "",str_replace("?", "", str_replace("'", "", $_GET['name'])));
$qty = 1;
$price = 1;
$loginId = $_SESSION['id'];
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO grocerylist(name, qty, price, login_id) 
  VALUES('$name','$qty','$price', '$loginId')";
  $conn->exec($sql);
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>