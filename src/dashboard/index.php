<?php
ini_set("display_errors", 1);
// Sets the cookies to include all domains with "smartlist.ga"
session_set_cookie_params(0, "/", ".smartlist.ga");
session_start();
$_SESSION['id'] = intval($_SESSION['id']);
require "cred.php";
if(!isset($_SESSION['valid'])) {header("Location: https://smartlist.ga/dashboard/auth");exit();}

define("_fileURL", "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
if (_fileURL == "https://smartlist.ga/dashboard") {
    // Redirect users from "https://smartlist.ga/dashboard" to "https://smartlist.ga/dashboard/"
    header("Location: https://smartlist.ga/dashboard/");
    exit();
}
// Create a new PDO object to connect to the database
$dbh = new PDO("mysql:host=".App::server.";dbname=".App::database, App::username, App::password);
$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$sql = $dbh->prepare("SELECT * FROM login WHERE id=:sessid");
$_config = json_decode(file_get_contents("/home/smartlis/public_html/config.json"));
if($_config->maintenance === true && !in_array($_SERVER['REMOTE_ADDR'], $_config->authorizedIpList)) {
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

$sql = $dbh->prepare($sql = "SELECT * FROM bm WHERE login_id=:sessid ORDER BY `id` DESC LIMIT 1");
$sql->execute(array( ':sessid' => $_SESSION['id'] ));
$users = $sql->fetchAll();
$noBudgetToday = false;
// By default, the budget for today is true
if (count($users) !== 1) {
  // If user hasn't entered a budget at all, and there is no data, set the variable $noBudgetToday to true
    $noBudgetToday = true;
}
foreach ($users as $row) {
    if (decrypt($row['name']) !== date('m/d/Y')) {
      // If user hasn't entered a budget today, set the variable $noBudgetToday to true
        $noBudgetToday = true;
    }
}
require "colorSwitch.php";

function sanitize_output($buffer) {
    // Minifies the output
    require_once App::directory.'dashboard/lib/Minify/HTML.php';
    $buffer = Minify_HTML::minify($buffer, array());
    return $buffer;
}
ob_start('sanitize_output');
?>
<!DOCTYPE html>
<html lang="en" class="<?=(isset($_COOKIE['dark']) && ($_COOKIE['dark']) == 'true' ? '_darkTheme' : '')?>">
  <head>
    <script>localStorage.getItem("theme")&&"true"==localStorage.getItem("theme")&&document.documentElement.classList.add("_darkTheme");</script>
    <title>Dashboard</title>
    <link rel="preconnect" href="//fonts.googleapis.com">
    <link rel="preconnect" href="//fonts.gstatic.com" crossorigin>
    <link href="//fonts.googleapis.com/css2?family=Outfit&display=swap" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    
    <link rel="preload" href="//cdn.jsdelivr.net/npm/apexcharts" as="script"> <link rel="preload" href="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" as="script"> <link rel="preload" href="//cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/css/materialize.min.css" as="style">
    <base href="//<?=App::domain;?>/dashboard/">
    <script src="//cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/css/materialize.min.css">
    <link rel="manifest" href="manifest.webmanifest">
    <link rel="apple-touch-icon" href="//<?=App::domain;?>a/dashboard/icon/roofing.svg" />
    <link rel="shortcut icon" href="//i.ibb.co/HPtyvJS/logo-z3yoqm-modified-removebg-preview-modified.png">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="./css/style.css?v=002">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="theme-color" content="#<?=(isset($_COOKIE['dark']) && ($_COOKIE['dark']) == 'true' ? '212121' : '#fff')?>">
    <meta name="title" content="Smartlist - the free home inventory app">
    <meta property="og:title" content="Smartlist" />
    <meta name="robots" content="index, nofollow" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <style>
      :root {--nav-scroll-color:#<?=$userTheme['navScrollColor'];?>;--dark:#<?=$userTheme['darkTheme']?>; --font-color: #303030; --light: #<?=$userTheme['light']; ?>; --regular: #<?=$theme; ?>; --bg-color: #fff; --sidenavf-color: #606060; --sidenavbg-color: <?=$overlayColor; ?>; --navbar-color: #<?=$theme; ?>; --sidenavbg1color: #fff; --x: 0px }
      ._darkTheme #fab {box-shadow: none!important;background:#<?=($userTheme['darkTheme'] == '1c2429' ? '013b5e': $userTheme['darkTheme']);?>!important}
      ._darkTheme #fab *:not(span) {opacity: .9!important}
      .btn-boxy {border-radius: 15px!important}
      .btn-border {border: 1px solid rgba(200, 200, 200, .9)}
      .btn-border:focus {border-color: rgba(200, 200, 200, 1)}
      @media only screen and (min-width: 992px) {
        #__navBar, #item_sidenav nav,#edit_sidenav nav {padding-top: 5px!important;padding-bottom: 5px!important;height:auto!important;}
        /* #searchBar {padding-top: 5px!important;padding-bottom: 5px!important;} */
        #slide-out {z-index: 1 !important;padding-top: 95px!important;}
        /* .sidenav-rail #slide-out {width:65px} */
        /* .sidenav-rail #slide-out .links a{overflow:hidden;width:100%} */
      }
      .indicator {position:relative;left: 10px; margin-top: 20px;width:10px;height:10px}
      @media only screen and (max-width: 992px) {
        #__navBar,#item_sidenav nav,#edit_sidenav nav {padding-top: 3px!important;padding-bottom: 3px!important;height:auto!important;}
        .sm\:fixed-bottom {position:fixed;bottom:0;left:0;}
      }
      .card .hoverP {transform:scale(1);opacity:0;visibility:hidden;transition: all .1s;margin-top: 19px!important;}
      .card:hover .hoverP {transform:scale(.95);opacity:.7;visibility:visible}
      /* accessibility */
      .chip-border:hover {border-color: rgba(200, 200, 200, .9)!important;}
      #app tr:focus-visible{box-shadow: 0px 0px 0px 5px #1e88e5 !important;border-bottom-color: transparent!important;border-radius: 1px!important;}
      .focus-outline:focus-visible {box-shadow: 0px 0px 0px 5px #1e88e5 inset !important;}
      #slide-out a:focus-visible {box-shadow: 0px 0px 0px 5px #1e88e5 inset !important;}
      #app:focus-visible,nav a:focus-visible,#accountDropdown a:focus-visible,#app .btn-floating.btn-flat:focus-visible,#fab:focus-visible,.card-panel:focus-visible,.dropdown-content a:focus-visible {box-shadow: 0px 0px 0px 5px #1e88e5 !important}

      .divider {width: 90%!important;margin-left: 5%!important}
      #__navBar:not(.blue-grey) {background: var(--bg-color) !important;}
      #__navBar {transition: background .3s,border-color .3s!important;border-bottom: 1px solid rgba(200,200,200,.5)!important}
      .blue-grey#__navBar {border-color: var(--nav-scroll-color) !important;background:var(--nav-scroll-color)!important}
      #__navBar a {color:#404040 !important}
      ._darkTheme .blue-grey#__navBar {background:#404040 !important;border-color:#404040!important}
      ._darkTheme nav a.brand-logo.white-text {color:#fff !important}
      .chip {box-shadow:none!important}
	  ._darkTheme .brand-logo {color:#fff!important}
      #accountDropdown {border:1px solid rgba(200, 200, 200, .8);--tw-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
box-shadow: var(--tw-ring-offset-shadow, 0 0 var(--font-color)), var(--tw-ring-shadow, 0 0 var(--font-color)), var(--tw-shadow);
padding: 10px;border-radius: 28px;position:fixed;top:70px;right:20px;width: 400px;z-index: 99999999999999999999;background: #fff;animation: accountDropdown .15s forwards cubic-bezier(.4,0,.2,1);transform-origin: top right;}
      .fadeOut#accountDropdown {animation: accountDropdownHide .15s forwards cubic-bezier(.4,0,.2,1);}
      @keyframes accountDropdown {0% {transform:scale(.9);opacity:0;}}
      @keyframes accountDropdownHide {0% {transform:scale(1);opacity:1;}100% {transform:scale(.9);opacity:0;}}
      ._darkTheme #accountDropdown {color:white;background: #505050}
      input:not(._darkTheme input):focus + label {color:var(--navbar-color)!important}
      ._darkTheme #bmmodal .btn.blue-grey {background: #404040!important;}
      /* Helper classes */
      .no-margin {margin:0!important;}
      .w-full {width: 100%!important;}
      .h-auto {height: auto}
      .line-height\:40 {line-height: 40px!important}
      .border-radius\:10 {border-radius: 10px;}
      .color\:default {color: var(--font-color) !important;}
      .position\:fixed {position:fixed;}
      .border-full {border-radius: 9999px!important}
      .min-height\:300px {min-height:300px}
      .object-fit\:cover {object-fit:cover}
      .card-addItem {overflow:visible!important;border-radius:28px;border:none!important;color:var(--font-color)!important;border-color:transparent!important;}
      .pointer-events\:none {pointer-events: none}
      .overflow\:hidden {overflow: hidden}
      .overflow\:visible {overflow: visible!important}
      .z\:999999999999999 {z-index: 999999999999999}
    </style>
  </head>
  <body class="sidenav-rail">
    <nav id="searchBar" class="hide w-full position:fixed" style="top:0;left:0!important">
      <div class="nav-wrapper">
        <form id="searchForm" action="./user/search.php"> 
          <div class="input-field border-full" style="background: rgba(200,200,200,.2);">
            <input id="search" type="search" name="query" autocomplete="off" class="autocomplete transparent" required autofocus onblur="this.focus()" onkeyup="if(event.keyCode==27) $('#searchBar').toggleClass('hide')">
            <label class="label-icon" for="search"><i class="z:999999999999999 material-icons search1 color:default" onclick="$('#searchBar').addClass('hide')">arrow_back</i><i class="material-icons searchClose position:fixed color:default z:999999999999999">search</i></label>
            <i class="z:999999999999999 material-icons hide-on-small-only close color:default position:fixed" onclick="$('#searchBar').addClass('hide')">close</i>
          </div>
        </form>
      </div>
    </nav>
<div id="accountDropdown" class="center hide fadeOut">
<br><br>
  <a class="modal-trigger circle waves-effect" href="#avatarChange"><img src="<?=$_SESSION['avatar'];?>" style="width:100px;height:100px;" class="circle"></a>
  <br>
  <h6><b><?=$_SESSION['name'];?></b></h6>
  <p><?=$_SESSION['email'];?></p>
  <a class="btn waves-effect blue-grey btn-round lighten-5 black-text" style="margin-top:15px;margin-bottom:25px;width: 300px;" href="#/settings" onclick="$('#accountDropdown').toggleClass('fadeOut');setTimeout(function() {if(!$('#accountDropdown').is(':visible')) {$('#accountDropdown').toggleClass('hide');}}, 200);">Account settings</a>
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
        onclick="$('#slide-out').sidenav('open')"
        ><i
          class="black-text material-icons line-height:40"
          >menu</i
        ></a
      >
    </li>
    <li>
      <a id="houseName" class="brand-logo left white-text truncate hide-on-med-and-down color:default" style="color:var(--font-color)!important;max-width: 93vw;transfsorm: none!important;margin-left: 15px!important;line-height: 60px!important;" href="#/house-profile"><span style="transform:scale(.6);font-size: 18px!important;position:relative;top: -2.5px;"><?=(!empty(trim($_SESSION['houseName'])) ? $_SESSION['houseName']:"Smartlist")?></span></a>
      <a id="houseName1" class="brand-logo center white-text truncate color:default" style="color:var(--font-color)!important;max-width: 93vw;transform:translateX(-50%) scale(.6)" href="#/house-profile"><?=(!empty(trim($_SESSION['houseName'])) ? $_SESSION['houseName']:"Smartlist")?></a>
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
        onclick="$('#searchBar').toggleClass('hide');$('#search').focus()"
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
        onkeyup="if(event.keyCode===13)this.click()"
        onmousedown="event.stopPropagation();$('#accountDropdown').toggleClass('fadeOut');setTimeout(function() {if(!$('#accountDropdown').is(':visible')) {$('#accountDropdown').toggleClass('hide');}}, 200)"
        style="margin-left: 3px !important"
        >
        <i class="material-icons black-text line-height:40">account_circle</i>
        </a
      >
    </li>
  </ul>
</nav>


    <input id="copyToClipboard" type="hidden">
    <div id="avatarChange" class="modal">
      <div class="modal-content">
        <center> <img class="circle" src="<?=$_SESSION['avatar']; ?>" loading="lazy" class="center" style="width: 100px" id="src" alt=""> </center>
        <form method="POST" action="./user/settings/changeAvatar.php" id="avatarChangeForm">
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
                  <span class="white-text">File</span>
                  <input type="file" id="input_img" onchange="fileChange(this, function(e) {document.getElementById('src').src=e;document.getElementById('avatar_file_upload_input').value = e;})"  accept="image/*">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path" type="text" placeholder="Upload a file..." disabled>
                </div>
              </div>
            </div>
            <div id="test2" class="col s12">
              <br><br>
              <div class="input-field">
                <label>URL</label>
                <input name="avatar" type="text" id="avatar_file_upload_input" oninput="document.getElementById('src').src=this.value;" autocomplete="off">
              </div>
            </div>
            <div id="test3" class="col s12">
              <br><br>
              <button onclick="document.getElementById('src').src='//3.bp.blogspot.com/-qDc5kIFIhb8/UoJEpGN9DmI/AAAAAAABl1s/BfP6FcBY1R8/s320/BlueHead.jpg';document.getElementById('avatar_file_upload_input').value='//3.bp.blogspot.com/-qDc5kIFIhb8/UoJEpGN9DmI/AAAAAAABl1s/BfP6FcBY1R8/s320/BlueHead.jpg'" class="btn red darken-3 waves-effect waves-light">Revert to default</button>
            </div>
          </div>
          <br><br>
          <button class="blue-grey darken-3 btn waves-effect">Change Profile Picture</button>
        </form>
      </div>
    </div>
    <div id="feedbackBeta" class="modal h-auto border-radius:10">
      <img loading="lazy" src="<?=$_config->dashboard->popup->image;?>" style="height: 300px;" alt="" class="w-full object-fit:cover">
      <div class="modal-content">
        <h5><?=$_config->dashboard->popup->title;?></h5>
        <p><?=$_config->dashboard->popup->content;?><p>
        <center>
          <button class="modal-close btn <?=$_config->dashboard->popup->button->color;?> darken-3 waves-effect waves-light btn-round" onclick="localStorage.setItem('feedbackBeta', 'true')"><?=$_config->dashboard->popup->button->text;?><i class="material-icons right">arrow_forward_ios</i></button>
        </center>
      </div>
    </div>
    <ul id="slide-out" class="z-depth-0 sidenav sidenav-fixed">
      <li class="links hide-on-large-only"><a class="subheader truncate" href="javascript:void(0)" onclick="return false" rel='nofollow'><?=(!empty(trim($_SESSION['houseName'])) ? $_SESSION['houseName']:"Home")?></a></li>
      <li class="sidenav-close links"><a oncontextmenu="return false" onclick="window.location.hash='#/user-dashboard';sidenav_highlight(this)" class="waves-effect" href="#/user-dashboard"><i class="material-icons">dashboard</i>Dashboard</a></li>
      <?php if ($_SESSION['purpose'] !== 'business')
{ ?>
      <li class="sidenav-close links"><a oncontextmenu="return false" target="_blank" class="waves-effect" href="//<?=App::domain;?>/dashboard/user/shopping_assistant/"><i class="material-icons">view_carousel</i> Shopping Assistant</a></li>
      <?php
} ?>
      <li class="sidenav-close links"><a oncontextmenu="return false" onclick="sidenav_highlight(this)" class="waves-effect" href="#/my-finances"><i class="material-icons">payments</i> <?=($_SESSION['purpose'] !== 'business' ? "My expenses" : "Finances")?> <?=($noBudgetToday == true ? " <div id='financeCircleIndicator' class='circle red darken-3 right indicator'></div>" : ""); ?></a></li>
      <?php if ($_SESSION['purpose'] == 'business')
{ ?>
      <li class="sidenav-close links"><a oncontextmenu="return false" onclick="sidenav_highlight(this)" class="waves-effect" href="#/my-finances/calculators"><i class="material-icons">calculate</i> Finance calculators</a></li>
      <li class="sidenav-close links"><a oncontextmenu="return false" onclick="sidenav_highlight(this)" class="waves-effect" href="#/my-finances/payments"><i class="material-icons">toll</i> Payments</a></li>
<?php } ?>
      <?php if ($_SESSION['purpose'] !== 'business')
{ ?>
      <li class="sidenav-close links"><div class="divider"></div></li>
      <li class="sidenav-close links"><a oncontextmenu="return false" onclick="sidenav_highlight(this)" class="subheader">Rooms</a></li>
      <?php if ($_SESSION["studentMode"] !== "true")
    { ?>
      <li class="sidenav-close links"><a oncontextmenu="return false" onclick="sidenav_highlight(this)" class="sidenav-close waves-effect" href="#/rooms/kitchen"><i class="material-icons-round left">microwave</i>Kitchen</a></li>
      <?php
    } ?>
      <li class="sidenav-close links"><a oncontextmenu="return false" onclick="sidenav_highlight(this)" class="sidenav-close waves-effect" href="#/rooms/bedroom"><i class="material-icons-round left">bedroom_parent</i>Bedroom</a></li>
      <?php
    try
    {
        
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
                print "<li class='links'><a oncontextmenu='croom_rclick(" . $row['id'] . ");return false' onclick='sidenav_highlight(this)' class=\"waves-effect sidenav-close\" href='#/rooms/" . $row['id'] . "'><i class=\"material-icons-round left\">" . (strtolower($row['name'])=='master bedroom'?"bedroom_parent":$row['qty']) . "</i>" . $row["name"] . "</a></li>\n";
            }
        }
        
    }
    catch(PDOexception $e)
    {
        echo "Error is: " . $e->getmessage();
    } ?><li class="sidenav-close links"><a oncontextmenu="return false" onclick="sidenav_highlight(this)" class="sidenav-close waves-effect" href="#/rooms/bathroom"><i class="material-icons-round left">bathroom</i>Bathroom</a></li>
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
            if (strpos(strtolower($row['name']) , 'bathroom') !== false)
            {
                print "<li class='links'><a oncontextmenu='croom_rclick(" . $row['id'] . ");return false' onclick='sidenav_highlight(this)' class=\"waves-effect sidenav-close\" href='#/rooms/" . $row['id'] . "'><i class=\"material-icons-round left\">" . $row['qty'] . "</i>" . $row["name"] . "</a></li>\n";
            }
        }
        
    }
    catch(PDOexception $e)
    {
        echo "Error is: " . $e->getmessage();
    }
    if ($_SESSION["studentMode"] !== "true")
    { ?>
      <li class="sidenav-close links"><a oncontextmenu="return false" onclick="sidenav_highlight(this)" class="sidenav-close waves-effect" href="#/rooms/garage"><i class="material-icons-round left">garage</i>Garage</a></li>
      <?php
    } ?>
      <li class="sidenav-close links"><a oncontextmenu="return false" onclick="sidenav_highlight(this)" class="sidenav-close waves-effect" href="#/rooms/family"><i class="material-icons-round left">living</i>Family</a></li>
      <?php if ($_SESSION["studentMode"] !== "true")
    { ?>
      <li class="sidenav-close links"><a oncontextmenu="return false" onclick="sidenav_highlight(this)" class="sidenav-close waves-effect" href="#/rooms/dining"><i class="material-icons-round left">dining</i>Dining Room</a></li>
      <li class="sidenav-close links"><a class="sidenav-close waves-effect" onclick="sidenav_highlight(this)" href="#/rooms/laundry" ><i class="material-icons-round left">local_laundry_service</i>Laundry room</a></li>
      <li class="sidenav-close links"><a oncontextmenu="return false" onclick="sidenav_highlight(this)" class="sidenav-close waves-effect" href="#/rooms/camping" ><i class="material-icons-round left">park</i>Camping Supplies</a></li>
      <?php
    } ?>
    <li class="sidenav-close links"><a oncontextmenu="return false" onclick="sidenav_highlight(this)" class="sidenav-close waves-effect" href="#/rooms/storage"><i class="material-icons-round left"><?=($_SESSION["studentMode"] !== "true" ? "inventory_2" : "school") ?></i><?=($_SESSION["studentMode"] == "true" ? "Study Room" : "Storage Room") ?></a></li>
<?php
} ?>
      <li class="sidenav-close"><div class="divider"></div></li>
      <li class="sidenav-close"><a class="subheader"><?php if ($_SESSION['purpose'] !== 'business')
{ ?>Other Rooms<?php
}
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
                print "<li class='links'><a oncontextmenu='croom_rclick(" . $row['id'] . ");return false' onclick='sidenav_highlight(this)' class=\"waves-effect sidenav-close\" href='#/rooms/" . $row['id'] . "'><i class=\"material-icons-round left\">" . $row['qty'] . "</i>" . $row["name"] . "</a></li>\n";
            }
        }
    }
    
}
catch(PDOexception $e)
{
    echo "Error is: " . $e->getmessage();
} ?>
      <li class="links"><a class="waves-effect sidenav-close" href="#/add/custom-room"><i class="material-icons-round">add_location_at</i>Create room</a></li>
      <li class="pointer-events:none"> <div class="divider"></div> </li>
      <li class="links pointer-events:none"><a class="subheader" href="javascript:void(0)" onclick="return false" rel='nofollow'>Other</a></li>
      <li class="sidenav-close links"><a onclick="sidenav_highlight(this)" class="sidenav-close waves-effect" href="#/notes" ><i class="material-icons-round left">sticky_note_2</i>Notes</a></li>
      <?php if ($_SESSION['purpose'] !== 'business')
{ ?>
      <li class="sidenav-close links"><a onclick="sidenav_highlight(this)" class="sidenav-close waves-effect" href="#/starred" ><i class="material-icons-round left">star</i>Starred</a></li>
      <li class="sidenav-close links"><a onclick="sidenav_highlight(this)" class="sidenav-close waves-effect" href="#/maintenance" ><i class="material-icons-round left">construction</i>Maintenance</a></li> 
      <li class="sidenav-close links"><a class="sidenav-close waves-effect" href="//recipe-generator.<?=App::domain;?>/" target="_blank"><i class="material-icons-round left">casino</i>Recipe Generator</a></li>
      <?php
} ?>
      <li class="sidenav-close links"><a onclick="sidenav_highlight(this)" class="sidenav-close waves-effect" href="#/trash" ><i class="material-icons-round left">delete</i>Trash</a></li>
      <li class="pointer-events:none"> <div class="divider"></div> </li>
      <?php if ($_SESSION["studentMode"] !== "true")
{ ?>
      <li class="links"><a class="subheader" href="javascript:void(0)" rel='nofollow'>Events</a></li>
      <li class="links"><a tabindex="0" target="_blank" class="waves-effect sidenav-close" rel="noopener" href="//collaborate.<?=App::domain;?>"><i class="material-icons-round">event_available</i>Join event</a></li>
      <li class="links"><a tabindex="0" target="_blank" class="waves-effect sidenav-close" rel="noopener" href="//collaborate.<?=App::domain;?>/create-event"><i class="material-icons-round">edit_calendar</i>Create
        event</a></li>
      <li class="pointer-events:none"> <div class="divider"></div> </li>
      <?php
} ?>
      <li class="links hide-on-large-only pointer-events:none"><a class="subheader" href="javascript:void(0)" onclick="return false" rel='nofollow'>Account</a></li>
      <li class="sidenav-close links hide-on-large-only"><a class="sidenav-close waves-effect" onclick="sidenav_highlight(this)" href="#/notifications"><i class="material-icons-round left">notifications</i>Notifications</a></li>
      <li class="sidenav-close links hide-on-large-only"><a class="sidenav-close waves-effect" onclick="sidenav_highlight(this)" href="#/settings"><i class="material-icons-round left">manage_accounts</i>Settings</a></li>
      <li class="links hide-on-large-only"><a tabindex="0" class="waves-effect modal-trigger sidenav-close" href="#_feedback"><i class="material-icons-round">reviews</i>Feedback</a></li>
    </ul>
    <div id="_feedback" class="modal bottom-sheet" style="border-top-left-radius: 10px!important;border-top-right-radius:10px!important"> <div class="modal-content"> <div class="center"><h5 style="margin-top: 25px">Feedback</h5> <p>Have any questions, concerns, or feature requests? We're all ears!</p> </div><form id="feedback-form" action="//formspree.io/f/mbjqjeyo" method="POST"> <input type="hidden" name="email" value="manuthecoder@protonmail.com" /> <input type="hidden" name="login_id" value="1" />  <div class="input-field input-border"> <textarea required class="materialize-textarea" name="message" style="margin:0!important;padding-top: 15px!important;padding-bottom:15px!important;min-height: 100px!important"></textarea> <label>Message</label></div> <div style="text-align:right"><button id="my-form-button" class="waves-effect btn blue-grey darken-3 waves-light btn-round">Send <i class="material-icons right">send</i></button></div> <p id="my-form-status"></p> </form> </div> </div>
    <div id="edit_sidenav" style="z-index: 9999999999999999999999999" class="material-sidenav:right z-depth-4 w-full">
        <form action="edit.php" method="POST" id="edit_form">
      <nav class="blue-grey lighten-5 z-depth-0 position:fixed" style="top: 0;left: 0;z-index: 999999999999"> <ul class="no-margin no-padding"> <li><a oncontextmenu="return false;" href="javascript:void(0)" class="nav_scaleIconOnHover transparent btn btn-flat btn-floating black-text waves-effect sidenav-close">
              <i class="material-icons left black-text line-height:40">close</i>
            </a></li><li> <a href="javascript:void(0)" class="sidenav-close btn btn-flat" style="padding-left: 3px!important;color: var(--font-color) !important;line-height: 35px!important;"> Edit</a> </li> </ul>
            <ul class="right">
            <button class="nav_scaleIconOnHover transparent btn btn-flat btn-floating black-text waves-effect sidenav-close" style="margin-right: 8px !important">
              <i class="material-icons left black-text line-height:40" onclick="$('#edit_form').submit()">check</i>
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
                  <button type="button" onclick="var x = document.getElementById(&quot;edit_item_qty&quot;);x.value = parseInt(x.value) + 1;x.focus();" class="btn-large w-full btn-boxy nav_scaleIconOnHover blue-grey lighten-5 z-depth-0 btn-floating btn waves-effect"><i class="material-icons-round black-text">add</i></button>
                </div>
                <div class="col s6">
                  <button type="button" onclick="var x = document.getElementById(&quot;edit_item_qty&quot;);x.value = parseInt(x.value) - 1;x.focus();" class="btn-large w-full btn-boxy nav_scaleIconOnHover blue-grey lighten-5 z-depth-0 btn-floating btn waves-effect"><i class="material-icons-round black-text">remove</i></button>
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
        <h4 class="truncate" id="title" onclick="copyToClipboard(this.innerText)">Title</h4>
        <h5 class="truncate" id="qty" onclick="copyToClipboard(this.innerText)">Quantity</h5>
        <p class="truncate" id="dateID">date</p>
        <div class="chip-suggestions" id="chips" style="margin-top: 10px;margin-bottom: 20px"></div>
        <div class="collection" style="--tw-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);border: 1px solid rgba(200, 200, 200, .8)!important">
          <a href="javascript:void(0)" class="fade-up collection-item waves-effect" id="action_task"><i class="material-icons-round left" accesskey="t">task_alt</i>Add item to shopping list</a>
          <a href="javascript:void(0)" class="fade-up collection-item waves-effect" id="action_qr" target="_blank"><i class="material-icons-round left" accesskey="q">qr_code</i>Generate QR code</a>
          <a href="javascript:void(0)" class="fade-up collection-item waves-effect" id="action_share" target="_blank"><i class="material-icons-round left">forum</i>Invite collaborators &amp;
            comment</a>
          <a href="javascript:void(0)" class="fade-up collection-item waves-effect" id="action_mail" target="_blank"><i class="material-icons-round left" accesskey="m">email</i>Share via email</a>
          <a href="javascript:void(0)" class="fade-up collection-item waves-effect" id="action_wa" onclick="window.open(`//api.whatsapp.com/send/?phone&text=${encodeURIComponent('I currently have' + document.getElementById('qty').innerHTML.replace('Quantity: ', '') + ' ' + document.getElementById('title').innerHTML.toLowerCase().plural())}&app_absent=0`);" accesskey="w"><i class="material-icons-round left">chat</i>Share via WhatsApp</a>
          <a href="javascript:void(0)" class="fade-up collection-item waves-effect" id="action_share_p"><i class="material-icons-round left">share</i>Share</a>
          <a href="javascript:void(0)" class="fade-up collection-item waves-effect" id="action_recipe" target="_blank" accesskey="r"><i class="material-icons-round left">auto_awesome</i>Find a recipe</a>
          <a href="javascript:void(0)" class="fade-up collection-item red-text waves-effect waves-red hide" id="action_delete"><i class="material-icons-round left">delete</i>Delete</a>
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
        <p>Connection problems? <a href="//community.<?=App::domain;?>/" target="_blank">Let us know</a></p>  
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
          <button class="btn-round btn blue-grey darken-3 waves-effect waves-light btn-flat white-text" onclick="$('#addNoteForm').submit();" type="submit"><i class="material-icons left white-text">note_add</i>Create</button>
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
    <div id="addItem" class="modal bottom-sheet" onscroll="this.style.maxHeight = '95vh!important';this.style.height = '95vh!important';this.style.minHeight = '95vh!important'">
      <div style="padding: 5px">
      <div class="center"><h5 style="margin-top: 30px;margin-bottom: 30px;">Create new</h5></div>
      <?php  if ($_SESSION['purpose'] !== 'business') { ?>
        <div class="row overflow:visible no-margin">
          <a href="javascipt:void(0)" class="card-addItem col s3 card-panel z-depth-0 transparent card center modal-close avatar" onclick="window.location.hash = '#/add/kitchen'"><i class="waves-effect border-icon darken-3 circle material-icons">microwave</i><br><h6 class="truncate">Kitchen</h6></a>
          <a href="javascipt:void(0)" class="card-addItem col s3 card-panel z-depth-0 transparent card center modal-close avatar" onclick="window.location.hash = '#/add/bedroom'"><i class="waves-effect border-icon darken-3 circle material-icons">bedroom_parent</i><br><h6 class="truncate">Bedroom</h6></a>
          <a href="javascipt:void(0)" class="card-addItem col s3 card-panel z-depth-0 transparent card center modal-close avatar" onclick="window.location.hash = '#/add/bathroom'"><i class="waves-effect border-icon darken-3 circle material-icons">bathroom</i><br><h6 class="truncate">Bathroom</h6></a>
          <a href="javascipt:void(0)" class="card-addItem col s3 card-panel z-depth-0 transparent card center modal-close avatar" onclick="window.location.hash = '#/add/garage'"><i class="waves-effect border-icon darken-3 circle material-icons">garage</i><br><h6 class="truncate">Garage</h6></a>
        </div>
        <div class="row overflow:visible no-margin">
          <a href="javascipt:void(0)" class="card-addItem col s3 card-panel z-depth-0 transparent card center modal-close avatar" onclick="window.location.hash = '#/add/dining_room'"><i class="waves-effect border-icon darken-3 circle material-icons">dining</i><br><h6 class="truncate">Dining</h6></a>
          <a href="javascipt:void(0)" class="card-addItem col s3 card-panel z-depth-0 transparent card center modal-close avatar" onclick="window.location.hash = '#/add/family'"><i class="waves-effect border-icon darken-3 circle material-icons">living</i><br><h6 class="truncate">Family</h6></a>
          <a href="javascipt:void(0)" class="card-addItem col s3 card-panel z-depth-0 transparent card center modal-close avatar" onclick="window.location.hash = '#/add/laundry'"><i class="waves-effect border-icon darken-3 circle material-icons">local_laundry_service</i><br><h6 class="truncate">Laundry</h6></a>
          <?php 
    $sql = $dbh->prepare("SELECT * FROM roomnames WHERE login_id=:sessid OR login_id=:syncid");
    $sql->execute(array(
        ':sessid' => $_SESSION['id'],
        ':syncid' => decrypt($_SESSION['syncid'])
    ));
    $users = $sql->fetchAll();
    if(count($users) == 0) {
      ?>
        <a href="javascipt:void(0)"class="card-addItem col s3 card-panel z-depth-0 transparent card center modal-close avatar" onclick="window.location.hash = '#/add/camping'"><i class="waves-effect border-icon darken-3 circle material-icons">park</i><br><h6 class="truncate">Camping</h6></a>
      <?php
    }
    else {
    ?>
          <a href="javascipt:void(0)" class="col s3 card-panel z-depth-0 card-addItem transparent card center avatar dropdown-trigger" data-target="dropdownMoreRooms"><i class="waves-effect border-icon darken-3 circle material-icons">more_horiz</i><br><h6 class="truncate">More</h6></a>
          <?php } ?>
        </div>
        <?php } ?>
        <div class="row no-margin" style="overflow: visible!important;">
          <a href="javascipt:void(0)" class="card-addItem col s4 card-panel z-depth-0 transparent card center modal-close avatar" onclick="window.location.hash = '#/add/reminder'"><i style="font-family: 'Material Icons Two Tone'!important;" class="color:default border-two-tone border-icon darken-3 circle material-icons">check_circle</i><br><h6 class="truncate">Reminder</h6></a>
          <a href="javascipt:void(0)" class="card-addItem col s4 card-panel z-depth-0 transparent card center modal-close avatar" onclick="window.location.hash = '#/add/shopping-list'"><i style="font-family: 'Material Icons Two Tone'!important;" class="color:default border-two-tone border-icon darken-3 circle material-icons">receipt_long</i><br><h6 class="truncate">Shopping List</h6></a>
          <a href="javascipt:void(0)" class="card-addItem col s4 card-panel z-depth-0 transparent card center modal-close avatar modal-trigger" href="#addNote"><i class="border-icon darken-3 circle material-icons border-two-tone color:default" style="font-family: 'Material Icons Two Tone'!important;">sticky_note_2</i><br><h6 class="truncate">Note</h6></a>
        </div>
        <ul id="dropdownMoreRooms" class="dropdown-content">
        <li><a href="javascipt:void(0)" href="#/add/camping" class="waves-effect w-full"><i class="material-icons">park</i>Camping Supplies</a></li>
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
?><li><a href="javascipt:void(0)" href="#/add/<?=$row["id"]; ?>" class="waves-effect w-full"><i class="material-icons"><?=$row['qty'] ?></i><?=strip_tags($row['name']); ?></a></li><?php
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
    <div id="croom_rclick" class="modal"> <a href="#" id="add_croom" class="waves-effect color:default" style="padding: 15px 20px;width: 100%;margin:0">Add an item</a> <a id="del_croom" class="waves-effect color:default" style="padding: 15px 20px;width: 100%;margin:0">Delete</a> <a class="waves-effect color:default" onclick="navigator.clipboard.writeText(this.innerText.replace(/\D/g,''));M.toast({html:'Copied to clipboard!'})" id="croom_rclick_id" style="padding: 15px 20px;width: 100%;margin:0"></a> </div>

    <script src="//cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
    <script src="//unpkg.com/@ckeditor/ckeditor5-inspector@2.2.1/build/inspector.js"></script>
    <script src="//cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/js/materialize.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/malihu-custom-scrollbar-plugin@3.1.5/jquery.mCustomScrollbar.min.js"></script>
    <script src="./js/autocomplete.js"></script>
    <script src="./js/calculators.js"></script>
    <script src="//essentials.manuthecoder.ml/essentials.js"></script>
    <script src="./js/keyboardShortcuts.js"></script>
    <script src="./js/main.js?v=<?=rand(0, 99999);?>"></script>
    <script async>
      // Tells whether an item popup is active or not
      var itemState = 0;
      // Switches the page on the `hashChange` event
      window.addEventListener('hashchange', getHashPage)
      
      // This is the main function for getting the page based on the window hash, for example: "#/settings"
      function getHashPage(e = "") {
        document.getElementById("app").focus();
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            if(this.responseText !== "true") {
              window.location.href="//<?=App::domain;?>/dashboard/auth";
              return false;
            }
          }
        };
        xhttp.open("GET", "//<?=App::domain;?>/dashboard/user/check_if_loggd_in.php", true);
        xhttp.send();
        var el = "#app"
        // If there is no hash assigned to the window...
        if(!window.location.hash) {
          url = "./pages/dashboard.php"
          window.location.hash = "#/home";
          new loadPage(url, el, (e == "hide" ? {loader: false}: null))
          return false;
        }
        document.querySelector('meta[name="theme-color"]').setAttribute("content", '#fff');
        if(itemState == 1) {
          document.querySelector('meta[name="theme-color"]').setAttribute('content',  "#1d272b");
        }
        if(document.documentElement.classList.contains('_darkTheme')) {
          document.querySelector('meta[name="theme-color"]').setAttribute('content',  '#212121');
        }
        // List of all pages. Add a `case` statement to create a new page
        switch(window.location.hash.replace("#", "")) {
          case "/dashboard": url = "<?=($_SESSION['homePage'] == "dashboard" ? "./pages/dashboard.php" : "./user/finance/index.php"); ?>"; break;
          case "/user-dashboard": url = "./pages/dashboard.php"; break; 
          case "/house-profile": url = "./pages/house-profile.php"; break; 
          case "/profile": url = "./pages/profile.php"; break; 
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
          
          case "/add/shopping-list": url = "./user/grocerylist/quickadd.php"; break; case "/add/reminder": url = "./user/todo/quickadd.php"; break; case "/add/subscription": url = "./user/finance/subscription_quickadd.php"; break;
          case "/my-finances/set-plan": url="./user/finance/set-goal.php"; break;
          case "/my-finances/calculators": url="./user/finance/calculators.php"; break;
          case "/notifications": url = "./rooms/notifications.php"; break; case "/notes": url = "./user/notes/index.php";break;case "/starred": url = "./rooms/starred-items.php";break;case "/maintenance": url = "./rooms/maintenance.php?card";break;case "/trash": url = "./user/trash/index.php";break;case "/settings": url = "./user/settings/index.php";break;case "/my-finances": url = "./user/finance/index.php"; break; case "/my-finances/payments": url = "./user/finance/payments.php"; break; case "/shopping-assistant": url = "./user/shopping_assistant/index.php"; break;<?php
try
{
    
    $sql = $dbh->prepare("SELECT * FROM roomnames WHERE login_id=:sessid OR login_id=:syncid");
    $sql->execute(array(
        ':sessid' => $_SESSION['id'],
        ':syncid' => decrypt($_SESSION['syncid'])
    ));
    $users = $sql->fetchAll();
    foreach ($users as $row)
    {
        print 'case "/rooms/' . $row['id'] . '": url = "./rooms/custom_room/ajax_croom_loader.php?room=' . $row['id'] . '"; break;';
        print 'case "/add/' . $row['id'] . '": url = "./rooms/custom_room/custom_room_add.php?room=' . $row['id'] . '&name="+encodeURI(' . json_encode($row['name']) . '); break;';
    }
    
}
catch(PDOexception $e)
{
    echo "Error is: " . $e->getmessage();
} ?>
          default: 
            url = "./<?=($_SESSION['homePage'] == "dashboard" ? "./pages/dashboard.php" : "./user/finance/index.php") ?>"
        }
        new loadPage(url, el,  (e == "hide" ? {loader: false} : null))
      }
      
      const user = {
        avatar: `<?=$_SESSION['avatar'];?>`,
        themeTop: "#<?=$userTheme['top']; ?>",
        theme: "#<?=$theme; ?>",
        themeLight: "#<?=$userTheme['light']; ?>",
        $bmBgColor: "<?=$bmBgColor; ?>",
        $bmBorderColor: "<?=$bmBorderColor; ?>",
        $overlayColor: "<?=$overlayColor; ?>",
        navScrollColor: "#<?=$userTheme['navScrollColor']?>",
        $imageURI: "<?=$userTheme['png']; ?>",
        themeDark: "#<?=$userTheme['darkTheme']; ?>"
      }
      // Get a lighter version of the theme color. 
