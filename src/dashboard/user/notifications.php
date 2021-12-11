<?php 
session_start();
include('../cred.php');
$dbh = new PDO("mysql:host=".App::server.";dbname=".App::database, App::username, App::password);
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
?>
<style>
  #menu .collection-item {margin-left:0!important} 
  #menu .collection-item .circle {margin-left:0!important} 
  #ERR_EMPTY_NOTIFICATION_TITLE1 .waves-ripple {
    transition-duration: .4s !important;
    top: 40% !important;
    left: 53% !important;
  }
  .__nt2 span{
    opacity: .3 !important;
  }
</style>
<div class='container'>
  <br>
  <h5 id="ERR_EMPTY_NOTIFICATION_TITLE" style="margin-top: 30px;margin-bottom:30px"><b>All</b></h5></div>
<div id="ERR_EMPTY_NOTIFICATION" style="display:none">
  <img src="https://i.pinimg.com/originals/93/c7/44/93c744bcde1780c94bb1d3f03991f8a7.gif" style="width:50vw;display:block;margin:auto;height:auto" loading="lazy"><br>
  <p style="text-align:center">No notifications!</p>
</div>
<div class="container">
  <ul class="collection" style="border:0 !important;background:var(--bg-color); " id="menu">
    <?php try
{
  $dbh = new PDO("mysql:host=".App::server.";dbname=".App::database, App::username, App::password);
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
  // $sql->bindValue(':login_id', $_SESSION['id'], PDO::PARAM_STR);
  // $sql->bindValue(':syncid', $_SESSION['syncid'], PDO::PARAM_STR);
  $sql->execute();
  $users = $sql->fetchAll();
  foreach ($users as $row)
  {
    if (preg_replace("/[^0-9]/", "", decrypt($row['qty'])) < $number_notify && !empty((decrypt($row['qty']))) && !str_contains(strtolower(decrypt($row['qty'])), strtolower(' (In Stock)')))
    {
      switch($row['Source']) {
        case "Kitchen": $color = "blue"; $icon = "blender"; break;
        case "Bedroom": $color = "red"; $icon = "bed"; break;
        case "Bathroom": $color = "green"; $icon = "wc"; break;
        case "Garage": $color = "purple"; $icon = "build"; break;
        case "Dining Room": $color = "teal"; $icon = "restaurant"; break;
        case "Family": $color = "orange"; $icon = "chair"; break;
        case "Laundry Room": $color = "pink"; $icon = "local_laundry_service"; break;
        case "Storage Room": $color = "indigo"; $icon = "domain"; break;
      }
    ?>
    <li class="collection-item avatar"> <i class="material-icons-round circle waves-effect <?=$color?> darken-3" style="color:white !important"><?=$icon?></i> <span class="title"><b><?=$row['Source'];?></b></span> <p>
      You're running out of <?=strip_tags(decrypt($row['name']));?>
      <div class="hide name"><?=strip_tags(decrypt($row['name']));?></div>
      <div class="hide qty"><?=strip_tags(decrypt($row['name']));?></div>
      <div class="hide room"><?=strip_tags(($row['Source']));?></div>
      <a onclick="editItem(<?=$row['id'];?>, this)" href="javascript:void(0)" class="secondary-content tooltipped waves-effect btn-floating btn-flat" data-tooltip="Edit Item"><i style="color:var(--sidenavf-color)!important" class="material-icons">edit</i></a> </p></li>
<?php
    }
  }
  $dbh = null;
}
    catch(PDOexception $e)
    {
      echo "Error is: " . $e->etmessage();
    } ?> 
</ul>
</div>
<script>
  window.onerror = function(msg, url, linenumber) {
    alert('Error message: '+msg+'\nURL: '+url+'\nLine Number: '+linenumber);
    return true;
  }
  function isEmpty(tag) {
    return document.getElementById(tag).innerHTML.trim() == ""
  }
  if(localStorage.getItem('hide') == "a") { 
    // document.getElementById('mtn_notifications').classList.toggle('hide');
    // $('#ERR_EMPTY_NOTIFICATION_TITLE1').addClass('__nt2');
    // $('#rn').addClass('nactive')
    // document.getElementById('rn').getElementsByTagName('i')[0].innerHTML = 'visibility'
  }
  var empty = isEmpty("menu");
  if (empty == true) {
    document.getElementById('ERR_EMPTY_NOTIFICATION').style.display = 'block';
    document.getElementById('ERR_EMPTY_NOTIFICATION_TITLE').style.display = 'none';
  }
  $('.tooltipped').tooltip()
  function editItem(id,el) {
    // el.parentElement.remove()
    var name = ( el.parentElement.getElementsByClassName('name')[0].innerText)
    var qty = ( el.parentElement.getElementsByClassName('qty')[0].innerText)
    var room = ( el.parentElement.getElementsByClassName('room')[0].innerText).toLowerCase()
    var directory;
    switch (room) {
      case "kitchen":
        directory = "./rooms/kitchen/delete.php";
        break;
      case "bathroom":
        directory = "./rooms/bathroom/delete.php";
        break;
      case "bedroom":
        directory = "./rooms/bedroom/delete.php";
        break;
      case "garage":
        directory = "./rooms/garage/delete.php";
        break;
      case "family":
        directory = "./rooms/family/delete.php";
        break;
      case "laundryroom":
        directory = "./rooms/laundry/delete.php";
        break;
      case "dining_room":
        directory = "./rooms/dining_room/delete.php";
        break;
      case "storage":
        directory = "./rooms/storage/delete.php";
        break;
      case "custom_room":
        directory = "./rooms/custom_room/custom_item_delete.php";
        break;
    }
    var form = document.getElementById("edit_form");
    document.getElementById("edit_item_id").value = id;
    $("#edit_sidenav").sidenav("open");
    form.action = directory.replace("delete", "edit");
    document.getElementById("edit_item_name").value = name;
    document.getElementById("edit_item_qty").value = qty;
    document.getElementById("edit_item_qty").focus();
    document.getElementById("edit_item_name").focus();
    if (document.documentElement.classList.contains("_darkTheme")) {
      document
        .querySelector('meta[name="theme-color"]')
        .setAttribute("content", "#212121");
    } else {
      document
        .querySelector('meta[name="theme-color"]')
        .setAttribute("content", '#1e272b');
    }
  }
  // document.querySelectorAll('input').reverse().forEach(el => el.focus())
</script>