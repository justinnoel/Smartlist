<?php
ini_set('display_errors', 1);
session_start();
include('../../cred.php');
define("_roomName", "bm");

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // prepare sql  and bind parameters
  $stmt = $conn->prepare("INSERT INTO "._roomName."(name, qty, price, login_id)
    VALUES (:name, :n, :label, :sessid)");
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':n', $n);
  $stmt->bindParam(':label', $label);
  $stmt->bindParam(':sessid', $id);

  // insert a row
  $name = encrypt($_GET['date']);
  $n = encrypt(intval($_GET['n']));
  $label = encrypt($_GET['label']);
  $id = $_SESSION['id'];
  $stmt->execute();

} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
exit();
?>