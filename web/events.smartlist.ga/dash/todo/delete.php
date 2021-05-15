<?php 
include('../../../cred.php');
$con =  new PDO( "mysql:host=".$servername.";"."dbname=".$dbname, $username, $password); 
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "DELETE FROM `todo` WHERE id =".$_GET['id'];        
$q = $con->prepare($sql);
$response = $q->execute(array($id));  
header('Location: ../');
?>