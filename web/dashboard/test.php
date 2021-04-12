<?php
ini_set('session.gc_maxlifetime', 180000);
session_start();
if (!isset($_SESSION['valid'])){header('Location: https://smartlist.ga/login');exit();}
include_once("connection.php"); 
include_once("cred.php");
try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $stmt = $dbh->query('SELECT * FROM bm WHERE login_id=' . $_SESSION['id']);
  $row_count = $stmt->rowCount();
  $dbh = null;
}
catch(PDOexception $e){ echo "Error is: " . $e->etmessage(); }
$notifications = $_SESSION['notifications'];
$number_notify = $_SESSION['number_notify'];
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM login WHERE id=" . $_SESSION['id'];
$users = $dbh->query($sql);
foreach ($users as $row){
  $goal = $row["goal"];
  $welcome = $row['welcome'];
  $theme = $row['theme'];
}
if(empty($theme) || !isset($theme)) {$theme = '41308a';}
switch($theme) { 
    case '41308a': $theme_top = '2a1782'; $theme = '2f1d7d'; $theme_light = '4a2aad'; break; 
    case 'B00020': $theme_top = '9c021e'; $theme = 'B00020'; $theme_light = 'c20225'; break; 
    case '00695c': $theme_top = '00594e'; $theme = '00695c'; $theme_light = '007a6b'; break;
    case '6200ea': $theme_top = '5a02d4'; $theme = '6200ea'; $theme_light = '6802f5'; break; 
    case '00838f': $theme_top = '016c75'; $theme = '00838f'; $theme_light = '00919e'; break; 
    case '0277bd': $theme_top = '0267a3'; $theme = '0277bd'; $theme_light = '027fc9'; break; 
    case '2e7d32': $theme_top = '276b2a'; $theme = '2e7d32'; $theme_light = '328c37'; break; 
    case 'f9a825': $theme_top = 'e69a20'; $theme = 'f9a825'; $theme_light = 'ffac26'; break; 
    case 'ef6c00': $theme_top = 'db6402'; $theme = 'ef6c00'; $theme_light = 'f5852a'; break;
    case 'ad1457': $theme_top = '96124c'; $theme = 'ad1457'; $theme_light = 'b8165d'; break;
    case '37474f': $theme_top = '29353b'; $theme = '37474f'; $theme_light = '4d636e'; break; 
    case '212121': $theme_top = '171717'; $theme = '212121'; $theme_light = '404040'; break;
    default: $theme_top = '171717'; $theme = '212121'; $theme_light = '404040'; break; 
}
$dbh = null;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="keywords" content="Smartlist, Homebase, KeepInventory, Smartlist dashboard, Smart List, List, Inventory, Home, Smartlist app, Smart list app, Smartlist Dashboard, Smartlist login, Smartlist Signup, Smart list login, Smart list sign up, Smart list signup, smart list register, Smartlist logo, smartist, smarst, smatist">
    <meta name="mobile-web-app-capable" content="yes"> 
    <meta name="apple-mobile-web-app-status-bar-style" content="#2a1782"> 
    <meta name="apple-mobile-web-app-capable" content="yes"/><script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0" defer></script> 
    <link rel="search" href="https://smartlist.ga/search.xml" type="application/opensearchdescription+xml" title="Smartlist"/> 
    <link rel="shortcut icon" href="https://res.cloudinary.com/smartlist/image/upload/v1617905788/logo_z3yoqm.svg">
    <link rel="favicon" href="https://res.cloudinary.com/smartlist/image/upload/v1617905788/logo_z3yoqm.svg">
    <link rel="apple-touch-icon" href="https://res.cloudinary.com/smartlist/image/upload/v1617905788/logo_z3yoqm.svg" /> 
    <script src="pwa.js" defer></script> 
    <link rel="manifest" href="manifest.webmanifest"> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pusher/7.0.3/pusher.min.js"></script>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.0.0/dist/css/materialize.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="theme-color" content="#<?php echo $theme_top; ?>">
    <meta name="title" content="Smartlist - the free home inventory database"> 
    <meta name="description" content="Smartlist is a free home inventory app that lets you keep track of what you have in your home, and helps you save money">
    <meta property="og:site_name" content="smartlist.ga" /> 
    <meta property="og:title" content="Smartlist" /> 
    <meta property="og:type" content="website" /> 
    <meta property="og:description" content="Smartlist is a free home inventory app that lets you keep track of what you have in your home, and helps you save money" />
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@Smartlist"> 
    <meta name="twitter:title" content="Smartlist"> 
    <meta name="twitter:description" content="Smartlist is a free home inventory app that lets you keep track of what you have in your home, and helps you save money">
    <meta name="twitter:domain" content="smartlist.ga">  
    <meta name="robots" content="index, follow"> <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <meta name="language" content="English">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style>
    :root { --navbar-color: #<?php echo $theme; ?> !important } [data-theme='dark'] { --navbar-color: #303030 !important;--bg-color: #1a1a1a !important }
    </style>
    <link rel="stylesheet" href="./resources/style.css">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-S0PH6N0Z7E"></script>
  </head>
  <body>
    <a href="#CONTENT" class="ctnt">Skip to content</a> <nav  style="position:fixed;background: var(--navbar-color) ;z-index:9999;top:0;display:none;box-shadow:none !important" id="searchbar"> <div class="nav-wrapper"> <form onsubmit="nav_title('Search Results');w_title('Search Results');changeValue();sm_page('searchresults',this, '');return false;" id="search_bar"> <div class="input-field"> <input id="search" type="search" oninput="filter()" onblur="this.focus()" class="autocomplete1" autocomplete="off" placeholder="Search items, rooms, actions, etc." value="<?php echo htmlspecialchars($_GET['query']); ?>"> <label class="label-icon" for="search"><i class="material-icons __search">search</i></label> <i class="material-icons" onclick="showsearch();">close</i> </div> </form> </div> </nav> <nav style="top:0;position:fixed;background: var(--navbar-color);z-index:999"> <div class="nav-wrapper"> <ul class="right" id="nav_ul_notification"> <li onclick="$('#slide-out').scrollTop(0);"><a class="sidenav-trigger brand-logo left" style="margin-left:0px !important" data-target="slide-out" href="#"><i class="material-icons" id="icon">menu</i><span style="font-size: 20px;position: relative;top: -3px;left: -5px;font-weight:400" id="brandlogo">Smartlist</span></a></li> <li> <a id="notification" data-position="bottom" class="right tooltippeda waves-effect waves-light"  data-tooltip='Notifications' > <i class="material-icons">notifications_none</i> <div id="hide_notification"></div> </a> </li> <li><a class="right waves-effect waves-light" id="search_toggle"><i class="material-icons">search</i></a></li> </ul> </div> </nav>
    <div id="modal2" class="modal modal-fixed-footer bottom-sheet"> <div class="modal-content"> <h4>Heads Up!</h4> <p>Are you sure you want to delete your account???</p> </div> <div class="modal-footer"> <a href="#modal1" class="modal-close waves-effect waves-green btn-flat modal-trigger">Go back</a> <a class="waves-effect waves-light btn red modal-trigger" href="#modal5" class="red btn waves-effect waves-light">Delete My account</a> </div> </div> <div id="bmmodal" class="bottom-sheet modal"><div class="modal-content"> <form onsubmit="bm_add();return false;" method="post" name="form1"> <input type="hidden" name="name" value="<?php echo date('m/d/Y'); ?>" readonly> <h4>Add a point</h4> <p>Enter how much you spent today</p> <div class="input-field"> <i class="material-icons prefix">attach_money</i> <label>Amount you spent</label> <input type="number" name="qty" required id="bm_amount" autocomplete='off'> </div>
    <p style="margin-top: 20px"><i class="material-icons left">verified</i> We take your privacy very seriously, and we will never sell your data. <a href="https://help.smartlist.ga/#/privacy-policy" class="blue-text">Read our Privacy Statement</a></p><br>
    <input type="submit" name="Submit" value="Add" class="btn purple darken-3"> </form> </div> </div> </div> <div id="kitchenmodal" class="modal "> <div class="modal-content"></div> </div> <div id="pair" class="modal modal-fixed-footer"> <div class="modal-content"> <h4>Heads Up!</h4> <p>Are you sure you want to pair your account? Pairing your account will you see everything in their inventory!</p> </div> <div class="modal-footer"> <a href="#modal1" class="modal-close waves-effect waves-green btn-flat">Go back</a> <a class="waves-effect waves-light btn red modal-close"  class="red btn waves-effect waves-light" onclick='sm_page("pair2", this, "")'>Pair my account!</a> </div> </div>
    <div id="budgetmetermodala" class="modal modal-fixed-s  bottom-sheet"  style="width:60%"> <div class="modal-content" id="CTRLS_CTNT"> <b><h5 class="center">Add an item <span class="hide-on-med-and-down">(CTRL S)</span></h5></b> <p class="center">Please select a room</p> <div class="collection"> <a onclick="sm_page('addkitchen', this);setTimeout(function(){ document.getElementById('tags').focus() }, 0500);" class="collection-item waves-effect modal-close"><i class="material-icons left">countertops</i>Kitchen</a> <a href="#" onclick="sm_page('bedroom_add', this, '');" class="collection-item waves-effect"><i class="material-icons left">bed</i>Bedroom</a> <a href="#"onclick="sm_page('bathroom_add', this, '');setTimeout(function(){ sm_page('bathroom_add', this, '');document.getElementById('bathroom_name_input').focus() }, 0500);" class="collection-item waves-effect"><i class="material-icons left">wc</i>Bathroom</a> <a onclick="sm_page('garage_add', this, '');setTimeout(function(){ sm_page('garage_add', this, '');document.getElementById('garage_name_input').focus() }, 0500);"  class="modal-close collection-item waves-effect"><i class="material-icons left">build</i>Garage</a> <a href="https://smartlist.ga/dashboard/rooms/family/add.html" class="collection-item waves-effect"><i class="material-icons left">tv</i>Family</a> <a href="https://smartlist.ga/dashboard/rooms/storage/add.html" class="collection-item waves-effect"><i class="material-icons left">business</i>Storage Room</a> <a href="https://smartlist.ga/dashboard/rooms/dining_room/add.html" class="collection-item waves-effect"><i class="material-icons left">restaurant</i>Dining Room</a><a href="https://smartlist.ga/dashboard/rooms/camping/add.html" class="collection-item waves-effect"><i class="material-icons left">landscape</i>Camping Supplies</a> <a href="https://smartlist.ga/dashboard/rooms/laundry/add.html" class="collection-item waves-effect"><i class="material-icons left">local_laundry_service</i>Laundry room</a><?php try { $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); $sql = "SELECT * FROM roomnames WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . $_SESSION['syncid']; $users = $dbh->query($sql); foreach ($users as $row) { print "<a class=\"collection-item waves-effect modal-close\" href='https://smartlist.ga/dashboard/rooms/custom_room_add.php?room=" . urlencode($row['id']) . "'><i class=\"material-icons left\">" . $row['qty'] . "</i>" . $row["name"] . "</a>"; } $dbh = null; } catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); } ?></div> 
    </div></div>
      <div id="avarar" class="modal modal-fixed-footer bottom-sheet"> <div class="modal-content"><img class="materialboxed" alt='image' class="circle" src="<?php echo $_SESSION['avatar'] ?>" style="display:block;margin:auto;width:80px;height: 80px;"><br> <div class="row"> <div class="col s12"> <h4>Change avatar</h4> <form action="./resources/avatar.php" method="GET"><div class='input-field'><label>Paste URL here...</label><input type="url" required name="pairingaccountid"></div></div> </div> </div> <div class="modal-footer"> <button type="submit" class="btn btn-flat waves-effect">Change</button><a href="#modal1" class="modal-close waves-effect btn-flat modal-trigger">Cancel</a></form></div>   </div> </div>
        <ul id="slide-out" class="sidenav sidenav-fixed">
             <li>
              <div class="user-view">
                 <div class="background">
                   <img src="https://www.colorbook.io/imagecreator.php?hex=<?php echo $theme_light; ?>&width=1&height=1&text=%201920x1080" width="100%" id ="imageid" alt='Background'>
                 </div>
                 <a href="#avarar" class="waves-effect avatar_img waves-light circle modal-trigger"><img class="circle" src="<?php echo $_SESSION['avatar'] ?>" alt='image'></a>
                 <span class="white-text name"><?php echo $_SESSION['name'] ?></span>
                 <span class="white-text email"><?php echo $_SESSION['email'] ?></span>
              </div>
            </li>
            <li class="links"><a class="waves-effect sidenav-close" onclick="w_title('Dashboard');sm_page('News', this, );nav_title('Dashboard');AJAX_LOAD('#grocery_list', './rooms/grocerylist/index.php');" id="defaultOpen"><i class="material-icons">dashboard</i>Dashboard   </a></li>
            <li class="links"><a class="waves-effect sidenav-close" onclick="w_title('Suggested');sm_page('suggested', this);AJAX_LOAD('#suggested', './rooms/suggested.php')"><i class="material-icons">auto_awesome</i>Suggested items</a></li>
            <li class="links" style="height:0;opacity:0;width:0;overflow:hidden"><a class="waves-effect"onclick="w_title('Loading...');sm_page('loader', this, );" ><i class="material-icons">dashboard</i>Dashboard</a></li>
            <li class="links" style="pointer-events:none"> <div class="divider"></div> </li>
            <li class="links" style="pointer-events:none;z-index:-1" onclick="return false"><a class="subheader" href="#"style='pointer-events:none' onclick="return false" rel='nofollow'>Rooms</a></li>
            <li class="links"><a class="waves-effect" onclick="w_title('Kitchen');sm_page('Contact', this, '');AJAX_LOAD('#Contact', './rooms/kitchen/view.php');nav_title('Kitchen');"><i class="material-icons">countertops</i>Kitchen</a></li>
            <li class="links"><a class="waves-effect sidenav-close" onclick="w_title('Bedroom');sm_page('Home', this, '');AJAX_LOAD('#Home', './rooms/bedroom/view.php');nav_title('Bedroom')"><i class="material-icons">bed</i>Bedroom</a></li>
            <li class="links"><a class="waves-effect sidenav-close" onclick="w_title('Bathroom');sm_page('bathroom', this, '');AJAX_LOAD('#bathroom', './rooms/bathroom/view.php');nav_title('Bathroom')"><i class="material-icons">wc</i>Bathroom</a></li>
            <li class="links"><a class="waves-effect sidenav-close" onclick="w_title('Garage');sm_page('About', this, '');nav_title('Garage')"><i class="material-icons">build</i>Garage</a></li>
            <li class="links"><a class="waves-effect sidenav-close" onclick="w_title('Family Room');sm_page('family', this, '');AJAX_LOAD('#family', './rooms/family/view.php');nav_title('Family Room')"><i class="material-icons">chair</i>Family Room</a></li>
            <li class="links"><a class="waves-effect sidenav-close" onclick="w_title('Storage Room');sm_page('storage', this, '');AJAX_LOAD('#storage', './rooms/storage/view.php');nav_title('Storage Room')"><i class="material-icons">domain</i>Storage room</a></li>
            <li class="links"><a class="waves-effect sidenav-close" onclick="w_title('Dining Room');sm_page('dining_room', this, '');AJAX_LOAD('#dining_room', './rooms/dining_room/view.php');nav_title('Dining Room')"><i class="material-icons">restaurant</i>Dining Room</a></li>
            <li class="links"><a class="waves-effect sidenav-close" onclick="w_title('Laundry Room');sm_page('laundryroom', this, '');AJAX_LOAD('#laundryroom', './rooms/laundry/view.php');nav_title('Laundry Room')"landscape><i class="material-icons">local_laundry_service</i>Laundry Room</a></li>
            <li class="links no-padding">
              <ul class="collapsible collapsible-accordion">
                <li style='border-radius:2px;width:290px;margin:0px;background: transparent' class="links">
                  <div class="collapsible-header waves-effect" style="padding-left: 28px;margin:5px;width:290px;background: transparent"><i class="material-icons" style="position:relative;right: -2px;">arrow_drop_down</i><span style="margin-left: 15px;">More rooms</span></div>
                  <div class="collapsible-body" style="background: transparent">
                    <ul>
                      <li class="links"><a class="waves-effect sidenav-close"landscape onclick="w_title('Camping Supplies');sm_page('cs', this, '');AJAX_LOAD('#cs', './rooms/camping/view.php');nav_title('Camping Supplies')"><i class="material-icons">landscape</i>Camping Supplies</a></li>
                      <?php
                          try {
                            $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $sql = "SELECT * FROM roomnames WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . $_SESSION['syncid'];
                            $users = $dbh->query($sql);
                            foreach ($users as $row)
                            {
                              print "<li class=\"links\"><a href='#' class=\"waves-effect sidenav-close\" onclick=\"w_title('".str_replace('"', '', str_replace("'", "", $row['name']))."');load_croom('" . str_replace('"', '', str_replace("'", "", $row['id'])) . "', '" . str_replace('"', '', str_replace("'", "", $row['name'])) . "')\"><i class='material-icons'>" . $row['qty'] . "</i>" . $row["name"] . "</a></li>";
                            }
                            $dbh = null;
                          }
                         catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
                      ?> 
                    </ul>
                  </div>
                </li>
              </ul>
            </li>
            <li><a class="waves-effect sidenav-close" href="https://smartlist.ga/dashboard/rooms/add_room.php"><i class="material-icons">add_location_at</i>Create custom room</a></li>
            <li>
              <div class="divider"></div>
            </li>
            <li class="links"><a class="subheader" href="#"rel='nofollow'>Other</a></li>
            <li class="links"><a class="waves-effect sidenav-close" href="#" onclick="sm_page('trash_c', this, '');AJAX_LOAD('#trash_c', './rooms/trash.php');nav_title('Trash');w_title('Trash')"><i class="material-icons">delete</i>Trash</a></li>
            <li class="links"><a class="waves-effect sidenav-close" href="#" onclick="sm_page('gl', this, '');AJAX_LOAD('#gl', './rooms/grocerylist/view.php');nav_title('Grocery List');w_title('Grocery List')"><i class="material-icons">local_grocery_store</i>Grocery list</a></li>
            <li class="links"><a class="waves-effect sidenav-close" href="#" onclick="sm_page('STARRED_ITEMS', this, '');nav_title('Starred');w_title('Starred'); AJAX_LOAD('#STARRED_ITEMS', './rooms/starred-items.php')"><i class="material-icons">star</i>Starred</a></li>
            <li class="links"><a class="waves-effect sidenav-close" href="#" onclick="sm_page('STARRED_ITEMS', this, '');nav_title('Starred');w_title('Starred'); AJAX_LOAD('#STARRED_ITEMS', './rooms/starred-items.php')"><i class="material-icons">star</i>Starred</a></li>
            <li class="links"><a class="waves-effect sidenav-close" href="https://recipe-generator.manuthecoder.repl.co/"><i class="material-icons">casino</i>Recipe Generator</a></li>
            <li class="links"><a class="waves-effect sidenav-close" href="#" onclick="sm_page('budgetmetermodal', this, '');nav_title('Budget Meter');w_title('Budget Meter');"><i class="material-icons">payments</i>My budget meter</a></li>
            <li>
              <div class="divider">
              </div>
            </li>
            <li class="links"><a class="subheader" href="#"rel='nofollow'>Events</a></li>
            <li class="links"><a target="_blank" class="waves-effect sidenav-close" href="https://smartlist.ga/dashboard/event/"><i class="material-icons">event</i>Join event</a></li>
            <li class="links"><a target="_blank" class="waves-effect sidenav-close" href="https://smartlist.ga/dashboard/event/dash/event/add.php"><i class="material-icons">open_in_new</i>Create event</span></a></li>
            
            <li class="links">
              <div class="divider">
              </div>
            </li>
            <li><a class="subheader" href="#"rel='nofollow'>Profile</a></li>
            <li class="links"><a class="waves-effect " href="#modal1"onclick="sm_page('notification_popup', this, '');AJAX_LOAD('#notification_popup', './rooms/notifications.php');brandlogotext.innerHTML = 'Inbox'"><i class="material-icons">notifications_outline</i>Notifications <span id="badge" class="badge"></span>
            <li class="links"><a class="waves-effect sidenav-close"onclick="sm_page('modal1', this, '');w_title('Settings');nav_title('Settings')"><i class="material-icons">settings</i>Settings</a></li>
            <li class="links"><a class="waves-effect modal-trigger sidenav-close" href="#_feedback" onclick="w_title('Feedback')"><i class="material-icons">try</i>Feedback</a></li>
              </a>
            </li>
        </ul>
  <!-- Modal Structure -->
  <div id="_feedback" class="modal bottom-sheet">
    <div class="modal-content">
      <h4>Feedback</h4>
      <p>Have any questions, concerns, or feature requests? We're all ears!</p>
      <form id="feedback-form" action="https://formspree.io/f/mbjqjeyo" method="POST">
          <input type="hidden" name="email" value="<?php echo $_SESSION['email'];?>"/>
          <label>Message:</label>
          <textarea class="materialize-textarea" name="message"></textarea>
          <button id="my-form-button" class="waves-effect btn blue-grey darken-3 waves-light">Submit</button>
          <p id="my-form-status"></p>
      </form>
    </div>
  </div>
    <div class="fixed-action-btn" id="fab1" style="z-index:9999999">
      <a class="btn-floating btn-large tooltipped waves-effect waves-light" data-tooltip="Edit" data-position="left" style="background:#212121;z-index:999999999999999999999999999999999999999999 !important;border-radius: 999999999px !important;transition:all .2s !important;" href="#" id="editfab">
        <i class="large material-icons left" style="color:white !important">edit</i>
      </a>
    </div>
    <div class="fixed-action-btn" id="fab"> <a class="btn-floatsing btn-large waves-effect waves-light FLOATING_ACTION_BUTTON" href="#!" style="background:var(--navbar-color);z-index:99999999999999999999999999999999999999 !important;border-radius: 999999999px !important;color:white;text-decoration:none;transition:width .2s, transform .2s !important;transform-origin: right;box-shadow:0 4px 5px -2px rgba(0,0,0,.2),0 7px 10px 1px rgba(0,0,0,.14),0 2px 16px 1px rgba(0,0,0,.12)!important;" id="FLOATING_ACTION_BUTTON"> <i class="large material-icons left" style="color:white !important">add</i><span>Add</span> </a> <ul> <li data-position="left" data-tooltip="Task" class="tooltipped"><a class="btn-floating" href="https://smartlist.ga/dashboard/rooms/todo/add.html" style="background: #<?php echo $theme_light; ?> !important"><i class="material-icons" style="color:white !important">check</i></a></li> <li data-position="left" data-tooltip="Item" class="tooltipped"><a class="btn-floating modal-trigger" href="#budgetmetermodala" style="background: #<?php echo $theme_light; ?> !important"><i class="material-icons" style="color:white !important" onclick="//document.querySelector('#itemdialog').showModal()">category</i></a></li> <li data-position="left" data-tooltip="Grocery List" class="tooltipped "> <a href="https://smartlist.ga/dashboard/rooms/grocerylist/add.html" class="text-center float-right btn-floating" style="background: #<?php echo $theme_light; ?> !important"><i class="material-icons" style="color:white !important">receipt_long</i></a></li> </ul> </div>
    <div class="hide" id="rmenu" style="width: 20vw"> <a href="#"onclick='window.history.back();' class="waves-effect">Back</a> <a href="#"onclick='window.history.forward();' class="waves-effect">Forward</a> <a href="#"onclick='location.reload()' class="waves-effect">Reload</a> <hr> <a href="#"onclick='document.execCommand("copy");M.toast({html: "Copied!"})' class="waves-effect">Copy</a> <a href="#"onclick='document.execCommand("paste");' class="waves-effect">Paste</a> <hr> <a href="#"onclick='window.print();' class="waves-effect">Print</a> </div>
    <!--CONTENT BEGINS-->
    <div id="CONTENT" tabindex="0" style="outline:0;">
      <div id="loader" class="tabcontent" style="display:block"> 
        <div style="padding-top: 40vh;"> <center> <svg class='circular' height='50' width='50'> <circle class='path' cx='25' cy='25' r='20' fill='none' stroke-width='3' stroke-miterlimit='10' /> </svg> </center> </div>
      </div>
      <div id="budgetmetermodal" class="tabcontent">
        <div class='container'>
          <a href="#bmmodal" class="btn modal-close waves-effect waves-light right modal-trigger" onclick="setTimeout(function(){document.getElementById('bm_amount').focus()}, 100);sm_page('News', '', '')" style="background: #<?php echo $theme_light;?>">Add a point</a>
          <h4>My budget meter</h4>
          <table class="table table-striped " id="myTable">
            <?php
            try {
              $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
              $sql = "SELECT * FROM bm WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . $_SESSION['syncid'];
              $users = $dbh->query($sql);
              echo '<table class="table"> <tr> <td>Name</td> <td>Quantity</td>  <td style="width:10%">Actions</td> </tr><tr id="bm_items"></tr><script>
        var budgetmeter = [';
              foreach ($users as $row)
              {
                echo "{name: '" . $row['name'] . "',qty: '" . $row['qty'] . "',id: '" . $row['id'] . "',price: " . $row['price'] . ",";
                if ($row['login_id'] != $_SESSION['id'])
                {
                  echo "sync: true";
                }
                echo "},";
              }
              echo "]</script>";
              $dbh = null;
            }
            catch(PDOexception $e) {
              echo "Error is: " . $e->etmessage();
            } ?>
          </table><br><br><br><form action="https://smartlist.ga/dashboard/resources/goal/action.php" style="background: #efefef;padding: 10px;"> <div class="row"> <div class="col s9"> <h5>Set a goal. </h5> <p class="range-field"> <input class="quantity" min="0" name="goal" placeholder="Type a number..." type="range" value="<?php echo $goal; ?>"> </p> <p>Your goal will appear on the graph as a red line. Try not to spend more than this goal!</p> </div> <div class="col s3"><br><br> <button type="submit" class="btn blue right" onclick="var dis=this;setTimeout(function(){dis.disabled=true;},10);return true;">Set goal</button> </div> </div> </form> </table> </div> </div> <div id="bedroom_add" class="tabcontent"> <div class="container"> <form onsubmit="return false" method="GET" name="form1"> <h5>Add an item (Bedroom)</h5> <div class="row"> <div class="col s12 input-field "> <label onclick="this.nextSibling.focus()">Item Name</label> <input type="text" name="name" autocomplete="off" class="form-control" id="bedroom_name_input" value="<?php echo $_GET['item']; ?>">
           <?php
                  try
                  {
                    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $sql = "
                    SELECT `name`,
     COUNT(`name`) AS `value_occurrence` 
     FROM     `bedroom`
     WHERE login_id = ".$_SESSION['id']."
     GROUP BY `name`
     ORDER BY `value_occurrence` DESC
     LIMIT    7;";
                    $users = $dbh->query($sql);
                    foreach ($users as $row)
                    {
                     echo '<div class="chip waves-effect" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;max-width: 200px" onclick="var x = document.getElementById(\'bedroom_name_input\');x.value= this.getElementsByTagName(\'span\')[0].innerHTML;x.focus();document.getElementById(\'bedroom_qty_input\').focus()"><span>'. $row['name']. '</span></div>';
                    }
                    $dbh = null;
                  }
               catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
                  ?></div> <div class="col s12"> <div class="input-field"> <label>Quantity</label> <input type="text" name="qty"  id="bedroom_qty_input" class="form-control" value="1" autocomplete="off"></div> </div> </div> <button type="submit" name="Submit" value="Add" class="btn purple darken-3 waves-effect waves-light bstn-large" onclick="add_bedroom()">Add</button> <button type="submit" name="Submit" value="Add" class="btn purple darken-1 waves-effect" onclick="add_bedroom();sm_page('bedroom_add', this, '');M.toast({html: 'Added item successfully!'});document.getElementById('bedroom_name_input').focus()">Save, and reset</button></form> </div> </div> <div id="garage_add" class="tabcontent"> <div class="container"> <form action="https://smartlist.ga/dashboard/rooms/garage/add.php" method='POST' id="garage_form"> <div class="row"> <div class="col s12"> <h5>Add an item (Garage)</h5> <div class="input-field"> <label>Name</label> <input name='name' id='garage_name_input' type='text'>   <?php
                  try
                  {
                    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $sql = "
                    SELECT `name`,
     COUNT(`name`) AS `value_occurrence` 
     FROM     `garage`
     WHERE login_id = ".$_SESSION['id']."
     GROUP BY `name`
     ORDER BY `value_occurrence` DESC
     LIMIT    7;";
                    $users = $dbh->query($sql);
                    foreach ($users as $row)
                    {
                     echo '<div class="chip waves-effect" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;max-width: 200px" onclick="var x = document.getElementById(\'garage_name_input\');x.value= this.getElementsByTagName(\'span\')[0].innerHTML;x.focus();document.getElementById(\'garage_qty_input\').focus()"><span>'. $row['name']. '</span></div>';
                    }
                    $dbh = null;
                  }
               catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
                  ?></div> <div class="input-field"> <label>Quantity</label> <input name='qty' type='text' id='garage_qty_input'> </div> <button class='btn purple darken-3 waves-effect'><i class="material-icons left">add</i>Submit</button> </div> </div> </form> </div> </div><div id="bathroom_add" class="tabcontent"> <div class="container"> <form onsubmit="return false" method="GET" name="form1"> <h5>Add an item (Bathroom)</h5> <div class="row"> <div class="col s12 input-field "> <label onclick="this.nextSibling.focus()">Item Name</label> <input type="text" name="name" autocomplete="off" class="form-control" id="bathroom_name_input" value="<?php echo $_GET['item']; ?>" > </div> <div class="col s12"> <div class="input-field"> <label>Quantity</label> <input type="text" name="qty"  id="bathroom_qty_input" class="form-control" value="1" autocomplete="off"></div> </div> </div> <button type="submit" name="Submit" value="Add" class="btn purple darken-3 waves-effect waves-light btn-lage" onclick="add_bathroom()">Add</button> </form> </div> </div> <div id="addkitchen" class="tabcontent"> <div class="container"> <form onsubmit="return false" method="GET" name="form1"> <h5>Add an item (Kitchen)</h5> <div class="row"> <div class="col s9 input-field "> <label onclick="this.nextSibling.focus()">Item Name</label><input type="text" name="name" autocomplete="off" class="form-control autocomplete" id="tags" value="<?php echo $_GET['item']; ?>" class="autocomplete"> <span style="color:#aaa;display:block;margin-bottom: 10px;">Top suggstions</span>
            <?php
                  try
                  {
                    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $sql = "
                    SELECT `name`,
     COUNT(`name`) AS `value_occurrence` 
     FROM     `products`
     WHERE login_id = ".$_SESSION['id']."
     GROUP BY `name`
     ORDER BY `value_occurrence` DESC
     LIMIT    7;";
                    $users = $dbh->query($sql);
                    foreach ($users as $row)
                    {
                     echo '<div class="chip waves-effect" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;max-width: 200px" onclick="var x = document.getElementById(\'tags\');x.value= this.getElementsByTagName(\'span\')[0].innerHTML;x.focus();document.getElementById(\'qty\').focus()"><span>'. $row['name']. '</span></div>';
                    }
                    $dbh = null;
                  }
               catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
                  ?>
          </div> <div class="col s1"> <a href="https://smartlist.ga/dashboard/scan" class="btn btn-flat waves-effect btn-large" style='position: relative;bottom: -10px;'><i class="material-icons">qr_code_scanner</i></a> </div> <div class="col s12"> <div class="input-field"> <label>Quantity</label> <input type="text" name="qty"  id="qty" class="form-control" value="1" autocomplete="off"></div> </div> <div class="col s12"> <div class="input-field"> <select name="price" id="date" > <option value="Pots and Pans">Pots/Pans</option> <option value="Fruits, Veggies, etc."selected>Fruits, Veggies, etc.</option> <option value="Cutlery">Cutlery</option> <option value="Bottles and Cups">Bottles and Cups</option> <option value="Bowls and Plates">Bowls and Plates</option> </select> <label>Tag</label> </div> </div> </div> <button type="submit" name="Submit" value="Add" class="btn purple darken-3 waves-effect" onclick="add();sm_page('Contact', this, ''); "><i class="material-icons left">add</i>Add</button>  <button type="submit" name="Submit" value="Add" class="btn purple darken-1 waves-effect" onclick="add();sm_page('addkitchen', this, '');M.toast({html: 'Added item successfully!'});document.getElementById('tags').focus()">Save, and reset</button> </form> </div> </div> 
    <div id="modal1" class="tabcontent" style="position:fixed;top:0;left:0;z-index:999999;width:100%;overflow-y:scroll">
      <nav style="position:fixed;top:0;left:0;z-index:2;width:100%;background: #303030">
        <ul>
          <li>
            <a href="#!" class="waves-efsfect waves-slight" onclick="sm_page('News', this, '')" id="capitalizeFirstLetter" style="font-size: 20px"><i class="material-icons left" id="settings-icon" style="color:white;">arrow_back</i>  Settings</a>
          </li>
        </ul>
      </nav>
      <div class="container">
    <div class="row" style="margin-top: 10px">
      <div class="col s12 m3 __sidebar">
        <div class="collection" style="border:1px solid #ccc;border-radius: 5px;">
          <a href="#!" id="__def" onclick="_settingsLoad(this, this.getElementsByTagName('span')[0].innerHTML.toLowerCase().replace(' ', ''))" class="collection-item waves-effect"><span>Account</span></a>
          <a href="#!" onclick="_settingsLoad(this, this.getElementsByTagName('span')[0].innerHTML.toLowerCase().replace(' ', ''))" class="collection-item waves-effect"><span>Privacy</span></a>
          <a href="#!" onclick="_settingsLoad(this, this.getElementsByTagName('span')[0].innerHTML.toLowerCase().replace(' ', ''))" class="collection-item waves-effect"><span>Notifications</span></a>
          <a href="#!" onclick="_settingsLoad(this, this.getElementsByTagName('span')[0].innerHTML.toLowerCase().replace(' ', ''))" class="collection-item waves-effect"><span>Rooms</span></a>
          <a href="#!" onclick="_settingsLoad(this, this.getElementsByTagName('span')[0].innerHTML.toLowerCase().replace(' ', ''))" class="collection-item waves-effect"><span>Appearance</span></a>
          <a href="#!" onclick="sm_page('pair2', '', '')" class="collection-item waves-effect"><span>Sync</span></a>
          <a href="#!" class="collection-item waves-effect" style="opacity:.8;pointer-events:none"><span>Labels - Coming Soon!</span></a>
          <a href="#!" onclick="_settingsLoad(this, this.getElementsByTagName('span')[0].innerHTML.toLowerCase().replace(' ', ''))" class="collection-item waves-effect"><span>App</span></a>
          <a href="#!" onclick="_settingsLoad(this, this.getElementsByTagName('span')[0].innerHTML.toLowerCase().replace(' ', ''))" class="collection-item waves-effect"><span>Developer</span></a>
          <a href="#!" onclick="_settingsLoad(this, this.getElementsByTagName('span')[0].innerHTML.toLowerCase().replace(' ', ''))" class="collection-item waves-effect"><span>Support</span></a>
          <a href="logout.php" class="collection-item waves-effect">Log Out</a>
          <a href="#!" onclick="_settingsLoad(this, this.getElementsByTagName('span')[0].innerHTML.toLowerCase().replace(' ', ''))" class="collection-item waves-effect"><span>Other</span></a>
        </div>
      </div>
      <div class="col s12 m9">
        <div id="_smSettingsPage_account" class="__SETTINGSPAGE">
            <div class="row">
                <div class="col s12 m10">
                    <h1 style="margin:0;"><?php echo $_SESSION['name'];?></h1>
                    <h5>Your login ID: <?php echo $_SESSION['id'];?></h5>
                    <h6>Your email: <span style="background:#ccc;color:#ccc;transition: all .2s;cursor:pointer" onclick="this.style.color='black';this.style.backgroundColor = 'transparent'"><?php echo $_SESSION['email'];?></span></h6>
                </div>
                <div class="col s2 hide-on-small-only">
                    <div class="container"><img src="<?php echo $_SESSION['avatar'];?>" width="100%" style="border-radius:999px;"/></div>
                </div>
            </div>
        </div>
        <div id="_smSettingsPage_privacy" class="__SETTINGSPAGE">
        <div class="collection">
            <label class="collection-item waves-effect" style="width: 100%;">
                    <input type="checkbox" class="filled-in" />
                    <span>Send stats to us for development purposes only</span>
            </label>
            <a class="waves-effect collection-item modal-trigger  modal-close" href="#pair" onclick="syncalertplayAudio();">Pair my account</a>
            <a href="https://smartlist.ga/dashboard/resources/reset-password.php" href="#" class="waves-effect collection-item modal-trigger  modal-close">Change your Password</a>
        </div>
        </div>
        <div id="_smSettingsPage_rooms" class="__SETTINGSPAGE">
          <ul class="collection">
              <?php
            try
            {
            $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $sql = "SELECT * FROM roomnames WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . $_SESSION['syncid'];
            $users = $dbh->query($sql);
            foreach ($users as $row)
            {
            print "<li class=\"collection-item\" style='width:100%;'><i class='material-icons left'>" . $row['qty'] . "</i>" . $row["name"] . " <a class='secondary-content waves-effect _room' href='https://smartlist.ga/dashboard/rooms/custom_room_delete.php?id=" . $row['id'] . "&name=" . urlencode($row['name']) . "'><i class='material-icons'>delete</i></a></li>";
            }
            $dbh = null;
            }
            catch(PDOexception $e)
            {
            echo "Error is: " . $e->etmessage();
            }
            ?>
          </ul>
        </div>
        <div id="_smSettingsPage_appearance" class="__SETTINGSPAGE">
            <div class="collection"  style="overflow:visible">
                <a class="collection-item" href="#" style="overflow:visible;">
                    Dark mode
                    <div class="switch" style="float:right;position:relative;bottom: -3px">
                      <label>
                        <input type="checkbox" name="pairingaccountid" value="dark" id="darkmode">
                        <span class="lever"></span>
                      </label>
                    </div>
                  </a>
                  <a class='dropdown-trigger collection-item waves-effect' href='#' data-target='dropdown1'><b>Choose theme color</b><span style="color:gray"><br>Fair warning (for mobile users only): Changing the theme color can have unexpected results.</span></a>
                  <ul id='dropdown1' class='dropdown-content' style='min-width: 30vw;max-height: 300px;min-height: 300px;position:fixed !important;z-index:99999'>
                    <li><a onclick='_color.value = "41308a";document.getElementById("__colorform").submit()' href="#!">Default <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEVFJ6D////Exu4TAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='circle right'/></a></li>
                    <li><a onclick='_color.value = "6200ea";document.getElementById("__colorform").submit()' href="#!">Purple <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEViAOr///9ZJ5DQAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='circle right'/></a></li>
                    <li><a onclick='_color.value = "B00020";document.getElementById("__colorform").submit()' href="#!">Red <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEWwACD///8fISOWAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='circle right'/></a></li>
                    <li><a onclick='_color.value = "00695c";document.getElementById("__colorform").submit()' href="#!">Teal <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEUAaVz///+wIDr7AAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='circle right'/></a></li>
                    <li><a onclick='_color.value = "00838f";document.getElementById("__colorform").submit()' href="#!">Cyan <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEUAg4/////mpfPyAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='circle right'/></a></li>
                    <li><a onclick='_color.value = "0277bd";document.getElementById("__colorform").submit()' href="#!">Blue <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEUCd73///9M+5ROAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='circle right'/></a></li>
                    <li><a onclick='_color.value = "2e7d32";document.getElementById("__colorform").submit()' href="#!">Green <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEUufTL////DH+/PAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='circle right'/></a></li>
                    <li><a onclick='_color.value = "ef6c00";document.getElementById("__colorform").submit()' href="#!">Orange <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEXvbAD///8eCazGAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='circle right'/></a></li>
                    <li><a onclick='_color.value = "ad1457";document.getElementById("__colorform").submit()' href="#!">Pink <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEWtFFf////D4Zu0AAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='circle right'/></a></li>
                    <li><a onclick='_color.value = "37474f";document.getElementById("__colorform").submit()' href="#!">Blue-gray <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEU3R0////+VAmT6AAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" width="20px" class='circle right'/></a></li>
                    <li><a onclick='_color.value = "212121";document.getElementById("__colorform").submit()' href="#!">Black <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEUhISH///+NBoehAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" width="20px" class='circle right'/></a></li>
                    <li><a onclick='_color.value = "6d4c41";document.getElementById("__colorform").submit()' href="#!">Brown <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEVtTEH///+vGAlJAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" width="20px" class='circle right'/></a></li>
                  </ul>
                  <form action="./user/color.php" id="__colorform" method="POST">
                  <input type='hidden' name='color' id='color' value="<?php echo $theme;?>">
                  </form>
                  <a class="waves-effect collection-item modal-trigger  modal-close" href="#avarar" >Change my avatar</a>
            </div>
        </div>
        <div id="_smSettingsPage_labels" class="__SETTINGSPAGE">Labels</div>
        <div id="_smSettingsPage_notifications" class="__SETTINGSPAGE"><h5>Notifications</h5>
        <button class="btn grey darken-3" onclick="desktop_ping('Success!', 'Notifications are enabled!')">Test push notifications</button>
          <form action="./user/notifications.php" method="POST">
              <h6>Minimum # of items per notifications</h6>
        <p class="range-field">
          <input type="range" name="remind" min="0" max="100" onmouseup="this.parentElement.parentElement.submit()" value="<?php echo $number_notify;?>"/>
        </p>
      </form>
            </div>
        <div id="_smSettingsPage_app" class="__SETTINGSPAGE"><h5>App</h5><br>
        <button class="add-button btn blue-grey darken-3">Install app</button>
        </div>
        <div id="_smSettingsPage_developer" class="__SETTINGSPAGE"><h5>Developer</h5><p>Coming Soon! </p></div>
        <div id="_smSettingsPage_support" class="__SETTINGSPAGE"><h5>Support</h5><div class="collection"><a class="collection-item" href="https://community.smartlist.ga">Smartlist Community</a><a class="collection-item" href="https://help.smartlist.ga">Smartlist knowledge base</a></div></div>
        <div id="_smSettingsPage_other" class="__SETTINGSPAGE"><h5>Other</h5><p>Coming Soon!</p></div>
      </div>
    </div>
    </div>
    </div>
    <div id="News" class="tabcontent" style="background:var(--bg-color);color:  background:var(--font-color)">
      <div style="width: 100%;height:400px !important;background:var(--chart-color) !important;<?php if ($row_count == 0){echo "background: #eee !important;";} ?>">
        <?php if ($row_count == 0){echo "<br><br><br><br><br><br><br><br><h6 class='center' style='margin: 0;color: gray'>No data in budget meter to display<br><a href='https://help.smartlist.ga/#/no-data-in-budget-meter-to-display' style='color: #aaa' class='center'>More Info</a></h6>";} ?><?php if ($row_count > 0){?><canvas id="myChart" style="width: 100%;height:200px !important;" class="ree"></canvas>
        <?php
    } ?>
      </div>
      <div class="row" style="margin:0 !important">
        <div class="col s6 hide-on-small-only" style="margin:0 !important">
          <p class='center zoom_in tooltipped' data-tooltip="Click to refresh" style="cursor:pointer" onclick="AJAX_LOAD('#todo_list_grid', './rooms/todo/index.php', 'boax')"><b>Todo</b></p>
          <div id='todo_list_grid'>
          <?php
          try
          {
            $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $stmt = $dbh->query('SELECT * FROM todo WHERE login_id=' . $_SESSION['id']);
            $todo_row_count = $stmt->rowCount();
            $dbh = null;
          }
          catch(PDOexception $e)
          {
            echo "Error is: " . $e->etmessage();
          }
          if ($todo_row_count > 0)
          {
            try
            {
              $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
              $sql = "SELECT * FROM todo WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . $_SESSION['syncid'];
              $users = $dbh->query($sql);
              foreach ($users as $todo_listx)
              {
                echo "<div class='card'><div class='card-content waves-effect activator'><span class='card-title activator'>" . $todo_listx['name'] . "<span style='float:right' class='badge'>Due on " . $todo_listx['price'] . "</span></span><span>Priority: " . $todo_listx['qty'] . "</span><br></div><div class=\"card-reveal\" style='z-index:1;overflow:scroll !important'><span class=\"card-title\">Description<i class=\"material-icons right waves-effect\">close</i></span><span>Description: " . $todo_listx['descs'] . "</span></div><div class='card-action' style='z-index: 0 !important;'><a href=\"https://smartlist.ga/dashboard/rooms/todo/edit.php?id=$todo_listx[id]\" class='btn btn-flat tooltiapped waves-effect 'style='z-index: 0 !important;margin:0 !important' data-tooltip='Edit'><i class='material-icons'>edit</i></a> <a onclick='var e=this;$(\"#div1\").load(\"https://smartlist.ga/dashboard/rooms/todo/delete.php?id=$todo_listx[id]\");e.parentElement.parentElement.style.opacity=\".5\";M.toast({html: \"Task complete! <br> Good job!\"});task_complete();e.parentElement.style.display=\"none\"'  class='btn btn-flat waves-effect tooltippeda'style='z-index: 0 !important;margin:0 !important' data-tooltip='Delete'><i class='material-icons'>delete</i></a></div>";
                echo "</div>";
              }
              $dbh = null;
            }
            catch(PDOexception $e)
            {
              echo "Error is: " . $e->etmessage();
            }
          }
          else
          {
            echo "<img alt='image' loading='lazy' src='https://res.cloudinary.com/smartlist/image/upload/v1615853475/gummy-coffee_300x300_dlc9ur.png'width='300px' style='display:block;margin:auto;'><br><p class='center'>Great job - you finished all tasks! Why not take this time to drink some coffee or go for a walk?</p>";
          }
          ?>
          </div>
        </div>
        <div class="col s6 hide-on-small-only ">
          <p class='center zoom_in tooltipped' data-tooltip="Click to refresh" style="cursor:pointer" onclick="AJAX_LOAD('#grocery_list', './rooms/grocerylist/index.php', 'boax')"><b>Grocery list</b></p>
          <div id="grocery_list">
          <?php
          try
          {
            $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $stmt = $dbh->query('SELECT * FROM grocerylist WHERE login_id=' . $_SESSION['id']);
            $gl_row_count = $stmt->rowCount();
            $dbh = null;
          }
          catch(PDOexception $e)
          {
            echo "Error is: " . $e->etmessage();
          }
          if ($gl_row_count > 0)
          {
            try
            {
              $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
              $sql = "SELECT * FROM grocerylist WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . $_SESSION['syncid'];
              $users = $dbh->query($sql);
              echo "<div id='gl_item'></div>";
              foreach ($users as $row){
                echo "<div class='card' style=\"width:100%\">
          <div class='card-content'>
          <div style='float:right'>
          <a href=\"https://smartlist.ga/dashboard/rooms/grocerylist/edit.php?id=".$row['id']."\" class='btn btn-flat waves-effect tooaltipped' style='z-index: 0 !important;margin:0 !important' data-tooltip='Edit'>
          <i class='material-icons'>edit</i>
          </a> <a onclick='var e=this;$(\"#div1\").load(\"https://smartlist.ga/dashboard/rooms/grocerylist/delete.php?id=".$row['id']."\");this.parentElement.parentElement.style.display=\"none\";M.toast({html: \"Deleted\"});task_complete();' data-tooltip='Delete'  class='tooltippeda btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
          <i class='material-icons'>delete</i>
          </a>
          </div>
          <span class='card-title'> ".$row['name']."</span>
          <span>Quantity: ".$row['qty']."</span>
                  </div></div>";
              }
              $dbh = null;
            }
            catch(PDOexception $e)
            {
              echo "Error is: " . $e->etmessage();
            }
          }
          else
          {
            echo "<img alt='image' src='https://res.cloudinary.com/smartlist/image/upload/v1615853654/b21f813da2e0c122d2950bf1b449106a-winter-woman-shopping-illustration-by-vexels_xszuie.png'width='300px' style='display:block;margin:auto;'loading=\"lazy\"><br><p class='center'>Nothing in your grocery list.... Good Job! </p>";
          }
          ?>
          </div>
        </div>
      </div>
      <div class="s6 hide-on-med-and-up">
        <div id="test1" class="col s12" >
          <div style="padding: 30px;padding-bottom:0;">
            <div class="dd">
              <img alt='image' loading="lazy" src='https://res.cloudinary.com/smartlist/image/upload/v1615853475/gummy-coffee_300x300_dlc9ur.png'width='300px' style='display:block;margin:auto;'><br>
              <p class='center'>Great job - you finished all tasks! Why not take this time to drink some coffee or go for a walk?</p>
            </div>
            <?php
            try
            {
              $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
              $stmt = $dbh->query('SELECT * FROM todo WHERE login_id=' . $_SESSION['id']);
              $todo_row_count = $stmt->rowCount();
              //echo $todo_row_count;
              $dbh = null;
            }
            catch(PDOexception $e)
            {
              echo "Error is: " . $e->etmessage();
            }
            if ($todo_row_count > 0)
            {
              try
              {
                $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $sql = "SELECT * FROM todo WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . $_SESSION['syncid'];
                $users = $dbh->query($sql);
                echo "<div class='card'><div class='card-content'><h5 style='margin-top:0'>Todo</h5>";
                foreach ($users as $todo_listx)
                {
                  echo '<p><label><input type="checkbox" onchange=\'$("#div1").load("https://smartlist.ga/dashboard/rooms/todo/delete.php?id=' . $todo_listx['id'] . '");this.disabled=true;this.nextElementSibling.style.color = "gray";task_complete();\'/><span><b>' . $todo_listx['name'] . '</b><br>Priority: ' . $todo_listx['qty'] . '<br>Due on: ' . $todo_listx['price'] . '</span></label></p>';
                }
                echo "</div></div>";
                $dbh = null;
              }
              catch(PDOexception $e)
              {
                echo "Error is: " . $e->etmessage();
              }
            }
            else
            {
              echo "<div class='card'><div class='card-content'><h5 style='margin-top:0'>Todo</h5><img alt='image' loading='lazy' src='https://res.cloudinary.com/smartlist/image/upload/v1615853475/gummy-coffee_300x300_dlc9ur.png'width='100%' style='display:block;margin:auto;'><br><p class='center'>Great job - you finished all tasks! Why not take this time to drink some coffee or go for a walk?</p></div></div>";
            }
            ?>
          </div>
        </div>
        <div id="test4" class="col s12" style="padding: 30px;padding-top:0;">
          <?php
          try
          {
            $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $stmt = $dbh->query('SELECT * FROM grocerylist WHERE login_id=' . $_SESSION['id']);
            $gl_row_count = $stmt->rowCount();
            //echo $gl_row_count;
            $dbh = null;
          }
          catch(PDOexception $e)
          {
            echo "Error is: " . $e->etmessage();
          }
          if ($gl_row_count > 0)
          {
            try
            {
              $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
              $sql = "SELECT * FROM grocerylist WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . $_SESSION['syncid'];
              $users = $dbh->query($sql);
              echo "<div class='card'><div class='card-content'><h5 style='margin-top:0'>Grocery List</h5>";
              foreach ($users as $todo_listx)
              {
                echo '<p><label><input type="checkbox" onchange=\'$("#div1").load("https://smartlist.ga/dashboard/rooms/grocerylist/delete.php?id=' . $todo_listx['id'] . '");this.disabled=true;this.nextElementSibling.style.color = "gray";task_complete();\'/><span><b>' . $todo_listx['name'] . '</b><br>Quantity: ' . $todo_listx['qty'] . '</span></label></p>';
              }
              echo "</div></div>";
            }
            catch(PDOexception $e)
            {
              echo "Error is: " . $e->etmessage();
            }
          }
          else
          {
            echo "<div class='card'><div class='card-content'><h5 style='margin-top:0'>Grocery List</h5><img alt='image' loading='lazy' src='https://res.cloudinary.com/smartlist/image/upload/v1615853654/b21f813da2e0c122d2950bf1b449106a-winter-woman-shopping-illustration-by-vexels_xszuie.png'width='300px' style='display:block;margin:auto;'><br><p class='center'>Nothing in your grocery list.... Good Job! </p></div></div>";
          }
          ?>
        </div>
      </div>
    </div>
    <div id="searchresults" class="tabcontent">
      <div class="container">
        <h5 class="center" style="color: var(--font-color)">Search results for "<span id="sr"></span>"</h5>
        <div class="chip"> <img loading="lazy" src="<?php echo $_SESSION['avatar']; ?>" alt="Contact Person"> By: <?php echo $_SESSION['name']; ?> </div>
        <ul class="collection with-header" id="myUL" style="border:0;">
          <div id="sr_item"></div>
          <script>var sr_res = [<?php
              try
              {
                $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $sql = "SELECT * FROM grocerylist WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . $_SESSION['syncid'];
                $users = $dbh->query($sql);
                foreach ($users as $row)
                {
                  echo "{id: " . $row['id'] . ", name: '" . $row['name'] . "', room: 'gl'},";
                }
                $dbh = null;
              }
              catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
              ?>
              <?php
              try
              {
                $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $sql = "SELECT * FROM garage WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . $_SESSION['syncid'];
                $users = $dbh->query($sql);
                foreach ($users as $row)
                {
                  echo "{id: " . $row['id'] . ", name: '" . $row['name'] . "', room: 'garage'},";
                }
                $dbh = null;
              }
              catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
              ?>
              <?php
              try
              {
                $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                  $sql = $dbh->prepare("SELECT * FROM products WHERE login_id = :login_id OR login_id= :syncid");
                  $sql->bindValue(':login_id', $_SESSION['id'], PDO::PARAM_STR);
                  $sql->bindValue(':syncid', $_SESSION['syncid'], PDO::PARAM_STR);
                  $sql->execute();
                  $users = $sql->fetchAll();
                foreach ($users as $row)
                {
                  echo "{id: " . $row['id'] . ", name: '" . $row['name'] . "', room: 'kitchen'},";
                }
                $dbh = null;
              }
              catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
              ?>
              <?php
              try
              {
                $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $sql = "SELECT * FROM bathroom WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . $_SESSION['syncid'];
                $users = $dbh->query($sql);
                foreach ($users as $row)
                {
                  echo "{id: " . $row['id'] . ", name: '" . $row['name'] . "', room: 'bathroom'},";
                }
                $dbh = null;
              }
              catch(PDOexception $e)
              {
                echo "Error is: " . $e->etmessage();
              }
              ?>
              <?php
              try
              {
                $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $sql = "SELECT * FROM storageroom WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . $_SESSION['syncid'];
                $users = $dbh->query($sql);
                foreach ($users as $row)
                {
                  echo "{id: " . $row['id'] . ", name: '" . $row['name'] . "', room: 'storage'},";
                }
                $dbh = null;
              }
              catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
              ?>
              <?php
              try
              {
                $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $sql = "SELECT * FROM bedroom WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . $_SESSION['syncid'];
                $users = $dbh->query($sql);
                foreach ($users as $row)
                {
                  echo "{id: " . $row['id'] . ", name: '" . $row['name'] . "', room: 'bedroom'},";
                }
                $dbh = null;
              }
              catch(PDOexception $e)
              {
                echo "Error is: " . $e->etmessage();
              }
              ?>]
          </script>
        </ul>
      </div>
    </div>
    <nav style="position:fixed;background: #212121;z-index:10000;top:0;display:none;overflow:visible" id="secondary_nav">
      <div class="nav-wrapper">
        <a href="#!" class="brand-logo left hide-on-large-only" onclick="back();" style="margin: 0 !important"><i class="material-icons">arrow_back</i> <span style="font-size: 20px;position: relative;top: -3px;">Item Details</span></a>
        <ul class="right snav">
          <li><a href="#" id="nav_star" class="waves-effect waves-yellow tooltipped" data-position="bottom" data-tooltip="Star item"><i class="material-icons">star_outline</i></a></li>
          <li><a href="#" id="nav_edit" class="waves-effect waves-light tooltipped" data-position="bottom" data-tooltip="Edit item"><i class="material-icons">edit</i></a></li>
          <li><a href="#" id="nav_delete" class="waves-effect waves-light tooltipped" data-position="bottom" data-tooltip="Delete item"><i class="material-icons">delete</i></a></li>
        </ul>
      </div>
    </nav>
    <nav style="position:fixed;background: #212121;z-index:10000;top:0;display:none;overflow:visible" id="edit_nav">
          <a href="#!" class="brand-logo left hide-on-large-only" onclick="edit_back();" style="margin: 0 !important" id="editback"><i class="material-icons">arrow_back</i> <span style="font-size: 20px;position: relative;top: -3px;">Edit</span></a>
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
                    <div class="col s12 m3">
                        <button type="button" onclick='var x = document.getElementById("edit_item_qty");x.value = parseInt(x.value) + 1' class="btn waves-effect" style="background: #<?php echo $theme; ?>"><i class="material-icons">add</i></button>
                        <button type="button" onclick='var x = document.getElementById("edit_item_qty");x.value = parseInt(x.value) - 1' class="btn waves-effect" style="background: #<?php echo $theme; ?>"><i class="material-icons">remove</i></button>
                    </div>
                </div>
                <button name="submit" class="btn waves-effect" style="background:#<?php echo $theme; ?>">Update</button>
                <button name="button" type="button" class="btn btn-flat waves-effect" style="color:gray" onclick="document.getElementById('editback').click()">Cancel</button>
                <input type="hidden" name="id" id="edit_item_id">
            </form>
        </div>
    </div>
    <div id="item_popup" style="overflow:hidden" class="tabcontent">
        <!--ITEM_POPUP-->
      <div class="container">
          <div class="hide-on-med-and-down" style="margin-top: 50px;"></div>
        <h3 id="item_title"></h3>
        <h5 id="item_qty"></h5>
        <p class="flow-text" id="item_desc"></p>
        <div class="collection z-depth-2" style="padding:0">
          <a href="#!" class="collection-item waves-effect" id="action_edit" style="color:gray"><i class="material-icons left">edit</i>Edit</a>
          <a href="#!" class="collection-item waves-effect" style="color:gray" id="action_task"><i class="material-icons left">task_alt</i>Add item to todo list</a>
              <a href="#!" target="_blank" class="collection-item waves-effect" id="action_qr" style="color:gray"><i class="material-icons left">qr_code</i>Generate QR code</a>
          <a href="#!" class="collection-item waves-effect" id="action_share" target="_blank" style="color:gray"><i class="material-icons left">forum</i>Invite collaborators &amp; comment</a>
          <a href="#!" class="collection-item waves-effect" id="action_mail" target="_blank" style="color:gray"><i class="material-icons left">email</i>Share via email</a>
          <a href="#!" class="collection-item waves-effect" id="action_share_p" style="color:gray;displays:none"><i class="material-icons left">share</i>Share (Mobile Only)</a>
          <a href="#!" class="collection-item waves-effect" id="action_recipe" target="_blank" style="color:gray"><i class="material-icons left">auto_awesome</i>Find a recipe</a>
          <a href="#!" class="collection-item waves-effect" id="action_ev" style="color:gray;opacity:.7;pointer-events:none"><i class="material-icons left">event</i>Push to Smartlist Events</a>
          <a href="#!" class="collection-item red-text waves-effect waves-red" id="action_delete"><i class="material-icons left">delete</i>Delete</a>
        </div>
        <a href="javascript:void(0)" onclick="back();" class="hide-on-small-only btn waves-effect" style="background: #<?php echo htmlspecialchars($theme_light);?>"><i class="material-icons left">arrow_back</i>Back</a>
      </div>
    </div>
    
    <!-- AJAX LOADERS -->
    <div id="div1"></div>
    <div id="dining_room" class="tabcontent"></div>
    <div id="family" class="tabcontent"></div>
    <div id="bathroom" class="tabcontent"></div>
    <div id="storage" class="tabcontent"></div>
    <div id="gl" class="tabcontent"></div>
    <div id="todo_list" class="tabcontent"></div>
    <div id="notification_popup" class="tabcontent"></div>
    <div id="Contact" class="tabcontent"></div>
    <div id="cs" class="tabcontent"></div>
    <div id="trash_c" class="tabcontent"></div>
    <div id="Home" class="tabcontent"></div>
    <div id="suggested" class="tabcontent"></div>
    <div id='custom_room' class='tabcontent'></div>
    <div id="STARRED_ITEMS" class="tabcontent"></div>
    <div id="laundryroom" class="tabcontent"></div>
    <!-- END AJAX LOADERS -->
    <div id="pair2" class="tabcontent" style="position:fixed;top:0;left:0;z-index:999999;width:100%">
        <nav style="position:fixed;top:0;left:0;z-index:2;width:100%;background: #212121">
            <ul>
                <li>
                    <a href="#" class="waves-effect waves-light" onclick="sm_page('modal1', this, '')" style="margin-left: 1px;border-radius:999px;"><i class="material-icons" style="color:white"onclick="sm_page('News', this, '')" >arrow_back</i></a>
                </li>
            </ul>
        </nav>
      <div class='container'>
        <h4>Pair your account</h4>
        <br>
        <div style='background:#eee;padding: 10px;'>
          <p>Step #1 - Request access</p>
          <form action="pair.php" method="GET">
            <div class='input-field'>
              <label>Login ID...</label>
              <input type="number" name="pairingaccountid"> 
              <span style='color:#aaa'>To pair, you will need to know the other person's login ID. You can find yours in the settings page</span> 
            </div>
            <button type="submit" class="btn purple darken-3 waves-effect">Change</button>
            </div>
        </div>
        </form>
      <br>
      <div class="container">
        <div style='background:#eee;padding: 10px;'>
          <a href="#!" onclick="AJAX_LOAD('#paira', 'https://smartlist.ga/dashboard/resources/pair_req.php')" class="right waves-effect btn purple darken-3">Refresh</a>
          <p><b>Step #2 - View requests</b></p>
          <div id='paira'></div>
        </div><br>
        <div style='background:#eee;padding: 10px;'>
          <a href="#!" id="account_pair_view" class="right waves-effect btn purple darken-3">Refresh</a>
          <p><b>Step #3 - View current accounts paired to yours</b></p>
          <div id='pairb'></div>
        </div>
      </div>
    </div>
    <div id="ajax_loader" class="tabcontent" style="margin-top: 0 !important"><center><br><br><br><svg class='circular' height='50' width='50'> <circle class='path' cx='25' cy='25' r='20' fill='none' stroke-width='3' stroke-miterlimit='10' /> </svg><br></center></div>
    <div id="About" class="tabcontent">
      <div class="container">
        <?php
        try
        {
          $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $sql = "SELECT * FROM garage WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . $_SESSION['syncid'];
          $users = $dbh->query($sql);
          $garage_count = $users->rowCount();
          if ($garage_count > 0)
          {
            echo '<table class="table" id="garage_table">
            <tr>
            <td>Name</td>
            <td>Quantity</td>
            <tr id="garage_item"></tr>
            </tr>
            <script>var garage = [';
            foreach ($users as $row)
            {
              echo '{id: ' . htmlspecialchars($row['id']) . ', name: \'' . htmlspecialchars($row['name']) . '\', qty: \'' . htmlspecialchars($row['qty']) . '\', room: \'garage\', price: \'' . htmlspecialchars($row['price']) . '\', directory: \'https://smartlist.ga/dashboard/rooms/garage/\', star: ' . htmlspecialchars($row['star']) . ', ';
              if ($row['login_id'] != $_SESSION['id'])
              {
                echo "sync: true,";
              }
              echo '},';
            }
            echo ']</script>';
            $dbh = null;
          }
          else
          {
            echo "<script>var garage = []</script><img alt='image' src='https://res.cloudinary.com/smartlist/image/upload/v1615853475/gummy-coffee_300x300_dlc9ur.png'width='300px' style='display:block;margin:auto;'><br><p class='center'>No items here! Why not try adding something...</p>";
          }
        }
        catch(PDOexception $e)
        {
          echo "Error is: " . $e->etmessage();
        }
        ?>
        </table>
    </div>
    </div>
    <div id="key" class="modal modal-fixed-footera">
      <div class="modal-content">
        <h4 style="color: var(--font-color)">Keyboard Shortcuts </h4>
        <p>CTRL F - Focus on search bar</p>
        <p>CTRL / or /- Focus on search bar</p>
        <p>CTRL B - View budget Meter</p>
        <p>CTRL S - Add item</p>
        <p>CTRL E - Open settings</p>
        <p><a href="https://community.smartlist.ga/" class='blue-text'>Want a new keyboard shortcut? Request one in the community forum!</a></p>
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
      </div>
    </div>
    <!--CONTENT ENDS-->
    </div>
    <audio id="syncalert"> <source src="https://padlet-uploads.storage.googleapis.com/446844750/abff4e01e3d7691aa96889855e09afaa/notification_simple_02.wav" type="audio/mpeg" defer loading="lazy"></audio> 
    <audio id="task_complete"> <source src="https://padlet-uploads.storage.googleapis.com/446844750/f84dfa8a5cf0e025612f3517c2619e99/hero_simple_celebration_03.wav" type="audio/mpeg" defer loading="lazy"> </audio>
    <div id="right_click_modal" class="modal bottom-sheet">
      <a href="#" id="rclick_edit" class="modal-close waves-effect"><i class="material-icons left">edit</i> Edit</a>
      <a href="#" id="rclick_add" class="modal-close waves-effect"><i class="material-icons left">local_grocery_store</i> Add to grocery List</a>
      <a href="#" id="rclick_share" class="modal-close waves-effect"><i class="material-icons left">share</i> Share</a>
      <a href="#" id="rclick_recipe" target="_blank" class="modal-close waves-effect"><i class="material-icons left">auto_awesome</i> Find recipe</a>
      <a href="#" id="rclick_mail" target="_blank" class="modal-close waves-effect"><i class="material-icons left">email</i> Email</a><a href="#" id="rclick_qr" target="_blank" class="waves-effect"><i class="material-icons left">qr_code</i> Generate QR code</a>
      <a href="#" id="rclick_delete" class="modal-close waves-effect"><i class="material-icons left">delete</i> Delete</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.0.0/dist/js/materialize.min.js"></script>
    <script src="https://smartlist.ga/dashboard/js/app.js"></script>
    <script src="https://smartlist.ga/dashboard/js/swipe.js"></script>
    <script defer>
    function back() {document.body.style.overflow = '';document.getElementById('editfab').style.display='none';document.getElementById('edit_nav').style.display='none';document.getElementById("FLOATING_ACTION_BUTTON").style.transform = "scale(1)";if(page_title == 'News') {nav_title('Dashboard');} sm_page(page_title, this, ''); document.querySelector("meta[name=theme-color]").setAttribute("content", "#<?php echo $theme_top; ?>");}
    var __bmglobal = { 
        <?php echo "labels: [\"Start\",";
        try { $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); $sql = "SELECT * FROM bm WHERE login_id=" . $_SESSION['id']. " ORDER BY id ASC"; $users = $dbh->query($sql); foreach ($users as $row) { echo "" . json_encode($row['name']) . ", "; } $dbh = null; } catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
            echo "], \n     datasets: [
             { label: 'Amount you spent', data: [0,"; $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); $sql = "SELECT * FROM bm WHERE login_id=" . $_SESSION['id']. " ORDER BY id ASC"; $users = $dbh->query($sql); foreach ($users as $row){ echo "".$row['qty'].", "; } $dbh = null; echo "],"; ?> order: 2, borderColor: 'rgba(98,0,238,.8)', backgroundColor: 'rgba(98,0,238,.2)', pointBorderColor: 'rgba(0, 188, 212, 0)', pointBackgroundColor: 'rgba(0, 188, 212, 0.9)', }, 
             { label: 'My goal', data: [<?php try { $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); $sql = "SELECT * FROM bm WHERE login_id=" . $_SESSION['id']; $users = $dbh->query($sql); foreach ($users as $row) { echo $goal . ", "; } echo $goal . ", "; $dbh = null; } catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); } ?>], type: 'line', order: 1, borderColor: '#f44336', borderWidth: 3, backgroundColor: 'rgba(245, 71, 83, 0)', }
        ]
    }
    if(document.getElementById('myChart')) {
      var ctx = document.getElementById('myChart').getContext('2d'); 
      var myChart = new Chart(ctx, { type: 'line', data: __bmglobal, options: __bmconfig });
      ctx.height = 500;
    }
    var __bmgoal = <?php echo $goal; ?>;
    <?php if (isset($_GET['item'])) { ?> $(document).ready(function(){ sm_page('addkitchen', this, ''); }); <?php } ?> <?php if (isset($_GET['croom'])) { ?>  $(document).ready(function(){ M.toast({ html: 'Created room successfully! To view room, click on "More rooms"' }); });<?php } ?> <?php if (isset($_GET['pair_accept'])) { ?>  $(document).ready(function(){ M.toast({ html: 'Granted access. To remove access, just click revoke in step #3. <b>Changes will take time to update, please tell the other user to log out and log back in to view the changes</b>' }); });<?php } ?>  
    function nav_title(data) { brandlogotext.innerHTML = data; } $(document).ready(function(){ window.scrollTo(0, 0); <?php if (isset($_GET["room"])) { $t = $_GET["room"]; if ($t == "10") { echo "sm_page('Contact', this,'' );AJAX_LOAD('#Contact', './rooms/kitchen/view.php')"; } elseif ($t == "1") { echo "sm_page('Contact', this, '');AJAX_LOAD('#Contact', './rooms/kitchen/view.php')"; } elseif ($t == "3") { echo "sm_page('Home', this, '');AJAX_LOAD('#Home', './rooms/bedroom/view.php');nav_title('Bedroom')"; } elseif ($t == "g") { echo "sm_page('About', this, '');nav_title('Garage')"; } elseif ($t == "bathroom") { echo "sm_page('bathroom', this, '');AJAX_LOAD('#bathroom', './rooms/bathroom/view.php');nav_title('Bathroom')"; } elseif ($t == "storage") { echo "sm_page('storage', this, '');AJAX_LOAD('#storage', './rooms/storage/view.php');nav_title('Storage Room')"; } elseif ($t == "family") { echo "sm_page('family', this, '');AJAX_LOAD('#family', './rooms/family/view.php');nav_title('Family Room')"; } elseif ($t == "laundry") { echo "sm_page('laundryroom', this, '');AJAX_LOAD('#laundryroom', './rooms/laundry/view.php');nav_title('Laundry Room')"; } elseif ($t == "dining_room") { echo "sm_page('dining_room', this, '');AJAX_LOAD('#dining_room', './rooms/dining_room/view.php');nav_title('Dining Room')"; } } elseif (!isset($_GET["room"])) { echo "sm_page('News', this, );"; } ?> 
    request_notification(); });
    $(document).ready(function() { garage.forEach(function(entry) { document.getElementById('garage_item').insertAdjacentHTML("beforebegin", ` <tr class="draggable" id="${entry.room}tr_${entry.id}" onclick='item(${entry.id}, `+JSON.stringify(entry.name)+`, `+JSON.stringify(entry.qty)+` , `+JSON.stringify(entry.price)+`,  `+JSON.stringify(entry.directory)+`,  `+JSON.stringify(entry.room)+`, `+JSON.stringify(entry.star)+ `)' ${entry.star == 1 ? 'style=\'border-left: 3px solid #f57f17\'' : ''}> <td>${entry.sync == true ? '<span class="sync">Synced</span>' : ''} ${entry.name} </td> <td> ${entry.qty} </td> </tr>`); }); budgetmeter.forEach(function(entry) { document.getElementById('bm_items').insertAdjacentHTML("beforebegin", ` <tr> <td> ${entry.sync == true ? '<span class="sync">Synced</span>' : ''}` + entry.name + `  </td> <td> ${entry.qty} </td> <td><div class=\"dropdown\" tabindex='0'> <a class=\"dropbtn\" href=\"#!\" rel=\"nofollow\"><i class='material-icons'>more_vert</i></a> <div class=\"dropdown-contenta\"> <a href=\"https://smartlist.ga/dashboard/rooms/bedroom/edit.php?id=${entry.id}\" class='waves-effect'><i class='material-icons left' style="font-size: 20px">edit</i>Edit</a> <a onclick='$(\"#div1\").load(\"https://smartlist.ga/scalesize/bm/delete.php?id=${entry.id}\");this.parentElement.parentElement.parentElement.parentElement.style.display=\"none\";' class='waves-effect'><i class='material-icons left' style="font-size: 20px">delete</i>Delete</a> </div> </div></td> </tr>`); }); sr_res.forEach(function(entry) { document.getElementById('sr_item').insertAdjacentHTML("beforebegin", ` <li class="collection-item waves-effect" onclick="sm_page('${entry.room == 'garage' ? 'About' : ''} ${entry.room == 'bedroom' ? 'Home' : ''} ${entry.room == 'storage' ? 'storage' : ''} ${entry.room == 'kitchen' ? 'Contact' : ''} ${entry.room == 'bathroom' ? 'bathroom' : ''}', this, '')"><a href="#!" >${entry.name}<span class=\"new badge red\">${entry.room == 'bedroom' ? 'bedroom' : ''}${entry.room == 'garage' ? 'Garage' : ''} ${entry.room == 'storage' ? 'Storage' : ''} ${entry.room == 'bathroom' ? 'Bathroom' : ''} ${entry.room == 'kitchen' ? 'Kitchen' : ''} ${entry.room == 'gl' ? 'Grocery List' : ''}</span></a></li>`); }); $('#key').modal({ endingTop: '50%' }); });
     <?php if(isset($_GET['bm'])) {?>
    $(document).ready(function() {
        $('#bmmodal').modal('open');
        document.getElementById('bm_amount').focus()
    });
    <?php } ?>
    </script>   
    <?php if (!empty($notifications))
    { ?>
        <script defer>
          function desktop_ping(theBody, theTitle) { var dts = Math.floor(Date.now()); var options = { body: theBody, icon: 'https://i.ibb.co/pxpvwT8/logo-z3yoqm.png', timestamp: dts, }; var n = new Notification(theTitle, options); n.onclick = function() { event.preventDefault(); window.focus(); sm_page('notification_popup', '', '');AJAX_LOAD("#notification_popup", "./rooms/notifications.php") }; document.addEventListener('visibilitychange', function() { if (document.visibilityState === 'visible') { n.close(); } }); syncalertplayAudio(); }
        var notify_cookie; var NOTIFY_ALREADY_CLOSED = getCookie("NOTIFY_ALREADY_CLOSED"); if ($('#menu li').length > 0) { if(NOTIFY_ALREADY_CLOSED !== 1) {
          if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {}else{
            desktop_ping('<?php try {
          $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $sql = "SELECT * FROM products WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . $_SESSION['syncid'];
          $users = $dbh->query($sql);
          echo "You\'re going to run out of: ";
          foreach ($users as $row){
            print $row["name"] . ", ";
          }
          $dbh = null;
        }
         catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); } ?>', 'Kitchen | Smartlist');
             document.cookie = "NOTIFY_ALREADY_CLOSED=1";
          }}}
        </script>
    <?php
    }
    ?>
    </body>
