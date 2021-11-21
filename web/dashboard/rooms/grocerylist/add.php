<?php
ini_set('display_errors', 1);
session_start();
include('../../cred.php');
define("_roomName", "grocerylist");
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
  $stmt = $conn->prepare("INSERT INTO "._roomName."(name, login_id)
    VALUES (:name, :sessid)");
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':sessid', $id);

  // insert a row
  $name = encrypt($_POST['name']);
  $id = $_SESSION['id'];
  $stmt->execute();

  echo "Added item successfully! You can keep adding more.";
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>