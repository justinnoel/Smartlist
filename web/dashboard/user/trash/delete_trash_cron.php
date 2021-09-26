<?php
session_start();
$servername = "localhost";
$username = "bcxkspna";
$password = '}G"-!gV&8"djcVgs-<y<ua\2pMk%(;Ax{^Tw#u=DJ,uG_)-xSV\+5U@bQuHryCBzR)&c/^L7D\[8R6MT';
$dbname = "bcxkspna_test";
include('../../cred.php');
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "DELETE FROM trash";
  $conn->exec($sql);
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
?>