</html><?php if ($welcome != 1 || isset($_GET['tuts'])) { $donotshowmdl = mysqli_query($mysqli, "UPDATE login SET welcome='1' WHERE id=" . $_SESSION['id'] . ""); echo '<div style="position:fixed;top:0;left:0;width:100%;height:100%;background: rgba(0,0,0,0.3);z-index:99999999999999"> <div id="IUR1" style="margin: auto;width: 50vw;height: 80vh;background:white;margin-top: 10vh;border-radius: 10px;overflow-y:scroll"> <img src="https://i.ibb.co/p0q7vRS/Screenshot-2021-03-02-at-12-19-03-PM.png" width="100%" height="250px" style="object-fit:cover;border-radius: 10px;border-bottom-left-radius: 0;border-bottom-right-radius: 0;background-attachment: fixed"> <h5 class="center">Hi, ' . htmlspecialchars($_SESSION['name']) . '!</h5> <p class="center" style="color: #aaa !important">Welcome to the brand-new Smartlist! <br>We\'ve changed the look and feel of our dashboard so it fits your needs better!</p> <div class="container"> <div class="row" style="text-align:left !important;padding: 0 !important;"> <div class="col s6"> <p> <label> <input type="checkbox" checked="checked" disabled/> <span>Free support via email/chat</span> </label> </p> <p> <label> <input type="checkbox" checked="checked" disabled/> <span>Support Forum</span> </label> </p> <p> <label> <input type="checkbox" checked="checked" disabled/> <span>Todo and Grocery List</span> </label> </p> <p> <label> <input type="checkbox" checked="checked" disabled/> <span>Search your home</span> </label> </p> </div> <div class="col s6"> <p> <label> <input type="checkbox" checked="checked" disabled/> <span>Encrypted items</span> </label> </p> <p> <label> <input type="checkbox" checked="checked" disabled/> <span>Budget Meter</span> </label> </p> <p> <label> <input type="checkbox" checked="checked" disabled/> <span>Multiple Rooms</span> </label> </p> <p> <label> <input type="checkbox" checked="checked" disabled/> <span>Notifications</span> </label> </p> <p> <label> <input type="checkbox" checked="checked" disabled/> <span>Custom rooms</span> </label> </p> </div> </div> <center><button class="btn blue darken-3 waves-effect waves-light" onclick="$(\'#INTRO_1\').tapTarget(\'open\');document.getElementById(\'IUR1\').parentElement.style.display= \'none\'" style="border:0 !important;margin: auto;border-radius: 999999px;line-height: 50px;height: auto;box-shadow:0 5px 5px -3px rgba(0,0,0,.2),0 8px 10px 1px rgba(0,0,0,.14),0 3px 14px 2px rgba(0,0,0,.12)!important">Cool! Let\'s get Started!</button><br><br><a href="https://help.smartlist.ga/" style="color: gray">I would want to read the knowledgebase first</a><br><br></center> </div> </div> </div> <div class="tap-target" id=\'INTRO_1\' data-target="notification" style="color:white !important;background: black" onclick="$(\'.tap-target\').tapTarget(\'close\');$(this).tapTarget(\'destroy\');$(\'#INTRO_2\').tapTarget(\'open\');"> <div class="tap-target-content"> <h5>Notifications</h5> <p style="color:white !important">Click here to see the items you are running out!</p> <mark>Click next if you want to continue the tutorial</mark> <button onclick="$(\'.tap-target\').tapTarget(\'close\');$(this).tapTarget(\'destroy\');$(\'#INTRO_2\').tapTarget(\'open\');" class="btn red">Next</button> </div> </div> <div class="tap-target" id=\'INTRO_2\' data-target="FLOATING_ACTION_BUTTON" style="color:white !important;background: black;z-index: -1 !important"> <div class="tap-target-content"> <h5 style=\'text-align:right\'>Add an item</h5> <p style="color:white !important;text-align:right;margin-left: 10px;">You can click here to add an item. <br>(You may have to click outside, and then click back here). The Shapes icon represents "Items", the check icon represents "Tasks", and the grocery cart represents "Grocery List" items. <br>To add an item, go ahead and click on the shapes icon. Then, select the room, and add the item. </p> <button  onclick="$(\'.tap-target\').tapTarget(\'close\');$(\'#INTRO_2\').tapTarget(\'destroy\');" class="btn red">Cool!!!</button> </div> </div> <script> $(\'.tap-target\').tapTarget(); </script> '; } ?> <?php if (isset($_GET['query'])) { echo "<script> window.onload = function() { setTimeout(function(){ document.getElementById('search').value = ".json_encode($_GET['query'])."; changeValue(); filter(); sm_page('searchresults',this, ''); }, 1000); } </script>";}?>
