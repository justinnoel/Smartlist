<?php
/**
 * Smartlist dashboard.
 * PHP version 8.1
 * 
 * @see https://github.com/Smartlist-App
 * @see https://github.com/Smartlist-App/Smartlist
 * 
 * @use https://github.com/mrclay/minify
 * @use https://github.com/materializecss/materialize
 * 
 * @author ManuTheCoder <manuthecoder@protonmail.com> (original founder)
 * @copyright 2020 Smartlist
 * @license https://github.com/Smartlist-App/Smartlist/blob/master/LICENSE
 */
ini_set("display_errors", 1);
session_set_cookie_params(0, "/", ".smartlist.ga");
session_start();
$_SESSION['id'] = intval($_SESSION['id']);
if(!isset($_SESSION['valid'])) {header("Location: https://smartlist.ga/dashboard/auth");exit();}

require "cred.php";

if ("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" == "https://smartlist.ga/dashboard") {
    // Redirect users from "https://smartlist.ga/dashboard" to "https://smartlist.ga/dashboard/"
    header("Location: https://smartlist.ga/dashboard/");
    exit();
}
// Create a new PDO object to connect to the database
$dbh = new PDO("mysql:host=".App::server.";dbname=".App::database, App::username, App::password);
$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$sql = $dbh->prepare("SELECT * FROM login WHERE id=:sessid");
$_CONFIG = json_decode(file_get_contents("/home/smartlis/public_html/config.json"));
if($_CONFIG->maintenance === true && !in_array($_SERVER['REMOTE_ADDR'], $_CONFIG->authorizedIpList)) {
  header("Location: https://maintenance.".App::domain);
  exit();
}
$sql->execute(array( ':sessid' => $_SESSION['id'] ));
$users = $sql->fetchAll();

foreach ($users as $row) {
    // Fetch latest user credentials from the database
    $_SESSION['name'] = decrypt($row['name']);
    $_SESSION['currency'] = $row['currency'];
    $_SESSION['goal'] = $row['goal'];
    $_SESSION['email'] = decrypt($row['email']);
    $_SESSION['avatar'] = $row['user_avatar'];
    $_SESSION['theme'] = (empty($row['theme']) ? "41308a" : $row['theme']);
    $_SESSION['syncid'] = $row["syncid"];
    $_SESSION['number_notify'] = intval($row['remind']);
    $_SESSION['welcome'] = intval($row['welcome']);
    $_SESSION['studentMode'] = $row['studentMode'];
    $_SESSION['homePage'] = $row['defaultpage'];
    $_SESSION['purpose'] = $row['purpose'];
    $_SESSION['personCount'] = $row['familyCount'];
    $_SESSION['houseName'] = (!empty($row['houseName']) && $row['houseName'] !== "Smartlist" ? decrypt($row['houseName']) : "Smartlist");

}
if (strval($_SESSION["welcome"]) !== "1") {
    // Redirect to welcome page if first time.
    header('Location: ./welcome');
    exit();
}

require "colorSwitch.php";

function sanitize_output($buffer) {
    require_once App::directory.'dashboard/lib/Minify/HTML.php';
    $buffer = Minify_HTML::minify($buffer, array());
    return $buffer;
}
ob_start('sanitize_output');

