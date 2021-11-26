<?php 
session_start(); 
include('../../cred.php');
$_SESSION['id'] = intval($_SESSION['id']);
if(!isset($_SESSION['id'])){header('location: ../../');}
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("SELECT * FROM login WHERE id=:sessid");
  $sql->execute(array( ':sessid' => $_SESSION['id'] ));
  $users = $sql->fetchAll();
  foreach ($users as $row) { 
    $goal = $row["goal"];
    $welcome = $row['welcome'];
    $_SESSION['avatar'] = $row['user_avatar'];
    $theme = $row['theme'];
    $_SESSION["number_notify"] = $row['remind'];
  }
  $number_notify = $_SESSION['number_notify'];
  $month = date('M');
  function sanitize_output($buffer) {

    $search = array(
      '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
      '/[^\S ]+\</s',     // strip whitespaces before tags, except space
      '/(\s)+/s',         // shorten multiple whitespace sequences
      '/<!--(.|\s)*?-->/' // Remove HTML comments
    );

    $replace = array(
      '>',
      '<',
      '\\1',
      ''
    );

    $buffer = preg_replace($search, $replace, $buffer);

    return $buffer;
  }

  ob_start("sanitize_output");

  ?><!DOCTYPE html> 
  <html>
    <head> 
      <meta charset="utf-8"> 
      <meta name="viewport" content="width=device-width">
      <meta name="theme-color" content="#eee"> <title>repl.it</title>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"> 
      <link href="style.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/css/materialize.min.css"> 
      <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.4.0/dist/confetti.browser.min.js"></script> 
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
      <style>
        .carousel { height: 100vh !important } 
        .btn-flat { background: transparent !important }
        .done { background: green !important; opacity: .6 !important } 
        .done::after { display: block; position: fixed; top:0; left:0; width:100%; content: "You've already bought this item!"; color:white; background:black; padding:10px; z-index:99999; opacity:1 !important } 
        * {user-select:none}
      </style>
    </head> 
    <body class="white"> 
      <div class="carousel carousel-slider center" id="main">
        <div class="carousel-fixed-item center">
          <a class="btn waves-effect left btn-flat btn-floating btn-large waves-light white-text" onclick="$('.carousel.carousel-slider').carousel('prev')"> 
            <i class="material-icons">arrow_back_ios</i>
          </a> 
          <a class="btn waves-effect right btn-flat btn-floating btn-large waves-light white-text" onclick="$('.carousel.carousel-slider').carousel('next')"> 
            <i class="material-icons">arrow_forward_ios</i> 
          </a> 
        </div> 
      </div> 
      <script src="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/js/materialize.min.js"></script>
      <script>
        const items = [
          <?php 
          try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); 
    $sql = $dbh->prepare(" SELECT * FROM grocerylist where login_id = ".$_SESSION['id']);
    $sql->execute();
    $users = $sql->fetchAll();
    foreach ($users as $row)
    {
          ?>{"name": <?=json_encode(decrypt($row['name']));?>, "room": "Shopping List", "id": <?=$row['id'];?>},<?php
    }
      $dbh = null;
  }
          catch(PDOexception $e) { echo "Error is: " . $e->getmessage(); }
          try {
            $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $sql = $dbh->prepare("
    SELECT id, name, qty, login_id, star, 'Kitchen' as Source
    FROM products 
    where login_id = ".$_SESSION['id']."
    union all


    SELECT id, name, qty, login_id, star, 'Bedroom' as Source
    FROM bedroom 
    where login_id = ".$_SESSION['id']."

    union all

    SELECT id, name, qty, login_id, star, 'Bathroom' as Source
    FROM bathroom 
    where login_id = ".$_SESSION['id']."

    union all

    SELECT id, name, qty, login_id, star, 'Garage' as Source
    FROM garage 
    where login_id = ".$_SESSION['id']."

    union all

    SELECT id, name, qty, login_id, star, 'Dining Room' as Source
    FROM dining_room 
    where login_id = ".$_SESSION['id']."

    union all

    SELECT id, name, qty, login_id, star, 'Laundry Room' as Source
    FROM laundry 
    where login_id = ".$_SESSION['id']."

    union all

    SELECT id, name, qty, login_id, star, 'Storage Room' as Source
    FROM 	storageroom 
    where login_id = ".$_SESSION['id']."

    union all

    SELECT id, name, qty, login_id, star, 'Family' as Source
    FROM family 
    where login_id = ".$_SESSION['id'].";
    ");
  $sql->execute();
  $users = $sql->fetchAll();
  foreach ($users as $row)
  {
    if (preg_replace("/[^0-9]/", "", decrypt($row['qty'])) < $number_notify && !empty((decrypt($row['qty']))))
    {
?>{"name": <?=json_encode(decrypt($row['name']));?>, "room": <?=json_encode($row['Source']);?>},<?php
    }
    $dbh = null;
  }
}
catch(PDOexception $e) { echo "Error is: " . $e->getmessage(); }
?> ];</script><div id="ajaxLoader"></div><script src="/dashboard/js/shopping_assistant.js" ></script></body></html>