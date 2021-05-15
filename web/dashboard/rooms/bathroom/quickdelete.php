<?php
include('../../cred.php');
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
$name = $_GET['name'];
$qty = $_GET['qty'];
$id = $_SESSION['id'];
$result=mysqli_query($mysqli, "DELETE FROM bathroom WHERE name = ".json_encode(decrypt($name))." AND qty = ".json_encode(decrypt($qty))."");
?>