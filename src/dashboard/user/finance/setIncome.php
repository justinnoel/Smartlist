<?php
session_start();
include('../../cred.php');
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "UPDATE login SET income=:income WHERE id=:sessid";
  $stmt = $conn->prepare($sql);
  $stmt->execute(array(
    ":income" => encrypt($_POST['income']),
    ":sessid" => $_SESSION['id']
  ));
//   echo $stmt->rowCount() . " records UPDATED successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>