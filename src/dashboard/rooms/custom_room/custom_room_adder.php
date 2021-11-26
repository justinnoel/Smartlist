<?php
session_start();
include('../../cred.php');
$loginId = $_SESSION['id'];

$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM custom_room_items WHERE login_id=" . $_SESSION['id'];
$users = $dbh->query($sql);
foreach ($users as $row) {
  if(decrypt($row['name']) == $_POST['name'] && $_POST['price'] == decrypt($row['price'])) {
      echo "Item Already Exists!";
      exit();
  }
}




try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO custom_room_items(name, qty, price, login_id, label, star, date) 
  VALUES(".json_encode(encrypt($_POST["name"])).",".json_encode(encrypt($_POST["qty"])).",".json_encode($_POST["price"]).", ".json_encode($_SESSION["id"]).", ".json_encode($_POST["label"]).", 0, ".json_encode($_POST['date']).")";
  $conn->exec($sql);
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>