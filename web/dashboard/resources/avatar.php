<?php session_start();
if(!isset($_SESSION['valid'])) {
header('Location: ../login.php');
}
include_once("../connection.php");
$id = $_SESSION['id'];
$name = $_GET['pairingaccountid'];

// checking empty fields
if(empty($name)) {				
if(empty($name)) {
echo "<font color='red'>Name field is empty.</font><br/>";
}	
} else {	
//updating the table
$result = mysqli_query($mysqli, "UPDATE login SET user_avatar='$name' WHERE id=$id");
header("Location: ../logout.php?avatar=true");
}
?>
