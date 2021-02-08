<?php
session_start();
$servername = "OMMITED";
$username = "OMMITED";
$password = "OMMITED";
$dbname = "OMMITED";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "UPDATE login SET goal=".$_GET['goal']." WHERE id=".$_SESSION['id'];

  // Prepare statement
  $stmt = $conn->prepare($sql);

  // execute the query
  $stmt->execute();

  // echo a message to say the UPDATE succeeded
  header("Location: https://smartlist.ga/homebase/test.php?bm_set=1");
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
