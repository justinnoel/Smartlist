<?php
session_start();
if(!isset($_SESSION['id'])){
   header("location: ../login.php");
   exit();
}
include("/home/smartlis/public_html/dashboard/cred.php");
header("Content-Type: application/json");
$_SESSION['id'] = intval($_SESSION['id']);
try {
   $dbh = new PDO("mysql:host=" . App::server . ";dbname=" . App::database, App::username, App::password);
   $sql = $dbh->prepare("
  SELECT id, name, qty, price, login_id, star, date,  'Kitchen' as Source
  FROM products 
  where login_id = " . $_SESSION['id'] . "
  union all


  SELECT id, name, qty, price, login_id, star, date,  'Bedroom' as Source
  FROM bedroom 
  where login_id = " . $_SESSION['id'] . "

  union all

  SELECT id, name, qty, price, login_id, star, date,  'Bathroom' as Source
  FROM bathroom 
  where login_id = " . $_SESSION['id'] . "

  union all

  SELECT id, name, qty, price, login_id, star, date,  'Garage' as Source
  FROM garage 
  where login_id = " . $_SESSION['id'] . "

  union all

  SELECT id, name, qty, price, login_id, star, date,  'Dining Room' as Source
  FROM dining_room 
  where login_id = " . $_SESSION['id'] . "

  union all

  SELECT id, name, qty, price, login_id, star, date,  'Laundry Room' as Source
  FROM laundry 
  where login_id = " . $_SESSION['id'] . "

  union all

  SELECT id, name, qty, price, login_id, star, date,  'Storage Room' as Source
  FROM 	storageroom 
  where login_id = " . $_SESSION['id'] . "

  union all

  SELECT id, name, qty, price, login_id, star, date,  'Family' as Source
  FROM family 
  where login_id = " . $_SESSION['id'] . ";
  ");
   // $sql->bindValue(':login_id', $_SESSION['id'], PDO::PARAM_STR);
   // $sql->bindValue(':syncid', $_SESSION['syncid'], PDO::PARAM_STR);
   $sql->execute();
   $users = $sql->fetchAll();
   $items = [];
   foreach ($users as $row) {
      $item = new stdClass();
      $item->id = $row['id'];
      $item->type = "Item";
      $item->name = decrypt($row['name']);
      $item->qty = decrypt($row['qty']);
      $item->categories = decrypt($row['price']);
      $item->star = $row['star'];
      $item->room = $row['Source'];
      $item->date = $row['date'];
      $items[] = $item;
   }
   echo json_encode($items, JSON_PRETTY_PRINT);
   $dbh = null;
} catch (PDOexception $e) {
   echo "Error is: " . $e->etmessage();
}
