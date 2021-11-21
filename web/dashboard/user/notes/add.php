<?php
ini_set('display_errors', 1);
session_start();
include('../../cred.php');

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // prepare sql  and bind parameters
  $stmt = $conn->prepare("INSERT INTO notes (title, content, login_id, banner) VALUES (:name, :content, :sessid, :banner)");
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':content', $content);
  $stmt->bindParam(':sessid', $_SESSION['id']);
  $stmt->bindParam(':banner', $banner);

  // insert a row
  $name = encrypt($_POST['title']);
  $content = encrypt($_POST['content']);
  $banner = encrypt($_POST['url']);
  $sessid = $_SESSION['id'];
  $stmt->execute();

} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>
Successfully created note!
<script>getHashPage();</script>