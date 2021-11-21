<?php
ini_set('display_errors', 1);
session_start();
include('../../cred.php');
define("_roomName", "dining_room");
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = $dbh->prepare("SELECT * FROM "._roomName." WHERE login_id=:sessid OR login_id=:syncid ORDER BY id DESC");

$sql->execute(array( ':sessid' => $_SESSION['id'], ':syncid' => $_SESSION['syncid'] ));
$inv = $sql->fetchAll();

foreach($inv as $res) {
  if(strval(trim(decrypt($res['name']))) == strval(trim($_POST['name']))) {
    echo "Item Already Exists!";
    exit();
  }
}
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // prepare sql  and bind parameters
  $stmt = $conn->prepare("INSERT INTO "._roomName."(name, qty, price, login_id, date)
    VALUES (:name, :quantity, :categories, :sessid, :date)");
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':quantity', $qty);
  $stmt->bindParam(':categories', $categories);
  $stmt->bindParam(':sessid', $id);
  $stmt->bindParam(':date', $date);

  // insert a row
  $name = encrypt($_POST['name']);
  $qty = encrypt($_POST['qty']);
  $categories = encrypt($_POST['price']);
  $id = $_SESSION['id'];
  $date = $_POST['date'];
  $stmt->execute();

  echo "Added item successfully! You can keep adding more.";
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>