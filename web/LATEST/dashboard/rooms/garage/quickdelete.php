<?php
include('../../cred.php');
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
$name = str_replace("?", "", str_replace("'", "",$_GET['name']));
$qty = str_replace("?", "", str_replace("'", "",$_GET['qty']));
$id = str_replace("?", "", str_replace("'", "",$_SESSION['id']));
$result=mysqli_query($mysqli, "DELETE FROM garage WHERE name = '$name' AND qty = '$qty'");
?>