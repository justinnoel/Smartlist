<?php session_start(); ?>
<?php
include('../../cred.php');
$name = $_POST['name'];
$qty = $_POST['qty'];
$price = $_POST['price'];
$loginId = $_SESSION['id'];
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM camping WHERE login_id=" . $_SESSION['id'];
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
  $sql = "INSERT INTO camping(name, qty, price, login_id, date) 
    VALUES(".json_encode(encrypt($name)).",".json_encode(encrypt($qty)).", ".json_encode(encrypt(1)).", ".json_encode($loginId).", ".json_encode($_POST['date']).")";

  $conn->exec($sql);
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>