<?php session_start(); ?>
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>
<?php
include('../cred.php');
$name = $_GET['name'];
$qty = $_GET['qty'];
$price = $_GET['price'];
$loginId = $_SESSION['id'];
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO products(name, qty, price, login_id) 
  VALUES(".json_encode($name).", ".json_encode($qty).", ".json_encode($price).", \"$loginId\")";
  $conn->exec($sql);
  //header("Location: test.php");
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

//  try {
// $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// $sql = "SELECT MAX(id) FROM products WHERE login_id = ".$_SESSION['id'];
// $users = $dbh->query($sql);
// foreach ($users as $row) {
// $KITCHEN_ID = $row['MAX(id)'];
// }
// $dbh = null;
// }
//   catch (PDOexception $e) {echo "Error is: " . $e-> etmessage();}

?>