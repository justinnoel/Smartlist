<?php
ini_set('display_errors', 1);
session_start();
include('../../cred.php');
define("_roomName", "listNames");
if(!isset($_POST['star'])) {
    $_POST['star'] = "";
}
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // prepare sql  and bind parameters
  $stmt = $conn->prepare("INSERT INTO "._roomName."(name, star, login)
    VALUES (:name, :star, :sessid)");
  $stmt->bindParam(':name', $_POST['name']);
  $stmt->bindParam(':star', $_POST['star']);
  $stmt->bindParam(':sessid', $_SESSION['id']);

  // insert a row
  $stmt->execute();

} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>Successfully created list!