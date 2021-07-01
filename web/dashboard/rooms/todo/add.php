<?php session_start();
include('../../cred.php');
$name = $_POST['name'];
$qty = $_POST['qty'];
$price = $_POST['price'];
$descs = $_POST['decs'];
$loginId = $_SESSION['id'];

$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM todo WHERE login_id=" . $_SESSION['id'];
$users = $dbh->query($sql);
foreach ($users as $row) {
  if(decrypt($row['name']) == $_POST['name']) {
      echo "Item Already Exists!";
      exit();
  }
}





try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO todo(name, qty, price, login_id, descs)
  VALUES(".json_encode($name).", ".json_encode($qty).", ".json_encode($price).", '$loginId', ".json_encode($descs).")";
  // use exec() because no results are returned
  $conn->exec($sql);
  //echo "New record created successfully";
  header("Location: https://smartlist.ga/dashboard/test.php");
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
