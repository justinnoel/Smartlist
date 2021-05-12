<?php session_start(); ?>
<?php
if(!isset($_SESSION['valid'])) {
header('Location: login.php');
}
?>

<?php
include("connection.php");
$id = $_GET['id'];
// $result=mysqli_query($mysqli, "DELETE FROM login WHERE id=$id");

//redirecting to the display page (view.php in our case)
?>
<?php
session_start();
session_destroy();
header("Location:login.php?deleted=true");
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<body style="background:#ed404e;color:white;padding:10px;">
   <div style="font-size:50px;"><i class="material-icons" style="font-size:50px">delete</i>
      Your account was deleted
      <div style="font-size:30px;">We're so sorry to see you leave</div>
      <div style="font-size:20px;">Hey, we told you that this action is irreversible. If you would like to create a new account, please click <a href="login.php">here</a></div>
   </div>
