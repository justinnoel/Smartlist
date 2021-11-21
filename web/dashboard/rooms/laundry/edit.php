<?php 
ini_set("display_errors", 1);
session_start(); 
include('../../cred.php');
$id = $_POST['id'];
$name = $_POST['name'];
$qty = $_POST['qty'];
$price = $_POST['price'];	

try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("UPDATE laundry SET name=:name, qty=:qty, price=:price, date=:date WHERE id=:id AND login_id=:sessid");

  $sql->execute(array(
      ':name' => encrypt($_POST['name']),
      ':qty' => encrypt($_POST['qty']),
      ':price' => encrypt($_POST['price']),
      ':date' => intval($_POST['date']),
      ':id' => intval($_POST['id']),
      ':sessid' => intval($_SESSION['id'])
  ));
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
?>