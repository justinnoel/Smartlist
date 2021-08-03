<?php
ini_set('session.gc_maxlifetime', 65535);
session_start();
$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if ($actual_link == "https://smartlist.ga/dashboard/beta/") {
  header("Location: https://smartlist.ga/dashboard/beta");
}
if (!isset($_SESSION['valid'])) {
  header('Location: https://smartlist.ga/daaction_editshboard/auth');
  exit();
}
include_once("cred.php");
function admin()
{
  return $_SESSION['id'] == 1;
}
try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $stmt = $dbh->query('SELECT * FROM bm WHERE login_id=' . $_SESSION['id']);
  $row_count = $stmt->rowCount();
  $dbh = null;
} catch (PDOexception $e) {
  echo "Error is: " . $e->getmessage();
}
define('user_notifications', $_SESSION['notifications']);
$number_notify = $_SESSION['number_notify'];
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM login WHERE id=" . $_SESSION['id'];
$users = $dbh->query($sql);
foreach ($users as $row) {
  $goal = $row["goal"];
  $welcome = $row['welcome'];
  $_SESSION['avatar'] = $row['user_avatar'];
  $theme = $row['theme'];
}
if (empty($theme) || !isset($theme)) {
  $theme = '41308a';
}
switch ($theme) {
  case '41308a':
    $theme_top = '2a1782';
    $theme = '2f1d7d';
    $theme_light = '4527a0';
    $bmBgColor = 'rgba(81, 45, 168,.2)';
    $bmBorderColor = 'rgba(81, 45, 168,.8)';
    $overlayColor = "rgba(81, 45, 168,.4)";
    $imageURI = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEVFJ6D////Exu4TAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=";
    break;
  case 'B00020':
    $theme_top = '9c021e';
    $theme = 'B00020';
    $theme_light = 'c20225';
    $bmBgColor = 'rgba(176, 0, 32, .1)';
    $bmBorderColor = 'rgba(176, 0, 32, .7)';
    $overlayColor = "rgba(176, 0, 32, .4)";
    $imageURI = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEWwACD///8fISOWAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=";
    break;
  case '00695c':
    $theme_top = '00594e';
    $theme = '00695c';
    $theme_light = '007a6b';
    $bmBgColor = 'rgba(0, 89, 78, .2)';
    $bmBorderColor = 'rgba(0, 89, 78, .8)';
    $overlayColor = 'rgba(0, 89, 78, .4)';
    $imageURI = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEUAaVz///+wIDr7AAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=";
    break;
  case '6200ea':
    $theme_top = '5a02d4';
    $theme = '6200ea';
    $theme_light = '6802f5';
    $bmBgColor = 'rgba(90, 2, 212, .2)';
    $bmBorderColor = 'rgba(90, 2, 212, .8)';
    $overlayColor = "rgba(90, 2, 212, .4)";
    $imageURI = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEViAOr///9ZJ5DQAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=";
    break;
  case '00838f':
    $theme_top = '016c75';
    $theme = '00838f';
    $theme_light = '00919e';
    $bmBgColor = 'rgba(1, 108, 117, .2)';
    $bmBorderColor = 'rgba(1, 108, 117, .8)';
    $overlayColor = "rgba(1, 108, 117, .4)";
    $imageURI = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEUAg4/////mpfPyAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=";
    break;
  case '0277bd':
    $theme_top = '0267a3';
    $theme = '0277bd';
    $theme_light = '027fc9';
    $bmBgColor = 'rgba(2, 103, 163, .2)';
    $bmBorderColor = 'rgba(2, 103, 163, .8)';
    $overlayColor = "rgba(2, 103, 163, .4)";
    $imageURI = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEUCd73///9M+5ROAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=";
    break;
  case '2e7d32':
    $theme_top = '276b2a';
    $theme = '2e7d32';
    $theme_light = '328c37';
    $bmBgColor = 'rgba(39, 107, 42, .2)';
    $bmBorderColor = 'rgba(39, 107, 42, .8)';
    $overlayColor = "rgba(39, 107, 42, .4)";
    $imageURI = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEUufTL////DH+/PAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=";
    break;
  case 'f9a825':
    $theme_top = 'e69a20';
    $theme = 'f9a825';
    $theme_light = 'ffac26';
    $bmBgColor = 'rgba(230, 154, 32, .2)';
    $overlayColor = "rgba(230, 154, 32, .4)";
    $bmBorderColor = 'rgba(230, 154, 32, .8)';
    break;
  case 'ef6c00':
    $theme_top = 'db6402';
    $theme = 'ef6c00';
    $theme_light = 'f5852a';
    $bmBgColor = 'rgba(219, 100, 2, .2)';
    $bmBorderColor = 'rgba(219, 100, 2, .8)';
    $overlayColor = "rgba(219, 100, 2, .4)";
    $imageURI = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEXvbAD///8eCazGAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=";
    break;
  case 'ad1457':
    $theme_top = '96124c';
    $theme = 'ad1457';
    $theme_light = 'b8165d';
    $bmBgColor = 'rgba(150, 18, 76, .2)';
    $bmBorderColor = 'rgba(150, 18, 76, .8)';
    $overlayColor = "rgba(150, 18, 76, .4)";
    $imageURI = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEWtFFf////D4Zu0AAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=";
    break;
  case '37474f':
    $theme_top = '29353b';
    $theme = '37474f';
    $theme_light = '4d636e';
    $bmBgColor = 'rgba(41, 53, 59, .2)';
    $bmBorderColor = 'rgba(41, 53, 59, .8)';
    $overlayColor = "rgba(41, 53, 59, .4)";
    $imageURI = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEU3R0////+VAmT6AAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=";
    break;
  case '212121':
    $theme_top = '171717';
    $theme = '212121';
    $theme_light = '404040';
    $bmBgColor = 'rgba(23, 23, 23, .2)';
    $bmBorderColor = 'rgba(23, 23, 23, .8)';
    $overlayColor = "rgba(23, 23, 23, .4)";
    break;
  default:
    $theme_top = '171717';
    $theme = '212121';
    $theme_light = '404040';
    break;
}
$dbh = null;

// Get last of budget meter
try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql = "SELECT * FROM bm WHERE login_id=" . $_SESSION['id']. " ORDER BY id DESC LIMIT 1";
    $users = $dbh->query($sql);
    $moneyToday;
    foreach($users as $row) {
            $moneyToday = decrypt($row['qty']);
    }
}
catch (PDOexception $e) {
    echo "Error is: " . $e->getmessage();
}
if(empty($moneyToday) || !isset($moneyToday)) {
    $moneyToday = 0;
}

