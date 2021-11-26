<?php
ini_set("display_errors", 1);
session_start();
require "../../../cred.php";
$tables = array("products", "bedroom", "bathroom", "dining_room", "laundry", "family", "garage", "camping");
$formats = array("csv", "json");

if(!isset($_GET['t']) || !isset($_GET['f'])) {die("Invalid table");}

if(!in_array($_GET['t'], $tables)) { if(!is_numeric($_GET['t'])) {die("403");}}

if(!in_array($_GET['f'], $formats)) { die("403");}

$format = $_GET['f'];


if($format == "json") { header("Content-Type: application/json"); }
if($format == "csv") { header("Content-Type: text/csv"); }

$items = [];
try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    if(is_numeric($_GET['t'])) {
        $sql = $dbh->prepare("SELECT * FROM custom_room_items WHERE price=:id AND login_id=:sessid");
        $sql->execute(array( ':sessid' => $_SESSION['id'], ':id' => intval($_GET['t']) ));
    }
    else {
        $sql = $dbh->prepare("SELECT * FROM ".$_GET['t']." WHERE login_id=:sessid");
        $sql->execute(array( ':sessid' => $_SESSION['id'] ));
    }
    $users = $sql->fetchAll();
    foreach ($users as $row){
        $item = new stdClass();
        $item->name = decrypt($row['name']);
        $item->qty = decrypt($row['qty']);
        $item->lastUpdated = ($row['date']);
        $item->starred = ($row['star']);
        if(is_numeric($_GET['t'])) {
            $item->categories = explode(",", ($row['label']));
        }
        else {
            $item->categories = explode(",", decrypt($row['price']));
        }
        $items[] = $item;
    }
    switch($format) {
        case "json": echo json_encode($items, JSON_PRETTY_PRINT); break;
        case "csv": 
        echo "name, qty, date, star, categories\n";
            foreach($items as $item) {
                echo str_replace(",", "", $item->name).", ".str_replace(",", "", $item->qty).",".str_replace(",", "", $item->lastUpdated).", ".intval($item->starred).', '.str_replace(",", "", implode(",", $item->categories))."\n";
            }
        break;
    }
}
catch (Exception $e) {
    echo $e->getMessage();
}
?>