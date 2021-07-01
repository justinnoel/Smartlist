<?php
session_start();
// header('Content-Type: application/json');
if(!isset($_SESSION['valid'])) {
    $x = "false";
}
else {
    $x = "true";
}
?>
<?=$x;?>