// Welcome popup
if ($welcome != 1 || isset($_GET['tuts'])) {
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE login SET welcome='1' WHERE id=" . $_SESSION['id'];
    $stmt = $conn->prepare($sql);
    $stmt->execute();
  } catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Dashboard</title>
  <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com/">
  <link rel="dns-prefetch" href="https://cdn.jsdelivr.net/">
  <link rel="dns-prefetch" href="https://www.googletagmanager.com/">
  <link rel="dns-prefetch" href="https://<?php echo parse_url($_SESSION['avatar'], PHP_URL_HOST); ?>/">
  <link rel="dns-prefetch" href="https://static.hotjar.com/">
  <link rel="dns-prefetch" href="https://smartlist.ga/">
  <link rel="dns-prefetch" href="https://res.cloudinary.com/">
  <link rel="dns-prefetch" href="https://padlet-uploads.storage.googleapis.com/">
  <link rel="dns-prefetch" href="https://ajax.googleapis.com/">
  <link rel="dns-prefetch" href="https://fonts.googleapis.com/">
  <meta name="keywords" content="Smartlist, Smartlist dashboard, Smart List, List, Inventory, Home, Smartlist app, Smart list app, Smartlist Dashboard, Smartlist login, Smartlist Signup, Smartlist login, free home inventory app, free, home, inventory, app">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="#2a1782">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>-->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="search" href="https://smartlist.ga/search.xml" type="application/opensearchdescription+xml" title="Smartlist" />
  <link rel="shortcut icon" href="https://smartlist.ga/dashboard/icon/roofing.svg">
  <link rel="favicon" href="https://smartlist.ga/dashboard/icon/roofing.svg">
  <meta name="robots" content="index, nofollow" />
  <link rel="apple-touch-icon" href="https://smartlist.ga/dashboard/icon/roofing.svg" />
  <script src="https://cdn.jsdelivr.net/gh/Smartlist-app/Assets/src/js/pwa.js" defer></script>
  <link rel="manifest" href="./manifest.webmanifest">
  <link rel="preload" href="<?php echo htmlspecialchars($_SESSION['avatar']); ?>" as="image">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pusher/7.0.3/pusher.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.0.0/dist/css/materialize.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <meta name="theme-color" content="#<?php echo htmlspecialchars($theme_top); ?>">
  <meta name="title" content="Smartlist - the free home inventory database">
  <meta name="description" content="Smartlist is a free home inventory app that lets you keep track of what you have in your home, and helps you save money">
  <meta property="og:site_name" content="smartlist.ga" />
  <meta property="og:title" content="Smartlist" />
  <meta property="og:type" content="website" />
  <meta property="og:image" content="https://cdn.jsdelivr.net/gh/Smartlist-app/Assets/cover.png" />

  <meta property="og:url" content="https://smartlist.ga/dashboard/beta" />
  <meta property="og:description" content="Smartlist is a free home inventory app that lets you keep track of what you have in your home, and helps you save money" />
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@Smartlist">
  <meta name="twitter:title" content="Smartlist">
  <meta name="twitter:description" content="Smartlist is a free home inventory app that lets you keep track of what you have in your home, and helps you save money">
  <meta name="twitter:domain" content="smartlist.ga">
  <meta name="robots" content="index, follow">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="language" content="English">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="stylesheet" href="./resources/style.css?v=<?php echo rand(0, 9999999); ?>">
  <!--<link rel="stylesheet" href="./resources/style.css">-->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:2386239,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
  <style>
    :root {
      --sidenavbg-color: <?php echo htmlspecialchars($bmBgColor);
                          ?>;
      --navbar-color: #<?php echo htmlspecialchars($theme);
                        ?> !important
    }
    .fab_btn {
         background: #<?php echo htmlspecialchars($theme_light); ?> !important
    }
    [data-theme="dark"] #item_options {
        box-shadow: none !important;
        background: rgba(255, 255, 255, .05) !important;
    }
    [data-theme="dark"] .fab_btn {
        background: #5c5c5c !important;
    }
    strong {
        font-weight: bold !important;
    }
    [data-theme=dark] {
      --navbar-color: #303030!important;
      --bg-color: #1a1a1a!important
    }
    [data-theme=dark] #item_options {
        background: rgba(255, 255, 255, .1)!important;
    }
    @media only screen and (max-width: 992px) {
       .datepicker-modal {
           /*bottom: 0 !important;*/
           width: 100% !important;
           top: auto !important;
           /*height: 300px !important;*/
           transform: none !important;
           animation: m .2s forwards;
       }   
        @keyframes m {
            0% {
                bottom: -100px;
            }
            100% {
                bottom: 0;
            }
        }       
      }
    .dark_theme_sidebar .sidenav {
        background: #212121 !important;
    }
    .dark_theme_sidebar .waves-ripple {
        background: rgba(255, 255, 255, .3) !important;
    }
    .dark_theme_sidebar .sidenav-active {
        color: white !important;
        background: rgba(255, 255, 255, .1) !important;
    }
    .dark_theme_sidebar .sidenav-active i {
        color: white !important;
    }
    .dark_theme_sidebar .no-padding * {
        background: transparent !important;
    }
    html:not([data-theme="dark"]) .sidenav .waves-ripple {
        /*background: <?php echo $overlayColor;?> !important;*/
        background: rgba(0, 0, 0, .2) !important;
    }
    @media only screen and (max-width:600px) { .navbar_btn i { line-height: 50px !important; } #search_close { padding-top: 0px !important; } } .collection-item.green { border-color: #1b5e20 !important; } h5 { margin-bottom: 5px; } .chip-suggestions { width: 100%; overflow-y: visible !important; overflow-x: auto; white-space: nowrap; padding: 5px 0; position:relative; } .cursor-pointer { cursor: pointer; } .pagination_container { text-align: right; } .card.waves-effect { width: 100%; } @media only screen and (min-width: 500px) { #addNote,#noteView { width: 70% !important; margin: auto !important; height: 90vh !important; } } @media only screen and (max-width: 500px) { #addNote,#noteView,#editNoteForm { width: 100% !important; } } * { user-drag: none } .sync_tr { background: rgba(0, 121, 107, .1) !important; } .pagination_btn { padding: 15px; width: 40px; height: 40px; text-align: center; border-radius: 9999px; cursor: pointer; transition: all .2s; background: transparent; border: 0; } tr.hover { display: table-row !important; } .pagination_btn:not(.paginationActive):focus { background: transparent; color: inherit; } .pagination_container button { padding: 10px; } .paginationActive { color: white; background: #212121 !important; } .drag-target { width: 20px !important; } @media only screen and (max-width:900px) { .nav_btn_menu { top: -2px !important; } .chart_container { margin-top: 20px } #toast-container { top: auto !important; right: auto !important; bottom: 0; left: 0; width: calc(100% - 30px) !important } #accounts { width: 100% } .hover td::after { display: none } .menu.gray-text { padding: 0 !important; } .name { color: var(--font-color) !important } .email { color: #aaa !important } .chart_container, canvas { height: 45vh  !important } .__dropdown { color: gray !important } .background { border-bottom: 1px solid rgba(200, 200, 200, .3) } #settingsContainer { width: 100% !important } #settingsContainer .row { margin-top: 0 !important } } .collection-item b { transition: all .2s; }
  </style>
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-S0PH6N0Z7E"></script>
</head>

<body <?php if($_SESSION['dtheme_sidebar'] == 1) {?>class="dark_theme_sidebar"<?php } ?>>
  <a href="#CONTENT" class="ctnt">Skip to content</a>
  <nav style="position:fixed;background: var(--navbar-color) ;z-index:9999;top:0;display:none;box-shadow:none !important" id="searchbar">
    <div class="nav-wrapper">
      <form method="POST" action="./user/search.php" id="search_bar">
        <div class="input-field"> <input id="search" type="search" onblur="this.focus()" name="query" class="autocomplete1" autocomplete="off" placeholder="Search items, rooms, actions, etc." value="<?php echo htmlspecialchars($_GET['query']); ?>"> <label class="label-icon" for="search"><i class="material-icons-round __search">search</i></label> <i class="material-icons material-icons-round waves-effect navbar_btn btn-flat btn-floating btn-large" id="search_close" style="margin-right: -5px !important;font-size: 24px;margin-top: 5px !important;">close</i> </div>
      </form>
    </div>
  </nav>
  <nav style="top:0;position:fixed;background: var(--navbar-color);z-index:999">
    <div class="nav-wrapper">
      <ul class="left" style="position:absolute;">
        <li id="scroll_sidenav_to_top">
          <a class="sidenav-trigger braand-logo left" style="margin-left: -10px !important" data-target="slide-out" href="javascript:void(0)">
            <div style="margin-left:0px !important" class="nav_btn_menu btn btn-floating btn-large waves-effect waves-light btn-flat navbar_btn">
              <i class="material-icons-round" id="icon">menu</i>
            </div>
            <span style="font-size: 20px;font-weight:400;margin-left: -10px" id="brandlogo">Smartlist</span>
          </a>
        </li>
      </ul>
      <ul class="right" id="nav_ul_notification">
        <li> <a id="notification" data-position="bottom" class="right tooltippeda waves-effect waves-light navbar_btn btn-floating btn-large btn-flat" style="margin-top: 6% !important;margin-right: 0 !important;" data-tooltip='Notifications'> <i class="material-icons-round">notifications</i>
            <div id="hide_notification"></div>
          </a> </li>
        <li><a style="margin-top: 6% !important;margin-left: 0 !important;margin-right: 3px !important" class="right waves-effect waves-light navbar_btn btn-floating btn-large btn-flat" id="search_toggle"><i class="material-icons-round">search</i></a></li>
      </ul>
    </div>
  </nav>
  <div id="bmmodal" class="bottom-sheet modal">
    <div class="modal-content">
      <form onsubmit="bm_add();M.toast({html: 'Added data successfully!'});return false;" method="post" name="form1"> <input type="hidden" name="name" value="<?php echo date('m/d/Y'); ?>" readonly>
        <h4>Add a point</h4>
        <p>Enter how much you spent today</p>
        <div class="input-field"> <i class="material-icons-round prefix">attach_money</i> <label>Amount you
            spent</label> <input type="number" name="qty" required id="bm_amount" autocomplete='off' autofocus> </div>
            <div>
                <select id="bm_select">
                    <option value="Grocery Shopping">Grocery Shopping</option>
                    <option value="Clothes Shopping">Clothes Shopping</option>
                    <option value="Bills">Bills</option>
                    <option value="Other">Other</option>
                </select>
            </div>
        <p style="margin-top: 20px"><i class="material-icons-round left">verified</i> We take your privacy very
          seriously, and we will never sell your data. <a href="https://support.smartlist.ga/docs/#/privacy-policy" class="blue-text">Read our Privacy Statement</a></p><br>
        <input type="submit" name="Submit" value="Add" class="btn purple darken-3">
      </form>
    </div>
  </div>
  <div id="budgetmetermodala" onscroll="this.classList.add('addheight')" class="modal modal-fixed-s  bottom-sheet" style="width:60%">
    <div class="modal-content" id="CTRLS_CTNT" style="cursor: auto">
      <strong>
        <h5 class="center">Add an item <span class="hide-on-med-and-down">(<kbd>CTRL</kbd> + <kbd>S</kbd>)</span></h5>
      </strong>
      <p class="center">Please select a room</p>
      <div class="collection">
        <a class="collection-item modal-close waves-effect" href="javascript:void(0)" onclick="sm_page('addkitchen'); AJAX_LOAD('#addkitchen', './rooms/kitchen/quickadd.php')"><i class="material-icons-round left">blender</i>Kitchen</a>
        <a class="collection-item modal-close waves-effect" href="javascript:void(0)" onclick="sm_page('bedroom_add');AJAX_LOAD('#bedroom_add', './rooms/bedroom/quickadd.php')"><i class="material-icons-round left">bed</i>Bedroom</a>
        <a class="collection-item modal-close waves-effect" href="javascript:void(0)" onclick="sm_page('bathroom_add');AJAX_LOAD('#bathroom_add', './rooms/bathroom/quickadd.php')"><i class="material-icons-round left">wc</i>Bathroom</a>
        <a class="collection-item modal-close waves-effect" href="javascript:void(0)" onclick="sm_page('garage_add');AJAX_LOAD('#garage_add', './rooms/garage/quickadd.php')"><i class="material-icons-round left">build</i>Garage</a>
        <a class="collection-item modal-close waves-effect" href="javascript:void(0)" onclick="sm_page('add_family'); AJAX_LOAD('#add_family', './rooms/family/add1.php');"><i class="material-icons-round left">chair</i>Family</a>
        <a class="collection-item modal-close waves-effect" href="javascript:void(0)" onclick="sm_page('storage_add'); AJAX_LOAD('#storage_add', './rooms/storage/quickadd.php');"><i class="material-icons-round left">business</i>Storage Room</a>
        <a class="collection-item modal-close waves-effect" href="javascript:void(0)" onclick="sm_page('dining_room_add'); AJAX_LOAD('#dining_room_add', './rooms/dining_room/quickadd.php')"><i class="material-icons-round left">restaurant</i>Dining Room</a>
        <a class="collection-item modal-close waves-effect" href="javascript:void(0)" onclick="sm_page('camping_add'); AJAX_LOAD('#camping_add', './rooms/camping/quickadd.php');"><i class="material-icons-round left">landscape</i>Camping Supplies</a>
        <a class="collection-item modal-close waves-effect" href="javascript:void(0)" onclick="sm_page('laundry_room_add'); AJAX_LOAD('#laundry_room_add', './rooms/laundry/quickadd.php')"><i class="material-icons-round left">local_laundry_service</i>Laundry room</a>
        <a href="javascript:void(0)" class="collection-item" style="color: gray !important;border: 0">
          <strong>Custom Rooms</strong>
        </a>
        <?php try {
          $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $sql = "SELECT * FROM roomnames WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . $_SESSION['syncid'];
          $users = $dbh->query($sql);
          foreach ($users as $row) {
            print "<a class=\"collection-item waves-effect modal-close\" href='javascript:void(0)' onclick='sm_page(\"croom_add\");AJAX_LOAD(\"#croom_add\", \"./rooms/custom_room/custom_room_add.php?room=" . $row['id'] . "\")'><i class=\"material-icons-round left\">" . $row['qty'] . "</i>" . $row["name"] . "</a>";
          }
          $dbh = null;
        } catch (PDOexception $e) {
          echo "Error is: " . $e->getmessage();
        } ?>
      </div>
    </div>
  </div>
  <div id="avarar" class="modal modal-fixed-footer bottom-sheet">
    <div class="modal-content"><img class="materialboxed" alt='image' class="circle" src="<?php echo $_SESSION['avatar'] ?>" style="display:block;margin:auto;width:80px;height: 80px;"><br>
      <div class="row">
        <div class="col s12">
          <h4>Change avatar</h4>
          <form action="./user/avatar.php" method="POST">
            <div class='input-field'><label>Paste URL here...</label><input type="url" required name="avatar">
            </div>
        </div>
      </div>
    </div>
    <div class="modal-footer"> <button type="submit" class="btn btn-flat waves-effect">Change</button><a href="#modal1" class="modal-close waves-effect btn-flat modal-trigger">Cancel</a></form>
    </div>
  </div>
  </div>
  <ul id="slide-out" class="sidenav sidenav-fixed">
    <li>
      <div class="user-view">
        <!--style="border-bottom: 1px solid rgba(200,200,200,.3)"-->
        <div class="background">
          <img src="<?php echo $imageURI; ?>" width="100%" class="hide-on-med-and-down" id="imageid" alt='Background'>
        </div>
        <a href="#avarar" style="opacity: 1 !important" class="waves-effect avatar_img waves-light circle modal-trigger"><img class="circle lazy" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEAYABgAAD//gA7Q1JFQVRPUjogZ2QtanBlZyB2MS4wICh1c2luZyBJSkcgSlBFRyB2NjIpLCBxdWFsaXR5ID0gODIK/9sAQwAGBAQFBAQGBQUFBgYGBwkOCQkICAkSDQ0KDhUSFhYVEhQUFxohHBcYHxkUFB0nHR8iIyUlJRYcKSwoJCshJCUk/9sAQwEGBgYJCAkRCQkRJBgUGCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQk/8AAEQgB9AH0AwEiAAIRAQMRAf/EAB8AAAEFAQEBAQEBAAAAAAAAAAABAgMEBQYHCAkKC//EALUQAAIBAwMCBAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+v/EAB8BAAMBAQEBAQEBAQEAAAAAAAABAgMEBQYHCAkKC//EALURAAIBAgQEAwQHBQQEAAECdwABAgMRBAUhMQYSQVEHYXETIjKBCBRCkaGxwQkjM1LwFWJy0QoWJDThJfEXGBkaJicoKSo1Njc4OTpDREVGR0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2d3h5eoKDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uLj5OXm5+jp6vLz9PX29/j5+v/aAAwDAQACEQMRAD8A9cpaKK1MgooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooopgFFFFIAooooAKKKKACiiigAooooAKKKKACiiigAoozRmgAoozRmgAoozRmgAoozRmgAoozRmgAoozRmgAoozRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUlABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABS0lLQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRTAKKKKQBRRQaACikooAWikopgLRSUUALRSUUALRSUUgCiiigAooooAKKKKACiiigAooooAKKKKAClpKWgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiimAUUUUgCg0UUAFFFFABSUtJTAWkoooAKWkooAKKKKACij8aPxpAFFH40fjQAUUfjR+NABRR+NH40AFFH40fjQAUUfjR+NABS0n40tABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABQKKKACiiigAooooAKKKKACiiigAooooAKKKKACg0UUAFFFFABSUtJTAKKKKACiiloASiiigA/Cj8KKKQB+FH4UUUAH4UfhRRQAfhR+FFFAB+FH4UUUAH4UfhRRQAfhS0lL3oAKKKKACiiigAoo70UAFFFFABRRR3oAKKKKACiiigAoo70UAFFFFABRRR3oAKKKKACiiigAoo70CgAooooAKKKKACiiigAooooAKKKKACiiigAoNFBoASiiigAooopgFFFFABRRRQAUUUvWkAlFLijFACUUuKMUAJRS4oxQAlFLijFACUUuKMUAJRS4oxQAlLRiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooo6UAFFGaM0AFFGaM0AFFGaM0AFFGaM0AFFGaKACiiigAoNFBoASiiigAooooAKKKKACiiigApRSUooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACg0UGgAooooAKSlpKAFooooAKKKKACiiigAooooAKDRQaAEooooAKKKKACiiigAooooAKUUlKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoNFBoAKKSigBaSiigBaKSigBaKSigBaKKKACiiigAoNFBoASiiigAooooAKKKKACiiigApRSUooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACg0UGgAooooAKSlpKAFooooAKKKKACiiigAooooAKDRQaAEooooAKKKKACiiigAooooAKUUlKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoNFBoAKKKKACkpaSgBaKKKACiiigAooooAKKKKACg0UGgBKKKKACiiigAooooAKKKKAClFJSigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKDRQaAEopaKAEopaSgAopaKAEopaKACiiigAooooAKDRQaAEooooAKKKKACiiigAooooAKUUlKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoNFBoAKKKKACkpaSgBaKKKACiiigAooooAKKKKACg0UUAJRS0UAJRS0UAJRS0UAJRS0UAJSiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKDRRQAUUlFAC0lFFAC0UlFAC0UlFAC0UlFAC0UUUAFFFFABRRRQAUUUUAFFH40UAFFFH40AFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFJRQAtFJRQAtFJRQAtFJRQAtFJRQAtFFFABRRRQAUUUUAFFFFAB+FFFFABR+FFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFBoASloooASlopKAFpKWigApKWigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooASilooASilooASilooASilooASilooAKKKKACiiigAooooAKKKKAD8aKPwooAKPxoo/CgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigBKKKWgBKKKWgBKKWkoAKKWkoAKKWigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACg0UUAFFJRQAtJRRQAtFJRQAtFJRQAtFJRQAtFFFABRRRQAUUUUAFFFFABRR+NFABRRR+NABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRSUUALRSUUALRSUUALRSUUALRSUUALRRRQAUUUUAFFFFABRRRQAfhRRRQAUfhRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRQaAEpaKKAEpaKSgBaSlooAKSlooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAEopaKAEopaKAEopaKAEopaKAEopaKACiiigAooooAKKKKACiiigA/Gij8KKACj8aKPwoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooASiiloASiiloASilpKACilpKACilooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoNFFABRSUUALSUUUALRSUUALRSUUALRSUUALRRRQAUUUUAFFFFABRRRQAUUfjRQAUUUfjQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUlFAC0UlFAC0UlFAC0UlFAC0UlFAC0UUUAFFFFABRRRQAUUUUAH4UUUUAFH4UUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUGgBKWiigBKWikoAWkpaKACkpaKACiiigAooooAKKKKACiiigAooooAKKMUUAFFFGKACiijpQAUUZozQAUUZozQAUUZozQAUUZozQAUUZozQAUUZozQAUUZozQAUUZozQAUUUZoAKKM0ZoAKKM0UAFFGaM0AFFGaM0AFFFGaACijNGaACijNFABRRmjNABRRmjNABRRRmgAoozRQAlFLRQAlFLRQAlFLRQAlFLRQAlFLRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUGig0AFFFFABSUtJQAtFFFABRRRQAlLSUtABRRRQAUlLSUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFLSUtABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFBooNABRSUUALSUUUALRSUUALRSUUAFLSUUALRSUUALSUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFLSUtABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFBooNABRRRQAUlLSUALRRRQAUUUUAJS0lLQAUUUUAFJS0lABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABS0lLQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABQaKDQAUUUUAFJS0lAC0UUUAFFFFACUtJS0AFFFFABSUtJQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUtJS0AFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUGiigAooooAKKKKACiiigAooooAKKKKACiiigApKKKAFpKKKACloooASloooASiiigBaSiigBaSiigApaKKAEpaKKAEooooAWkoooAWkoooAKWiigBKWiigAooooAKKKKACiiigAooooAKKKKAP/9k=" data-src="<?php echo $_SESSION['avatar'] ?>" width="50px" height="50px" alt='image'></a>
        <span class="white-text name" style="font-size: 20px;margin-bottom:5px"><?php echo $_SESSION['name'] ?></span>
        <span href="#accounts" tabindex="0" class="right waves-effect circle waves-center modal-trigger"  onkeypress="javascript: if(event.keyCode == 13) this.click()" style="width:25px;height:25px;line-height:1 !important"><i class="material-icons-round __dropdown">arrow_drop_down</i></span>
        <span class="white-text email"><?php echo $_SESSION['email'] ?></span>
      </div>
    </li>
    <li class="links"><a tabindex="0" class="waves-effect sidenav-close" onclick="sidenav_highlight(this); change_title('Dashboard');sm_page('News');AJAX_LOAD('#grocery_list', './rooms/grocerylist/index.php');" id="defaultOpen"><i class="material-icons-round">dashboard</i>Dashboard</a></li>
    <!--<li class="links"><a tabindex="0" class="waves-effect sidenav-close" onclick="sidenav_highlight(this); change_title('Suggested');sm_page('suggested');AJAX_LOAD('#suggested', './rooms/suggested.php')"><i class="material-icons-round">assistant</i>Suggested items</a></li>-->
    <li class="links"><a tabindex="0" class="waves-effect sidenav-close" onclick="sidenav_highlight(this); change_title('Finances');sm_page('finances');AJAX_LOAD('#finances', './user/finance/index.php')"><i class="material-icons-round">payments</i>My Finances</a></li>
    <li class="links" style="display:none"><a class="waves-effect" onclick="change_title('Loading...');sm_page('loader');"><i class="material-icons-round">dashboard</i>Dashboard</a></li>
    <li style="pointer-events:none">
      <div class="divider"></div>
    </li>
    <li class="links" style="pointer-events:none;"><a class="subheader" href="javascript:void(0)" style='pointer-events:none' onclick="return false" rel='nofollow'>Rooms</a></li>
    <li class="links"><a tabindex="0" class="waves-effect sidenav-close" onclick="sidenav_highlight(this); change_title('Kitchen');sm_page('Contact');AJAX_LOAD('#Contact', './rooms/kitchen/view.php');"><i class="material-icons-round" style="font-size: 24px">blender</i>Kitchen</a></li>
    <li class="links"><a tabindex="0" class="waves-effect sidenav-close" onclick="sidenav_highlight(this); change_title('Bedroom');sm_page('Home');AJAX_LOAD('#Home', './rooms/bedroom/view.php')"><i class="material-icons-round">bed</i>Bedroom</a></li>
    <li class="links"><a tabindex="0" class="waves-effect sidenav-close" onclick="sidenav_highlight(this); change_title('Bathroom');sm_page('bathroom');AJAX_LOAD('#bathroom', './rooms/bathroom/view.php')"><i class="material-icons-round">wc</i>Bathroom</a></li>
    <li class="links"><a tabindex="0" class="waves-effect sidenav-close" onclick="sidenav_highlight(this); change_title('Garage');sm_page('About');AJAX_LOAD('#About', './rooms/garage/view.php')"><i class="material-icons-round">build</i>Garage</a></li>
    <li class="links"><a tabindex="0" class="waves-effect sidenav-close" onclick="sidenav_highlight(this); change_title('Family Room');sm_page('family');AJAX_LOAD('#family', './rooms/family/view.php')"><i class="material-icons-round">chair</i>Family Room</a></li>
    <li class="links"><a tabindex="0" class="waves-effect sidenav-close" onclick="sidenav_highlight(this); change_title('Storage Room');sm_page('storage');AJAX_LOAD('#storage', './rooms/storage/view.php')"><i class="material-icons-round">domain</i>Storage room</a></li>
    <li class="links no-padding">
      <ul class="collapsible">
        <li style='border-radius:2px;width:290px;margin:0px;background: transparent' class="links">
          <div class="collapsible-header waves-effect" style="padding-left: 28px;margin:5px;width:290px;background: transparent"><i class="material-icons-round" style="position:relative;right: -2px;">arrow_drop_down</i><span style="margin-left: 15px;">More rooms</span></div>
          <div class="collapsible-body" style="background: transparent">
            <ul>
              <li class="links"><a tabindex="0" class="waves-effect sidenav-close" onclick="sidenav_highlight(this); change_title('Camping Supplies');sm_page('cs');AJAX_LOAD('#cs', './rooms/camping/view.php');"><i class="material-icons-round">landscape</i>Camping Supplies</a></li>
              <li class="links"><a tabindex="0" class="waves-effect sidenav-close" onclick="sidenav_highlight(this); change_title('Dining Room');sm_page('dining_room');AJAX_LOAD('#dining_room', './rooms/dining_room/view.php')"><i class="material-icons-round">restaurant</i>Dining Room</a></li>
              <li class="links"><a tabindex="0" class="waves-effect sidenav-close" onclick="sidenav_highlight(this); change_title('Laundry Room');sm_page('laundryroom');AJAX_LOAD('#laundryroom', './rooms/laundry/view.php')"><i class="material-icons-round">local_laundry_service</i>Laundry Room</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </li>
    <li style="pointer-events:none">
      <div class="divider"></div>
    </li>
    <li class="links"><a class="subheader" href="javascript:void(0)" rel='nofollow'>Custom Rooms</a></li>
    <?php
    try {
      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $sql = "SELECT * FROM roomnames WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . $_SESSION['syncid'];
      $users = $dbh->query($sql);
      foreach ($users as $row) {
        print "<li class=\"links\"><a tabindex=\"0\" href='javascript:void(0)' class=\"waves-effect sidenav-close\" onclick=\"sidenav_highlight(this);change_title('" . str_replace('"', '', str_replace("'", "", $row['name'])) . "');load_croom('" . str_replace('"', '', str_replace("'", "", $row['id'])) . "', '" . str_replace('"', '', str_replace("'", "", $row['name'])) . "')\"><i class='material-icons-round'>" . $row['qty'] . "</i>" . $row["name"] . "</a></li>";
      }
      $dbh = null;
    } catch (PDOexception $e) {
      echo "Error is: " . $e->getmessage();
    }
    ?>
    <li class="links"><a class="waves-effect sidenav-close" href="https://smartlist.ga/dashboard/rooms/custom_room/add_room.php"><i class="material-icons-round">add_location_at</i>Create custom room</a></li>

    <li style="pointer-events:none">
      <div class="divider"></div>
    </li>
    <li class="links"><a class="subheader" href="javascript:void(0)" rel='nofollow'>Other</a></li>
    <li class="links"><a tabindex="0" class="waves-effect sidenav-close" href="javascript:void(0)" onclick="sidenav_highlight(this); sm_page('gl');AJAX_LOAD('#gl', './user/notes/index.php');change_title('Notes')"><i class="material-icons-round">sticky_note_2</i>Notes / Documents <span class="new-badge">New!</span></a></li>
    <li class="links"><a tabindex="0" class="waves-effect sidenav-close" href="javascript:void(0)" onclick="sidenav_highlight(this); sm_page('foodwaste');AJAX_LOAD('#foodwaste', './rooms/foodwaste/view.php');change_title('Food Waste')"><i class="material-icons-round">no_food</i>Food Wastage</a></li>
    <li class="links"><a tabindex="0" class="waves-effect sidenav-close" href="javascript:void(0)" onclick="sidenav_highlight(this); sm_page('STARRED_ITEMS');change_title('Starred'); AJAX_LOAD('#STARRED_ITEMS', './rooms/starred-items.php')"><i class="material-icons-round">star</i>Starred</a></li>
    <li class="links" style="overflow: visible"><a tabindex="0" class="waves-effect sidenav-close" href="javascript:void(0)" onclick="sidenav_highlight(this); sm_page('STARRED_ITEMS');change_title('Maintenance'); AJAX_LOAD('#STARRED_ITEMS', './rooms/maintenance.php?card')"><i class="material-icons-round">construction</i>Maintenance</a></li>
    <li class="links"><a tabindex="0" class="waves-effect sidenav-close" rel="noreferrer" href="https://recipe-generator.smartlist.ga/" target="_blank"><i class="material-icons-round">casino</i>Recipe Generator</a></li>
    <li class="links"><a tabindex="0" class="waves-effect sidenav-close" href="javascript:void(0)" onclick="sidenav_highlight(this); sm_page('trash_c');AJAX_LOAD('#trash_c', './rooms/trash.php');change_title('Trash');"><i class="material-icons-round">delete</i>Trash</a></li>
    <li style="pointer-events:none">
      <div class="divider">
      </div>
    </li>
    <li class="links"><a class="subheader" href="javascript:void(0)" rel='nofollow'>Events</a></li>
    <li class="links"><a tabindex="0" target="_blank" class="waves-effect sidenav-close" rel="noopener" href="https://events.smartlist.ga/"><i class="material-icons-round">event</i>Join event</a></li>
    <li class="links"><a tabindex="0" target="_blank" class="waves-effect sidenav-close" rel="noopener" href="https://events.smartlist.ga/add.php"><i class="material-icons-round">open_in_new</i>Create
        event</a></li>
    <li class="links" style="pointer-events:none">
      <div class="divider">
      </div>
    </li>
    <li><a class="subheader" href="javascript:void(0)" rel='nofollow'>Profile</a></li>
    <li class="links"><a tabindex="0" class="waves-effect " href="javascript:void(0)" onclick="sidenav_highlight(this); sm_page('notification_popup');AJAX_LOAD('#notification_popup', './rooms/notifications.php');brandlogotext.innerHTML = 'Inbox'"><i class="material-icons-round">notifications_outline</i>Notifications <span id="badge" class="badge"></span>
    <li class="links"><a tabindex="0" class="waves-effect sidenav-close" onclick="sidenav_highlight(this); sm_page('modal1');meta_theme_color('#1f1f1f')"><i class="material-icons-round">settings</i>Settings</a></li>
    <li class="links"><a tabindex="0" class="waves-effect modal-trigger sidenav-close" href="#_feedback" onclick="change_title('Feedback')"><i class="material-icons-round">feedback</i>Feedback</a></li>
    </a>
    </li>
  </ul>
  <div id="accounts" class="modal bottom-sheet" style="margin: auto !important">
    <div class="modal-close">
      <a href="javascript:void(0)" onclick="sm_page('modal1');meta_theme_color('#1f1f1f')" class="waves-effect" style="width: 100%;padding: 15px">Settings</a>
      <a href="javascript:void(0)" onclick="sm_page('modal1')" class="waves-effect" style="width: 100%;padding: 15px">Account</a>
      <a href="#_feedback" class="modal-trigger waves-effect" style="width: 100%;padding: 15px">Feedback</a>
      <a href="javascript:void(0)" onclick="document.getElementById('notification').click()" class="waves-effect" style="width: 100%;padding: 15px">Notifications</a>
      <div class="divider"></div>
      <a href="logout.php" class="waves-effect" style="width: 100%;padding: 15px">Logout</a>
    </div>
  </div>
  <div id="_feedback" class="modal bottom-sheet">
    <div class="modal-content">
      <h4>Feedback</h4>
      <p>Have any questions, concerns, or feature requests? We're all ears!</p>
      <form id="feedback-form" action="https://formspree.io/f/mbjqjeyo" method="POST">
        <input type="hidden" name="email" value="<?php echo htmlspecialchars($_SESSION['email']); ?>" />
        <input type="hidden" name="login_id" value="<?php echo htmlspecialchars($_SESSION['id']); ?>" />
        <label>Message:</label>
        <textarea class="materialize-textarea" name="message"></textarea>
        <button id="my-form-button" class="waves-effect btn blue-grey darken-3 waves-light">Submit</button>
        <p id="my-form-status"></p>
      </form>
    </div>
  </div>
  <div class="fixed-action-btn" id="fab1" style="z-index:9999999">
    <a class="btn-floating btn-large tooltipped waves-effect waves-light" data-tooltip="Edit" data-position="left" style="background:#212121;z-index:999999999999999999999999999999999999999999 !important;border-radius: 999999999px !important;transition:all .2s !important;" href="javascript:void(0)" id="editfab">
      <i class="large material-icons-round left" style="color:white !important">edit</i>
    </a>
  </div>
  <div class="fixed-action-btn" id="fab">
    <a class="btn-floatsing btn-large waves-effect waves-light FLOATING_ACTION_BUTTON" href="javascript:void(0)" style="background:var(--navbar-color);z-index:99999999999999999999999999999999999999 !important;border-radius: 999999999px !important;color:white;text-decoration:none;transition:width .2s, transform .2s !important;transform-origin: right;box-shadow:0 4px 5px -2px rgba(0,0,0,.2),0 7px 10px 1px rgba(0,0,0,.14),0 2px 16px 1px rgba(0,0,0,.12)!important;" id="FLOATING_ACTION_BUTTON">
      <i class="large material-icons-round left" style="color:white !important">add</i>
      <span>Add</span>
    </a>
    <ul>
      <li data-position="left" data-tooltip="Task" class="tooltipped"><a class="fab_btn btn-floating" href="javascript:void(0)" onclick="sm_page('todo_add');AJAX_LOAD('#todo_add', './rooms/todo/quickadd.php')"><i class="material-icons-round" style="color:white !important">check</i></a></li>
      <li data-position="left" data-tooltip="Item" class="tooltipped"><a class="fab_btn btn-floating modal-trigger" href="#budgetmetermodala"><i class="material-icons-round" style="color:white !important">category</i></a></li>
      <li data-position="left" data-tooltip="Shopping List" class="tooltipped"> <a href="javascript:void(0)" onclick="sm_page('grocerylist_add');AJAX_LOAD('#grocerylist_add', './rooms/grocerylist/quickadd.php')" class="fab_btn text-center float-right btn-floating"><i class="material-icons-round" style="color:white !important">receipt_long</i></a></li>
      <li data-position="left" data-tooltip="Food Waste" class="tooltipped"> <a href="javascript:void(0)" onclick="sm_page('fw_add');AJAX_LOAD('#fw_add', './rooms/foodwaste/quickadd.php')" class="fab_btn text-center float-right btn-floating"><i class="material-icons-round" style="color:white !important">no_food</i></a></li>
    </ul>
  </div>
  <!--CONTENT BEGINS-->
  <div id="CONTENT" tabindex="0" style="outline:0;">
    <div id="loader" class="tabcontent" style="display:block">
      <div style="padding-top: 40vh;">
        <center> <svg class='circular' height='50' width='50'>
            <circle class='path' cx='25' cy='25' r='20' fill='none' stroke-width='3' stroke-miterlimit='10' />
          </svg> </center>
      </div>
    </div>
    <div id="modal1" class="tabcontent" style="position:fixed;top:0;left:0;z-index:999999;width:100%;overflow-y:scroll">
      <nav style="position:fixed;top:0;left:0;z-index:2;width:100%;background: #303030">
        <ul>
          <li>
            <a href="javascript:void(0)" class="waves-efsfect waves-slight" onclick="sm_page('News');meta_theme_color(user.theme_top_color)" id="capitalizeFirstLetter" style="font-size: 20px"><i class="material-icons-round left" id="settings-icon" style="color:white;top:20px">arrow_back</i> Settings</a>
          </li>
        </ul>
      </nav>
      <div class="container" id="settingsContainer">
        <div class="row" style="margin-top: 10px">
          <div style="padding: 0 !important" class="col s12 m3 __sidebar">
            <div class="collection" style="border:1px solid #ccc;border-radius: 5px;" id='_settingsmenu'> <a href="javascript:void(0)" id="__def" onclick="_settingsLoad(this, this.getElementsByTagName('span')[0].innerHTML.toLowerCase().replace(' ', ''))" class="collection-item waves-effect"><span>Account</span></a> <a href="javascript:void(0)" onclick="_settingsLoad(this, this.getElementsByTagName('span')[0].innerHTML.toLowerCase().replace(' ', ''));AJAX_LOAD('#_smSettingsPage_privacy', './user/settings/privacy.php', 'box')" class="collection-item waves-effect"><span>Privacy</span></a> <a href="javascript:void(0)" onclick="_settingsLoad(this, this.getElementsByTagName('span')[0].innerHTML.toLowerCase().replace(' ', ''));AJAX_LOAD('#_smSettingsPage_notifications', './user/settings/notifications.php', 'box')" class="collection-item waves-effect"><span>Notifications</span></a> <a href="javascript:void(0)" onclick="_settingsLoad(this, this.getElementsByTagName('span')[0].innerHTML.toLowerCase().replace(' ', ''));AJAX_LOAD('#_smSettingsPage_rooms', './user/settings/rooms.php', 'box')" class="collection-item waves-effect"><span>Rooms</span></a> <a href="javascript:void(0)" onclick="_settingsLoad(this, this.getElementsByTagName('span')[0].innerHTML.toLowerCase().replace(' ', ''))" class="collection-item waves-effect"><span>Appearance</span></a> <a href="javascript:void(0)" onclick="_settingsLoad(this, this.getElementsByTagName('span')[0].innerHTML.toLowerCase().replace(' ', ''));AJAX_LOAD('#_smSettingsPage_sync', './user/settings/sync.php', 'box')" class="collection-item waves-effect" class="collection-item waves-effect"><span>Sync</span></a> <a href="javascript:void(0)" onclick="_settingsLoad(this, this.getElementsByTagName('span')[0].innerHTML.toLowerCase().replace(' ', ''));AJAX_LOAD('#_smSettingsPage_categories', './user/settings/categories.php', 'box')" class="collection-item waves-effect">
                <div style="margin-top: 2px" class="new-badge right">New!</div><span>Categories </span>
              </a> <a href="javascript:void(0)" onclick="_settingsLoad(this, this.getElementsByTagName('span')[0].innerHTML.toLowerCase().replace(' ', ''))" class="collection-item waves-effect"><span>App</span></a> <a href="javascript:void(0)" onclick="_settingsLoad(this, this.getElementsByTagName('span')[0].innerHTML.toLowerCase().replace(' ', ''));AJAX_LOAD('#_smSettingsPage_developer', './user/settings/developer.php', 'box')" class="collection-item waves-effect"><span>Developer</span></a> <a href="javascript:void(0)" onclick="_settingsLoad(this, this.getElementsByTagName('span')[0].innerHTML.toLowerCase().replace(' ', ''));AJAX_LOAD('#_smSettingsPage_support', './user/settings/support.php', 'box')" class="collection-item waves-effect"><span>Support</span></a>
              <a href="javascript:void(0)" onclick="_settingsLoad(this, this.getElementsByTagName('span')[0].innerHTML.toLowerCase().replace(' ', ''));AJAX_LOAD('#_smSettingsPage_backup', './user/settings/backup.php', 'box')" class="collection-item waves-effect"><span>Backup</span></a>
              <a href="logout.php" class="collection-item waves-effect"><span>Log Out</span></a> <a href="javascript:void(0)" onclick="_settingsLoad(this, this.getElementsByTagName('span')[0].innerHTML.toLowerCase().replace(' ', ''));AJAX_LOAD('#_smSettingsPage_other', './user/settings/other.php', 'box')" class="collection-item waves-effect"><span>Other</span></a>
            </div>
          </div>
          <div class="col s12 m9">
            <div id="_smSettingsPage_categories" class="__SETTINGSPAGE"></div>
            <div id="_smSettingsPage_backup" class="__SETTINGSPAGE"></div>
            <div id="_smSettingsPage_account" class="__SETTINGSPAGE">
              <div class="row">
                <div class="col s12 m10">
                  <h1 style="margin:0;width:100%;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                    <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
                  <h5>Username: <?php echo htmlspecialchars($_SESSION['name']); ?></h5>
                  <h5>ID: <span style="background:#ccc;color:#ccc;transition: all .2s;cursor:pointer" onclick="this.style.color='black';this.style.backgroundColor = 'transparent'"><?php echo htmlspecialchars($_SESSION['id']); ?></span>
                  </h5>
                  <h6>Your email: <span style="background:#ccc;color:#ccc;transition: all .2s;cursor:pointer" onclick="this.style.color='black';this.style.backgroundColor = 'transparent'"><?php echo htmlspecialchars($_SESSION['email']); ?></span>
                  </h6>
                  <h5 style="color: gray;font-size: 13px;">Your data is end-to-end encrypted</h5>
                  <h6 style="color: gray;font-size: 13px;">(Click to reveal)</h6>
                </div>
                <div class="col s2 hide-on-small-only">
                  <div class="container"><img src="<?php echo htmlspecialchars($_SESSION['avatar']); ?>" width="100px" height="100px" style="border-radius:999px;" /></div>
                </div>
              </div>
            </div>
            <div id="_smSettingsPage_sync" class="__SETTINGSPAGE"></div>
            <div id="_smSettingsPage_privacy" class="__SETTINGSPAGE"></div>
            <div id="_smSettingsPage_rooms" class="__SETTINGSPAGE"></div>
            <div id="_smSettingsPage_logout" class="__SETTINGSPAGE"></div>
            <div id="_smSettingsPage_appearance" class="__SETTINGSPAGE">
              <h5>Appearance</h5><br>
              <div class="switch" style="margin-bottom: 10px">
                <label>
                  Dark mode
                  <input type="checkbox" value="dark" id="darkmode">
                  <span class="lever right"></span>
                </label>
              </div>
              <div class="switch" style="margin-bottom: 10px">
                <label>
                  Dark Sidenav
                  <input type="checkbox" value="dark" id="darksidenav" oninput="if(this.checked==true){document.documentElement.classList.add('dark_theme_sidebar')} else {document.documentElement.classList.remove('dark_theme_sidebar')}">
                  <span class="lever right"></span>
                </label>
              </div>
              <div class="switch" style="margin-bottom: 10px">
                <label>
                  Hide Starred Items (Coming Soon!)
                  <input type="checkbox" value="dark" id="htarreditems" disabled>
                  <span class="lever right"></span>
                </label>
              </div>
              <div class="switch" style="margin-bottom: 10px">
                <label>
                  Reduced Motion (Coming Soon!)
                  <input type="checkbox" value="dark" id="rmotion" disabled>
                  <span class="lever right"></span>
                </label>
              </div>
              <div class="collection">
                <a class='dropdown-trigger collection-item waves-effect' href='javascript:void(0)' data-target='dropdown1'><strong>Theme</strong><span style="color:gray"><br>Fair warning (for mobile
                    users only): Changing the theme color can have unexpected results.</span></a>
                <ul id='dropdown1' class='dropdown-content' style='min-width: 30vw;max-height: 300px;min-height: 300px;position:fixed !important;z-index:99999'>
                  <li><a onclick='_color.value = "41308a";document.getElementById("__colorform").submit()' href="javascript:void(0)">Default <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEVFJ6D////Exu4TAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='circle right' /></a></li>
                  <li><a onclick='_color.value = "6200ea";document.getElementById("__colorform").submit()' href="javascript:void(0)">Purple <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEViAOr///9ZJ5DQAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='circle right' /></a></li>
                  <li><a onclick='_color.value = "B00020";document.getElementById("__colorform").submit()' href="javascript:void(0)">Red <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEWwACD///8fISOWAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='circle right' /></a></li>
                  <li><a onclick='_color.value = "00695c";document.getElementById("__colorform").submit()' href="javascript:void(0)">Teal <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEUAaVz///+wIDr7AAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='circle right' /></a></li>
                  <li><a onclick='_color.value = "00838f";document.getElementById("__colorform").submit()' href="javascript:void(0)">Cyan <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEUAg4/////mpfPyAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='circle right' /></a></li>
                  <li><a onclick='_color.value = "0277bd";document.getElementById("__colorform").submit()' href="javascript:void(0)">Blue <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEUCd73///9M+5ROAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='circle right' /></a></li>
                  <li><a onclick='_color.value = "2e7d32";document.getElementById("__colorform").submit()' href="javascript:void(0)">Green <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEUufTL////DH+/PAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='circle right' /></a></li>
                  <li><a onclick='_color.value = "ef6c00";document.getElementById("__colorform").submit()' href="javascript:void(0)">Orange <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEXvbAD///8eCazGAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='circle right' /></a></li>
                  <li><a onclick='_color.value = "ad1457";document.getElementById("__colorform").submit()' href="javascript:void(0)">Pink <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEWtFFf////D4Zu0AAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='circle right' /></a></li>
                  <li><a onclick='_color.value = "37474f";document.getElementById("__colorform").submit()' href="javascript:void(0)">Blue-gray <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEU3R0////+VAmT6AAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" width="20px" class='circle right' /></a></li>
                  <!--<li><a onclick='_color.value = "212121";document.getElementById("__colorform").submit()' href="javascript:void(0)">Black <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEUhISH///+NBoehAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" width="20px" class='circle right'/></a></li>-->
                  <!--<li><a onclick='_color.value = "6d4c41";document.getElementById("__colorform").submit()' href="javascript:void(0)">Brown <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEVtTEH///+vGAlJAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" width="20px" class='circle right'/></a></li>-->
                </ul>
                <form action="./user/color.php" id="__colorform" method="POST"> <input type='hidden' name='color' id='color' value="<?php echo $theme; ?>"> </form> <a class="waves-effect collection-item modal-trigger  modal-close" href="#avarar">Change my
                  avatar</a>
              </div>
            </div>
            <div id="_smSettingsPage_labels" class="__SETTINGSPAGE">Labels</div>
            <div id="_smSettingsPage_notifications" class="__SETTINGSPAGE"></div>
            <div id="_smSettingsPage_app" class="__SETTINGSPAGE">
              <h5>App</h5><br>
              <button class="add-button btn blue-grey darken-3">Install app</button>
            </div>
            <div id="_smSettingsPage_developer" class="__SETTINGSPAGE"></div>
            <div id="_smSettingsPage_support" class="__SETTINGSPAGE"></div>
            <div id="_smSettingsPage_other" class="__SETTINGSPAGE"></div>
            <!--<button onclick="$('#capitalizeFirstLetter').click()" class="hide-on-med-and-up btn blue-grey darken-3">Back</button>-->
          </div>
        </div>
      </div>
    </div>
    <div id="News" class="tabcontent" style="background:var(--bg-color);animation:tab .2s forwards !important;padding: 10px;padding-top: 70px">
      <div class="row" style="margin-bottom: 0 !important">
        <div class="c col s12 m12" style="<?= (($row_count !== 0) ? "background:var(--chart-color) !important;" : "") ?>height: auto !important;">
          <div class="card" <?= (($row_count == 0) ? "style='padding: 100px !important'" : "") ?>>
            <div class="card-content">
              <?php
              if ($row_count == 0) {
                echo "<h6 class='center' style='margin: 0;color: gray'>No data in budget meter to display<br><a href='https://support.smartlist.ga/docs/#/no-data-in-budget-meter-to-display' style='color: #aaa' class='center'>More Info</a></h6>";
              } else { ?>
                <h5 style="margin-top: 0;">My Expenses <?php if ($moneyToday > $goal) { echo '<i class="material-icons red-text tooltipped" data-tooltip="Expenditures are exceeding your goal" style="vertical-align: middle">warning</i>'; }?><?php if ($moneyToday <= $goal) { echo '<i class="material-icons green-text tooltipped" data-tooltip="Expenditures are below your goal" style="vertical-align: middle">check_circle</i>'; }?> <a href="#bmmodal" class="modal-trigger right btn btn-flat waves-effect btn-floating"><i class='material-icons refresh' style="transform: none !important">add</i></a></h5><br>
                <!--<canvas id="myChart" style="width: 100%;display: none" class="ree"></canvas>-->
                <canvas id="budgetMeter" style="width: 100%;"></canvas>
                <div id="chart"> </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div id="test1" class="col s12 m6">
          <div>
            <?php
            try {
              $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
              $stmt = $dbh->query('SELECT * FROM todo WHERE login_id=' . $_SESSION['id']);
              $todo_row_count = $stmt->rowCount();
              $dbh = null;
            } catch (PDOexception $e) {
              echo "Error is: " . $e->getmessage();
            }
            if ($todo_row_count > 0) {
              try {
                $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $sql = "SELECT * FROM todo WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . $_SESSION['syncid'];
                $users = $dbh->query($sql);
                echo "<div class='card' id='todo_container'><div class='card-content'><h5 style='margin-top:0'>Todo <a href=\"javascript:void(0)\" class=\"right btn btn-flat waves-effect btn-floating\" onclick=\"AJAX_LOAD('#todo_container', './rooms/todo/index.php');\"><i class='material-icons refresh'>refresh</i></a></h5><br>";
                foreach ($users as $todo_listx) {
                  echo '<p><label><input type="checkbox" onchange=\'$("#div1").load("https://smartlist.ga/dashboard/rooms/todo/delete.php?id=' . $todo_listx['id'] . '");this.disabled=true;this.nextElementSibling.style.color = "gray";\'/><span><strong>' . htmlspecialchars($todo_listx['name']) . '</strong><br>Priority: ' . htmlspecialchars($todo_listx['qty']) . '<br>'.(!empty(trim($todo_listx['price'])) ? 'Due on: ' . $todo_listx['price'] . '<br>' : '').'<div style="padding-left: 35px;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">'.(!empty($todo_listx['descs']) ? 'Description: ' . htmlspecialchars($todo_listx['descs']) : ""). '</div></span></label></p>';
                }
                echo "</div></div>";
                $dbh = null;
              } catch (PDOexception $e) {
                echo "Error is: " . $e->getmessage();
              }
            } else {
              echo "<div class='card'><div class='card-content'><h5 style='margin-top:0'>Todo</h5><div class='container'><div class='container'><img alt='image' loading='lazy' src='https://res.cloudinary.com/smartlist/image/upload/v1615853475/gummy-coffee_300x300_dlc9ur.png'width='100%' style='display:block;margin:auto;'></div></div><br><p class='center'>Great job - you finished all tasks! Why not take this time to drink some coffee or go for a walk?</p></div></div>";
            }
            ?>
            <div class="hide-on-small-only">
            <?php 
                include('./rooms/starred.php'); 
            ?>
            </div>
          </div>
        </div>
        <div class="col s12 m6">
          <div id="grocery_list"><?php
                                  try {
                                    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                    $stmt = $dbh->query('SELECT * FROM grocerylist WHERE login_id=' . $_SESSION['id']);
                                    $gl_row_count = $stmt->rowCount();
                                    //echo $gl_row_count;
                                    $dbh = null;
                                  } catch (PDOexception $e) {
                                    echo "Error is: " . $e->getmessage();
                                  }
                                  if ($gl_row_count > 0) {
                                    try {
                                      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                      $sql = "SELECT * FROM grocerylist WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . $_SESSION['syncid'];
                                      $users = $dbh->query($sql);
                                      echo "<div class='card'><div class='card-content'><h5 style='margin-top:0'>Shopping List<a href=\"javascript:void(0)\" class=\"right btn btn-flat waves-effect btn-floating\" onclick=\"AJAX_LOAD('#grocery_list', './rooms/grocerylist/index.php');\"><i class='material-icons refresh'>refresh</i></a></h5><br>";
                                      foreach ($users as $todo_listx) {
                                        echo '<p><label><input type="checkbox" onchange=\'$("#div1").load("https://smartlist.ga/dashboard/rooms/grocerylist/delete.php?id=' . $todo_listx['id'] . '");this.disabled=true;this.nextElementSibling.style.color = "gray";\'/><span><strong>' . htmlspecialchars($todo_listx['name']) . '</strong><br>Quantity: ' . htmlspecialchars($todo_listx['qty']) . '</span></label></p>';
                                      }
                                      echo "</div></div>";
                                    } catch (PDOexception $e) {
                                      echo "Error is: " . $e->getmessage();
                                    }
                                  } else {
                                    echo "<div class='card'><div class='card-content'><h5 style='margin-top:0'>Shopping List</h5><div class='container'><div class='container'><img alt='image' loading='lazy' src='https://res.cloudinary.com/smartlist/image/upload/v1615853654/b21f813da2e0c122d2950bf1b449106a-winter-woman-shopping-illustration-by-vexels_xszuie.png'width='100%' style='display:block;margin:auto;'></div></div><br><p class='center'>Nothing in your Shopping List.... Good Job! </p></div></div>";
                                  }
                                  ?>
          </div>
          <div class="card fade-up">
            <div class="card-content">
              <h5 style="margin-top:0;">Maintenance for this month</h5>
              <p>Content will next refresh on <?php echo date('m/d/Y', strtotime('first day of +1 month')); ?>
              </p>
              <div class="collection" style="margin-top: 10px">
                <?php $month = date('M');
                switch ($month) {
                  case 'Jan': ?> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your stove</strong><br>Clean your stove. It's probably messy
                      after a year</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean couches</strong><br>Clean your couches. Wash any throws and
                      pillow cases</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your car</strong><br>Take your car to a car wash!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Strip
                        the entire bedding of your home</strong><br>Wash every single blanket, pillow, and bed sheets
                      in your home</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Inspect your pipes</strong><br>Inspect your pipes. Make sure nothing is
                      leaking!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean shower heads</strong><br>Clean shower heads using vinegar. Make
                      sure there isn't any hair/soap on it</a>
                  <?php
                    break;
                  case 'Feb': ?>
                    <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Remove
                        expired food</strong><br>Remove any stale/expired food</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your pantry</strong><br>Organize your
                      entire pantry!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your fridge</strong><br>Make sure to clean your entire
                      fridge!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your shelves/countertops</strong><br>Wipe down shelves and
                      countertops</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your dining table</strong><br>Remove any food stains</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean
                        your rooms</strong><br>Scan for any dust and debris in your rooms</a>
                  <?php
                    break;
                  case 'Mar': ?>
                    <div style="background: rgba(200,200,200,.1);padding: 15px">Take a break! You've worked hard
                      last month! Sit back, relax, and why not watch some TV?</div>
                  <?php
                    break;
                  case 'Apr': ?>
                    <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Spring
                        Cleaning</strong><br>Make sure to check every room in your home and clean out the clutter!</a>
                    <a class="collection-item" href="javascript:void(0)"> <strong>Clean out your mail</strong><br>Throw out
                      any junk mail that is unnecessary<br> </a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Check AC/heat filter</strong><br>Make sure
                      your AC filters are working properly</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Check Sprinklers</strong><br>Make sure all
                      your sprinklers are fully functional.</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Dust your TV</strong><br>You wouldn't want
                      dust on your TV when you're watching your favorite show!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Descale
                        Coffee maker</strong><br>Make sure you descale your coffee maker every year!</a>
                  <?php
                    break;
                  case 'May': ?>
                    <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Make
                        your beds</strong><br>Wash and fold your blankets</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Do your laundry</strong><br>Fold the clothes
                      in your laundry room</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Check and Vacuum floors</strong><br>Make sure that there aren't any
                      loose tiles in your flooring</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your gutters</strong><br>Remove any dirt from your gutters</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean
                        your windows</strong><br>Use glass cleaning spray, and wipe down your windows!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Prune
                        your plants</strong><br>Remove any excess branches or dying branches. Let them grow the
                      upcoming months</a>
                  <?php
                    break;
                  case 'Jun': ?>
                    <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean
                        your washing machine</strong><br>Run your washing machine empty with vinegar</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Remove
                        weeds</strong><br>Pull weeds out in your garden</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your nightstands</strong><br>Remove
                      dust from your nightstand</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Remove lint from your dryer</strong><br>Pull the lint out from your
                      dryer's lint compartment</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your bathroom</strong><br>Clean the shower, toilet, and sink</a>
                    <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean
                        your storage room</strong><br>Sort out everything in your storage room</a>
                  <?php
                    break;
                  case 'Jul': ?>
                    <div style="background: rgba(200,200,200,.1);padding: 15px">Take a break! You've worked hard
                      last month! Sit back, relax, and why not watch some TV?</div>
                  <?php
                    break;
                  case 'Aug': ?>
                    <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Fall
                        cleaning!</strong><br>Make sure to check every room in your home and clean out the clutter!</a>
                    <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean
                        out your mail</strong><br>Throw out any junk mail that is unnecessary</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Check
                        AC/heat filter</strong><br>Make sure your AC filters are working properly</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Check
                        Sprinklers</strong><br>Make sure all your sprinklers are fully functional. </a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Dust
                        your TV</strong><br>You wouldn't want dust on your TV when you're watching your favorite
                      show!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Descale Coffee maker</strong><br>Make sure you descale your coffee
                      maker every year!</a>
                  <?php
                    break;
                  case 'Sep': ?>
                    <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Scan for
                        loose shingles</strong><br>Scan for loose shingles on your roof</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean
                        your grill</strong>Scrub all corners of the grill<br></a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your fireplace</strong><br>Make sure
                      there isn't any ash in your fireplace</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Drain garden hoses</strong><br>Drain your
                      garden hose</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Water your plants</strong><br>Make sure your plants don't dry out!</a>
                    <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Replace
                        your car's emergency kit</strong><br>This way, you're going to be prepared for any
                      disaster!</a>
                  <?php
                    break;
                  case 'Oct': ?>
                    <div style="background: rgba(200,200,200,.1);padding: 15px">Take a break! You've worked hard
                      last month! Sit back, relax, and why not watch some TV?</div>
                  <?php
                    break;
                  case 'Nov': ?>
                    <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Remove
                        expired food</strong><br>Remove stale/expired food</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your pantry</strong><br>Organize your
                      entire pantry!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your fridge</strong><br>Make sure to clean your entire
                      fridge!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your shelves/countertops</strong><br>Wipe down shelves and
                      countertops</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your dining table</strong><br>Remove any food stains</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean
                        your rooms</strong><br>Scan for any dust and debris in your rooms</a>
                  <?php
                    break;
                  case 'Dec': ?>
                    <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Winter
                        cleaning!</strong><br>Is this even a thing? But still, clean your rooms!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean
                        out your mail</strong><br>Throw out any junk mail that is unnecessary</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Check
                        AC/heat filter</strong><br>Make sure your AC filters are working properly</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Check
                        Sprinklers</strong><br>Make sure all your sprinklers are fully functional.</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Dust
                        your TV</strong><br>You wouldn't want dust on your TV when you're watching your favorite
                      show!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Descale Coffee maker</strong><br>Make sure you descale your coffee
                      maker every year!</a>
                <?php
                    break;
                  default:
                    break;
                } ?>
              </div>
            </div>
          </div>
          <div class="card fade-up">
            <div class="card-content">
              <h5>Categories</h5>
              <br>
              <div class="chip waves-effect" onclick="var e=document.getElementById('search');showsearch();e.focus();e.value=this.innerText;e.click()"> Fruits, Veggies, etc. </div>
              <div class="chip waves-effect" onclick="var e=document.getElementById('search');showsearch();e.focus();e.value=this.innerText;e.click()"> Pots/Pans </div>
              <div class="chip waves-effect" onclick="var e=document.getElementById('search');showsearch();e.focus();e.value=this.innerText;e.click()"> Cutlery </div>
              <div class="chip waves-effect" onclick="var e=document.getElementById('search');showsearch();e.focus();e.value=this.innerText;e.click()"> Bottles and Cups </div>
              <div class="chip waves-effect" onclick="var e=document.getElementById('search');showsearch();e.focus();e.value=this.innerText;e.click()"> Bowls and Plates </div>
              <?php
                try
                {
                    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $sql = "SELECT * FROM labels WHERE login= " . $_SESSION['id'];
                    $users = $dbh->query($sql);
                        foreach ($users as $row){
                            ?>
                            <div class="chip waves-effect" onclick="var e=document.getElementById('search');showsearch();e.focus();e.value=this.innerText;e.click()"> <?=htmlspecialchars($row['name'])?> </div>
                            <?php
                    }
                        $dbh = null;
                }
                catch(PDOexception $e)
                {
                    echo "Error is: " . $e->etmessage();
                }
            ?>
            </div>
          </div>
          <div class="card fade-up" style="border: 2px solid #4caf50;border-radius: 4px">
            <div class="card-content">
              <h5>Eco-friendly Home</h5>
              <div class="collection">
                <a class="collection-item" href="javascript:void(0)">Turn off lights</a>
                <a class="collection-item" href="javascript:void(0)">Save Water</a>
                <a class="collection-item" href="javascript:void(0)">Use reuseable water bottles</a>
                <a class="collection-item" href="javascript:void(0)">Use natural cleaners</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <nav style="position:fixed;background: #212121;z-index:10000;top:0;display:none;overflow:visible;overflow-y: hidden" id="secondary_nav">
      <div class="nav-wrapper">
        <a href="javascript:void(0)" class="brand-logo left hide-on-large-only" onclick="back();" style="margin-left: 7px !important;margin-top: 0 !important"><i class="material-icons-round">arrow_back</i> <span style="font-size: 20px;position: relative;top: -3px;"></span></a>
        <ul class="right snav">
          <li><a href="javascript:void(0)" id="nav_star" class=" waves-effect waves-yellow" data-position="bottom" data-tooltip="Star item"><i class="material-icons-round">star_outline</i></a></li>
          <li><a style="animation-delay:100ms" href="javascript:void(0)" id="nav_edit" class="waves-effect waves-light" data-position="bottom" data-tooltip="Edit item"><i class="material-icons-round">edit</i></a></li>
          <li><a style="animation-delay:200ms" href="javascript:void(0)" id="nav_delete" class="waves-effect waves-light"><i class="material-icons-round">delete</i></a></li>
        </ul>
      </div>
    </nav>
    <nav style="position:fixed;background: #212121;z-index:10000;top:0;display:none;overflow:visible" id="edit_nav">
      <a href="javascript:void(0)" class="brand-logo left hide-on-large-only" onclick="edit_back();" style="margin: 0 !important" id="editback"><i class="material-icons-round">arrow_back</i> <span style="font-size: 20px;position: relative;top: -3px;">Edit</span></a>
    </nav>
    <div id="edit_page" class="tabcontent">
      <div class="container">
        <h5>Edit item</h5>
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
              <button type="button" onclick='var x = document.getElementById("edit_item_qty");x.value = parseInt(x.value) + 1' class="btn waves-effect" style="background: #<?php echo $theme; ?>"><i class="material-icons-round">add</i></button>
              <button type="button" onclick='var x = document.getElementById("edit_item_qty");x.value = parseInt(x.value) - 1' class="btn waves-effect" style="background: #<?php echo $theme; ?>"><i class="material-icons-round">remove</i></button>
            </div>
          </div>
          <select name="price"> 
            <option disabled>Categories</option>
                <option selected value="No Category Specified">No Category Specified</option> 
                <option disabled>Other</option>
                <?php
                try
                {
                    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $sql = "SELECT * FROM labels WHERE login= " . $_SESSION['id'];
                    $users = $dbh->query($sql);
                        foreach ($users as $row){
                            ?>
                            <option value=<?=json_encode($row['name'])?>> <?=htmlspecialchars($row['name'])?> </option>
                            <?php
                    }
                        $dbh = null;
                }
                catch(PDOexception $e)
                {
                    echo "Error is: " . $e->etmessage();
                }
            ?>
            </select>
            <br>
          <button name="submit" class="btn waves-effect" style="background:#<?php echo $theme; ?>">Update</button>
          <button name="button" type="button" class="btn btn-flat waves-effect" style="color:gray" onclick="document.getElementById('editback').click()">Cancel</button>
          <input type="hidden" name="id" id="edit_item_id">
        </form>
      </div>
    </div>
    <input id="copyToClipboard" type="hidden">
    <div id="item_popup" style="animation: fade .2s forwards" class="tabcontent">
      <!--ITEM_POPUP-->
      <div class="container">
        <div class="hide-on-med-and-doawn" style="margin-top: 10vh;"></div>
        <h3 id="item_title" onclick="copyToClipboard(this.innerText)" class="fade-up" style="cursor:pointer;width: 100%;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;overflow-y:visible"></h3>
        <h5 id="item_qty" class="fade-up" style="animation-delay: .01s;cursor:pointer;width: 100%;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;overflow-y:visible" onclick="copyToClipboard(this.innerText)"></h5>
        <br>
        <div class="flow-text fade-up" style="animation-delay: .02s;display: block" id="item_desc"></div>
        <br>
        <div class="collection z-depth-2 fade-up" style="animation-delay: .05s;padding:0" id="item_options">
          <!--<a href="javascript:void(0)" class="fade-up collection-item waves-effect" style="color:gray;animation-delay: .1s"id="action_edit"><i class="material-icons-round left">edit</i>Edit</a>-->
          <a href="javascript:void(0)" class="fade-up collection-item waves-effect" style="color:gray;animation-delay: .15s" id="action_task"><i class="material-icons-round left">task_alt</i>Add item to todo list</a> 
          <a href="javascript:void(0)" class="fade-up collection-item waves-effect" style="color:gray;animation-delay: .2s" id="action_qr" target="_blank"><i class="material-icons-round left">qr_code</i>Generate QR code</a>
          <a href="javascript:void(0)" class="fade-up collection-item waves-effect" style="color:gray;animation-delay: .25s" id="action_share" target="_blank"><i class="material-icons-round left">forum</i>Invite collaborators &amp;
            comment</a>
          <a href="javascript:void(0)" class="fade-up collection-item waves-effect" style="color:gray;animation-delay: .3s" id="action_mail" target="_blank"><i class="material-icons-round left">email</i>Share via email</a>
          <a href="javascript:void(0)" class="fade-up collection-item waves-effect" style="color:gray;animation-delay: .35s" id="action_wa" onclick="window.open(`https://api.whatsapp.com/send/?phone&text=${encodeURIComponent('I currently have' + document.getElementById('item_qty').innerHTML.replace('Quantity: ', '') + ' ' + document.getElementById('item_title').innerHTML.toLowerCase().plural() + ' in the ' + document.getElementById('item_desc').getElementsByClassName('chip')[1].innerText.toLowerCase().replace('room: ', ''))}&app_absent=0`);"><i class="material-icons-round left">chat</i>Share via WhatsApp</a>
          <a href="javascript:void(0)" class="fade-up collection-item waves-effect" style="color:gray;animation-delay: .4s" id="action_share_p"><i class="material-icons-round left">share</i>Share (Mobile Only)</a>
          <a href="javascript:void(0)" class="fade-up collection-item waves-effect" style="color:gray;animation-delay: .45s" id="action_recipe" target="_blank"><i class="material-icons-round left">auto_awesome</i>Find a recipe</a>
          <a href="javascript:void(0)" class="fade-up collection-item red-text waves-effect waves-red" style="animation-delay: .5s" id="action_delete"><i class="material-icons-round left">delete</i>Delete</a>
        </div>
        <a href="javascript:void(0)" onclick="back();" class="fade-up hide-on-small-only btn waves-effect" style="animation-delay: .6s;background: #212121"><i class="material-icons-round left">arrow_back</i>Back</a>
      </div>
    </div>


    <!-- AJAX LOADERS -->
    <div id="finances" class="tabcontent"></div>
    <div id="div1"></div>
    <div id="bathroom_add" class="tabcontent"> </div>
    <div id="dining_room" class="tabcontent"></div>
    <div id="family" class="tabcontent"></div>
    <div id="croom_add" class="tabcontent"></div>
    <div id="searchresults" class="tabcontent"> </div>
    <div id="bathroom" class="tabcontent"></div>
    <div id="garage_add" class="tabcontent"> </div>
    <div id="add_family" class="tabcontent"></div>
    <div id="storage" class="tabcontent"></div>
    <div id="addkitchen" class="tabcontent"> </div>
    <div id="budgetmetermodal" class="tabcontent"> </div>
    <div id="gl" class="tabcontent"></div>
    <div id="foodwaste" class="tabcontent"></div>
    <div id="grocerylist_add" class="tabcontent"></div>
    <div id="storage_add" class="tabcontent"></div>
    <div id="todo_add" class="tabcontent"></div>
    <div id="dining_room_add" class="tabcontent"></div>
    <div id="laundry_room_add" class="tabcontent"></div>
    <div id="camping_add" class="tabcontent"></div>
    <div id="bedroom_add" class="tabcontent"></div>
    <div id="todo_list" class="tabcontent"></div>
    <div id="notification_popup" class="tabcontent"></div>
    <div id="About" class="tabcontent"></div>
    <div id="Contact" class="tabcontent"></div>
    <div id="cs" class="tabcontent"></div>
    <div id="fw_add" class="tabcontent"></div>
    <div id="trash_c" class="tabcontent"></div>
    <div id="Home" class="tabcontent"></div>
    <div id="suggested" class="tabcontent"></div>
    <div id='custom_room' class='tabcontent'></div>
    <div id="STARRED_ITEMS" class="tabcontent"></div>
    <div id="laundryroom" class="tabcontent"></div>

    <div id="pair2" class="tabcontent"> </div>
    <!-- END AJAX LOADERS -->


    <div id="ajax_loader" class="tabcontent" style="margin-top: 0 !important">
      <center style="padding:10px;padding-top: 35vh"><br><br><br><svg class='circular' height='50' width='50'>
          <circle class='path' cx='25' cy='25' r='20' fill='none' stroke-width='3' stroke-miterlimit='10' />
        </svg><br></center>
      <!--<center style="padding:10px;padding-top: 30vh">-->
      <!--  <div class="shapes-5" style="color: var(--navbar-color)"></div>-->
      <!--</center>-->
    </div>
  </div>
  <div id="key" class="modal modal-fixed-footera">
    <div class="modal-content">
      <h4 style="color: var(--font-color)">Keyboard Shortcuts </h4>
      <p>Master these to become a Smartlist PRO!</p>
      <p>CTRL F - Focus on search bar</p>
      <p>CTRL / - View keyboard shortcuts</p>
      <p>CTRL S - Add item</p>
      <p>CTRL L - Add task</p>
      <p>CTRL L - Add task</p>
      <p>CTRL G - Add Shopping List Item</p>
      <p>CTRL , (Comma) - Open settings</p>
      <p><a href="https://community.smartlist.ga/" class='blue-text'>Want a new keyboard shortcut? Request one in the
          community forum!</a></p>
    </div>
    <div class="modal-footer"> <a href="javascript:void(0)" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a> </div>
  </div>
  <!--CONTENT ENDS-->
  <div id="addNote" class="modal modal-fixed-footer bottom-sheet" style="margin: auto !important;height: 90vh">
  <div class="modal-content">
    <h4>Add a note</h4>
    <form method="POST" action="./user/notes/add.php" id="addNoteForm">
      <div class="input-field">
        <label for="content">Note title</label>
        <input name="title" autocomplete="off" type="text" required class="validate" data-length="50">
      </div>
      <div class="input-field">
        <label for="content">Note Content (Max: 1000 Characters)</label>
        <textarea name="content" style="min-height: 300px;" required class="materialize-textarea validate" data-length="1000"></textarea>
      </div>
    </form>
  </div>
  <div class="modal-footer">
    <a onclick="$('#addNoteForm').submit()" href="javascript:void(0)" class="btn btn-flat waves-effect">Save</a>
  </div>
</div>
<div id="noteView" class="modal modal-fixed-footer bottom-sheet" style="margin: auto !important;height: 90vh"></div>
  </div>

  <audio id="syncalert" preload="none">
    <source src="https://padlet-uploads.storage.googleapis.com/446844750/abff4e01e3d7691aa96889855e09afaa/notification_simple_02.wav" type="audio/mpeg" defer loading="lazy">
  </audio>
  <div id="right_click_modal" class="modal bottom-sheet">
    <a href="javascript:void(0)" id="rclick_edit" class="modal-close waves-effect"><i class="material-icons-round left">edit</i> Edit</a>
    <a href="javascript:void(0)" id="rclick_add" class="modal-close waves-effect"><i class="material-icons-round left">local_grocery_store</i> Add to Shopping List</a>
    <a href="javascript:void(0)" id="rclick_share" class="modal-close waves-effect"><i class="material-icons-round left">share</i> Share</a>
    <a href="javascript:void(0)" id="rclick_recipe" target="_blank" class="modal-close waves-effect"><i class="material-icons-round left">auto_awesome</i> Find recipe</a>
    <a href="javascript:void(0)" id="rclick_mail" target="_blank" class="modal-close waves-effect"><i class="material-icons-round left">email</i> Email</a><a href="javascript:void(0)" id="rclick_qr" target="_blank" class="waves-effect"><i class="material-icons-round left">qr_code</i> Generate QR code</a>
    <a href="javascript:void(0)" id="rclick_delete" class="modal-close waves-effect"><i class="material-icons-round left">delete</i> Delete</a>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.0.0/dist/js/materialize.min.js"></script>
  <script>
    const user = {
      theme_top_color: "#<?php echo $theme_top; ?>",
      theme_color: "#<?php echo $theme; ?> ",
      bmBorderColor: "<?php echo $bmBorderColor; ?>",
      bmBgColor: "<?php echo $bmBgColor; ?>",
      loggedIn: function() {
          var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                   if(xhttp.responseText.toString() !== "true") {
                       window.location = "https://smartlist.ga/dashboard/login.php?inactive"
                   }
                }
            };
            xhttp.open("GET", "https://smartlist.ga/dashboard/user/check_if_loggd_in.php", true);
            xhttp.send();
      }
    }
    window.addEventListener('load', function(){
        var interval = setInterval(function() {
            user.loggedIn()
        }, 60000)
    })
    window.onfocus = function() {
        user.loggedIn();
        console.log("Awaiting response...")
    }
  </script>
  <script src="./js/app.js"></script>
  <script src="./js/lazyLoad.js"></script>
  <script defer>
    var __bmglobal = {
        <?php echo "labels: [";
        try {
          $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $sql = "SELECT * FROM bm WHERE login_id=" . $_SESSION['id'] . " ORDER BY id ASC";
          $users = $dbh->query($sql);
          foreach ($users as $row) {
            echo "" . json_encode(decrypt($row['name'])) . ", ";
          }
          $dbh = null;
        } catch (PDOexception $e) {
          echo "Error is: " . $e->getmessage();
        }
        echo "], \n    datasets: [
        {label: 'Amount you spent', data: [";
        $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $sql = "SELECT * FROM bm WHERE login_id=" . $_SESSION['id'] . " ORDER BY id ASC";
        $users = $dbh->query($sql);
        foreach ($users as $row) {
          echo "" . trim(decrypt($row['qty'])) . ", ";
        }
        $dbh = null;
        echo "],"; ?> order: 2,
        fill: true,
        tension: 0.3,
        borderColor: user.bmBorderColor,
        backgroundColor: user.bmBgColor,
        pointBorderColor: 'rgba(0, 188, 212, 0)',
        pointBackgroundColor: 'rgba(0, 188, 212, 0)',
      },
      {
        label: 'Budget',
        data: [<?php try {
                  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                  $sql = "SELECT * FROM bm WHERE login_id=" . $_SESSION['id'];
                  $users = $dbh->query($sql);
                  foreach ($users as $row) {
                    echo $goal . ", ";
                  }
                  $dbh = null;
                } catch (PDOexception $e) {
                  echo "Error is: " . $e->getmessage();
                }
                ?>],
        type: 'line',
        order: 1,
        borderColor: '#f44336',
        borderWidth: 3,
        backgroundColor: 'rgba(245, 71, 83, 0)',
      }
    ]
    };
    if (document.getElementById('budgetMeter')) {
      var ctx = document.getElementById('budgetMeter').getContext('2d');
      var budgetMeter = new Chart(ctx, {
        type: 'line',
        data: __bmglobal,
        options: __bmconfig,
      });
    }
    var __bmgoal = <?= (isset($goal) ? $goal : 0); ?>;

    <?php if (isset($_GET['item'])) { ?> $(document).ready(function() {
        sm_page('addkitchen');
      });
    <?php
    } ?> <?php if (isset($_GET['croom'])) { ?> $(document).ready(function() {
        M.toast({
          html: 'Created room successfully! To view room, click on "More rooms"'
        });
      });
    <?php
          } ?> <?php if (isset($_GET['pair_accept'])) { ?>
      $(document).ready(function() {
        M.toast({
          html: 'Granted access. To remove access, just click revoke in step #3. <strong>Changes will take time to update, please tell the other user to log out and log back in to view the changes</strong>'
        });
      });
    <?php
                } ?> <?php
                      // if (isset($_GET["room"])) { $t = $_GET["room"]; if ($t == "10") { echo "sm_page('Contact', this,'' );AJAX_LOAD('#Contact', './rooms/kitchen/view.php')"; } elseif ($t == "1") { echo "sm_page('Contact');AJAX_LOAD('#Contact', './rooms/kitchen/view.php')"; } elseif ($t == "3") { echo "sm_page('Home');AJAX_LOAD('#Home', './rooms/bedroom/view.php');nav_title('Bedroom')"; } elseif ($t == "g") { echo "sm_page('About');nav_title('Garage')"; } elseif ($t == "bathroom") { echo "sm_page('bathroom');AJAX_LOAD('#bathroom', './rooms/bathroom/view.php');nav_title('Bathroom')"; } elseif ($t == "storage") { echo "sm_page('storage');AJAX_LOAD('#storage', './rooms/storage/view.php');nav_title('Storage Room')"; } elseif ($t == "family") { echo "sm_page('family');AJAX_LOAD('#family', './rooms/family/view.php');nav_title('Family Room')"; } elseif ($t == "laundry") { echo "sm_page('laundryroom');AJAX_LOAD('#laundryroom', './rooms/laundry/view.php');nav_title('Laundry Room')"; } elseif ($t == "dining_room") { echo "sm_page('dining_room');AJAX_LOAD('#dining_room', './rooms/dining_room/view.php');nav_title('Dining Room')"; } } elseif (!isset($_GET["room"])) { echo "sm_page('News', this, );"; }
                      //  echo "$(document).ready(function() { $('#bmmodal').modal('open'); document.getElementById('bm_amount').focus() });";
                      ?>
  </script>
  <?php if (!empty(user_notifications)) { ?>
    <script defer>
      var notify_cookie;
      var notify_cookie = getCookie("NOTIFY_ALREADY_CLOSED");
      if (notify_cookie !== 1 && !/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator
          .userAgent)) {
        desktop_ping(`<?php try {
                        $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $sql = "SELECT * FROM products WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . $_SESSION['syncid'];
                        $users = $dbh->query($sql);
                        echo "You\'re going to run out of: ";
                        foreach ($users as $row) {
                          print htmlspecialchars($row["name"]) . ", ";
                        }
                        $dbh = null;
                      } catch (PDOexception $e) {
                        echo "Error is: " . $e->getmessage();
                      } ?>'`, 'Kitchen | Smartlist');
        document.cookie = "NOTIFY_ALREADY_CLOSED=1";
      }
    </script>
  <?php
  } ?>
  <?php
  if (admin()) { ?>
    <script>
      window.onerror = function(msg, url, linenumber) {
        alert('Error message: ' + msg + '\nURL: ' + url + '\nLine Number: ' + linenumber);
        return true;
      };
    </script>
  <?php } ?>
</body>

</html>
<?php if (isset($_GET['query'])) {
  echo "<script> document.body.addEventListener('load', function() { setTimeout(function(){ document.getElementById('search').value = " . json_encode($_GET['query']) . ";}, 1000); }); </script>";
} ?>