function getSidenavColor(color, amount) {
      return '#' + color.replace(/^#/, '').replace(/../g, color => ('0'+Math.min(255, Math.max(0, parseInt(color, 16) + amount)).toString(16)).substr(-2));
  }
$(document).ready(function() {
  if (!window.matchMedia('(display-mode: standalone)').matches) {
    /*navigator.serviceWorker.register("//smartlist.ga/dashboard/sw.js");*/
  }
  if($(window).width() < 992) {
    // Known bug: This code doesn't work for some themes, change the number at the end (230), to something lesser
    // document.documentElement.style.setProperty('--sidenav-bg-color-m3', getSidenavColor("#<?=$theme; ?>", 230) )
  }
  // Initialize all dropdowns
  $(".dropdown-trigger").dropdown({
    constrainWidth: false
  })
});
// Set the input, `#budgetDate`, to the current date, formatted in MM/DD/YYYY
window.addEventListener("load", () => {
  document.getElementById("budgetDate").value = moment().format("M/D/Y");
  document.getElementById("imgAvatar").innerHTML = `<img src="${user.avatar}" loading="lazy" style="width:100%;width: 41px;height: 41px;" class="circle">`
});
  document.querySelectorAll('#app, #slide-out, #_navBar, #fab, #addItem').forEach(el => el.addEventListener("click", function(e) {
    $('#accountDropdown').addClass('fadeOut');
    setTimeout(function() {$('#accountDropdown').addClass('hide');}, 200)
  }))
    window.addEventListener("keyup", function(e) {
  if(e.keyCode === 27) {
    $('#accountDropdown').addClass('fadeOut');
    setTimeout(function() {$('#accountDropdown').addClass('hide');}, 200);  }
  })
    </script>
  </body>
</html>