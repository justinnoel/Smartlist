<?php session_start(); ?>
<?php
include('../../cred.php');
$name = str_replace("<", "",str_replace("?", "", str_replace("'", "", $_POST['name'])));
$qty = str_replace("<", "",str_replace("?", "", str_replace("'", "",$_POST['qty'])));
$loginId = $_SESSION['id'];
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO grocerylist(name, qty, price, login_id) 
  VALUES('$name','$qty', '1', '$loginId')";
  $conn->exec($sql);
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>