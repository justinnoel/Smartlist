<?php
session_start();
include('../cred.php');
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = $conn->prepare("INSERT INTO products (name, qty, price, login_id, star, date)
  VALUES (:name, ".json_encode(encrypt(1)).", '".json_encode(encrypt('No category specified'))."', :sessid, ".json_encode(date('d/m/Y')).")");
  $sql->execute(array(
    ":name" => encrypt(ucfirst($_GET['name'])),
    ":sessid" => $_SESSION['id']
  ));
//   echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>