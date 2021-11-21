<?php
ini_set("display_errors", 1);
session_start();
include ('../../cred.php');
define("_roomName", "bm");
try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql = $dbh->prepare("DELETE FROM bm WHERE id=:id");
    $sql->execute(array(
        ':id' => $_GET['id']
    ));

}
catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
$dbh = null;