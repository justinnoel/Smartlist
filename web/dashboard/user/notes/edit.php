<?php
ini_set('display_errors', 1);
session_start();
include('../../cred.php');

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // prepare sql  and bind parameters
  $stmt = $conn->prepare("UPDATE notes SET title=:title, content=:content WHERE id=:sessid");
  $stmt->bindParam(':title', $name);
  $stmt->bindParam(':content', $content);
  $stmt->bindParam(':sessid', $_SESSION['id']);

  // insert a row
  $name = encrypt($_POST['title']);
  $content = encrypt($_POST['content']);
  $sessid = $_SESSION['id'];
  $stmt->execute();

} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>
Successfully created note!
<script>getHashPage();</script>