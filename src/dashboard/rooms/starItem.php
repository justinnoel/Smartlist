<?php 
ini_set('display_errors', 1);
session_start();
if(!isset($_SESSION['valid'])) {die("Forbidden");}
include('../cred.php');
$id = $_GET['id'];
$star = 0;
define("_roomName", $_GET['room']);
if(!in_array(_roomName, array("products", "bedroom", "bathroom", "garage", "family", "laundry", "dining_room", "camping", "storageroom") )) {
    die(403);
}
try {
  $dbh = new PDO("mysql:host=".App::server.";dbname=".App::database, App::username, App::password);
  $sql = $dbh->prepare("UPDATE "._roomName." SET star = star ^ 1 WHERE id=:id AND login_id=:sessid;");

  $sql->execute(array(
      ':id' => intval($_GET['id']),
      ':sessid' => intval($_SESSION['id'])
  ));
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
?>