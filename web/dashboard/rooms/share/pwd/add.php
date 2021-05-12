<?php session_start(); 
include_once("connection.php");
if(isset($_POST['Submit'])) {
$name = $_POST['name'];
$qty = $_POST['qty'];
$price = $_POST['price'];
$loginId = $_SESSION['id'];
$iname = $_GET["name"];
$iqty = $_GET["itemqty"];
$ipname = $_GET["personname"];
$result = mysqli_query($mysqli, "INSERT INTO pwd(name, qty, price, login_id, iname, iqty, ipname) VALUES('$name','$qty','$price', '$loginId','$iname', '$iqty', '$ipname')");
header('Location: ../index.php?id='.$_GET['id'].'&name='.$_GET["name"].'&personname='.$_GET["personname"].'&itemqty='.$_GET["itemqty"].'&room='.$_GET["room"]);
}
?>