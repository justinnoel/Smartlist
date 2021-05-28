<?php
session_start();
include("../../cred.php");
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "DELETE FROM labels WHERE id=".$_GET["id"]." AND login=".$_SESSION['id'];
  $conn->exec($sql);
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
<script>M.toast({html: "Successfully deleted label. Items with the label aren't affected. "})</script>