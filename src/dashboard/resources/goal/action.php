<?php
session_start();
include('../../cred.php');
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "UPDATE login SET goal=:goal WHERE id=:sessid";

  // Prepare statement
  $stmt = $conn->prepare($sql);

  // execute the query
  $stmt->execute(array(
    ":sessid" => $_SESSION['id'],
    ":goal" => $_GET['goal']
  ));

  // echo a message to say the UPDATE succeeded
  header("Location: https://smartlist.ga/dashboard/test.php?bm_set=1");
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>