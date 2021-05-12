<?php
$databaseHost = 'localhost';
$databaseName = 'bcxkspna_test';
$databaseUsername = 'bcxkspna';
$databasePassword = 'Q$J~:4GI!7+E'; // Q$J~:4GI!7+E
 
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

$name = $_GET['name'];
$qty = $_GET['qty'];
$price = $_GET['price'];
$id = $_SESSION['id'];
$result=mysqli_query($mysqli, "DELETE FROM products WHERE name='$name' AND qty = '$qty' AND price = '$price' AND login_id='$id'");
?>