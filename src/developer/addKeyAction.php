<?php
session_start();
include("/home/smartlis/public_html/dashboard/cred.php");
$dbname = "smartlis_api";

function gen_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
        mt_rand( 0, 0xffff ),
        mt_rand( 0, 0x0fff ) | 0x4000,
        mt_rand( 0, 0x3fff ) | 0x8000,
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}
$key = hash("sha512", gen_uuid());

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // prepare sql  and bind parameters
  $stmt = $conn->prepare("INSERT INTO api_keys (name, apiKey, login_id) VALUES (:name, :apiKey, :sessid)");
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':apiKey', $apiKey);
  $stmt->bindParam(':sessid', $id);

  // insert a row
  $name = ($_POST['name']);
  $apiKey = $key;
  $id = $_SESSION['id'];
  $stmt->execute();

  echo "Successfully created API key!";
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>