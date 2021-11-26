<?php
ini_set('display_errors', 1);
session_start();
include('../../cred.php');
define("_roomName", "todo");
$dbh = new PDO("mysql:host=".App::server.";dbname=".App::database, App::username, App::password);
$sql = $dbh->prepare("SELECT * FROM "._roomName." WHERE login_id=:sessid OR login_id=:syncid ORDER BY id DESC");

$sql->execute(array( ':sessid' => $_SESSION['id'], ':syncid' => $_SESSION['syncid'] ));
$inv = $sql->fetchAll();

foreach($inv as $res) {
  if(strval(trim(decrypt($res['name']))) == strval(trim($_POST['name']))) {
    exit();
  }
}
try {
  $conn = new PDO("mysql:host=".App::server.";dbname=".App::database, App::username, App::password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // prepare sql  and bind parameters
  $stmt = $conn->prepare("INSERT INTO "._roomName." (name, qty, price, login_id, descs)
    VALUES (:name, :quantity, :price, :sessid, :descs)");
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':quantity', $qty);
  $stmt->bindParam(':price', $price);
  $stmt->bindParam(':sessid', $id);
  $stmt->bindParam(':descs', $descs);

  // insert a row
  $name =  encrypt($_GET['name']);
  $qty =   encrypt("1");
  $price = encrypt(date("d/m/Y"));
  $descs = encrypt("s");
  $id = $_SESSION['id'];
  $stmt->execute();

} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>