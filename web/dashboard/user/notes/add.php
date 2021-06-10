<?php
session_start();
include("../../cred.php");

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO notes (title, content, login_id)
  VALUES (".json_encode($_POST['title']).", ".json_encode($_POST['content']).", ".json_encode($_SESSION['id']).")";
  $conn->exec($sql);
  echo "Note created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
?>