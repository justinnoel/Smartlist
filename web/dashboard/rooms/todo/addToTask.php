<?php session_start();
include('../../cred.php');
$name = $_GET['q'];
$qty = 3;
$price = date('M, Y');
$descs = "";
$loginId = $_SESSION['id'];
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO todo(name, qty, price, login_id, descs)
  VALUES(".json_encode($name).", '3', ".json_encode($price).", '$loginId', ".json_encode($descs).")";
  $conn->exec($sql);
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>

<script>M.toast({html: "Added to todo list"})</script>