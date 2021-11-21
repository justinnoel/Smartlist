<?php 
ini_set('display_errors', 1);
session_start();
if(!isset($_SESSION['valid'])) {die("Forbidden");http_status_code(403);}
include('../../cred.php');
$id = $_GET['id'];
$star=0;
define("_roomName", "dining_room");
try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("UPDATE "._roomName." SET star = star ^ 1 WHERE id=:id AND login_id=:sessid;");

  $sql->execute(array(
      ':id' => intval($_GET['id']),
      ':sessid' => intval($_SESSION['id'])
  ));
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
?>