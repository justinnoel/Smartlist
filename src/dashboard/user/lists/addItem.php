<?php
ini_set('display_errors', 1);
session_start();
include('../../cred.php');
define("_roomName", "listItems");

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // prepare sql  and bind parameters
  $stmt = $conn->prepare("INSERT INTO "._roomName."(name, description, listId, login)
    VALUES (:name, :description, :listId, :sessid)");
  $stmt->bindParam(':name', encrypt($_POST['name']));
  $stmt->bindParam(':description', encrypt($_POST['description']));
  $stmt->bindParam(':listId', $_POST['listId']);
  $stmt->bindParam(':sessid', $_SESSION['id']);

  // insert a row
  $stmt->execute();

} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>Successfully added item to list