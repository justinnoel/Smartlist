<?php
ini_set('display_errors', 1);
session_start();
include('/home/smartlis/public_html/dashboard/cred.php');
try {
  $conn = new PDO("mysql:host=".App::server.";dbname=".App::database, App::username, App::password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $r = explode("|", $_GET['c']);
    $d = "";
    foreach($r as $e) {
    $d .= "
INSERT INTO grocerylist (name, login_id)
  VALUES (".json_encode(encrypt($e)).", ".intval($_SESSION['id']).");
";
}
  // prepare sql  and bind parameters
  $stmt = $conn->prepare($d);
  
  $stmt->execute();

} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>