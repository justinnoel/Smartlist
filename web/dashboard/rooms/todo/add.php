<?php session_start(); ?>
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>
<?php
$servername = "localhost";
$username = "bcxkspna";
$password = "Q\$J~:4GI!7+E";
$dbname = "bcxkspna_test";
$name = $_POST['name'];
$qty = $_POST['qty'];
$price = $_POST['price'];
$descs = $_POST['decs'];
$loginId = $_SESSION['id'];
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO todo(name, qty, price, login_id, descs)
  VALUES('$name','$qty','$price', '$loginId', '$descs')";
  // use exec() because no results are returned
  $conn->exec($sql);
  //echo "New record created successfully";
  header("Location: https://smartlist.ga/dashboard/test.php");
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
