<?php
session_start();
include('../cred.php');
if(isset($_SESSION['id'])) {
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM auth_ip WHERE login=" . $_SESSION['id']. " AND ip='".md5($_GET['u']). "'";
$users = $dbh->query($sql);
if($users->rowCount() > 1) {header("Location: https://smartlist.ga/dashboard/test.php?IP_whitelisted_already"); exit();}



try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO auth_ip(ip, login) 
  VALUES(".json_encode($_GET['u']).", ".$_SESSION['id'].")";
  $conn->exec($sql);
  header("Location: https://smartlist.ga/dashboard/login.php?confirmed");
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
} 
else {
    exit("Session has expired. This might occur due to inactivity, or clicking the link from another device. Try re-verifying your email again");
}
?>