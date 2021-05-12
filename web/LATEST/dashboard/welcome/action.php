<?php
session_start();
include('../cred.php');
// print_r($_POST['items']);
foreach($_POST['items'] as $items) {
        switch($items) { 
            case 'fridge': $room = 'products'; break;
            case 'Forks': $room = 'products'; break; 
            case 'Washing Machine': $room = 'laundry';break; 
            case 'Construction': $room = 'garage';break;
            case 'Video games': $room = 'family'; 
            case 'Masks': $room = 'garage'; break; 
            case 'Sanitizer': $room = 'garage'; break;
            case 'Cups': $room = 'products'; break;
            case 'Stroller': $room = 'storageroom'; break; 
            case 'Fire extinguisher': $room = 'garage'; break;
            case 'Backpack': $room = 'storageroom'; break;
    }
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "INSERT INTO $room (name, qty, price, login_id, star)
      VALUES (".json_encode($items).", ".json_encode(1).", \"1\", ".json_encode($_SESSION['id']).", ".json_encode(0).")";
      $conn->exec($sql);
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "UPDATE login SET theme = ".json_encode(str_replace('#', '', $_POST['color'])). ", goal = ".json_encode($_POST['amount'])." WHERE id = ".json_encode($_POST['id']);
  $conn->exec($sql);
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
header('Location: ../');
?>