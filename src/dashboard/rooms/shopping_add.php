<?php
ini_set('display_errors', 1);
session_start();
include('../cred.php');
define("_roomName", "grocerylist");
$dbh = new PDO("mysql:host=".App::server.";dbname=".App::database, App::username, App::password);
$sql = $dbh->prepare("SELECT * FROM "._roomName." WHERE login_id=:sessid OR login_id=:syncid ORDER BY id DESC");

$sql->execute(array( ':sessid' => $_SESSION['id'], ':syncid' => $_SESSION['syncid'] ));
$inv = $sql->fetchAll();

foreach($inv as $res) {
  if(strval(trim(decrypt($res['name']))) == strval(trim($_GET['name']))) {
    exit();
  }
}
try {
  $conn = new PDO("mysql:host=".App::server.";dbname=".App::database, App::username, App::password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // prepare sql  and bind parameters
  $stmt = $conn->prepare("INSERT INTO "._roomName."(name, login_id)
    VALUES (:name, :sessid)");
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':sessid', $id);

  // insert a row
  $name = encrypt($_GET['name']);
  $id = $_SESSION['id'];
  $stmt->execute();

} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>