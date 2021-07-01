<?php session_start();
include('../../cred.php');
$name = str_replace("<", "",str_replace("?", "", str_replace("'", "", $_POST['name'])));
$qty = str_replace("<", "",str_replace("?", "", str_replace("'", "",$_POST['qty'])));
$price = $_POST['price'];
$loginId = $_SESSION['id'];
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM bathroom WHERE login_id=" . $_SESSION['id'];
$users = $dbh->query($sql);
foreach ($users as $row) {
  if(decrypt($row['name']) == $_POST['name']) {
      echo "Item Already Exists!";
      exit();
  }
}
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO bathroom(name, qty, price, login_id) 
  VALUES(".json_encode(encrypt($name)).", ".json_encode(encrypt($qty)).", ".json_encode(encrypt($price)).", '$loginId')";
  $conn->exec($sql);
header("Location: https://smartlist.ga/dashboard/test.php?room=bathroom");
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>