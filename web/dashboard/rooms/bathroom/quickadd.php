<?php session_start(); ?>
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>
<?php
$name = str_replace("<", "",str_replace("?", "", str_replace("'", "", $_GET['name'])));
$qty = str_replace("<", "",str_replace("?", "", str_replace("'", "",$_GET['qty'])));
$price = 1;
$loginId = $_SESSION['id'];
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO bathroom(name, qty, price, login_id) 
  VALUES('$name','$qty','$price', '$loginId')";
  // use exec() because no results are returned
  $conn->exec($sql);
  //echo "New record created successfully";
  //header("Location: test.php");
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
