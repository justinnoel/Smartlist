<?php 
session_start();
include('../../cred.php');
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); $sql = "SELECT * FROM login WHERE id=" . $_SESSION['id']; $users = $dbh->query($sql);
foreach ($users as $row) { $goal = $row["goal"]; $welcome = $row['welcome']; $_SESSION['avatar'] = $row['user_avatar']; $theme = $row['theme']; $_SESSION['syncid'] = $row["syncid"]; $_SESSION["number_notify"] = $row['remind']; $_SESSION["welcome"] = $row['welcome']; $_SESSION["studentMode"] = $row['studentMode']; $homePage = $row['defaultpage']; }
echo "[";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql = $dbh->prepare("SELECT * FROM bm WHERE login_id=:sessid");

    $sql->execute(array( ':sessid' => $_SESSION['id'] ));
    $res = $sql->fetchAll();
    foreach ($res as $expense) {
        if(decrypt($expense['name']) == $_GET['date'] || $_GET['date']=="") {
    ?>{ "id": <?=$expense['id'];?>, "date": <?=json_encode(decrypt($expense['name']));?>, "amount": <?=(decrypt($expense['qty']));?>, "spentOn": <?=json_encode(decrypt($expense['price']));?> },<?php
    }
    }
}
catch(PDOException $e) { echo "Error: " . $e->getMessage(); }

echo "]";