<?php 
ini_set("display_errors", 1);
session_start(); 
include('../cred.php');
$id = $_POST['id'];
$name = $_POST['name'];
$qty = $_POST['qty'];
$price = $_POST['price'];	
define("_roomName", $_GET['room']);

if(!in_array(_roomName, array("products", "bedroom", "bathroom", "garage", "family", "laundry", "dining_room", "camping", "storageroom") )) {
    die("403");
}

try {
  $dbh = new PDO("mysql:host=".App::server.";dbname=".App::database, App::username, App::password);
  $sql = $dbh->prepare("UPDATE "._roomName." SET name=:name, qty=:qty, price=:price, date=:date WHERE id=:id AND login_id=:sessid");

  $sql->execute(array(
      ':name' => encrypt($_POST['name']),
      ':qty' => encrypt($_POST['qty']),
      ':price' => encrypt($_POST['price']),
      ':date' => intval($_POST['date']),
      ':id' => intval($_POST['id']),
      ':sessid' => intval($_SESSION['id'])
  ));
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
?>