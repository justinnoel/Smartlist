<?php
session_start();
include("../../cred.php");
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "UPDATE notes SET title=".json_encode($_POST["title"]).", content = ".json_encode($_POST["content"])." WHERE id=".$_POST['id'];
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  echo "Updated Note Successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>