<?php session_start(); ?>
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>
<?php
include('../../cred.php');
$name = str_replace("<", "",str_replace("?", "", str_replace("'", "", $_POST['name'])));
$qty = str_replace("<", "",str_replace("?", "", str_replace("'", "",$_POST['qty'])));
$price = $_POST['price'];
$loginId = $_SESSION['id'];

$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM dining_room WHERE login_id=" . $_SESSION['id'];
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
  $sql = "INSERT INTO dining_room(name, qty, price, login_id, date) 
  VALUES(".json_encode(encrypt($name)).",".json_encode(encrypt($qty)).", ".json_encode(encrypt(1)).", ".json_encode($loginId).", ".json_encode($_POST['date']).")";
  $conn->exec($sql);
  header("Location: https://smartlist.ga/dashboard/test.php?room=dining_room");
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>