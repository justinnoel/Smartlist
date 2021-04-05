<?php
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
$name = $_GET['name'];
$qty = $_GET['qty'];
$price = $_GET['price'];
$id = $_SESSION['id'];
$result=mysqli_query($mysqli, "DELETE FROM products WHERE name='$name' AND qty = '$qty' AND price = '$price' AND login_id='$id'");
?>
