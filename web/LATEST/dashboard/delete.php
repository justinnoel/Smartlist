<?php session_start();
include('cred.php');
$id = intval($_GET['id']);
try {
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM products WHERE id=" . $_GET['id'];
$users = $dbh->query($sql);
foreach ($users as $row)
{
    $name = $row['name'];
    // echo "<script>alert('".$row['name']."')</script>";
    $qty = $row['name'];
}
$dbh = null;
}
catch(PDOexception $e)
{
echo "Error is: " . $e->etmessage();
}
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "DELETE FROM products WHERE id=$id";
  $conn->exec($sql);
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
$conn = null;

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO trash (name, qty, login, room)
  VALUES (".json_encode($name).", ".json_encode($qty).", ".json_encode($_SESSION['id']).", 'Kitchen')";
  $conn->exec($sql);
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>