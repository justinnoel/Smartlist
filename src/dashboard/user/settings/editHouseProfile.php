<?php
session_start();
include "../../cred.php";
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "UPDATE login SET houseName=:name WHERE id=:sessid";

  // Prepare statement
  $stmt = $conn->prepare($sql);

  // execute the query
  $stmt->execute(array(
    ":name" => encrypt($_POST['name']),
    ":sessid" => $_SESSION['id']
  ));

  // echo a message to say the UPDATE succeeded
  echo "Updated! Reload to see the changes!";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>