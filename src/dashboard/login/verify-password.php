<?php
session_start();
if(!isset($_SESSION['forgotPasswordId'])) {
  die('false');
}
if($_POST['code'] == $_SESSION['forgotPasswordId']) {
  die('true');
}
else {
  die('false');
}
?>