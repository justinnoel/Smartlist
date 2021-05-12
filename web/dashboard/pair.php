<?php session_start();
include_once("connection.php");
    $id = $_SESSION['id'];
    $name = $_GET['pairingaccountid'];
    $result = mysqli_query($mysqli, 'UPDATE login SET syncid = "'.$name.'" WHERE id='.$id.'');
    $result = mysqli_query($mysqli, 'UPDATE login SET accept = 1 WHERE id='.$id.'');
    header("Location: test.php");
?>