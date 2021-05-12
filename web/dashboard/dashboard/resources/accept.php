<?php
include_once("../connection.php");
$id = $_GET['id'];
$result = mysqli_query($mysqli, 'UPDATE login SET accept=0 WHERE id='.$id.'');
header("Location: https://smartlist.ga/dashboard/test.php?pair_accept");
?>