<?php
include_once("../connection.php");
$id = $_GET['id'];
$result = mysqli_query($mysqli, 'UPDATE login SET accept=1 WHERE id='.$id.'');
header("Location: ../");
?>