$_USER = new stdClass();
$_USER->name = $_SESSION['name'];
$_USER->email = $_SESSION['email'];
$_USER->currency = $_SESSION['currency'];
$_USER->avatar = $_SESSION['avatar'];
$_USER->avatar = $_SESSION['avatar'];
$_USER->houseName = (!empty(trim($_SESSION['houseName'])) ? $_SESSION['houseName']:"Smartlist");
$_USER->theme = $theme;
$_USER->themeTop = $userTheme['top'];
$_USER->themeLight= $userTheme['light'];
$_USER->navScrollColor= $userTheme['navScrollColor'];
$_USER->themeDark= $userTheme['darkTheme'];
$_USER->homePage = ($_SESSION['homePage'] == "dashboard" ? "./user/dashboard.php" : "./user/finance/index.php");
?>
<!DOCTYPE html>
<html lang="en" class="<?=(isset($_COOKIE['dark']) && ($_COOKIE['dark']) == 'true' ? '_darkTheme' : '')?>" style="--fabDarkMode: #<?=($userTheme['darkTheme'] == '1c2429' ? '013b5e': $userTheme['darkTheme']);?>;--nav-scroll-color:#<?=$userTheme['navScrollColor'];?>;--dark:#<?=$userTheme['darkTheme']?>; --font-color: #303030; --light: #<?=$userTheme['light']; ?>; --regular: #<?=$theme; ?>; --bg-color: #fff; --sidenavf-color: #606060; --sidenavbg-color: <?=$overlayColor; ?>; --navbar-color: #<?=$theme; ?>; --sidenavbg1color: #fff; --x: 0px">
  <head>
    <script>
      if(localStorage.getItem("sidenavRail") && localStorage.getItem("sidenavRail") == "true") { document.body.classList.add("material-sidenav:rail") }
      localStorage.getItem("theme")&&"true"==localStorage.getItem("theme")&&document.documentElement.classList.add("_darkTheme");
    </script>
    <title>Smartlist</title>
    <script type="module">
      import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwaupdate';
      const el = document.createElement('pwa-update');
      document.body.appendChild(el);
    </script>

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <base href="https://smartlist.ga/dashboard/">
    <?php 
      foreach($_CONFIG->dashboard->dependencies as $dependency) {
        if($dependency->type == "js") {echo '<script src="'.$dependency->url.'"></script>'.PHP_EOL;}
        if($dependency->type == "css") {echo '<link rel="stylesheet" href="'.$dependency->url.'">'.PHP_EOL;}
      }
      foreach($_CONFIG->dashboard->metaTags as $tag) {
        echo '<meta name="'.$tag->name.'" content="'.$tag->content.'">'.PHP_EOL;
      }
     ?>
    <link rel="manifest" href="manifest.webmanifest">
    <link rel="apple-touch-icon" href="https://smartlist.gaa/dashboard/icon/roofing.svg" />
    <link rel="shortcut icon" href="https://i.ibb.co/HPtyvJS/logo.png">
    <link rel="stylesheet" href="./css/style.css?v=002">
    <meta name="theme-color" content="#<?=(isset($_COOKIE['dark']) && ($_COOKIE['dark']) == 'true' ? '212121' : '#fff')?>">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  </head>
  <body>
    <nav id="searchBar" class="hide w-full position:fixed" style="top:0;left:0!important">
      <div class="nav-wrapper">
        <form id="searchForm" action="./user/search.php" method="POST">
          <div class="input-field border-full" style="background: var(--nav-scroll-color)">
            <input id="search" type="search" name="query" autocomplete="off" class="autocomplete transparent" required autofocus placeholder="Search your home..." style="border-radius:0!important;">
            <i class="z:999999999999999 material-icons close color:default position:fixed overflow:hidden" style="width: 60px;left:20px;display:inline-block;" id="search.close.mobile">arrow_back</i>
            <i class="z:999999999999999 material-icons close color:default position:fixed overflow:hidden hide" style="width: auto;right:20px!important;" id="search.close.desktop">close</i>
          </div>
        </form>
      </div>
    </nav>
    <div id="accountDropdown" class="center hide fadeOut" tabindex="0">
    <br><br>
      <a class="modal-trigger circle waves-effect" href="#avatarChange" id="accountDropdown.close.avatar"><img id="accountDropdown.avatar" style="width:100px;height:100px;" class="circle"></a>
      <br>
      <h6><b id="accountDropdown.name"></b></h6>
      <p id="accountDropdown.email"></p>
      <a class="btn waves-effect blue-grey btn-round lighten-5 black-text" style="margin-top:15px;margin-bottom:25px;width: 300px;" href="#/settings" id="accountDropdown.close.settings">Account settings</a>
    </div>
    <nav id="__navBar" class="lighten-5">
      <ul class="center">
        <li>
          <a
            href="javascript:void(0)"
            class="black-text
              waves-effect
              hide-on-large-only
              btn-flat btn-floating"
            style="margin-left: 3px !important;line-height: 37px!important;"
            id="menuTrigger"
            ><i
              class="black-text material-icons line-height:40"
              >menu</i
            ></a
          >
        </li>
        <li>
          <a href="javascript:void(0)" class="btn btn-floating waves-effect btn-flat hide-on-med-and-down" id="nav.toggleRail"><i class="material-icons black-text" style="line-height: 40px !important">menu</i></a>
          <a id="houseName" class="transparent brand-logo left white-text truncate hide-on-med-and-down color:default" style="color:var(--font-color)!important;max-width: 93vw;transfsorm: none!important;margin-left: 15px!important;line-height: 60px!important;" href="#/house-profile"><span style="transform:scale(.6);font-size: 18px!important;position:relative;top: -2.5px;"></span></a>
          <a id="houseName1" class="transparent brand-logo center white-text truncate color:default" style="color:var(--font-color)!important;max-width: 93vw;transform:translateX(-50%) scale(.6)" href="#/house-profile"></a>
        </li>
      </ul>
      <ul class="right">
        <li>
          <a
            href="#/notifications"
            class="
              black-text
              waves-effect
              btn-flat btn-floating
              hide-on-med-and-down
              nav_scaleIconOnHover
              line-height:40
            "
            style="margin-left: 3px !important"
            ><i class="material-icons black-text line-height:40">notifications</i></a
          >
        </li>
        <li>
          <a
            href="javascript:void(0)"
            id="searchTrigger"
            class="
              black-text
              waves-effect
              btn-flat btn-floating
              nav_scaleIconOnHover
              line-height:40
            "
            style="margin-left: 3px !important"
            ><i class="material-icons black-text line-height:40">search</i></a
          >
        </li>
        <li>
          <a
            href="#_feedback"
            class="
              black-text
              waves-effect
              modal-trigger
              btn-flat btn-floating
              hide-on-med-and-down
              nav_scaleIconOnHover
              line-height:40
            "
            style="margin-left: 3px !important"
            ><i class="material-icons black-text line-height:40">try</i></a
          >
        </li>
        <li>
          <a
            href="javascript:void(0)"
            class="
              black-text
              waves-effect
              btn-flat btn-floating
              hide-on-med-and-down
              line-height:40
              nav_scaleIconOnHover
            "
            id="imgAvatar"
            onkeyup="if(event.keyCode == 13) this.click()"
            onmousedown="event.stopPropagation();hideAccountDropdown();"
            style="margin-left: 3px !important"
            >
            <i class="material-icons black-text line-height:40">account_circle</i>
            </a
          >
        </li>
      </ul>
    </nav>
    <noscript>
      <div style="position:fixed;top:0;left:0;width:100%;height:100%;z-index:9999999;background:rgba(0,0,0,0.5);color:#000;">
        <div style="position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);background:#fff;padding:40px;border-radius: 28px;max-width: 500px;width:100%;">
          You must enable javascript in order to use Smartlist!
        </div>
      </div>
    </noscript>
    <input id="copyToClipboard" type="hidden">
    <div id="avatarChange" class="modal">
      <div class="modal-content">
        <center> <img class="circle" src="" loading="lazy" class="center" style="width: 100px" id="src" alt=""> </center>
        <form method="POST" action="./user/settings/changeAvatar.php" id="avatarChangeForm">
              <br><br>
              <div class="file-field input-field">
                <div class="btn blue-grey darken-3 waves-effect waves-light">
                  <span class="white-text">File</span>
                  <input type="file" id="input_img" onchange="fileChange(this, function(e) {document.getElementById('src').src=e;document.getElementById('avatar_file_upload_input').value = e;})"  accept="image/*">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path" type="text" placeholder="Upload a file..." disabled>
                </div>
              </div>
              <div class="input-field">
                <label>URL</label>
                <input name="avatar" type="text" id="avatar_file_upload_input" oninput="document.getElementById('src').src=this.value;" autocomplete="off">
              </div>
            <button id="user.profile.image.revertToDefault" class="btn-round btn red darken-3 waves-effect waves-light">Revert to default</button>
          <br><br>
          <button class="blue-grey darken-3 btn waves-effect btn-round">Change Profile Picture</button>
        </form>
      </div>
    </div>
    <div id="feedbackBeta" class="modal h-auto border-radius:10">
      <img loading="lazy" src="<?=$_CONFIG->dashboard->popup->image;?>" style="height: 300px;" alt="" class="w-full object-fit:cover">
      <div class="modal-content">
        <h5><?=$_CONFIG->dashboard->popup->title;?></h5>
        <p><?=$_CONFIG->dashboard->popup->content;?><p>
        <center>
          <button class="modal-close btn <?=$_CONFIG->dashboard->popup->button->color;?> darken-3 waves-effect waves-light btn-round" id="popup.close"><?=$_CONFIG->dashboard->popup->button->text;?><i class="material-icons right">arrow_forward_ios</i></button>
        </center>
      </div>
    </div>
    <ul id="slide-out" class="z-depth-0 sidenav sidenav-fixed">
      <li class="links hide-on-large-only"><a class="subheader truncate" href="javascript:void(0)" rel='nofollow' id="houseName2"></a></li>
      <li class="sidenav-close links"><a href="#/user-dashboard" class="sidenav-highlight waves-effect" href="#/user-dashboard"><i class="material-icons">dashboard</i><span>Dashboard</span></a></li>
      <?php if ($_SESSION['purpose'] !== 'business') { ?>
      <li class="sidenav-close links hide-on-rail"><a target="_blank" class="waves-effect" href="https://smartlist.ga/dashboard/user/shopping_assistant/"><i class="material-icons">view_carousel</i> <span>Shopping Assistant</span></a></li>
      <?php } ?>
      <li class="sidenav-close links"><a class="sidenav-highlight waves-effect" href="#/my-finances"><i class="material-icons">payments</i> <span class="capitalizeFirstLetter"><?=($_SESSION['purpose'] !== 'business' ? "<em class='rail-text-hide'>My</em> finances" : "Finances")?></span></a></li>
      <?php if ($_SESSION['purpose'] == 'business') { ?>
      <li class="sidenav-close links"><a class="sidenav-highlight waves-effect" href="#/my-finances/calculators"><i class="material-icons">calculate</i> <span class="capitalizeFirstLetter"><em class='rail-text-hide'>Finance </em>calculators</em></span></a></li>
      <li class="sidenav-close links"><a class="sidenav-highlight waves-effect" href="#/my-finances/payments"><i class="material-icons">toll</i> <span>Payments</span></a></li>
      <?php } ?>
      <?php if ($_SESSION['purpose'] !== 'business') { ?>
      <li class="sidenav-close links"><div class="divider"></div></li>
      <li class="sidenav-close links"><a class="sidenav-highlight subheader">Rooms</a></li>
      <?php if ($_SESSION["studentMode"] !== "true") { ?>
      <li class="sidenav-close links"><a class="sidenav-highlight sidenav-close waves-effect" href="#/rooms/kitchen"><i class="material-icons-round left">microwave</i><span>Kitchen</span></a></li>
      <?php } ?>
      <li class="sidenav-close links"><a class="sidenav-highlight sidenav-close waves-effect" href="#/rooms/bedroom"><i class="material-icons-round left">bedroom_parent</i><span>Bedroom</span></a></li>
      <?php
        $sql = $dbh->prepare("SELECT * FROM roomnames WHERE login_id=:sessid OR login_id=:syncid");
        $sql->execute(array(
            ':sessid' => $_SESSION['id'],
            ':syncid' => decrypt($_SESSION['syncid'])
        ));
        $users = $sql->fetchAll();
        foreach ($users as $row)
        {
            if (strpos(strtolower($row['name']) , 'bedroom') !== false || strpos(strtolower($row['name']) , 'closet') !== false)
            {
                print "<li class='links'><a oncontextmenu='croom_rclick(" . $row['id'] . ");return false' class=\"sidenav-highlight waves-effect sidenav-close\" href='#/rooms/" . $row['id'] . "'><i class=\"material-icons-round left\">" . (strtolower($row['name'])=='master bedroom'?"bedroom_parent":$row['qty']) . "</i><span>" . $row["name"] . "</span></a></li>\n";
            }
        }
      ?>
      <li class="sidenav-close links"><a class="sidenav-highlight sidenav-close waves-effect" href="#/rooms/bathroom"><i class="material-icons-round left">bathroom</i><span>Bathroom</span></a></li>
      <?php try {
        $sql = $dbh->prepare("SELECT * FROM roomnames WHERE login_id=:sessid OR login_id=:syncid");
        $sql->execute(array(
            ':sessid' => $_SESSION['id'],
            ':syncid' => decrypt($_SESSION['syncid'])
        ));
        $users = $sql->fetchAll();
        foreach ($users as $row)
        {
            if (strpos(strtolower($row['name']) , 'bathroom') !== false)
            {
                print "<li class='links'><a oncontextmenu='croom_rclick(" . $row['id'] . ");return false' class=\"sidenav-highlight waves-effect sidenav-close\" href='#/rooms/" . $row['id'] . "'><i class=\"material-icons-round left\">" . $row['qty'] . "</i><span>" . $row["name"] . "</span></a></li>\n";
            }
        }
    }
    catch(PDOexception $e) {
        echo "Error is: " . $e->getmessage();
    }
    if ($_SESSION["studentMode"] !== "true") { ?>
      <li class="sidenav-close links"><a class="sidenav-highlight sidenav-close waves-effect" href="#/rooms/garage"><i class="material-icons-round left">garage</i><span>Garage</span></a></li>
      <?php } ?>
      <li class="sidenav-close links"><a class="sidenav-highlight sidenav-close waves-effect" href="#/rooms/family"><i class="material-icons-round left">living</i><span>Family</span></a></li>
      <?php if ($_SESSION["studentMode"] !== "true") { ?>
      <li class="sidenav-close links"><a class="sidenav-highlight sidenav-close waves-effect" href="#/rooms/dining"><i class="material-icons-round left">dining</i><span class="capitalizeFirstLetter">Dining <em class='rail-text-hide'>Room</em></span></a></li>
      <li class="sidenav-close links"><a class="sidenav-close waves-effect sidenav-highlight" href="#/rooms/laundry" ><i class="material-icons-round left">local_laundry_service</i><span class="capitalizeFirstLetter">Laundry <em class='rail-text-hide'>room</em></span></a></li>
      <li class="sidenav-close links"><a class="sidenav-highlight sidenav-close waves-effect" href="#/rooms/camping" ><i class="material-icons-round left">park</i><span class="capitalizeFirstLetter">Camping <em class='rail-text-hide'>Supplies</em></span></a></li>
      <?php } ?>
    <li class="sidenav-close links"><a class="sidenav-highlight sidenav-close waves-effect" href="#/rooms/storage"><i class="material-icons-round left"><?=($_SESSION["studentMode"] !== "true" ? "inventory_2" : "school") ?></i><span class="capitalizeFirstLetter"><?=($_SESSION["studentMode"] == "true" ? "Study <em class='rail-text-hide'>Room</em>" : "Storage <em class='rail-text-hide'>Room</em>") ?></span></a></li>
  <?php
  } ?>
        <li class="sidenav-close"><div class="divider"></div></li>
        <li class="sidenav-close"><a class="subheader"><?php if ($_SESSION['purpose'] !== 'business') { ?>Other Rooms<?php }
  else
  {
      echo "Inventory";
  } ?></a></li><?php try
  {
    
    $sql = $dbh->prepare("SELECT * FROM roomnames WHERE login_id=:sessid OR login_id=:syncid");
    $sql->execute(array(
        ':sessid' => $_SESSION['id'],
        ':syncid' => decrypt($_SESSION['syncid'])
    ));
    $users = $sql->fetchAll();

    foreach ($users as $row)
    {
        if (strpos(strtolower($row['name']) , 'bathroom') == false)
        {
            if (strpos(strtolower($row['name']) , 'bedroom') == false)
            {
                print "<li class='links'><a oncontextmenu='croom_rclick(" . $row['id'] . ");return false' class=\"sidenav-highlight waves-effect sidenav-close\" href='#/rooms/" . $row['id'] . "'><i class=\"material-icons-round left\">" . $row['qty'] . "</i><span>" . $row["name"] . "</span></a></li>\n";
            }
        }
    }
    
}
catch(PDOexception $e)
{
    echo "Error is: " . $e->getmessage();
} ?>
      <li class="links"><a class="waves-effect sidenav-close" href="#/add/custom-room"><i class="material-icons-round">add_location_at</i><span class="capitalizeFirstLetter">Create <em class='rail-text-hide'>room</em></span></a></li>
      <li class="pointer-events:none"> <div class="divider"></div> </li>
      <li class="links pointer-events:none"><a class="subheader" href="javascript:void(0)" rel='nofollow'>Other</a></li>
      <li class="sidenav-close links"><a class="sidenav-highlight sidenav-close waves-effect" href="#/notes" ><i class="material-icons-round left">sticky_note_2</i><span>Notes</span></a></li>
      <?php if ($_SESSION['purpose'] !== 'business')
{ ?>
      <li class="sidenav-close links"><a class="sidenav-highlight sidenav-close waves-effect" href="#/starred" ><i class="material-icons-round left">star</i><span>Starred</span></a></li>
      <li class="sidenav-close links"><a class="sidenav-highlight sidenav-close waves-effect" href="#/maintenance" ><i class="material-icons-round left">construction</i><span>Maintenance</span></a></li> 
      <li class="sidenav-close links"><a class="sidenav-close waves-effect hide-on-rail" href="https://recipe-generator.smartlist.ga/" target="_blank"><i class="material-icons-round left">casino</i><span>Recipe Generator</span></a></li>
      <?php
} ?>
      <li class="sidenav-close links"><a class="sidenav-highlight sidenav-close waves-effect" href="#/trash" ><i class="material-icons-round left">delete</i><span>Trash</span></a></li>
      <li class="pointer-events:none hide-on-rail"> <div class="divider"></div> </li>
      <?php if ($_SESSION["studentMode"] !== "true")
{ ?>
      <li class="hide-on-rail links"><a class="subheader" href="javascript:void(0)" rel='nofollow'>Events</a></li>
      <li class="hide-on-rail links"><a tabindex="0" target="_blank" class="waves-effect sidenav-close" rel="noopener" href="https://collaborate.smartlist.ga"><i class="material-icons-round">event_available</i><span>Join event</span></a></li>
      <li class="hide-on-rail links"><a tabindex="0" target="_blank" class="waves-effect sidenav-close" rel="noopener" href="https://collaborate.smartlist.ga/create-event"><i class="material-icons-round">edit_calendar</i><span>Create
        event</span></a></li>
      <li class="pointer-events:none links hide-on-large-only"> <div class="divider"></div> </li>
      <?php
} ?>
      <li class="links hide-on-large-only pointer-events:none"><a class="subheader" href="javascript:void(0)"  rel='nofollow'>Account</a></li>
      <li class="sidenav-close links hide-on-large-only"><a class="sidenav-close waves-effect sidenav-highlight" href="#/notifications"><i class="material-icons-round left">notifications</i><span>Notifications</span></a></li>
      <li class="sidenav-close links hide-on-large-only"><a class="sidenav-close waves-effect sidenav-highlight" href="#/settings"><i class="material-icons-round left">manage_accounts</i><span>Settings</span></a></li>
      <li class="links hide-on-large-only"><a tabindex="0" class="waves-effect modal-trigger sidenav-close" href="#_feedback"><i class="material-icons-round">reviews</i>Feedback</a></li>
    </ul>
    <div id="_feedback" class="modal bottom-sheet" style="border-top-left-radius: 10px!important;border-top-right-radius:10px!important"> <div class="modal-content"> <div class="center"><h5 style="margin-top: 25px">Feedback</h5> <p>Have any questions, concerns, or feature requests? We're all ears!</p> </div><form id="feedback-form" action="//formspree.io/f/mbjqjeyo" method="POST"> <input type="hidden" name="email" value="manuthecoder@protonmail.com" /> <input type="hidden" name="login_id" value="1" />  <div class="input-field input-border"> <textarea required class="materialize-textarea" name="message" style="margin:0!important;padding-top: 15px!important;padding-bottom:15px!important;min-height: 100px!important"></textarea> <label>Message</label></div> <div style="text-align:right"><button id="my-form-button" class="waves-effect btn blue-grey darken-3 waves-light btn-round">Send <i class="material-icons right">send</i></button></div> <p id="my-form-status"></p> </form> </div> </div>
    <div id="edit_sidenav" style="z-index: 9999999999999999999999999" class="material-sidenav:right z-depth-4 w-full">
        <form action="edit.php" method="POST" id="edit_form">
      <nav class="blue-grey lighten-5 z-depth-0 position:fixed" style="top: 0;left: 0;z-index: 999999999999"> <ul class="no-margin no-padding"> <li><a href="javascript:void(0)" class="nav_scaleIconOnHover transparent btn btn-flat btn-floating black-text waves-effect sidenav-close">
        <i class="material-icons left black-text line-height:40">close</i>
      </a></li><li> <a href="javascript:void(0)" class="sidenav-close btn btn-flat" style="padding-left: 3px!important;color: var(--font-color) !important;line-height: 35px!important;"> Edit</a> </li> </ul>
      <ul class="right">
      <button class="nav_scaleIconOnHover transparent btn btn-flat btn-floating black-text waves-effect sidenav-close" style="margin-right: 8px !important">
        <i class="material-icons left black-text line-height:40" id="item.edit.submit">check</i>
      </button>
      </ul>
        </nav>
      <br><br><br> <br><br><br>
      <div class="container">
          <div class="input-field input-border">
            <input id="edit_item_name" type="text" name="name" autocomplete="off">
            <label>
              Item name
            </label>
          </div>
          <div class="row">
            <div class="col s12 m9 no-margin no-padding">
              <div class="input-field input-border">
                <input id="edit_item_qty" type="text" name="qty" autocomplete="off">
                <label>
                  Quantity
                </label>
              </div>
              <p class="hide-on-small-only">
                <label>
                  <input type="checkbox" oninput="if(this.checked===true){document.getElementById('edit_item_qty').value=document.getElementById('edit_item_qty').value+' (In stock)'} else {document.getElementById('edit_item_qty').value=document.getElementById('edit_item_qty').value.replace(' (In stock)','')}" />
                  <span>In stock?</span>
                </label>
              </p>
            </div>
            <div class="col s12 m3" style="padding-top: 13px;padding-left: 18px!important">
            <p class="hide-on-med-and-up">
                <label>
                  <input type="checkbox" oninput="if(this.checked===true){document.getElementById('edit_item_qty').value=document.getElementById('edit_item_qty').value+' (In stock)'} else {document.getElementById('edit_item_qty').value=document.getElementById('edit_item_qty').value.replace(' (In stock)','')}" />
                  <span>In stock?</span>
                </label>
              </p>
              <div class="row">
                <div class="col s6">
                  <button type="button" id="item.edit.add" class="btn-large w-full btn-boxy nav_scaleIconOnHover blue-grey lighten-5 z-depth-0 btn-floating btn waves-effect"><i class="material-icons-round black-text">add</i></button>
                </div>
                <div class="col s6">
                  <button type="button" id="item.edit.subtract" class="btn-large w-full btn-boxy nav_scaleIconOnHover blue-grey lighten-5 z-depth-0 btn-floating btn waves-effect"><i class="material-icons-round black-text">remove</i></button>
                </div>
              </div>
            </div>
          </div>
          <input type="hidden" name="price">
          <br>
          <input type="hidden" name="id" id="edit_item_id">
          <input type="hidden" name="date" id="date1">
          </div>
        </form>
      </div>
    </div>
    <div id="item_sidenav" style="width: 70%;overflow-x: hidden;overflow-y:visible;" class="material-sidenav:right">
      <div class="container">
        <nav class="blue-grey lighten-5 z-depth-0 position:fixed" style="top: 0;left: 0;z-index: 999999999999">
          <ul class="no-padding no-margin">
            <li>
            <a oncontextmenu="return false;" href="javascript:void(0)" class="nav_scaleIconOnHover transparent btn btn-flat btn-floating black-text waves-effect sidenav-close">
              <i class="material-icons left black-text" style="line-height:40px!important">arrow_back</i>
            </a>
            </li>
            <li>
              <a href="javascript:void(0)" class="black-text nav__link" style="line-height: 60px;padding-left: 3px !important;padding-right: 3px !important">
                View
              </a>
            </li>
          </ul>
          <ul class="right">
            <li><a style="margin-right: 6px!important" oncontextmenu="return false;" class="nav__link nav_scaleIconOnHover btn-floating btn-flat waves-effect black-text transparent" href="javascript:void(0)" id="star" accesskey="s"><i style="line-height: 40px !important" class="material-icons">star_outline</i></a></li>
            <li><a style="margin-right: 6px!important" oncontextmenu="return false;" class="nav__link nav_scaleIconOnHover btn-floating btn-flat waves-effect black-text transparent" href="javascript:void(0)" id="edit" accesskey="e"><i style="line-height: 40px !important" class="black-text material-icons">edit</i></a></li>
            <li><a style="margin-right: 8px!important" oncontextmenu="return false;" class="nav__link nav_scaleIconOnHover btn-floating btn-flat waves-effect black-text transparent" href="javascript:void(0)" id="delete" accesskey="d"><i style="line-height: 40px !important" class="black-text material-icons">delete</i></a></li>
          </ul>
        </nav>
        <br><br>
        <h4 class="truncate copyOnClick" id="title">Title</h4>
        <h5 class="truncate copyOnClick" id="qty">Quantity</h5>
        <p class="truncate" id="dateID">date</p>
        <div class="chip-suggestions" id="chips" style="margin-top: 10px;margin-bottom: 20px"></div>
        <div class="collection" style="--tw-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);border: 1px solid rgba(200, 200, 200, .8)!important">
          <a href="javascript:void(0)" class="collection-item waves-effect" id="action_task"><i class="material-icons-round left" accesskey="t">task_alt</i>Add item to shopping list</a>
          <a href="javascript:void(0)" class="collection-item waves-effect" id="action_qr" target="_blank"><i class="material-icons-round left" accesskey="q">qr_code</i>Generate QR code</a>
          <a href="javascript:void(0)" class="collection-item waves-effect" id="action_share" target="_blank"><i class="material-icons-round left">forum</i>Invite collaborators &amp;comment</a>
          <a href="javascript:void(0)" class="collection-item waves-effect" id="action_mail" target="_blank"><i class="material-icons-round left" accesskey="m">email</i>Share via email</a>
          <a href="javascript:void(0)" class="collection-item waves-effect" id="action_wa" accesskey="w"><i class="material-icons-round left">chat</i>Share via WhatsApp</a>
          <a href="javascript:void(0)" class="collection-item waves-effect" id="action_share_p"><i class="material-icons-round left">share</i>Share</a>
          <a href="javascript:void(0)" class="collection-item waves-effect" id="action_recipe" target="_blank" accesskey="r"><i class="material-icons-round left">auto_awesome</i>Find a recipe</a>
          <a href="javascript:void(0)" class="collection-item waves-effect" id="action_delete"><i class="material-icons-round left">delete</i>Delete</a>
        </div>
      </div>
    </div>
    <div id="app" tabindex="0">
    <center>
        <div class="loader">
          <svg viewBox="0 0 32 32" width="42" height="42">
            <circle id="spinner" cx="16" cy="16" r="14" fill="none"></circle>
          </svg>
        </div><br>
        <p>Connection problems? <a href="https://community.smartlist.ga>/" target="_blank">Let us know</a></p>  
      </center>
    </div>
    <div id="keyboardShortcuts" class="modal">
      <div class="modal-content">
        <h5>Keyboard Shortcuts</h5>
        <p><b>CTRL G</b> - Create Shopping List item</p>
        <p><b>CTRL L</b> - Create Todo List item</p>
        <p><b>CTRL S</b> - Add Item</p>
        <p><b>CTRL B</b> - Add an Expense</p>
        <p><b>CTRL ,</b> - Open Settings</p>
        <p><b>CTRL M</b> - Open sidenav</p>
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
    <div id="addNote" class="modal modal-fixed-footer no-margin no-padding">
      <nav style="background: var(--bg-color) !important" class="z-depth-0">
        <ul>
          <li><a href="javascript:void(0)" class="modal-close hide-on-med-and-up"><i class="material-icons spin no-padding color:default no-margin">close</i></a></li>
          <li><a href="javascript:void(0)" class="color:default">Add note</a></li>
        </ul>
        <ul class="right hide-on-med-and-down">
          <li><a href="javascript:void(0)" class="modal-close btn-floating btn-flat waves-effect"><i class="material-icons spin no-padding color:default line-height:40 no-margin">close</i></a></li>
        </ul>
      </nav>
      <div class="modal-content">
        <form method="POST" action="./user/notes/add.php" id="addNoteForm">
          <div class="row">
            <div class="col s12 m4">
              <div class="file-field input-field">
                <div class="btn blue-grey darken-3 waves-effect waves-light btn-round">
                  <span class="white-text">Upload banner</span>
                  <input type="file" id="input_img1" onchange="fileChange(this, function(e) { document.getElementById('noteBTitle').value = e})" oninput="fileChange(this, function(e) { document.getElementById('noteBTitle').value = e})" accept="image/*">
                </div>
                <div class="file-path-wrapper hide">
                  <input class="file-path" disabled type="text" placeholder="Note Banner">
                </div>
              </div>
            </div>
            <div class="col s12 m8">
              <input name="url" autocomplete="off" type="hidden" id="noteBTitle" data-length="50">
              <div class="input-field input-border">
                <label for="content">Note title</label>
                <input name="title" autocomplete="off" type="text" required data-length="50">
              </div>
            </div>
            <div class="col s12">
              <div class="input-field hide">
                <textarea name="content" id="addNoteT" required class="min-height:300px materialize-textarea" data-length="1000"></textarea>
              </div>
            </div>
          </div>
          <div class="right-align">
          <button class="btn-round btn blue-grey darken-3 waves-effect waves-light btn-flat white-text" id="addNoteFormSubmit" type="submit"><i class="material-icons left white-text">note_add</i>Create</button>
          </div>
        </form>
      </div>
    </div>
    <div id="noteView" class="modal modal-fixed-footer bottom-sheet overflow:hidden" style="z-index: 100 !important;margin: auto !important;height: 100vh;"></div>
    <div id="bmmodal" class="modal modal-fixed-footer">
      <nav class="z-depth-0 transparent">
        <ul>
          <li><a href="javascript:void(0)" class="hide-on-med-and-up modal-close btn-floating btn-flat waves-effect"><i class="material-icons spin color:default line-height:40 no-margin no-padding">close</i></a></li>
          <li><a href="javascript:void(0)" class="color:default">Add an expense</a></li>
        </ul>
        <ul class="hide-on-med-and-down right">
          <li><a href="javascript:void(0)" class="modal-close"><i class="material-icons spin color:default no-margin no-padding">close</i></a></li>
        </ul>
      </nav>
      <form onsubmit="bm_add();if(document.getElementById('financeCircleIndicator')) {document.getElementById('financeCircleIndicator').remove();}M.toast({html: 'Added data successfully!'});return false;" method="post" name="form1"> 
        <input type="hidden" name="date" id="budgetDate">
        <div class="modal-content">
          <div class="input-field input-border">
            <input type="number" name="qty" step=".01" required id="bm_amount" autocomplete='off' autofocus> 
            <label>Amount you
              spent</label>
            </div>
          <div>
            <div class="input-border input-field">
              <select id="bm_select"> <option value="Grocery Shopping">Grocery Shopping</option> <option value="Education">Education</option> <option value="Clothes Shopping">Clothes Shopping</option> <option value="Bills">Bills</option> <option value="Entertainment">Entertainment</option> <option value="Home Improvement">Home Improvement</option> <option value="Holidays">Holidays</option> <option value="Other">Other</option> </select>
            </div>
          </div>
          <div class="sm:fixed-bottom" style="padding: 10px;background: var(--bg-color);width:100%;z-index:99999">
            <button type="submit" name="Submit" style="width:100%" class="btn btn-boxy z-depth-0 waves-effect btn-large black-text blue-grey lighten-3"><i class="material-icons left hide-on-med-and-down">save</i>Save expense</button>
          </div>
        </div>
      </form>
    </div>
    <div class="fixed-action-btn">
      <a class="black-text btn-large waves-effect modal-trigger z-depth-1 overflow:hidden" href="#addItem" id="fab">
        <i class="black-text large material-icons left">edit</i>
        <span class="black-text" style="text-transform:none!important">Create</span>
      </a>
    </div>
    <div id="addItem" class="modal bottom-sheet">
      <div style="padding: 5px">
      <div class="center"><h5 style="margin-top: 30px;margin-bottom: 30px;">Create new</h5></div>
      <?php  if ($_SESSION['purpose'] !== 'business') { ?>
        <div class="row overflow:visible no-margin">
          <a class="card-addItem col s3 card-panel z-depth-0 transparent card center modal-close avatar" href="#/add/kitchen"><i class="waves-effect border-icon darken-3 circle material-icons">microwave</i><br><h6 class="truncate">Kitchen</h6></a>
          <a class="card-addItem col s3 card-panel z-depth-0 transparent card center modal-close avatar" href="#/add/bedroom"><i class="waves-effect border-icon darken-3 circle material-icons">bedroom_parent</i><br><h6 class="truncate">Bedroom</h6></a>
          <a class="card-addItem col s3 card-panel z-depth-0 transparent card center modal-close avatar" href="#/add/bathroom"><i class="waves-effect border-icon darken-3 circle material-icons">bathroom</i><br><h6 class="truncate">Bathroom</h6></a>
          <a class="card-addItem col s3 card-panel z-depth-0 transparent card center modal-close avatar" href="#/add/garage"><i class="waves-effect border-icon darken-3 circle material-icons">garage</i><br><h6 class="truncate">Garage</h6></a>
        </div>
        <div class="row overflow:visible no-margin">
          <a class="card-addItem col s3 card-panel z-depth-0 transparent card center modal-close avatar" href="#/add/dining_room"><i class="waves-effect border-icon darken-3 circle material-icons">dining</i><br><h6 class="truncate">Dining</h6></a>
          <a class="card-addItem col s3 card-panel z-depth-0 transparent card center modal-close avatar" href="#/add/family"><i class="waves-effect border-icon darken-3 circle material-icons">living</i><br><h6 class="truncate">Family</h6></a>
          <a class="card-addItem col s3 card-panel z-depth-0 transparent card center modal-close avatar" href="#/add/laundry"><i class="waves-effect border-icon darken-3 circle material-icons">local_laundry_service</i><br><h6 class="truncate">Laundry</h6></a>
          <?php 
            $sql = $dbh->prepare("SELECT * FROM roomnames WHERE login_id=:sessid OR login_id=:syncid");
            $sql->execute(array(
                ':sessid' => $_SESSION['id'],
                ':syncid' => decrypt($_SESSION['syncid'])
            ));
            $users = $sql->fetchAll();
            if(count($users) == 0) {
              ?>
                <a class="card-addItem col s3 card-panel z-depth-0 transparent card center modal-close avatar" href="#/add/camping"><i class="waves-effect border-icon darken-3 circle material-icons">park</i><br><h6 class="truncate">Camping</h6></a>
              <?php
            }
            else {
            ?>
          <a href="javascript:void(0)" class="col s3 card-panel z-depth-0 card-addItem transparent card center avatar dropdown-trigger" data-target="dropdownMoreRooms"><i class="waves-effect border-icon darken-3 circle material-icons">more_horiz</i><br><h6 class="truncate">More</h6></a>
          <?php } ?>
        </div>
        <?php } ?>
        <div class="row no-margin" style="overflow: visible!important;">
          <a class="card-addItem col s4 card-panel z-depth-0 transparent card center modal-close avatar" href="#/add/reminder"><i style="font-family: 'Material Icons Two Tone'!important;" class="color:default border-two-tone border-icon darken-3 circle material-icons">check_circle</i><br><h6 class="truncate">Reminder</h6></a>
          <a class="card-addItem col s4 card-panel z-depth-0 transparent card center modal-close avatar" href="#/add/shopping-list"><i style="font-family: 'Material Icons Two Tone'!important;" class="color:default border-two-tone border-icon darken-3 circle material-icons">receipt_long</i><br><h6 class="truncate">Shopping List</h6></a>
          <a class="card-addItem col s4 card-panel z-depth-0 transparent card center modal-close avatar modal-trigger" href="#addNote"><i class="border-icon darken-3 circle material-icons border-two-tone color:default" style="font-family: 'Material Icons Two Tone'!important;">sticky_note_2</i><br><h6 class="truncate">Note</h6></a>
        </div>
        <ul id="dropdownMoreRooms" class="dropdown-content">
        <li><a href="javascript:void(0)" href="#/add/camping" class="waves-effect w-full"><i class="material-icons">park</i>Camping Supplies</a></li>
                  <?php try
{
    
    $sql = $dbh->prepare("SELECT * FROM roomnames WHERE login_id=:sessid OR login_id=:syncid");
    $sql->execute(array(
        ':sessid' => $_SESSION['id'],
        ':syncid' => decrypt($_SESSION['syncid'])
    ));
    $users = $sql->fetchAll();
    foreach ($users as $row)
    {
?><li><a  href="#/add/<?=$row['id'];?>" class="waves-effect w-full"><i class="material-icons"><?=$row['qty'] ?></i><?=strip_tags($row['name']); ?></a></li><?php
    }
    
}
catch(PDOexception $e)
{
    echo "Error is: " . $e->getmessage();
} ?>
        </ul>
      </div>
    </div>
    <div id="ajaxLoader"></div>
    <div id="searchResults" class="modal"></div>
    <div id="pwaInstallPrompt" class="modal center"><div class="modal-content"> <h5>Get the Smartlist App!</h5> <p>Add our app to your home screen and access on your phone, tablet, or anywhere!</p> <button id="pwaInstallPromptAddButton" class="btn blue-grey darken-3 btn-round waves-effect waves-light">Install!</button> </div></div>
    <div id="croom_rclick" class="modal"> <a href="#" id="add_croom" class="waves-effect color:default rclick_link">Add an item</a> <a id="del_croom" class="waves-effect color:default rclick_link">Delete</a> <a class="waves-effect color:default" id="croom_rclick_id" style="padding: 15px 20px;width: 100%;margin:0"></a> </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
    <script src="https://unpkg.com/@ckeditor/ckeditor5-inspector@2.2.1/build/inspector.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/js/materialize.min.js"></script>
    <script src="./js/autocomplete.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/ManuTheCoder/JS-Essentials/essentials.min.js"></script>
    <script src="./js/keyboardShortcuts.js"></script>
    <script src="./js/main.js?v=<?=rand(0, 99999);?>"></script>
    <script type="module" >
        
        import { getLoanMonthlyFromLoan, calculateFutureValue, getDiscount, getPercentage, getTax } from "./js/calculators.js";
        import "./js/eventListeners.js";
        import {filterSearchResults, filterResults} from "./js/search.js";
        import {item} from "./js/itemPopup.js";
        import {bm_add} from "./js/addBudgetMeter.js";
        import {chipValue} from "./js/chipValue.js";
        import {fileChange} from "./js/upload.js";
        import {sortTable} from "./js/sortTable.js";
        import {loadURL} from "./js/loadUrl.js";
        import {sendData} from "./js/sendData.js";
        import {viewNote} from "./js/viewNote.js";
        import {showNotification} from "./js/notification.js";
        import {copyToClipboard} from "./js/clipboard.js";
        
        window.getLoanMonthlyFromLoan = getLoanMonthlyFromLoan;
        window.calculateFutureValue = calculateFutureValue;
        window.getDiscount = getDiscount;
        window.getPercentage = getPercentage;
        window.getTax = getTax;
        window.filterSearchResults=filterSearchResults;
        window.item=item;
        window.bm_add=bm_add;
        window.chipValue=chipValue;
        window.fileChange=fileChange;
        window.filterResults=filterResults;
        window.sortTable=sortTable;
        window.loadURL=loadURL;
        window.sendData=sendData;
        window.viewNote=viewNote;
        window.showNotification=showNotification;
        window.copyToClipboard=copyToClipboard;
    </script>
    <script async>
      const user = <?=json_encode($_USER);?>;

      // Tells whether an item popup is active or not
      var itemState = 0;
      // Switches the page on the `hashChange` event
      window.addEventListener("hashchange",()=>{"#/results" !== window.location.hash&&getHashPage()}); 
      // This is the main function for getting the page based on the window hash, for example: "#/settings"
      function getHashPage(e = "") {
        document.getElementById("app").focus();
        var xhttp = new XMLHttpRequest();
        (xhttp.onreadystatechange = function () {
          if (
            4 == this.readyState &&
            200 == this.status &&
            "true" !== this.responseText
          )
            return (window.location.href = "https://smartlist.ga/dashboard/auth"), !1;
        }),
          xhttp.open("GET", "https://smartlist.ga/dashboard/user/loginStatus.php", !0),
          xhttp.send();

        var el = "#app"
        // If there is no hash assigned to the window...
        if(!window.location.hash) {
          window.location.hash = "#/home";
          new loadPage(user.homePage, el, (e == "hide" ? {loader: false}: null))
          return false;
        }
        document.querySelector('meta[name="theme-color"]').setAttribute("content","#fff");
        document.documentElement.classList.contains("_darkTheme") && document.querySelector('meta[name="theme-color"]').setAttribute("content","#212121");
var url = "";
        // List of all pages. Add a `case` statement to create a new page
        switch(window.location.hash.replace("#", "")) {
          case "/dashboard": user.homePage; break;
          case "/user-dashboard": url = "./user/dashboard.php"; break; 
          case "/house-profile": url = "./user/house-profile.php"; break; 
          case "/profile": url = "./user/profile.php"; break; 
          case "/add/list": url = "./user/lists/quickAddList.php"; break;
          case "/rooms/kitchen": url = "./rooms/viewRoom.php?room=products"; break;
          case "/rooms/bedroom": url = "./rooms/viewRoom.php?room=bedroom"; break;
          case "/rooms/bathroom": url = "./rooms/viewRoom.php?room=bathroom"; break;
          case "/rooms/garage": url = "./rooms/viewRoom.php?room=garage"; break;
          case "/rooms/family": url = "./rooms/viewRoom.php?room=family"; break;
          case "/rooms/storage": url = "./rooms/viewRoom.php?room=storageroom"; break;
          case "/rooms/dining": url = "./rooms/viewRoom.php?room=dining_room"; break;
          case "/rooms/camping": url = "./rooms/viewRoom.php?room=camping"; break;
          case "/rooms/laundry": url = "./rooms/viewRoom.php?room=laundry"; break;
          case "/add/kitchen": url = "./rooms/quickaddRoom.php?room=kitchen"; break;
          case "/add/bedroom": url = "./rooms/quickaddRoom.php?room=bedroom"; break;
          case "/add/bathroom": url = "./rooms/quickaddRoom.php?room=bathroom"; break;
          case "/add/garage": url = "./rooms/quickaddRoom.php?room=garage"; break;
          case "/add/family": url = "./rooms/quickaddRoom.php?room=family"; break;
          case "/add/storage": url = "./rooms/quickaddRoom.php?room=storage"; break; 
          case "/add/dining": url = "./rooms/quickaddRoom.php?room=dining_room"; break; 
          case "/add/camping": url = "./rooms/quickaddRoom.php?room=camping"; break;
          case "/add/laundry": url = "./rooms/quickaddRoom.php?room=laundry"; break;
          case "/add/custom-room": url = "./rooms/custom_room/add_room.php"; break;
          case "/add/shopping-list": url = "./user/grocerylist/quickadd.php"; break; 
          case "/add/reminder": url = "./user/todo/quickadd.php"; break; 
          case "/add/subscription": url = "./user/finance/subscription_quickadd.php"; break;
          case "/my-finances/set-plan": url="./user/finance/set-goal.php"; break;
          case "/my-finances/insights": url="./user/finance/insights.php"; break;
          case "/my-finances/calculators": url="./user/finance/calculators.php"; break;
          case "/notifications": url = "./user/notifications.php"; break; 
          case "/notes": url = "./user/notes/index.php";break;
          case "/starred": url = "./rooms/starred-items.php";break;
          case "/maintenance": url = "./user/maintenance.php?card";break;
          case "/trash": url = "./user/trash/index.php";break;
          case "/settings": url = "./user/settings/index.php";break;
          case "/my-finances": url = "./user/finance/index.php"; break; 
          case "/my-finances/payments": url = "./user/finance/payments.php"; break; 
          case "/shopping-assistant": url = "./user/shopping_assistant/index.php"; break;
          <?php
            $sql = $dbh->prepare("SELECT * FROM roomnames WHERE login_id=:sessid OR login_id=:syncid");
            $sql->execute(array(
                ':sessid' => $_SESSION['id'],
                ':syncid' => decrypt($_SESSION['syncid'])
            ));
            $users = $sql->fetchAll();
            foreach ($users as $row) {
                print 'case "/rooms/' . $row['id'] . '": url = "./rooms/custom_room/ajax_croom_loader.php?room=' . $row['id'] . '"; break;';
                print 'case "/add/' . $row['id'] . '": url = "./rooms/custom_room/custom_room_add.php?room=' . $row['id'] . '&name="+encodeURI(' . json_encode($row['name']) . '); break;';
            }
          ?>
          default: 
            url = user.homePage
        }
        new loadPage(url, el,  (e == "hide" ? {loader: false} : null))
      }
      function hideAccountDropdown() {
        $('#accountDropdown').toggleClass('fadeOut');
        setTimeout(function() {$('#accountDropdown').toggleClass('hide')}, 200);
      }
        // Set the input, `#budgetDate`, to the current date, formatted in MM/DD/YYYY
        window.addEventListener("load", () => {
        document.getElementById("accountDropdown.avatar").src = user.avatar;
        document.getElementById("src").src = user.avatar;
        M.Dropdown.init(document.querySelectorAll(".dropdown-trigger"), {
            constrainWidth: !1,
        });
        document.getElementById("accountDropdown.name").innerHTML = user.name;
        document.getElementById("accountDropdown.email").innerHTML = user.email;
        document.querySelector("#houseName span").innerHTML = user.houseName;
        document.querySelector("#houseName2").innerHTML = user.houseName;
        document.querySelector("#houseName1").innerHTML = user.houseName;
        document.getElementById("budgetDate").value = moment().format("M/D/Y");
        document.getElementById(
            "imgAvatar"
        ).innerHTML = `<img src="${user.avatar}" loading="lazy" style="width:100%;width: 40px;height: 40px;" class="circle">`;
        });

        window.addEventListener("keyup", (e) => {
        27 === e.keyCode &&
            (function () {
            $("#accountDropdown").addClass("fadeOut");
            setTimeout(function () {
                $("#accountDropdown").addClass("hide");
            }, 200);
            })();
        });

        window.addEventListener("focus", () => {
        if (document.querySelector(".material-tooltip")) { document.querySelectorAll(".material-tooltip").forEach(e => e.remove()) }
        if (window.location.hash.includes("#/rooms/")) {
            getHashPage("hide");
        }
        });

        window.addEventListener("popstate", (e) => {
        var a = true;
        if (!$(".modal").is(":visible")) {
            // getHashPage();
            a = false;
        } else {
            e.preventDefault();
            $(".modal").modal("close");
            a = true;
        }
        if (a === true) {
            history.pushState(null, null, window.location.href);
        }
        if(document.querySelectorAll(".sidenav-active")) {document.querySelectorAll(".sidenav-active").forEach(el =>el.classList.remove("sidenav-active"))}
        });

        window.addEventListener("keydown", (e) => {
        switch (
        e.keyCode
        ) {
            case 27:
                $("#item_sidenav").sidenav("close");
                if (window.innerWidth < 992) { M.Sidenav.getInstance(document.getElementById('slide-out')).close() }
                break;
        }
        });

        // offline and events
        window.addEventListener("offline", () => {
        M.Toast.dismissAll();
        M.toast({ html: "You are offline. Please connect to the internet" });
        });
        window.addEventListener("online", () => {
        M.Toast.dismissAll();
        M.toast({ html: "Network connection restored!" });
        });


    </script>
  </body>
</html>