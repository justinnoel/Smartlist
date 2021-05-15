<?php
session_start(); 
if(isset($_POST['submit'])) {
include('../../../cred.php');
$name = str_replace("<", "",str_replace("?", "", str_replace("'", "", $_POST['name'])));
$qty = str_replace("<", "",str_replace("?", "", str_replace("'", "",$_POST['qty'])));
$uname = str_replace("<", "",str_replace("?", "", str_replace("'", "",$_SESSION['name'])));
$price = $_SESSION['code'];
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO todo(name, qty, price, login_id, uname) 
  VALUES('$name','$qty','$price', '1', '$uname')";
  $conn->exec($sql);
  header("Location: https://smartlist.ga/dashboard/event/dash/");
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
}
include('../header_todo.php');
?>