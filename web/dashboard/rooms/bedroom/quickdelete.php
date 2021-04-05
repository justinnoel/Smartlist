<?php
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
$name = $_GET['name'];
$qty = $_GET['qty'];
$id = $_SESSION['id'];
$result=mysqli_query($mysqli, "DELETE FROM bedroom WHERE name = '$name' AND qty = '$qty'");
?>
