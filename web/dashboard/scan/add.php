<?php session_start(); ?>
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: ../login.php');
}
?>
<?php
$name = $_POST['name'];
$qty = 1;
$price = 'QR code';
$loginId = $_SESSION['id'];
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO products(name, qty, price, login_id) 
  VALUES('$name','$qty','$price', '$loginId')";
  $conn->exec($sql);
  header("Location: ../");
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
