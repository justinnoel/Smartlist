<?php
session_start();
include('../../cred.php');
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = $conn->prepare("INSERT INTO payment_subs (name, login_id, price, date, type, paymentType)
  VALUES (:name, :sessid, :price, :date, :type, :paymentType)");
  // use exec() because no results are returned
  $sql->execute(array(
    ":name" => encrypt($_POST['name']),
    ":sessid" => $_SESSION['id'],
    ":price" => encrypt($_POST['price']),
    ":date" => encrypt($_POST['date']),
    ":type" => encrypt($_POST['type']),
    ":paymentType" => $_POST['paymentType']
  ));
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>