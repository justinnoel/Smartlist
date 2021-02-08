<?php
session_start();
session_destroy();
if (isset($_GET['welcome'])) {
header("Location:login.php?message=".$_GET["message"]."&welcome=true");
}
elseif(isset($_GET['inactive'])) {
    header("Location:login.php?inactive=true");

}
elseif(isset($_GET['avatar'])) {
    header("Location:login.php?avatar=true");

}
elseif(isset($_GET['sett'])) {
    header("Location:login.php?sett=true");

}
else {
header("Location:login.php?logout=true");
}
?>
