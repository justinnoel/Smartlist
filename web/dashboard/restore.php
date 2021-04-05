<?php 
session_start();
include_once("cred.php");
try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = "SELECT * FROM trash WHERE id=".$_GET['id']. " AND login=".$_SESSION['id'];
  $users = $dbh->query($sql);
  foreach ($users as $row) {
     $name = $row['name'];
     $qty = $row['qty'];
     $price = $row['price'];
  }
  $dbh = null;
}
catch (PDOexception $e) {
  echo "Error is: " . $e-> etmessage();
}
try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = "DELETE FROM trash WHERE id=".$_GET['id']. " AND login=".$_SESSION['id'];
  $users = $dbh->query($sql);
  $dbh = null;
}
catch (PDOexception $e) {
  echo "Error is: " . $e-> etmessage();
}

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO products(name, qty, price, login_id) 
  VALUES( ".json_encode($name).", ".json_encode($qty).", ".json_encode($price).", ".json_encode($_SESSION['id']).")";
  $conn->exec($sql);
  header("Location: test.php");
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
