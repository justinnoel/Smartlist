<?php
ini_set("display_errors", 1);
session_start();
include ('../../cred.php');
try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql = $dbh->prepare("DELETE FROM labels WHERE id=:id AND login=:sessid");
    $sql->execute(array(
        ':id' => $_GET['id'],
        ':sessid' => $_SESSION['id']
    ));

}
catch(PDOException $e) {
    echo "<br>" . $e->getMessage();
}
$dbh = null;
?>
<script>M.toast({html: "Successfully deleted label. Items with the label aren't affected. "})</script>