<?php
ini_set("display_errors", 1);
session_start();
include('../../cred.php');
try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql = $dbh->prepare("DELETE FROM trash WHERE login=:sessid");
    $sql->execute(array(
        ':sessid' => $_SESSION['id']
    ));
    echo "<script>M.toast({html: 'Permanently deleted ".$_GET['item_count']." items'});</script>";
}
catch(PDOException $e) {
    echo "<br>" . $e->getMessage();
}
$dbh = null;
?>
