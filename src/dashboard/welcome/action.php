<?php
ini_set("display_errors", 1);
session_start();
include('../cred.php');
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
      $sql = $conn->prepare("INSERT INTO $room (name, qty, price, login_id, star, date)
      VALUES (:name, 1, 1, :sessid, 0, :date)");
      $sql->execute( array(
        ":name" => encrypt(ucfirst($items)),
        ":sessid" => $_SESSION['id'],
        ":date" => date("m/d/Y")
      ) );
    } catch(PDOException $e) {
        echo "<br>" . $e->getMessage();
    }

    $conn = null;
}
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = $conn->prepare("UPDATE login SET theme = :theme, goal = :goal, welcome = '1', purpose=:purpose WHERE id = :sessid");
  $sql->execute(array(
    ":theme" => str_replace('#', '', $_POST['color']),
    ":goal" => $_POST['amount'],
    ":purpose" => $_POST['purpose'],
    ":sessid" => $_SESSION['id']
  ));
} catch(PDOException $e) {
  echo "<br>" . $e->getMessage();
}
$conn = null;
header('Location: ../');
?>