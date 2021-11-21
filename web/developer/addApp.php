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
  $stmt = $conn->prepare("INSERT INTO apps (appName, redirectURI, login_id, secret) VALUES (:appName, :redirectURI, :sessid, :secret)");
  $stmt->bindParam(':appName', $name);
  $stmt->bindParam(':redirectURI', $uri);
  $stmt->bindParam(':sessid', $id);
  $stmt->bindParam(':secret', $a);

  // insert a row
  $name = strip_tags($_POST['name']);
  $uri = strip_tags($_POST['uri']);
  $id = $_SESSION['id'];
  $a = hash('sha256', $key);
  $stmt->execute();

  echo hash('sha512', $conn->lastInsertId()) ."|".hash('sha256', $key);
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>