<?php
ini_set("display_errors", 1);
session_start();
include ('/home/smartlis/public_html/dashboard/cred.php');
$dbname = "smartlis_api";
try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql = $dbh->prepare("DELETE FROM api_keys WHERE id=:id AND login_id=:sessid");
    $sql->execute(array(
        ':id' => $_GET['id'],
        ':sessid' => $_SESSION['id']
    ));
    echo "API key deleted successfully";
}
catch(PDOException $e) {
    echo "<br>" . $e->getMessage();
}
$dbh = null;