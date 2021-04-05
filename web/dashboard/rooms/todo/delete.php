<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
header('Location: login.php');
}
?>

<?php
//including the database connection file
include("connection.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result=mysqli_query($mysqli, "DELETE FROM todo WHERE id=$id");
   $todo = mysqli_query($mysqli, "SELECT * FROM todo WHERE login_id=".$_SESSION['id']." OR login_id=".$_SESSION['syncid']." ORDER BY id DESC");
if(mysqli_num_rows($todo) == 0) {
echo "<style>.dd{display:block}</style>";
}
//redirecting to the display page (view.php in our case)
//header("Location:view.php");
?>
