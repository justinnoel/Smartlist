<?php session_start();
include('../../cred.php');
$name = encrypt($_POST['name']);
$qty = encrypt($_POST['qty']);
$price = encrypt($_POST['price']);
$loginId = $_SESSION['id'];
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM products WHERE login_id=" . $_SESSION['id'];
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
  $sql = "INSERT INTO products(name, qty, price, login_id, date) 
  VALUES(".json_encode($name).",".json_encode($qty).", ".json_encode($price).", '$loginId', ".json_encode($_POST['date']).")";
  $conn->exec($sql);
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>