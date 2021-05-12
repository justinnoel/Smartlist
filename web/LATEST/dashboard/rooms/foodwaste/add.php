<?php session_start();
include('../../cred.php');
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO food_wastage(date, amount, login) 
  VALUES(".json_encode(date('m/d/Y')).", ".json_encode($_POST['qty']).", ".json_encode($_SESSION['id']).")";
  $conn->exec($sql);
  header("Location: https://smartlist.ga/dashboard/test.php?room=3");
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
?>