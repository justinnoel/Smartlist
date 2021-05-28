<?php 
if(isset($_SESSION['valid'])) { 
    header('Location: https://smartlist.ga/dashboard/beta');
    exit;
}
else {
    header('Location: https://smartlist.ga/dashboard/auth');
    exit;
}
?>