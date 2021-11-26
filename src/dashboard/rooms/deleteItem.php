<?php 
ini_set("display_errors", 1);
session_start();
include('../cred.php');
define("_roomName", $_GET['room']);

if(!in_array(_roomName, array("products", "bedroom", "bathroom", "garage", "family", "laundry", "dining_room", "camping", "storageroom") )) {
    die("403");
}

$id = intval($_GET['id']);
try {
$dbh = new PDO("mysql:host=".app::server.";dbname=".app::database."", app::username, app::password);
$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$sql = "SELECT * FROM "._roomName." WHERE id=" . $_GET['id']. " AND login_id=".$_SESSION['id'];
$users = $dbh->query($sql);
foreach ($users as $row)
{
    $name = $row['name'];
    $qty = $row['name'];
}
$dbh = null;
}
catch(PDOexception $e)
{
echo "Error is: " . $e->etmessage();
}
try {
  $conn = new PDO("mysql:host=".app::server.";dbname=".app::database."", app::username, app::password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $sql = "DELETE FROM "._roomName." WHERE id=$id AND login_id=".$_SESSION['id'];
  $conn->exec($sql);
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
$conn = null;

try {
  $conn = new PDO("mysql:host=".app::server.";dbname=".app::database."", app::username, app::password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO trash (name, qty, login, room)
  VALUES (".json_encode($name).", ".json_encode($qty).", ".json_encode($_SESSION['id']).", ".json_encode(_roomName).")";
  $conn->exec($sql);
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>