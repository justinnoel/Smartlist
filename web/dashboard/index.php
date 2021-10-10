<?php
session_set_cookie_params(0, "/", ".smartlist.ga");
require "header.php";
require "cred.php";
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); $sql = "SELECT * FROM login WHERE id=" . $_SESSION['id']; $users = $dbh->query($sql);
foreach ($users as $row) {
  $goal = $row["goal"];
  $welcome = $row['welcome'];
  $_SESSION['avatar'] = $row['user_avatar'];
  $theme = $row['theme'];
  $_SESSION['syncid'] = $row["syncid"];
  $_SESSION["number_notify"] = $row['remind'];
  $homePage = $row['defaultpage'];
}
if (empty($theme) || !isset($theme)) { $theme = '41308a'; }

$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM bm WHERE login_id=" . $_SESSION['id']. " ORDER BY `id` DESC LIMIT 1";
$users = $dbh->query($sql);
if($users->rowCount() !== 1) {$noBudgetToday = true;}
$noBudgetToday = false;
foreach($users as $row) {if(decrypt($row['name']) !== date('m/d/Y')) {$noBudgetToday = true;}}


require "colorSwitch.php" ;
$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; if($actual_link == "https://smartlist.ga/dashboard") { header("Location: https://smartlist.ga/dashboard/"); }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/css/materialize.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="theme-color" content="#<?=$theme_top;?>">
    <link rel="manifest" href="manifest.webmanifest">
    <meta name="title" content="Smartlist - the free home inventory database">
    <meta name="description" content="Smartlist is a free home inventory app that lets you keep track of what you have in your home, and helps you save money">
    <meta property="og:site_name" content="smartlist.ga" />
    <meta property="og:title" content="Smartlist" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://cdn.jsdelivr.net/gh/Smartlist-app/Assets/cover.png" />
    <link rel="shortcut icon" href="https://i.ibb.co/HPtyvJS/logo-z3yoqm-modified-removebg-preview-modified.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/malihu-custom-scrollbar-plugin@3.1.5/jquery.mCustomScrollbar.css">
    <meta name="robots" content="index, nofollow" />
    <base href="https://smartlist.ga/dashboard/">
    <link rel="apple-touch-icon" href="https://smartlist.ga/dashboard/icon/roofing.svg" />
    <meta property="og:url" content="https://smartlist.ga/dashboard/beta" />
    <meta property="og:description" content="Smartlist is a free home inventory app that lets you keep track of what you have in your home, and helps you save money" />
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@Smartlist">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js" type="text/javascript"></script>
    <meta name="twitter:title" content="Smartlist">
    <meta name="twitter:description" content="Smartlist is a free home inventory app that lets you keep track of what you have in your home, and helps you save money">
    <meta name="twitter:domain" content="smartlist.ga">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css?v=2">
    <style>
      :root {
        --font-color: #303030;
        --light: #<?=$theme_light;?>;
        --regular: #<?=$theme;?>;
        --bg-color: #fff;
        --sidenavf-color: #7a7a7a;
        --sidenavbg-color: <?=$overlayColor;?>;
        --navbar-color: #<?=$theme;?>;
        --sidenavbg1color: #fff;
        --x: 0px
      }
    </style>
  </head>
  <body>
    <nav id="searchBar" class="hide">
      <div class="nav-wrapper">
        <form id="searchForm" action="./user/search.php">
          <div class="input-field">
            <input id="search" type="search" name="query" autocomplete="off" class="autocomplete" name="query" required autofocus onblur="$('#searchBar').toggleClass('hide')">
            <label class="label-icon" for="search"><i class="material-icons search1" style="color: var(--font-color) !important;position: fixed;z-index: 999999999999999;" onclick="$('#searchBar').addClass('hide')">arrow_back</i><i class="material-icons searchClose" style="color: var(--font-color) !important;position: fixed;z-index: 999999999999999;">search</i></label>
            <i class="material-icons hide-on-small-only close" style="color: var(--font-color) !important;backround: red !important;z-index: 999999999999999;position: fixed" onclick="$('#searchBar').addClass('hide')">close</i>
          </div>
        </form>
      </div>
    </nav>

    <nav style="background: var(--navbar-color) !important" id="__navBar">
      <ul>
        <li>
          <a href="#" data-target="slide-out" class="sidenav-trigger waves-effect waves-light" style="margin: 0 !important"><i class="material-icons left">menu</i> <b>Smartlist</b></a>
        </li>
      </ul>
      <ul class="right">
        <li>
          <a href="#/notifications"><i class="material-icons">notifications</i></a>
        </li>
        <li>
          <a href="javascript:void(0)" onclick="$('#searchBar').toggleClass('hide');$('#search').focus()"><i class="material-icons">search</i></a>
        </li>
      </ul>
    </nav>

    <input id="copyToClipboard" type="hidden">
    <div id="avatarChange" class="modal">
      <div class="modal-content">
        <center>
          <img class="circle" src="<?=$user['avatar'];?>" class="center" style="width: 100px" id="src" alt="">
        </center>
        <form method="POST" action="./user/avatar.php" id="avatarChangeForm">
          <div class="row">
            <div class="col s12">
              <ul class="tabs tabs-fixed-width">
                <li class="tab col s3"><a class="active waves-effect" id="active" href="#test1">Upload</a></li>
                <li class="tab col s3"><a class="waves-effect" href="#test2">Paste URL</a></li>
                <li class="tab col s3"><a class="waves-effect" href="#test3" onclick="">Use Default</a></li>
              </ul>
            </div>

            <div id="test1" class="col s12">
              <br><br>
              <div class="file-field input-field">
                <div class="btn blue-grey darken-3 waves-effect waves-light">
                  <span style="color: white !important">File</span>
                  <input type="file" id="input_img" onchange="fileChange(this, function(e) {document.getElementById('src').src=e;document.getElementById('avatar_file_upload_input').value = e;})"  accept="image/*">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" placeholder="Upload a file..." disabled>
                </div>
              </div>
            </div>
            <div id="test2" class="col s12">
              <br><br>
              <div class="input-field">
                <label>URL</label>
                <input name="avatar" type="text" id="avatar_file_upload_input" oninput="document.getElementbyId('src').src=this.value;" autocomplete="off">
              </div>
            </div>
            <div id="test3" class="col s12">
              <br><br>
              <button onclick="document.getElementById('src').src='https://3.bp.blogspot.com/-qDc5kIFIhb8/UoJEpGN9DmI/AAAAAAABl1s/BfP6FcBY1R8/s320/BlueHead.jpg';document.getElementById('avatar_file_upload_input').value='https://3.bp.blogspot.com/-qDc5kIFIhb8/UoJEpGN9DmI/AAAAAAABl1s/BfP6FcBY1R8/s320/BlueHead.jpg'" class="btn red darken-3 waves-effect waves-light">Revert to default</button>
            </div>
          </div>
          <br><br>





          <button class="blue-grey darken-3 btn waves-effect">Change Profile Picture</button>
        </form>
      </div>
    </div>
    <div id="feedbackBeta" class="modal" style="height: auto;border-radius: 10px">
      <img src="https://cdn.dribbble.com/users/389484/screenshots/14612449/media/70ae3a03b150ccd663489d0180eaaef5.png?compress=1&resize=1200x900" style="width: 100%;height: 300px;object-fit: cover" alt="">
      <div class="modal-content">
        <h5>Version 4.0 is here!</h5>
        <p>We've released a bunch of new features into our dashboard, such as improved navigation, item editing, note editing, settings, and more! Create multiple labels for items, categorize items in rooms, and track your expenses using our redesigned budget meter. (Now called My Finances)</p>
        <center>
          <button class="modal-close btn blue darken-3 waves-effect waves-light" style="text-transform: none;box-shadow: none !important;border-radius: 999px;line-height: 50px !important;height: auto;padding: 0 50px">Awesome!</button>
        </center>
      </div>
    </div>
    <ul id="slide-out" class="sidenav sidenav-fixed" style="z=index: 99999999999999999999999999999999">
      <li><div class="user-view">
        <div class="background">
          <img src="<?=$imageURI;?>" alt="">
        </div>
        <!-- https://i.stack.imgur.com/34AD2.jpg -->
        <a href="#avatarChange" class="modal-trigger avatar"><img class="circle" src="<?=$user['avatar'];?>" alt=""></a>
        <a href="#name"><span class="white-text name"><?=$user['name'];?></span></a>
        <a href="javascript:void(0)"><span class="white-text email"><?=$user['email'];?></span></a>
        </div></li>
      <li class="sidenav-close links"><a oncontextmenu="return false" onclick="window.location.hash='#/user-dashboard';sidenav_highlight(this)" class="waves-effect" href="#/user-dashboard"><i class="material-icons">dashboard</i>Dashboard</a></li>
      <li class="sidenav-close links"><a oncontextmenu="return false" onclick="sidenav_highlight(this)" class="waves-effect" href="#/shopping-assistant"><i class="material-icons">auto_awesome</i> Shopping Assistant</a></li>
      <li class="sidenav-close links"><a oncontextmenu="return false" onclick="sidenav_highlight(this)" class="waves-effect" href="#/my-finances"><i class="material-icons">money</i> My Finances <?=($noBudgetToday == true ? " <div class='circle red darken-3 right' style='position:relative;left: 10px; margin-top: 20px;width:10px;height:10px'></div>" : "");?></a></li>
      <li class="sidenav-close links"><div class="divider"></div></li>
      <li class="sidenav-close links"><a oncontextmenu="return false" onclick="sidenav_highlight(this)" class="subheader">Rooms</a></li>
      <li class="sidenav-close links"><a oncontextmenu="return false" onclick="sidenav_highlight(this)" class="sidenav-close waves-effect" href="#/rooms/kitchen"><i class="material-icons-round left">blender</i>Kitchen</a></li>
      <li class="sidenav-close links"><a oncontextmenu="return false" onclick="sidenav_highlight(this)" class="sidenav-close waves-effect" href="#/rooms/bedroom"><i class="material-icons-round left">bed</i>Bedroom</a></li>
      <?php try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = "SELECT * FROM roomnames WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . json_encode(decrypt($_SESSION['syncid']));
  $users = $dbh->query($sql);
  foreach ($users as $row) {
    if (strpos(strtolower($row['name']), 'bedroom') !== false || strpos(strtolower($row['name']), 'closet') !== false) {
      print "<li class='links'><a oncontextmenu='croom_rclick(".$row['id'].");return false' onclick='sidenav_highlight(this)' class=\"waves-effect sidenav-close\" href='#/rooms/".$row['id']."'><i class=\"material-icons-round left\">" . $row['qty'] . "</i>" . $row["name"] . "</a></li>\n";
    }
  }
  $dbh = null;
} catch (PDOexception $e) {
  echo "Error is: " . $e->getmessage();
} ?>
      <li class="sidenav-close links"><a oncontextmenu="return false" onclick="sidenav_highlight(this)" class="sidenav-close waves-effect" href="#/rooms/bathroom"><i class="material-icons-round left">wc</i>Bathroom</a></li>
      <?php try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = "SELECT * FROM roomnames WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . json_encode(decrypt($_SESSION['syncid']));
  $users = $dbh->query($sql);
  foreach ($users as $row) {
    if (strpos(strtolower($row['name']), 'bathroom') !== false) {
      print "<li class='links'><a oncontextmenu='croom_rclick(".$row['id'].");return false' onclick='sidenav_highlight(this)' class=\"waves-effect sidenav-close\" href='#/rooms/".$row['id']."'><i class=\"material-icons-round left\">" . $row['qty'] . "</i>" . $row["name"] . "</a></li>\n";
    }
  }
  $dbh = null;
} catch (PDOexception $e) {
  echo "Error is: " . $e->getmessage();
} ?>
      <li class="sidenav-close links"><a oncontextmenu="return false" onclick="sidenav_highlight(this)" class="sidenav-close waves-effect" href="#/rooms/garage"><i class="material-icons-round left">build</i>Garage</a></li>
      <li class="sidenav-close links"><a oncontextmenu="return false" onclick="sidenav_highlight(this)" class="sidenav-close waves-effect" href="#/rooms/family"><i class="material-icons-round left">chair</i>Family</a></li>
      <li class="sidenav-close links"><a oncontextmenu="return false" onclick="sidenav_highlight(this)" class="sidenav-close waves-effect" href="#/rooms/storage"><i class="material-icons-round left">business</i>Storage Room</a></li>
      <li class="sidenav-close links"><a oncontextmenu="return false" onclick="sidenav_highlight(this)" class="sidenav-close waves-effect" href="#/rooms/dining"><i class="material-icons-round left">restaurant</i>Dining Room</a></li>
      <li class="sidenav-close links"><a oncontextmenu="return false" onclick="sidenav_highlight(this)" class="sidenav-close waves-effect" href="#/rooms/camping" ><i class="material-icons-round left">landscape</i>Camping Supplies</a></li>
      <li class="sidenav-close links"><a class="sidenav-close waves-effect" onclick="sidenav_highlight(this)" href="#/rooms/laundry" ><i class="material-icons-round left">local_laundry_service</i>Laundry room</a></li>
      <li class="sidenav-close"><div class="divider"></div></li>
      <li class="sidenav-close"><a class="subheader">Other Rooms</a></li>
      <?php try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = "SELECT * FROM roomnames WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . json_encode(decrypt($_SESSION['syncid']));
  $users = $dbh->query($sql);
  foreach ($users as $row) {
    if (strpos(strtolower($row['name']), 'bathroom') == false) {
      if (strpos(strtolower($row['name']), 'bedroom') == false) {
        print "<li class='links'><a oncontextmenu='croom_rclick(".$row['id'].");return false' onclick='sidenav_highlight(this)' class=\"waves-effect sidenav-close\" href='#/rooms/".$row['id']."'><i class=\"material-icons-round left\">" . $row['qty'] . "</i>" . $row["name"] . "</a></li>\n";
      }
    }}
  $dbh = null;
} catch (PDOexception $e) {
  echo "Error is: " . $e->getmessage();
} ?>
      <li class="links"><a class="waves-effect sidenav-close" href="#/add/custom-room"><i class="material-icons-round">add_location_at</i>Create room</a></li>

      <li style="pointer-events:none">
        <div class="divider"></div>
      </li>
      <li class="links" style="pointer-events:none;"><a class="subheader" href="javascript:void(0)" style='pointer-events:none' onclick="return false" rel='nofollow'>Other</a></li>
      <li class="sidenav-close links"><a onclick="sidenav_highlight(this)" class="sidenav-close waves-effect" href="#/notes" ><i class="material-icons-round left">sticky_note_2</i>Notes</a></li>
      <li class="sidenav-close links"><a onclick="sidenav_highlight(this)" class="sidenav-close waves-effect" href="#/starred" ><i class="material-icons-round left">star</i>Starred Items</a></li>
      <li class="sidenav-close links"><a onclick="sidenav_highlight(this)" class="sidenav-close waves-effect" href="#/maintenance" ><i class="material-icons-round left">construction</i>Maintenance</a></li>
      <li class="sidenav-close links"><a class="sidenav-close waves-effect" href="https://recipe-generator.smartlist.ga/" target="_blank"><i class="material-icons-round left">casino</i>Recipe Generator</a></li>
      <li class="sidenav-close links"><a onclick="sidenav_highlight(this)" class="sidenav-close waves-effect" href="#/trash" ><i class="material-icons-round left">delete</i>Trash</a></li>
      <li style="pointer-events:none">
        <div class="divider">
        </div>
      </li>
      <li class="links"><a class="subheader" href="javascript:void(0)" rel='nofollow'>Events</a></li>
      <li class="links"><a tabindex="0" target="_blank" class="waves-effect sidenav-close" rel="noopener" href="https://events.smartlist.ga/"><i class="material-icons-round">event</i>Join event</a></li>
      <li class="links"><a tabindex="0" target="_blank" class="waves-effect sidenav-close" rel="noopener" href="https://events.smartlist.ga/add.php"><i class="material-icons-round">open_in_new</i>Create
        event</a></li>
      <li style="pointer-events:none">
        <div class="divider"></div>
      </li>
      <li class="links" style="pointer-events:none;"><a class="subheader" href="javascript:void(0)" style='pointer-events:none' onclick="return false" rel='nofollow'>Account</a></li>

      <li class="sidenav-close links"><a class="sidenav-close waves-effect" onclick="sidenav_highlight(this)" href="#/notifications"><i class="material-icons-round left">notifications</i>Notifications</a></li>
      <li class="sidenav-close links"><a class="sidenav-close waves-effect" onclick="sidenav_highlight(this)" href="#/settings"><i class="material-icons-round left">settings</i>Settings</a></li>
      <li class="links"><a tabindex="0" class="waves-effect modal-trigger sidenav-close" href="#_feedback"><i class="material-icons-round">feedback</i>Feedback</a></li>


    </ul>
    <div id="_feedback" class="modal bottom-sheet">
      <div class="modal-content">
        <h4>Feedback</h4>
        <p>Have any questions, concerns, or feature requests? We're all ears!</p>
        <form id="feedback-form" action="https://formspree.io/f/mbjqjeyo" method="POST">
          <input type="hidden" name="email" value="manuthecoder@protonmail.com" />
          <input type="hidden" name="login_id" value="1" />
          <label>Message:</label>
          <textarea class="materialize-textarea" name="message"></textarea>
          <button id="my-form-button" class="waves-effect btn blue-grey darken-3 waves-light">Submit</button>
          <p id="my-form-status"></p>
        </form>
      </div>
    </div>
    <div id="edit_sidenav" style="width: 100%;z-index: 9999999999999999999999999">
      <nav class="blue-grey darken-4" style="position: fixed;top: 0;left: 0;z-index: 999999999999">
        <ul style="padding: 0 !important;margin: 0 !important">
          <li>
            <a href="javascript:void(0)" class="sidenav-close" style="color: white !important;line-height: 60px">
              <i class="material-icons left" style="line-height: 60px;color: white !important">arrow_back</i>Edit</a>
          </li>
        </ul>
      </nav>
      <br><br><br>
      <div class="container"><h5>Edit</h5>
        <form action="edit.php" method="POST" id="edit_form">
          <div class="input-field">
            <label>
              Item name
            </label>
            <input id="edit_item_name" type="text" name="name">
          </div>
          <div class="row">
            <div class="col s12 m9" style="margin: 0;padding: 0 !important">
              <div class="input-field">
                <label>
                  Quantity
                </label>
                <input id="edit_item_qty" type="text" name="qty">
              </div>
            </div>
            <div class="col s12 m3" style="padding: 0 !important">
              <button type="button" onclick="var x = document.getElementById(&quot;edit_item_qty&quot;);x.value = parseInt(x.value) + 1" class="btn waves-effect" style="background: #37474f" data-cf-modified-301eab9130377787b93994bf-=""><i class="material-icons-round">add</i></button>
              <button type="button" onclick="var x = document.getElementById(&quot;edit_item_qty&quot;);x.value = parseInt(x.value) - 1" class="btn waves-effect" style="background: #37474f" data-cf-modified-301eab9130377787b93994bf-=""><i class="material-icons-round">remove</i></button>
            </div>
          </div>
          <select name="price">
            <option disabled>Categories</option>
            <option selected value="No Category Specified">No Category Specified</option>
            <option disabled>Other</option>
            <option value="a"> a </option>
            <option value="URLs"> URLs </option>
            <option value="Test"> Test </option>
            <option value="Development"> Development </option>
            <option value="Important"> Important </option>
          </select>
          <br>
          <button name="submit" class="btn waves-effect" style="background:#37474f">Update</button>
          <button name="button" type="button" class="btn btn-flat waves-effect sidenav-close" style="color:gray">Cancel</button>
          <input type="hidden" name="id" id="edit_item_id">
          <input type="hidden" name="date" id="date1">
        </form>
      </div>
    </div>
    <div id="item_sidenav" style="width: 70%;overflow-x: hidden">
      <div class="container">
        <nav class="blue-grey darken-4 hide-on-large-onlys" style="position: fixed;top: 0;left: 0;z-index: 999999999999">
          <ul style="padding: 0 !important;margin: 0 !important">
            <li>
              <a href="javascript:void(0)" class="sidenav-close" style="color: white !important;line-height: 60px">
                <i class="material-icons left hide-on-large-only" style="line-height: 60px;color: white !important">arrow_back</i>Details</a>
            </li>
          </ul>
          <ul class="right">
            <li><a href="javascript:void(0)" id="star" accesskey="s"><i class="material-icons">star_outline</i></a></li>
            <li><a href="javascript:void(0)" id="edit" accesskey="e"><i class="material-icons">edit</i></a></li>
            <li><a href="javascript:void(0)" id="delete" accesskey="d"><i class="material-icons">delete</i></a></li>
          </ul>
        </nav>
        <br><br>
        <h4 id="title" onclick="copyToClipboard(this.innerText)">Title</h4>
        <h5 id="qty" onclick="copyToClipboard(this.innerText)">Quantity</h5>
        <p id="dateID">date</p>
        <div id="chips" style="margin-top: 10px;margin-bottom: 20px"></div>
        <div class="collection z-depth-2">
          <a href="javascript:void(0)" class="fade-up collection-item waves-effect" style="color:gray;animation-delay: .15s" id="action_task"><i class="material-icons-round left" accesskey="t">task_alt</i>Add item to shopping list</a>
          <a href="javascript:void(0)" class="fade-up collection-item waves-effect" style="color:gray;animation-delay: .2s" id="action_qr" target="_blank"><i class="material-icons-round left" accesskey="q">qr_code</i>Generate QR code</a>
          <a href="javascript:void(0)" class="fade-up collection-item waves-effect" style="color:gray;animation-delay: .25s" id="action_share" target="_blank"><i class="material-icons-round left">forum</i>Invite collaborators &amp;
            comment</a>
          <a href="javascript:void(0)" class="fade-up collection-item waves-effect" style="color:gray;animation-delay: .3s" id="action_mail" target="_blank"><i class="material-icons-round left" accesskey="m">email</i>Share via email</a>
          <a href="javascript:void(0)" class="fade-up collection-item waves-effect" style="color:gray;animation-delay: .35s" id="action_wa" onclick="window.open(`https://api.whatsapp.com/send/?phone&text=${encodeURIComponent('I currently have' + document.getElementById('qty').innerHTML.replace('Quantity: ', '') + ' ' + document.getElementById('title').innerHTML.toLowerCase().plural())}&app_absent=0`);" accesskey="w"><i class="material-icons-round left">chat</i>Share via WhatsApp</a>
          <a href="javascript:void(0)" class="fade-up collection-item waves-effect" style="color:gray;animation-delay: .4s" id="action_share_p"><i class="material-icons-round left">share</i>Share</a>
          <a href="javascript:void(0)" class="fade-up collection-item waves-effect" style="color:gray;animation-delay: .45s" id="action_recipe" target="_blank" accesskey="r"><i class="material-icons-round left">auto_awesome</i>Find a recipe</a>
          <a href="javascript:void(0)" class="fade-up collection-item red-text waves-effect waves-red" style="animation-delay: .5s" id="action_delete"><i class="material-icons-round left">delete</i>Delete</a>
        </div>
      </div>
    </div>
    <div id="app"></div>
    <div id="keyboardShortcuts" class="modal">
      <div class="modal-content">
        <h5>Keyboard Shortcuts</h5>
        <p><b>CTRL G</b> - Create Shopping List item</p>
        <p><b>CTRL L</b> - Create Todo List item</p>
        <p><b>CTRL S</b> - Add Item</p>
        <p><b>CTRL ,</b> - Open Settings</p>
        <b><p>When items are clicked on</p></b>
        <p><b>ALT S</b> - Star Item</p>
        <p><b>ALT D</b> - Delete item</p>
        <p><b>ALT E</b> - Edit item</p>
        <p><b>ALT Q</b> - Generate QR code for item</p>
        <p><b>ALT W</b> - WhatsApp item</p>
        <p><b>ALT M</b> - Email item</p>
        <p><b>ALT T</b> - Add item to shopping list</p>
      </div>
    </div>
    <div id="addNote" class="modal modal-fixed-footer bottom-sheet" style="margin: auto !important;height: 90vh">
      <div class="modal-content">
        <h4>Add a note</h4>
        <form method="POST" action="./user/notes/add.php" id="addNoteForm">

          <div class="file-field input-field">
            <div class="btn blue-grey darken-3 waves-effect waves-light">
              <span style="color: white !important">File</span>
              <input type="file" id="input_img1" onchange="fileChange(this, function(e) { document.getElementById('noteBTitle').value = e})" oninput="fileChange(this, function(e) { document.getElementById('noteBTitle').value = e})" accept="image/*">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="Note Banner">
            </div>
          </div>
          <div class="input-field">
            <label>Note Banner</label>
            <input name="url" autocomplete="off" type="url" class="validate" id="noteBTitle" data-length="50">
          </div>


          <div class="input-field">
            <label for="content">Note title</label>
            <input name="title" autocomplete="off" type="text" required class="validate" data-length="50">
          </div>
          <div class="input-field">
            <!-- <label for="content">Note Content (Max: 1000 Characters)</label> -->
            <textarea name="content" style="min-height: 300px;" id="addNoteT" required class="materialize-textarea validate" data-length="1000"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <a onclick="$('#addNoteForm').submit()" href="javascript:void(0)" class="btn btn-flat waves-effect" data-cf-modified-66e7141087d8c7bb14bed9bd-="">Save</a>
      </div>
    </div>
    <div id="noteView" class="modal modal-fixed-footer bottom-sheet" style="z-index: 100 !important;margin: auto !important;height: 100vh;overflow: hidden"></div>

    <div id="bmmodal" class="bottom-sheet modal modal-fixed-footer">
      <form onsubmit="bm_add();M.toast({html: 'Added data successfully!'});return false;" method="post" name="form1"> <input type="hidden" name="name" value="09/20/2021" readonly>

        <div class="modal-content">
          <h4>Add an expense</h4>

          <div class="input-field">
            <label>Amount you
              spent</label> <input type="number" name="qty" step=".01" required id="bm_amount" autocomplete='off' autofocus> </div>
          <div>

            <select id="bm_select">
              <option value="Grocery Shopping">Grocery Shopping</option>
              <option value="Education">Education</option>
              <option value="Clothes Shopping">Clothes Shopping</option>
              <option value="Bills">Bills</option>
              <option value="Entertainment">Entertainment</option>
              <option value="Home Improvement">Home Improvement</option>
              <option value="Holidays">Holidays</option>
              <option value="Other">Other</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" name="Submit" value="Add" class="btn purple darken-3">
        </div>
      </form>
    </div>

    <div class="fixed-action-btn">
      <a class=" btn-large waves-effect waves-light" id="fab"style="overflow:hidden">
        <i class="large material-icons left">add</i>
        <span style="text-transform:none!important">Create</span>
      </a>
      <ul>
        <li data-position="left" data-tooltip="Item" class="tooltipped"><a class="fabBTN btn-floating modal-trigger" href='#addItem'><i class="material-icons">category</i></a></li>
        <li data-position="left" data-tooltip="Shopping List" class="tooltipped"><a href="#/add/shopping-list" class="fabBTN btn-floating"><i class="material-icons">receipt_long</i></a></li>
        <li data-position="left" data-tooltip="Note" class="tooltipped"><a class="fabBTN btn-floating modal-trigger" href="#addNote"><i class="material-icons">sticky_note_2</i></a></li>
        <li data-position="left" data-tooltip="Task" class="tooltipped"><a class="fabBTN btn-floating" href="#/add/todo"><i class="material-icons">check</i></a></li>
      </ul>
    </div>
    <div id="addItem" class="modal bottom-sheet" onscroll="this.style.maxHeight = '95vh!important';this.style.height = '95vh!important';this.style.minHeight = '95vh!important'">
      <div class="modal-content">
        <center>
          <h5>Add an Item <span class="hide-on-med-and-down">(CTRL + S)</span></h5>
          <p>Please select a room</p>
          <div class="row">
            <div class="col s12 m3">
              <div class="modal-close card waves-effect" onclick="window.location.hash = '#/add/' + this.getElementsByTagName('p')[0].innerText.toLowerCase()"> <div class="card-content"> <span class="card-title"><i class="material-icons">blender</i><p>Kitchen</p></span> </div> </div>
            </div>
            <div class="col s12 m3">
              <div class="modal-close card waves-effect" onclick="window.location.hash = '#/add/' + this.getElementsByTagName('p')[0].innerText.toLowerCase()"> <div class="card-content"> <span class="card-title"><i class="material-icons">bed</i><p>Bedroom</p></span> </div> </div>
            </div>
            <div class="col s12 m3">
              <div class="modal-close card waves-effect" onclick="window.location.hash = '#/add/' + this.getElementsByTagName('p')[0].innerText.toLowerCase()"> <div class="card-content"> <span class="card-title"><i class="material-icons">wc</i><p>Bathroom</p></span> </div> </div>
            </div>
            <div class="col s12 m3">
              <div class="modal-close card waves-effect" onclick="window.location.hash = '#/add/' + this.getElementsByTagName('p')[0].innerText.toLowerCase()"> <div class="card-content"> <span class="card-title"><i class="material-icons">build</i><p>Garage</p></span> </div> </div>
            </div>
            <div class="col s12 m3">
              <div class="modal-close card waves-effect" onclick="window.location.hash = '#/add/' + this.getElementsByTagName('p')[0].innerText.toLowerCase()"> <div class="card-content"> <span class="card-title"><i class="material-icons">chair</i><p>Family</p></span> </div> </div>
            </div>
            <div class="col s12 m3">
              <div class="card waves-effect" onclick="window.location.hash = '#/add/storage'"> <div class="card-content"> <span class="card-title"><i class="material-icons">business</i><p>Storage Room</p></span> </div> </div>
            </div>
            <div class="col s12 m3">
              <div class="modal-close card waves-effect" onclick="window.location.hash = '#/add/dining'"> <div class="card-content"> <span class="card-title"><i class="material-icons">restaurant</i><p>Dining Room</p></span> </div> </div>
            </div>
            <div class="col s12 m3">
              <div class="modal-close card waves-effect" onclick="window.location.hash = '#/add/camping'"> <div class="card-content"> <span class="card-title"><i class="material-icons">landscape</i><p>Camping Supplies</p></span> </div> </div>
            </div>
            <div class="col s12 m3">
              <div class="modal-close card waves-effect" onclick="window.location.hash = '#/add/laundry'"> <div class="card-content"> <span class="card-title"><i class="material-icons">local_laundry_service</i><p>Laundry Room</p></span> </div> </div>
            </div>

            <?php try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = "SELECT * FROM roomnames WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . json_encode(decrypt($_SESSION['syncid']));
  $users = $dbh->query($sql);
  foreach ($users as $row) {
            ?>
            <div class="col s12 m3">
              <div class="card waves-effect modal-close" onclick="window.location.hash = '#/add/<?=$row["id"];?>'"> <div class="card-content"> <span class="card-title"><i class="material-icons"><?=$row['qty']?></i><p><?=strip_tags($row['name']);?></p></span> </div> </div>
            </div>
            <?php
  }
  $dbh = null;
} catch (PDOexception $e) {
  echo "Error is: " . $e->getmessage();
} ?>



          </div>
        </center>
      </div>
    </div>
    <div id="ajaxLoader"></div>
    <div id="searchResults" class="modal"></div>
    <div id="croom_rclick" class="modal">
      <a id="del_croom" class="waves-effect" style="padding: 20px;color: var(--font-color);width: 100%;margin:0">Delete</a>
      <a id="croom_rclick_id" style="padding: 20px;color: var(--font-color);width: 100%;margin:0"></a>
    </div>
    <div id="overlay" style="position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.3);z-index:99999" class="hide" onclick="this.classList.add('hide');document.getElementById('right_click_modal').classList.add('hide')"></div>
    <div id="right_click_modal" class="hide z-depth-4" onclick="this.classList.add('hide')">
      <a href="javascript:void(0)" id="rclick_edit" class="modal-close waves-effect"><i class="material-icons-round left">edit</i> Edit</a>
      <a href="javascript:void(0)" id="rclick_add" class="modal-close waves-effect"><i class="material-icons-round left">local_grocery_store</i> Add to Shopping List</a>
      <a href="javascript:void(0)" id="rclick_share" class="modal-close waves-effect"><i class="material-icons-round left">share</i> Share</a>
      <a href="javascript:void(0)" id="rclick_recipe" target="_blank" class="modal-close waves-effect"><i class="material-icons-round left">auto_awesome</i> Find recipe</a>
      <a href="javascript:void(0)" id="rclick_mail" target="_blank" class="modal-close waves-effect"><i class="material-icons-round left">email</i> Email</a><a href="javascript:void(0)" id="rclick_qr" target="_blank" class="waves-effect"><i class="material-icons-round left">qr_code</i> Generate QR code</a>
      <a href="javascript:void(0)" id="rclick_delete" class="modal-close waves-effect"><i class="material-icons-round left">delete</i> Delete</a>
    </div>
    <script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/malihu-custom-scrollbar-plugin@3.1.5/jquery.mCustomScrollbar.min.js"></script>
    <script src="https://hammerjs.github.io/dist/hammer.min.js"></script>
    <script src="./js/autocomplete.js"></script>
    <script src="https://JS-Essentials.manuthecoder.repl.co/essentials.js"></script>
    <script src="./js/keyboardShortcuts.js"></script>
    <script src="./js/main.js?v=2"></script>
    <script>
      var itemState = 0;
      function sm_page(e) {}
      function AJAX_LOAD(e, s) {}
      function scrollInto(id) {
        $('.modal').modal("close")
        var el = document.querySelector(`[data-id='${id}']`);
        el.scrollIntoView();
        el.style.transition = "all .2s"
        el.style.background = "rgba(0, 0, 0, .2)";
        document.documentElement.scrollTop -= 200;
        setTimeout(() => {
          el.scrollIntoView();
          document.documentElement.scrollTop -= 200;
        }, 100)
        setTimeout(() => {
          el.style.background = ""
          el.style.transition = "";
        }, 2000)
      }
      window.addEventListener('popstate', getHashPage)
      function getHashPage(e = "") {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            if(this.responseText !== "true") {
              window.location.href="https://smartlist.ga/dashboard/auth";
              return false;
            }
          }
        };
        xhttp.open("GET", "https://smartlist.ga/dashboard/user/check_if_loggd_in.php", true);
        xhttp.send();
        var el = "#app"
        if(!window.location.hash) {
          url = "./pages/dashboard.php"
          window.location.hash = "#/home";
          new loadPage(url, el, (e == "hide" ? {loader: false}: null))
          return false;
        }
        document.querySelector('meta[name="theme-color"]').setAttribute("content",user.themeTop);
        if($(".modal").is(":visible")) {
          // document.querySelector('meta[name="theme-color"]').setAttribute('content',  user.themeDark);
        }
        if(itemState == 1) {
          document.querySelector('meta[name="theme-color"]').setAttribute('content',  "#1d272b");
        }
        if(document.documentElement.classList.contains('_darkTheme')) {
          document.querySelector('meta[name="theme-color"]').setAttribute('content',  '#212121');
        }
        switch(window.location.hash.replace("#", "")) {
          case "/dashboard": 
            url = "./<?=($homePage == "dashboard" ? "./pages/dashboard.php" : "./user/finance/index.php")?>"
            break;
          case "/user-dashboard": 
            url = "./pages/dashboard.php"
            break;
          case "/rooms/kitchen": url = "./rooms/kitchen/view.php"; break;
          case "/rooms/bedroom": url = "./rooms/bedroom/view.php"; break;
          case "/rooms/bathroom": url = "./rooms/bathroom/view.php"; break;
          case "/rooms/garage": url = "./rooms/garage/view.php"; break;
          case "/rooms/family": url = "./rooms/family/view.php"; break;
          case "/rooms/storage": url = "./rooms/storage/view.php"; break;
          case "/rooms/dining": url = "./rooms/dining_room/view.php"; break;
          case "/rooms/camping": url = "./rooms/camping/view.php"; break;
          case "/rooms/laundry": url = "./rooms/laundry/view.php"; break;

          case "/add/kitchen": url = "./rooms/kitchen/quickadd.php"; break;
          case "/add/bedroom": url = "./rooms/bedroom/quickadd.php"; break;
          case "/add/bathroom": url = "./rooms/bathroom/quickadd.php"; break;
          case "/add/garage": url = "./rooms/garage/quickadd.php"; break;
          case "/add/family": url = "./rooms/family/add1.php"; break;
          case "/add/storage": url = "./rooms/storage/quickadd.php"; break;
          case "/add/custom-room": url = 'https://smartlist.ga/dashboard/rooms/custom_room/add_room.php'; break;
          case "/add/dining": url = "./rooms/dining_room/quickadd.php"; break;
          case "/add/camping": url = "./rooms/camping/quickadd.php"; break;
          case "/add/laundry": url = "./rooms/laundry/quickadd.php"; break;
          case "/add/shopping-list": url = "./rooms/grocerylist/quickadd.php"; break;
          case "/add/todo": url = "./rooms/todo/quickadd.php"; break;
          case "/add/subscription": url = "./user/finance/subscription_quickadd.php"; break;

          case "/notifications": url = "./rooms/notifications.php"; break
          case "/notes": url = "./user/notes/index.php"; break
          case "/starred": url = "./rooms/starred-items.php"; break
          case "/maintenance": url = "./rooms/maintenance.php?card"; break
          case "/trash": url = "./rooms/trash.php"; break
          case "/settings": url = "./user/settings/index.php"; break
          case "/my-finances": url = "./user/finance/index.php"; break;
          case "/my-finances/payments": url = "./user/finance/payments.php"; break;
          case "/shopping-assistant": url = "./user/shopping_assistant/index.php"; break;
            <?php 
  try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql = "SELECT * FROM roomnames WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . json_encode($_SESSION['syncid']);
    $users = $dbh->query($sql);
    foreach ($users as $row) {
      print '	case "/rooms/'.$row['id'].'": url = "./rooms/custom_room/ajax_croom_loader.php?room='.$row['id'].'"; break;
      ';
      print '	case "/add/'.$row['id'].'": url = "./rooms/custom_room/custom_room_add.php?room='.$row['id'].'"; break;
      ';
    }
    $dbh = null;
  } catch (PDOexception $e) {
    echo "Error is: " . $e->getmessage();
  } ?>
          default: 
            url = "./<?=($homePage == "dashboard" ? "./pages/dashboard.php" : "./user/finance/index.php")?>"
        }

        new loadPage(url, el,  (e == "hide" ? {loader: false} : null))
      }

      navigator.serviceWorker.register('https://smartlist.ga/dashboard/sw.js');
      const user = {
        themeTop: "#<?=$theme_top;?>",
        theme: "#<?=$theme;?>",
        themeLight: "#<?=$theme_light;?>",
        $bmBgColor: "<?=$bmBgColor;?>",
        $bmBorderColor: "<?=$bmBorderColor;?>",
        $overlayColor: "<?=$overlayColor;?>",
        $imageURI: "<?=$imageURI;?>",
        themeDark: "#<?=$themeDark;?>"
      }
    </script>
  </body>
</html>