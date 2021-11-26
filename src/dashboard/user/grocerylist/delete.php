<?php
ini_set("display_errors", 1);
session_start();
include ('../../cred.php');
define("_roomName", "grocerylist");
try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql = $dbh->prepare("SELECT * FROM "._roomName." WHERE id=:id");

    $sql->execute(array(
        ':id' => intval($_GET['id'])
    ));
    $users = $sql->fetchAll();

    foreach ($users as $row) {
        $name = $row['name'];
    }
    $dbh = null;
}
catch(PDOexception $e) {
    echo "Error is: " . $e->getmessage();
}
try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql = $dbh->prepare("DELETE FROM "._roomName." WHERE id=:id");
    $sql->execute(array(
        ':id' => $_GET['id']
    ));

}
catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
$dbh = null;

try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql = $dbh->prepare("INSERT INTO trash (name, qty, login, room) VALUES (:name, 1, :sessid, :room)");
    $sql->execute(array(
        ':name' => $name,
        ':sessid' => $_SESSION['id'],
        ':room' => "Grocery List",
    ));
}
catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$dbh = null;
?>
