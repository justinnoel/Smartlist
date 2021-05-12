<?php session_start();
include_once("connection.php");
$id = $_SESSION['id'];
$name = $_GET['pairingaccountid'];
$notificationssettings = $_GET['notificationssettings'];
$number_notify = $_GET['number_notify'];
$result = mysqli_query($mysqli, "UPDATE login SET theme='$name' WHERE id=$id");
$result = mysqli_query($mysqli, "UPDATE login SET notifications='$notificationssettings' WHERE id=$id");
$result = mysqli_query($mysqli, "UPDATE login SET remind='$number_notify' WHERE id=$id");
$result = mysqli_query($mysqli, "UPDATE login SET theme='".$_GET['color']."' WHERE id=$id");
header("Location: logout.php?sett=true");
?>
