<?php 
session_start();
include('../../cred.php');
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM login WHERE id=" . $_SESSION['id'];
$users = $dbh->query($sql);
foreach ($users as $row) {
  $goal = $row["goal"];
  $welcome = $row['welcome'];
  $_SESSION['avatar'] = $row['user_avatar'];
  $theme = $row['theme'];
  $_SESSION["number_notify"] = $row['remind'];
}
?>
<h5>Notifications</h5>

<button class="btn grey darken-3 hide-on-small-only" onclick="showNotification('Hi!')">Test push notifications</button> 
<script> var elems  = document.querySelectorAll("input[type=range]");
M.Range.init(elems);</script>