<?php 
ini_set('session.gc_maxlifetime', 180000);
session_start();
if(!isset($_SESSION['valid'])) {header('Location: https://smartlist.ga/login');}
include_once("connection.php");
include_once("cred.php");
try {$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);$stmt = $dbh->query('SELECT * FROM bm WHERE login_id='.$_SESSION['id']);$row_count = $stmt->rowCount();$dbh = null;}
catch (PDOexception $e) {echo "Error is: " . $e-> etmessage();}
$notifications = $_SESSION['notifications'];
$number_notify = $_SESSION['number_notify'];
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM login WHERE id=".$_SESSION['id'];
$users = $dbh->query($sql);
foreach ($users as $row) {
$goal = $row["goal"];
$welcome = $row['welcome'];
}
$dbh = null;
?>
<!--
Hey!
Want to contribute to our site?
Go to: https://smartlist.ga/contribute to contribute
Github: https://github.com/Smartlist-app/Smartlist
-->
<!DOCTYPE html>
<html lang="en">
   <head>
      <link rel="preconnect" href="https://i.ibb.co"> <meta name="mobile-web-app-capable" content="yes"> <meta name="apple-mobile-web-app-status-bar-style" content="#2a1782"> <meta name="apple-mobile-web-app-capable" content="yes"/> <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> <link rel="search" href="https://smartlist.ga/search.xml" type="application/opensearchdescription+xml" title="your home (Smartlist)"/> <link rel="shortcut icon" href="https://i.ibb.co/FDqN0Vh/Screenshot-2021-02-02-at-7-55-08-AM-2.png" type="image/png" /> <link rel="apple-touch-icon" href="https://i.ibb.co/FDqN0Vh/Screenshot-2021-02-02-at-7-55-08-AM-2.png" /> <script src="./js/pwa.js" defer></script> <link rel="manifest" href="manifest.webmanifest"> <script src="https://dragselect.com/ds.min.js"></script> <script src="https://js.pusher.com/7.0/pusher.min.js"></script><title>Dashboard | <?php echo $_SESSION['name'];?> | Smartlist</title><link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script><meta name="theme-color" content="#2a1782"> <meta name="title" content="Smartlist - the free home inventory database"> <meta name="description" content="Hey! Have you ever spent so much buying extra groceries which you already have at home? Studies show that people over-buy items which they already have, making them spend hundreds of dollars! Ever wanted to keep track of what you have in your home for free? Smartlist lets you track what's in your home, anywhere, anytime, for free!"> <link rel="preconnect" href="https://fonts.gstatic.com"> <meta property="og:site_name" content="smartlist.ga" /> <meta property="og:title" content="Smartlist" /> <meta property="og:type" content="website" /> <meta property="og:description" content="Hey! Have you ever spent so much buying extra groceries which you already have at home? Studies show that people over-buy items which they already have, making them spend hundreds of dollars! Ever wanted to keep track of what you have in your home for free? Smartlist lets you track what's in your home, anywhere, anytime, for free!" /> <meta name="twitter:card" content="summary_large_image"> <meta name="twitter:site" content="@Smartlist"> <meta name="twitter:title" content="Smartlist"> <meta name="twitter:description" content="Hey! Have you ever spent so much buying extra groceries which you already have at home? Studies show that people over-buy items which they already have, making them spend hundreds of dollars! Ever wanted to keep track of what you have in your home for free? Smartlist lets you track what's in your home, anywhere, anytime, for free!"> <meta name="twitter:domain" content="smartlist.ga"> <meta name="keywords" content="Home, Database, Inventory, free, Smartlist, Smartlist dashboard"> <meta name="robots" content="index, follow"> <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> <meta name="language" content="English">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
      <style>
          .dropdown-content a {color:gray !important;}@media screen and ( max-height: 500px ){.btn-floating {transform: scale(0) !important;}}
      </style>
<?php
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
}
else {
echo '<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>';
}
?>
    <link rel="stylesheet" href="./resources/style.css">
      <script>
         var map = {}; onkeydown = onkeyup = function(e){ e = e || event; map[e.keyCode] = e.type == 'keydown'; if(map["191"]==true){ e.preventDefault(); showsearch();document.getElementById('search').focus(); } }
         Pusher.logToConsole = false;
        var pusher = new Pusher('70e2355e418d35261aca', {
          cluster: 'us3'
        });
        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
          var notification = new Notification("" + data); 
        });
        <?php if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
}else{?>
$( function() {
    $( ".modal" ).draggable({ axis: "y",revert: true });
});
        <?php } ?>
        </script>
   </head>
   <body>
      <div id="bar" style="display:none;opacity:0 !important;"></div>
      <a href="#CONTENT" class="ctnt" style="z-index: 99999999999999999999999999999999999999999">Skip to content</a>
      <nav  style="position:fixed;background: var(--navbar-color) ;z-index:9999;display:none;box-shadow:none !important" id="searchbar">
         <div class="nav-wrapper">
            <form onsubmit="sm_page('searchresults',this, '');document.getElementById('bar').style.display='block'; setTimeout(function(){ document.getElementById('bar').style.display = 'none' }, 2000);return false;">
               <div class="input-field">
                  <input id="search" type="search" required  onkeyup='changeValue();filter()' class="autocompletae" autocomplete="off" onblur="showsearch();" value="<?php echo htmlspecialchars($_GET['query']);?>">
                  <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                  <i class="material-icons">close</i>
               </div>
            </form>
         </div>
      </nav>
      <nav style="position:fixed;background: var(--navbar-color);z-index:999">
         <div class="nav-wrapper">
            <ul class="right" id="nav_ul_notification">
               <li onclick="$('#slide-out').scrollTop(0);"><a class=" sidenav-trigger brand-logo left" style="margin-left:0px !important" data-target="slide-out"><i class="material-icons" id="icon">menu</i><span style="font-size: 20px;position: relative;top: -3px;left: -5px;font-weight:400" id="brandlogo">Smartlist</span></a></li>
               <li>
                  <a id="notification" data-position="bottom" class="right tooltippeda waves-effect waves-light"  data-tooltip='Notifications' onclick='sm_page("notification_popup", this, "");brandlogotext.innerHTML = "Inbox";document.getElementById("hide_notification").style.display="none"'>
                     <i class="material-icons">notifications</i>
                     <div id="hide_notification" style="background:red;width:10px;height:10px;border-radius:999px;position:relative;top:-20px;left:-10px;margin-top: -24px;margin-right: -10px !important;float:right"></div>
                  </a>
               </li>
               <li><a class="right waves-effect waves-light" onclick="showsearch();document.getElementById('search').focus();"><i class="material-icons">search</i></a></li>
            </ul>
         </div>
      </nav>
      <div id="modal2" class="modal modal-fixed-footer"> <div class="modal-content"> <h4>Heads Up!</h4> <p>Are you sure you want to delete your account???</p> </div> <div class="modal-footer"> <a href="#modal1" class="modal-close waves-effect waves-green btn-flat modal-trigger">Go back</a> <a class="waves-effect waves-light btn red modal-trigger" href="#modal5" class="red btn waves-effect waves-light">Delete My account</a> </div> </div> <div id="bmmodal" class="modal"><div class="modal-content"> <form action="https://smartlist.ga/scalesize/bm/addx.php" method="post" name="form1"> <table width="100%" border="0" class="table"> <tr style="display:none"> <td>Name</td> <td><input type="text" name="name" class="form-control" value="<?php echo date('m/d/Y') ;?>" readonly></td> </tr> <tr> <td>Price you spent</td> <td><input type="text" name="qty" class="form-control"></td> </tr> <tr class="d-none"> <td>Price</td> <td><input type="text" name="price" class="form-control" value="1"></td> </tr> <tr> <td></td> <td><input type="submit" name="Submit" value="Add" class="red btn"></td> </tr> </table> </form> </div> </div> </div> <div id="kitchenmodal" class="modal "> <div class="modal-content"> </div> </div> <div id="pair" class="modal modal-fixed-footer"> <div class="modal-content"> <h4>Heads Up!</h4> <p>Are you sure you want to pair your account? Pairing your account will you see everything in their inventory!</p> </div> <div class="modal-footer"> <a href="#modal1" class="modal-close waves-effect waves-green btn-flat modal-trigger">Go back</a> <a class="waves-effect waves-light btn red modal-trigger modal-close" href="#pair2" class="red btn waves-effect waves-light">Pair my account!</a> </div> </div><div id="pair2" class="modal modal-fixed-footer"> <div class="modal-content"> <h4>Pair your account</h4> <br> <form action="pair.php" method="GET"> <input type="text" name="pairingaccountid" placeholder="Login ID..."> <p>To pair, you will need to know the other person's login ID. You can find yours in the settings page</p> </div> <div class="modal-footer"> <button type="submit"class="btn btn-flat waves-effect">Change</button> </form> <a class="waves-effect waves-light btn btn-flat modal-trigger modal-close" href="#modal1" class="red btn waves-effect waves-light">Never mind</a> </div> </div> <div id="budgetmetermodala" class="modal modal-fixed-s  bottom-sheet"  style="width:100%"> <div class="modal-content" id="CTRLS_CTNT"> <h4 class="center">Add an item <span class="hide-on-med-and-down">(CTRL S)</span></h4> <div class="collection"> <a onclick="sm_page('addkitchen', this, '');setTimeout(function(){ document.getElementById('tags').focus() }, 0500);" class="modal-trigger collection-item waves-effect modal-close" id="kitchentoggle"><i class="material-icons left">kitchen</i>Kitchen</a> <a href="#" onclick="sm_page('bedroom_add', this, '');setTimeout(function(){ sm_page('bedroom_add', this, '');document.getElementById('bedroom_name_input').focus() }, 0500);" class="collection-item waves-effect"><i class="material-icons left">bed</i>Bedroom</a> <a href="#"onclick="sm_page('bathroom_add', this, '');setTimeout(function(){ sm_page('bathroom_add', this, '');document.getElementById('bathroom_name_input').focus() }, 0500);" class="collection-item waves-effect"><i class="material-icons left">wc</i>Bathroom</a> <a href="https://smartlist.ga/dashboard/rooms/garage/add.html" class="collection-item waves-effect"><i class="material-icons left">directions_car</i>Garage</a> <a href="https://smartlist.ga/dashboard/rooms/family/add.html" class="collection-item waves-effect"><i class="material-icons left">tv</i>Family</a> <a href="https://smartlist.ga/dashboard/rooms/storage/add.html" class="collection-item waves-effect"><i class="material-icons left">business</i>Storage Room</a> <a href="https://smartlist.ga/dashboard/rooms/dining_room/add.html" class="collection-item waves-effect"><i class="material-icons left">local_dining</i>Dining Room</a><a href="https://smartlist.ga/dashboard/rooms/camping/add.html" class="collection-item waves-effect"><i class="material-icons left">nature_people</i>Camping Supplies</a> <a href="https://smartlist.ga/dashboard/rooms/laundry/add.html" class="collection-item waves-effect"><i class="material-icons left">local_laundry_service</i>Laundry room</a>         <?php 
          try {
              $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
              $sql = "SELECT * FROM roomnames WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid'];
              $users = $dbh->query($sql);
              foreach ($users as $row) {
                  print "<a class=\"collection-item waves-effect modal-close\" href='https://smartlist.ga/dashboard/rooms/custom_room_add.php?room=".urlencode($row['id'])."'><i class=\"material-icons left\">".$row['qty']."</i>".$row["name"]."</a>";
              }
              $dbh = null;
          }
          catch (PDOexception $e) {
              echo "Error is: " . $e-> etmessage();
          }
        ?></div> </div> </div> <div id="modal5" class="modal"> <div class="modal-content"> <h4>Heads Up (again)!</h4> <p>Sure?</p> </div> <div class="modal-footer"> <a href="#!" class="modal-close waves-effect waves-green btn-flat">Go back</a> <a class="waves-effect waves-light btn red modal-trigger" href="#modal3" class="red btn waves-effect waves-light">Delete My account</a> </div> </div> <div id="modal3" class="modal modal-fixed-footer"> <div class="modal-content"> <h4>Are you very, very, very sure?</h4> <p>Don't blame us because we didn't warn you........</p> <ul style="list-style-type:circle !important;"> <li style="list-style-type:circle !important;">Your todos will vanish into thin air</li> <li style="list-style-type:circle !important;">Your inventory will vanish into thin air</li> <li style="list-style-type:circle !important;">Your rooms will vanish into thin air</li> <li style="list-style-type:circle !important;">Your homes will vanish into thin air</li> <li style="list-style-type:circle !important;">You will not be able to ever log in again with these credentials</li> <li style="list-style-type:circle !important;">You will not be able use the desktop or mobile app</li> </ul> </div> <div class="modal-footer"> <a href="#!" class="modal-close waves-effect waves-green btn-flat">That's scary. Never mind</a> <a href="https://smartlist.ga/dashboard/resources/deleted.php?id=<?php echo $_SESSION['id'] ?>" class="red btn waves-effect waves-light">I choose to permanently delete my account</a> </div> </div> <div id="security" class="modal modal-fixed-footer"> <div class="modal-content"> <h4>Privacy</h4> <p>Your data is encrypted end-to-end. We hash your items, so even if a hacker gets access to the database, it will be rendered useless! We also use PHP PDO, which is very secure to SQL injection attacks.</p> </div> <div class="modal-footer"> <a href="#modal1" class="modal-close waves-effect btn-flat modal-trigger">ok</a> </div> </div> <div id="avarar" class="modal modal-fixed-footer"> <div class="modal-content"> <a href="#user"><img class="materialboxed" alt='image' class="circle" src="<?php echo $_SESSION['avatar'] ?>" style="display:block;margin:auto;width:80px;"></a><br> <div class="row"> <div class="col s6 center"> <h4 class="center">Upload an image</h4> <a href="https://smartlist.ga/playground/imgbb.php" class="btn btn-large red center">Upload an image</a> </div> <div class="col s6"> <h4 class="center">Or paste an image URL</h4> <form action="./resources/avatar.php" method="GET"><input type="text" name="pairingaccountid" placeholder="Avatar (Image URL)"></form> </div> </div> </div> <div class="modal-footer"> <button type="submit"class="btn btn-flat waves-effect">Change</button> <a href="#modal1" class="modal-close waves-effect btn-flat modal-trigger">Cancel</a> </div> </div>
      <ul id="slide-out" class="sidenav sidenav-fixed">
         <li>
            <div class="user-view">
               <div class="background">
                  <img src="https://www.colorbook.io/imagecreator.php?hex=41308a&width=1920&height=1080&text=%201920x1080" id ="imageid" alt='Background'>
               </div>
               <a href="#user"><img class="circle materialboxed" src="<?php echo $_SESSION['avatar'] ?>" alt='image'></a>
               <span class="white-text name"><?php echo $_SESSION['name'] ?></span>
               <a href="#email"><span class="white-text email"><?php echo $_SESSION['email'] ?></span></a>
            </div>
         </li>
         <li><a class="waves-effect sidenav-close" href="#/home" onclick="sm_page('News', this, );brandlogotext.innerHTML = 'Smartlist';page_title = 'News';" id="defaultOpen"><i class="material-icons">home</i>Home   </a></li>
         <li style="height:0;opacity:0;width:0;"><a class="waves-effect"onclick="sm_page('loader', this, );" ><i class="material-icons">home</i>Home   </a></li>
         <li style="pointer-events:none">
            <div class="divider"></div>
         </li>
         <li style="pointer-events:none"><a class="subheader" style='pointer-events:none'>Rooms</a></li>
         <li><a onclick="sm_page('addkitchen', this, '');setTimeout(function(){ document.getElementById('tags').focus() }, 0500);"  style="float:right;padding-right:0;"  id="KITCHEN_ADD" class=" waves-effect"><i class="material-icons">add</i></a><a href="#/rooms/kitchen" class="waves-effect" onclick="sm_page('Contact', this, '');brandlogotext.innerHTML = 'Kitchen';"><i class="material-icons">kitchen</i>Kitchen</a></li>
         <li><a class="waves-effect sidenav-close" onclick="sm_page('Home', this, '');brandlogotext.innerHTML = 'Bedroom'"><i class="material-icons">bed</i>Bedroom</a></li>
         <li><a class="waves-effect sidenav-close" onclick="sm_page('bathroom', this, '');brandlogotext.innerHTML = 'Bathroom'"><i class="material-icons">wc</i>Bathroom</a></li>
         <li><a class="waves-effect sidenav-close" onclick="sm_page('About', this, '');brandlogotext.innerHTML = 'Garage'"><i class="material-icons">directions_car</i>Garage</a></li>
         <li><a class="waves-effect sidenav-close" onclick="sm_page('family', this, '');brandlogotext.innerHTML = 'Family Room'"><i class="material-icons">tv</i>Family Room</a></li>
         <li><a class="waves-effect sidenav-close" onclick="sm_page('storage', this, '');brandlogotext.innerHTML = 'Storage Room'"><i class="material-icons">domain</i>Storage room</a></li>
         <li><a class="waves-effect sidenav-close" onclick="sm_page('dining_room', this, '');brandlogotext.innerHTML = 'Dining Room'"><i class="material-icons">local_dining</i>Dining Room</a></li>
   
        <?php 
          try {
              $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
              $sql = "SELECT * FROM roomnames WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid'];
              $users = $dbh->query($sql);
              foreach ($users as $row) {
                  print "<li><a href='#' class=\"waves-effect sidenav-close\" onclick=\"load_croom('".str_replace('"', '', str_replace("'", "", $row['id']))."')\"><i class='material-icons'>".$row['qty']."</i>".$row["name"]."</a></li>";
              }
              $dbh = null;
          }
          catch (PDOexception $e) {
              echo "Error is: " . $e-> etmessage();
          }
        ?>      <li class="no-padding">
    <ul class="collapsible collapsible-accordion">
      <li>
        <div class="collapsible-header waves-effect" style="padding-left: 28px"><i class="material-icons">arrow_drop_down_circle</i><span style="margin-left: 15px;">More rooms</span></div>
        <div class="collapsible-body">
          <ul>
         <li><a class="waves-effect sidenav-close" onclick="sm_page('laundryroom', this, '');brandlogotext.innerHTML = 'Laundry Room'"><i class="material-icons">local_laundry_service</i>Laundry Room</a></li>
         <li><a class="waves-effect sidenav-close" onclick="sm_page('cs', this, '');brandlogotext.innerHTML = 'Camping Supplies'"><i class="material-icons">nature_people</i>Camping Supplies</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </li>
         <li>
            <div class="divider"></div>
         </li>
         <li><a class="subheader">Other</a></li>
         <li><a class="waves-effect sidenav-close" onclick="sm_page('gl', this, '');brandlogotext.innerHTML = 'Grocery List'"><i class="material-icons">local_grocery_store</i>Grocery list</a></li>
         <li><a class="waves-effect sidenav-close" onclick="sm_page('STARRED_ITEMS', this, '');brandlogotext.innerHTML = 'Starred';document.getElementById('STARRED_ITEMS').innerHTML = '<center><br><br><br><svg class=\'circular\' height=\'50\' width=\'50\'> <circle class=\'path\' cx=\'25\' cy=\'25\' r=\'20\' fill=\'none\' stroke-width=\'3\' stroke-miterlimit=\'10\' /> </svg><br></center>'; $('#STARRED_ITEMS').load('./rooms/starred-items.php')"><i class="material-icons">star</i>Starred</a></li>
         <li><a class="waves-effect sidenav-close" onclick="sm_page('todo_list', this, '');brandlogotext.innerHTML = 'Todo List'"><i class="material-icons">task</i>My todo list</a></li>
         <li><a class="waves-effect sidenav-close" onclick="sm_page('budgetmetermodal', this, '');brandlogotext.innerHTML = 'Budget Meter'"><i class="material-icons">attach_money</i>My budget meter</a></li>
         <li><a target="_blank" class="waves-effect sidenav-close" href="https://smartlist.ga/dashboard/event/"><i class="material-icons">event</i>Smartlist events <span style="float:right;background:teal;color:white;padding:5px;line-height: 10px !important;margin-top: 13px;">New!</span></span></a></li>
         <li><a target="_blank" class="waves-effect sidenav-close" href="https://smartlist.ga/dashboard/event/dash/event/add.php"><i class="material-icons">open_in_new</i>Create new event<span style="float:right;background:teal;color:white;padding:5px;line-height: 10px !important;margin-top: 13px;">New!</span></span></a></li>
         <li>
            <div class="divider">
            </div>
         </li>
         <li><a class="subheader">Profile</a></li>
         <li><a class="waves-effect " href="#modal1"onclick="sm_page('notification_popup', this, '');brandlogotext.innerHTML = 'Inbox'"><i class="material-icons">inbox</i>Notifications <span id="badge" class="badge"></span>
            </a>
         </li>
         <li><a class="waves-effect sidenav-close"onclick="sm_page('modal1', this, '');brandlogotext.innerHTML = 'Settings'"><i class="material-icons">settings</i>Settings</a></li>
         <li><a class="waves-effect" onclick="sm_page('modal1', this, '');brandlogotext.innerHTML = 'Settings'"><i class="material-icons">person</i>My Account</a></li>
         <li><a class="waves-effect" href="logout.php"><i class="material-icons">logout</i>Logout</a></li>
         <li>
            <div class="divider"></div>
         </li>
         <li><a class="subheader">Questions? </a></li>
         <li><a class="waves-effect  " rel="noreferrer" href="https://community.smartlist.ga/" target="_blank" ><i class="material-icons">forum</i>Community Forum <span class="badge">New!</span></a></li>
         <li><a class="waves-effect  "rel="noreferrer"  href="https://help.smartlist.ga/" target="_blank" ><i class="material-icons">book</i>Knowledge Base <span class="badge">New!</span></a></li>
      </ul>
      <div class="fixed-action-btn" id="fab1" style="z-index:9999999">
         <a class="btn-floating btn-large waves-effect waves-light" style="background:#212121;z-index:999999999999999999999999999999999999999999 !important;border-radius: 999999999px !important;transition:all .2s !important;box-shadow:0 4px 5px -2px rgba(0,0,0,.2),0 7px 10px 1px rgba(0,0,0,.14),0 2px 16px 1px rgba(0,0,0,.12)!important;display:none" id="editfab">
         <i class="large material-icons left" style="color:white !important">edit</i>
         </a>
     </div>
      <div class="fixed-action-btn" id="fab">
         <a class="btn-floating btn-large waves-effect waves-light FLOATING_ACTION_BUTTON" style="background:var(--navbar-color);z-index:99999999999999999999999999999999999999 !important;border-radius: 999999999px !important;transition:all .2s !important;box-shadow:0 4px 5px -2px rgba(0,0,0,.2),0 7px 10px 1px rgba(0,0,0,.14),0 2px 16px 1px rgba(0,0,0,.12)!important;" id="FLOATING_ACTION_BUTTON">
         <i class="large material-icons left" style="color:white !important">add</i>
         </a>
         <ul>
            <li data-position="left" data-tooltip="Task" class="tooltipped" style="transition-duration: .2s !important"><a class="btn-floating pink waves-effect" href="https://smartlist.ga/dashboard/rooms/todo/add.html"style="box-shadow:0 4px 5px -2px rgba(0,0,0,.2),0 7px 10px 1px rgba(0,0,0,.14),0 2px 16px 1px rgba(0,0,0,.12)!important;transition-duration: .2s !important"><i class="material-icons" style="color:white !important">check</i></a></li>
            <li data-position="left" data-tooltip="Item" class="tooltipped" style="transition-duration: .2s !important"><a class="btn-floating pink modal-trigger waves-effect" href="#budgetmetermodala"style="box-shadow:0 4px 5px -2px rgba(0,0,0,.2),0 7px 10px 1px rgba(0,0,0,.14),0 2px 16px 1px rgba(0,0,0,.12)!important;transition-duration: .2s !important"><i class="material-icons" style="color:white !important" onclick="//document.querySelector('#itemdialog').showModal()">category</i></a></li>
            <li data-position="left" data-tooltip="Grocery List" class="tooltipped " style="transition-duration: .2s !important"> <a href="https://smartlist.ga/dashboard/rooms/grocerylist/add.html" style="box-shadow:0 4px 5px -2px rgba(0,0,0,.2),0 7px 10px 1px rgba(0,0,0,.14),0 2px 16px 1px rgba(0,0,0,.12)!important;transition-duration: .2s !important"class="text-center float-right btn-floating pink waves-effect" ><i class="material-icons" style="color:white !important">add_shopping_cart</i></a></li>
         </ul>
      </div>
      <div class="hide" id="rmenu" style="width: 20vw">
  <a href="#"onclick='window.history.back();' class="waves-effect">Back</a>
  <a href="#"onclick='window.history.forward();' class="waves-effect">Forward</a>
  <a href="#"onclick='location.reload()' class="waves-effect">Reload</a>
  <hr>
  <a href="#"onclick='document.execCommand("copy");M.toast({html: "Copied!"})' class="waves-effect">Copy</a>
  <a href="#"onclick='document.execCommand("paste");' class="waves-effect">Paste</a>
  <hr>
    <a href="#"onclick='window.print();' class="waves-effect">Print</a>
</div>
      <!--CONTENT BEGINS-->
      <div id="CONTENT" tabindex="0" style="outline:0;">
      <div id="div1"></div>
      <div class="loader" class="tabcontent">
         <div style="width:100%;height:63vh;background: rgba(200,200,200,0.3);margin-bottom:18px" class="demoa"></div>
         <div class="row">
            <div class="col s6 onup100">
               <div style="width:100%;height:150px;background: rgba(200,200,200,0.3);margin-bottom:18px" class="demoa"></div>
               <div style="width:100%;height:150px;background: rgba(200,200,200,0.3);margin-bottom:10px" class="demoa"></div>
            </div>
            <div class="col s6 hide-on-small-only">
               <div style="width:100%;height:100px;background: rgba(200,200,200,0.3);margin-bottom:18px" class="demoa"></div>
               <div style="width:100%;height:100px;background: rgba(200,200,200,0.3);margin-bottom:18px" class="demoa"></div>
               <div style="width:100%;height:100px;background: rgba(200,200,200,0.3);margin-bottom:10px" class="demoa"></div>
            </div>
         </div>
         <div id='custom_room' class='tabcontent'></div>
         <div id="STARRED_ITEMS" class="tabcontent"></div>
         <div id="laundryroom" class="tabcontent">
            <div class="container">
               <?php 
                  try {
                      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                      $sql = "SELECT * FROM laundry WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid'];
                      $users = $dbh->query($sql);
                      $lr_count = $users->rowCount();
                      if($lr_count > 0) {
                      echo '<table class="table">
                                <tr>
                                 <td>Name</td>
                                 <td>Quantity</td>
                                 <td class="d-none">Price</td>
                                </tr>';
                      foreach ($users as $row) {
                          echo "<tr id='laundryroomtr_".$row['id']."' onclick=\"item('".$row['id']."', '".$row['name']."', '".$row['qty']."', '".$row['price']."', 'https://smartlist.ga/dashboard/rooms/laundry/', 'laundryroom', '".$row['star']."')";
                          if($row['star'] == 1) {
                              echo "\" style='border-left: 3px solid #f57f17'>";
                          }
                          else {echo "\">";}
                          print "<td>".$row["name"] . "</td><td>" . $row["qty"] ."";
                          if ($row['login_id'] != $_SESSION['id']) {
                                   echo "<span clas='badge red' style='float:right;color:white;padding: 4px;border-radius: 2px;background: #00695c !Important'>SYNCED</span>";
                          }
                          echo "</td>";
                        /*  echo "<td> <div class=\"dropdown\" tabindex='0'>
                                 <a class=\"dropbtn\"><i class='material-icons'>more_vert</i></a>
                                 <div class=\"dropdown-contenta\">
                                 <a href=\"https://smartlist.ga/dashboard/rooms/bedroom/edit.php?id=$row[id]\" class='waves-effect'><i class='material-icons'>edit</i>Edit</a>
                                 <a onclick='$(\"#div1\").load(\"https://smartlist.ga/dashboard/rooms/bedroom/delete.php?id=$row[id]\");this.parentElement.parentElement.parentElement.parentElement.style.display=\"none\";' class='waves-effect'><i class='material-icons'>delete</i>Delete</a><a href='https://smartlist.ga/dashboard/rooms/share/?name=".$row['name']."&personname=".$_SESSION['name']."&itemqty=".$row['qty']."&room=kitchen&id=".$row['id']."&new=true' class='waves-effect'><i class='material-icons'>share</i>Share</a>
                                 </div>
                                 </div></td>
                                 ";*/
                      }
                      $dbh = null;
                  }
                      else {
                     echo "<img alt='image' src='https://i.ibb.co/KX0bKPk/gummy-coffee.png'width='300px' style='display:block;margin:auto;'><br><p class='center'>No items here! Why not try adding something...</p>";
                     }
                  }
                  catch (PDOexception $e) {
                      echo "Error is: " . $e-> etmessage();
                  }
                  ?>
               </table>
            </div>
         </div>
         <div id="budgetmetermodal" class="tabcontent">
            <div class='container'>
               <a href="#bmmodal" class="btn modal-close waves-effect waves-light right green modal-trigger">Add a point</a>
               <h4>My budget meter</h4>
               <table class="table table-striped " id="myTable">
<?php try { $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); $sql = "SELECT * FROM bm WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid']; $users = $dbh->query($sql); echo '<table class="table"> <tr> <td>Name</td> <td>Quantity</td> <td class="d-none">Price</td> <td style="width:10%">Actions</td> </tr>'; foreach ($users as $row) { echo "<tr>"; print "<td>".$row["name"] . "</td><td>" . $row["qty"] .""; if ($row['login_id'] != $_SESSION['id']) { echo "<span clas='badge red' style='float:right;color:white;padding: 4px;border-radius: 2px;background: #00695c !Important'>SYNCED</span>"; } echo "</td><td>"; echo " <div class=\"dropdown\" tabindex='0'> <a class=\"dropbtn\"><i class='material-icons'>more_vert</i></a> <div class=\"dropdown-contenta\"> <a href=\"https://smartlist.ga/dashboard/rooms/bedroom/edit.php?id=$row[id]\" class='waves-effect'><i class='material-icons'>edit</i>Edit</a> <a onclick='$(\"#div1\").load(\"https://smartlist.ga/scalesize/bm/delete.php?id=$row[id]\");this.parentElement.parentElement.parentElement.parentElement.style.display=\"none\";' class='waves-effect'><i class='material-icons'>delete</i>Delete</a> </div> </div></td> "; } $dbh = null; } catch (PDOexception $e) { echo "Error is: " . $e-> etmessage(); } ?>
               </table><br><br><br>
               <form action="https://smartlist.ga/dashboard/resources/goal/action.php" style="background: #efefef;padding: 10px;">
                  <div class="row">
                     <div class="col s9">
                        <h5>Set a goal. </h5>
                        <p class="range-field">
                           <input class="quantity" min="0" name="goal" placeholder="Type a number..." type="range" value="<?php echo $goal;?>">
                        </p>
                        <p>Your goal will appear on the graph as a red line. Try not to spend more than this goal!</p>
                     </div>
                     <div class="col s3"><br><br>
                        <button type="submit" class="btn blue right" onclick="var dis=this;setTimeout(function(){dis.disabled=true;},10);return true;">Set goal</button>
                     </div>
                  </div>
               </form>
               </table>
            </div>
         </div>
         <div id="bedroom_add" class="tabcontent"> 
         <div class="container">
              <form onsubmit="return false" method="GET" name="form1"> 
              <h6>Add an item (Bedroom)</h6> 
              <div class="row"> 
              <div class="col s12 input-field ">
                   <label onclick="this.nextSibling.focus()">Item Name</label>
                   <input type="text" name="name" autocomplete="off" class="form-control" id="bedroom_name_input" value="<?php echo $_GET['item']; ?>"> 
                   </div>
                            <div class="col s12"> 
                            <div class="input-field"> 
                            <label>Quantity</label>
                            <input type="text" name="qty"  id="bedroom_qty_input" class="form-control" value="1" autocompletae="off"> 
                            </div>
                            </div>
                            </div>
                            <button type="submit" name="Submit" value="Add" class="btn green waves-effect waves-light btn-large" onclick="add_bedroom()">Add</button> </form> </div> </div>
         <div id="bathroom_add" class="tabcontent"> 
         <div class="container">
              <form onsubmit="return false" method="GET" name="form1"> 
              <h6>Add an item (Bathroom)</h6> 
              <div class="row"> 
              <div class="col s12 input-field ">
                   <label onclick="this.nextSibling.focus()">Item Name</label>
                   <input type="text" name="name" autocomplete="off" class="form-control" id="bathroom_name_input" value="<?php echo $_GET['item']; ?>" > 
                   </div>
                            <div class="col s12"> 
                            <div class="input-field"> 
                            <label>Quantity</label>
                            <input type="text" name="qty"  id="bathroom_qty_input" class="form-control" value="1" autocompletae="off"> 
                            </div>
                            </div>
                            </div>
                            <button type="submit" name="Submit" value="Add" class="btn green waves-effect waves-light btn-large" onclick="add_bathroom()">Add</button> </form> </div> </div>
<div id="addkitchen" class="tabcontent"> <div class="container"> <form onsubmit="return false" method="GET" name="form1"> <h6>Add an item (Kitchen)</h6> <div class="row"> <div class="col s9 input-field "> <label onclick="this.nextSibling.focus()">Item Name</label><input type="text" name="name" autocomplete="off" class="form-control autocomplete" id="tags" value="<?php echo $_GET['item']; ?>" class="autocomplete"> </div> <div class="col s1"> <a href="https://smartlist.ga/dashboard/upload/upload.php"class="btn btn-flat waves-effect btn-large" style='position: relative;bottom: -10px;'><i class="material-icons">camera_alt</i></a> </div> <div class="col s12"> <div class="input-field"> <label>Quantity</label> <input type="text" name="qty"  id="qty" class="form-control" value="1" autocompletae="off"> </div> </div> <div class="col s12"> <div class="input-field"> <select name="price" id="date" > <option value="Pots and Pans">Pots/Pans</option> <option value="Fruits, Veggies, etc."selected>Fruits, Veggies, etc.</option> <option value="Cutlery">Cutlery</option> <option value="Bottles and Cups">Bottles and Cups</option> <option value="Bowls and Plates">Bowls and Plates</option> </select> <label>Tag</label> </div> </div> </div> <button type="submit" name="Submit" value="Add" class="btn green waves-effect waves-light btn-large" onclick="add()">Add</button> </form> </div> </div>
         <div id="cs" class="tabcontent">
            <div class="container">
               <?php 
                  try {
                      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                      $sql = "SELECT * FROM camping WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid'];
                      $users = $dbh->query($sql);
                      echo '<table class="table">
                                <tr>
                                 <td>Name</td>
                                 <td>Quantity</td>
                                 <td class="d-none">Price</td>
                                </tr>';
                      foreach ($users as $row) {
                          echo "<tr id='campingtr_".$row['id']."' onclick=\"item('".$row['id']."', '".$row['name']."', '".$row['qty']."', '".$row['price']."', 'https://smartlist.ga/dashboard/rooms/camping/', 'camping', '".$row['star']."')";
                          if($row['star'] == 1) {
                              echo "\" style='border-left: 3px solid #f57f17'>";
                          }
                          else {echo "\">";}
                          print "<td>".$row["name"] . "</td><td>" . $row["qty"] ."";
                          if ($row['login_id'] != $_SESSION['id']) {
                                   echo "<span clas='badge red' style='float:right;color:white;padding: 4px;border-radius: 2px;background: #00695c !Important'>SYNCED</span>";
                          }
                          echo "</td>";
                         /* echo "<td> <div class=\"dropdown\" tabindex='0'>
                                 <a class=\"dropbtn\"><i class='material-icons'>more_vert</i></a>
                                 <div class=\"dropdown-contenta\">
                                 <a href=\"https://smartlist.ga/dashboard/rooms/bedroom/edit.php?id=$row[id]\" class='waves-effect'><i class='material-icons'>edit</i>Edit</a>
                                 <a onclick='$(\"#div1\").load(\"https://smartlist.ga/dashboard/rooms/bedroom/delete.php?id=$row[id]\");this.parentElement.parentElement.parentElement.parentElement.style.display=\"none\";' class='waves-effect'><i class='material-icons'>delete</i>Delete</a><a href='https://smartlist.ga/dashboard/rooms/share/?name=".$row['name']."&personname=".$_SESSION['name']."&itemqty=".$row['qty']."&room=kitchen&id=".$row['id']."&new=true' class='waves-effect'><i class='material-icons'>share</i>Share</a>
                                 </div>
                                 </div></td>
                                 ";*/
                      }
                      $dbh = null;
                  }
                  catch (PDOexception $e) {
                      echo "Error is: " . $e-> etmessage();
                  }
                  ?>
               </table>
            </div>
         </div>
         <div id="Home" class="tabcontent"> 
            <div class="container">
               <?php 
                  try {
                      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                      $sql = "SELECT * FROM bedroom WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid'];
                      $users = $dbh->query($sql);
                      $bedroom_row_count = $users->rowCount();
                      if($bedroom_row_count > 0) {
                      echo '<table class="table" id="bedroom_table">
                                <tr>
                                 <td>Name</td>
                                 <td>Quantity</td>
                                 <td class="d-none">Price</td>
                                 
                                </tr>';
                      foreach ($users as $row) {
                          echo "<tr id='bedroomtr_".$row['id']."' onclick=\"item('".$row['id']."', '".$row['name']."', '".$row['qty']."', '".$row['price']."', 'https://smartlist.ga/dashboard/rooms/bedroom/', 'bedroom', '".$row['star']."')";
                          if($row['star'] == 1) {
                          echo "\" style='border-left: 3px solid #f57f17'>";
                          }
                          else {
                              echo "\">";
                          }
                          print "<td>".$row["name"] . "</td><td>" . $row["qty"] ."";
                          if ($row['login_id'] != $_SESSION['id']) {
                                   echo "<span clas='badge red' style='float:right;color:white;padding: 4px;border-radius: 2px;background: #00695c !Important'>SYNCED</span>";
                          }
                          echo "</td></tr>";
                         /* echo " <td><div class=\"dropdown\" tabindex='0'>
                                 <a class=\"dropbtn\"><i class='material-icons'>more_vert</i></a>
                                 <div class=\"dropdown-contenta\">
                                 <a href=\"https://smartlist.ga/dashboard/rooms/bedroom/edit.php?id=$row[id]\" class='waves-effect'><i class='material-icons'>edit</i>Edit</a>
                                 <a onclick='$(\"#div1\").load(\"https://smartlist.ga/dashboard/rooms/bedroom/delete.php?id=$row[id]\");this.parentElement.parentElement.parentElement.parentElement.style.display=\"none\";' class='waves-effect'><i class='material-icons'>delete</i>Delete</a><a href='https://smartlist.ga/dashboard/rooms/share/?name=".$row['name']."&personname=".$_SESSION['name']."&itemqty=".$row['qty']."&room=kitchen&id=".$row['id']."&new=true' class='waves-effect'><i class='material-icons'>share</i>Share</a>
                                 </div>
                                 </div></td>
                                 ";*/
                      }
                      $dbh = null;}
                     else {
                     echo "<img alt='image' src='https://i.ibb.co/KX0bKPk/gummy-coffee.png'width='300px' style='display:block;margin:auto;'><br><p class='center'>No items here! Why not try adding something...</p>";
                     }
                  }
                  catch (PDOexception $e) {
                      echo "Error is: " . $e-> etmessage();
                  }
                  ?>
               </table>
            </div>
         </div>
         <div id="modal1" class="tabcontent" style="min-height:80%;min-width:90%">
            <div class="container">
               <div class="smediapadding">
                  <a href="#user"><img alt='image' class="materialboxed" class="circle" src="<?php echo $_SESSION['avatar'] ?>" style="float:right;width:80px;border-radius:9999px"></a>
                  <h4 style="color: var(--font-color)"><?php echo $_SESSION['name'] ?></h4>
                  <p>Email: <?php echo $_SESSION['email'] ?></p>
                  <p>Your login ID: <?php echo $_SESSION['id'] ?></p>
               </div>
               <form action="darken.php" method="GET">
                  <div class="collection">
                     <script>
                        window.onload = function() {
                                var elems  = document.querySelectorAll("input[type=range]");
                                M.Range.init(elems);
                        };
                     </script>
                  </div>
                  <ul class="collapsible">
                     <li>
                        <div class="collapsible-header waves-effect"><i class="material-icons">filter_drama</i>Preferences</div>
                        <div class="collapsible-body">
                           <ul class="collection">
                              <a class="collection-item">
                                 Dark mode
                                 <div class="switch" style="float:right">
                                    <label>
                                    <input type="checkbox" name="pairingaccountid" value="dark" id="darkmode">
                                    <span class="lever"></span>
                                    </label>
                                 </div>
                              </a>
                              <a class="waves-effect collection-item modal-trigger  modal-close" href="#avarar" >Change my avatar</a>
                           </ul>
                        </div>
                     </li>
                     <li>
                        <div class="collapsible-header waves-effect"><i class="material-icons">verified_user</i>Privacy</div>
                        <div class="collapsible-body">
                           <ul class="collection">
                              <a class="collection-item">
                                 Send stats to us for development purposes
                                 <div class="switch" style="float:right">
                                    <label>
                                    <input type="checkbox" name="notificationssettings" value="on">
                                    <span class="lever"></span>
                                    </label>
                                 </div>
                              </a>
                              <a class="waves-effect collection-item modal-trigger  modal-close" href="#security" >Privacy</a>
                              <a class="waves-effect collection-item modal-trigger  modal-close" href="#pair" onclick="syncalertplayAudio();">Pair my account</a>
                              <a href="https://smartlist.ga/dashboard/resources/reset-password.php" class="waves-effect collection-item modal-trigger  modal-close">Change your Password</a>
                           </ul>
                        </div>
                     </li>
                     <li>
                        <div class="collapsible-header waves-effect"><i class="material-icons">help</i>Help</div>
                        <div class="collapsible-body">
                           <ul class="collection">
                              <a onclick="$('.tap-target').tapTarget('open')" class="modal-close collection-item waves-effect"> How do I add an item </a>
                              <a class="collection-item" href="https://smartlist.ga/forum/index.php">Forum</a>
                              <a class="collection-item" href="https://smartlist.ga/blog/index.php">Blog</a>
                           </ul>
                        </div>
                     </li>
                     <li>
                        <div class="collapsible-header waves-effect"><i class="material-icons">reorder</i>Manage and delete Custom rooms</div>
                        <div class="collapsible-body">
                            <a href="https://smartlist.ga/dashboard/rooms/add_room.php" class="btn purple"><i class="material-icons left">add</i>Create room</a>
                           <ul class="collection">
                                 <?php 
                                  try {
                                      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                      $sql = "SELECT * FROM roomnames WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid'];
                                      $users = $dbh->query($sql);
                                      foreach ($users as $row) {
                                          print "<li href='#' class=\"waves-effect sidenav-close collection-item\" style='width:100%;'><i class='material-icons left'>".$row['qty']."</i>".$row["name"]." <a class='secondary-content'class=\"waves-effect\" href='https://smartlist.ga/dashboard/rooms/custom_room_delete.php?id=".$row['id']."&name=".urlencode($row['name'])."'><i class='material-icons'>delete</i></a></li>";
                                      }
                                      $dbh = null;
                                  }
                                  catch (PDOexception $e) {
                                      echo "Error is: " . $e-> etmessage();
                                  }
                                ?>
                           </ul>
                        </div>
                     </li>
                     <li>
                        <div class="collapsible-header waves-effect"><i class="material-icons">notifications</i>Notifications</div>
                        <div class="collapsible-body">
                           <ul class="collection">
                              <button onclick="notifyMe();desktop_ping('Success! Notifications are enabled!', 'Smartlist Notificatons')"class="btn red hide-on-small-only" type="button">Test Notifications!</button>
                              <a class="collection-item hide-on-small-only">
                                 Notifications
                                 <div class="switch" style="float:right">
                                    <label>
                                    <input type="checkbox" name="notificationssettings" value="on" <?php if ($notifications != "on") {  } else{echo "checked";}?>>
                                    <span class="lever"></span>
                                    </label>
                                 </div>
                              </a>
                              <a class="collection-item">
                                 <div class="row">
                                    <div class="col s12">
                                       Only remind me when I have anything less than <u><?php echo "$number_notify" ?> items</u>
                                    </div>
                                    <div class="col s12">
                                       <div class="range-field" style="width:100%;float:right; margin-top:-10px;background:transparent;max-height:20px;">
                                          <input type="range" min="0" max="100" step="1" oninput="showVal(this.value)" onchange="showVal(this.value)" name="number_notify" value="<?=$number_notify?>">
                                       </div>
                                    </div>
                                 </div>
                              </a>
                           </ul>
                        </div>
                     </li>
                     <li>
                        <div class="collapsible-header waves-effect"><i class="material-icons">keyboard</i>Keyboard Shortcuts</div>
                        <div class="collapsible-body">
                           <h4 style="color: var(--font-color)">Keyboard Shortcuts</h4>
                           <p>CTRL F - Focus on search bar</p>
                           <p>CTRL / or /- Focus on search bar</p>
                           <p>CTRL B - View budget Meter</p>
                           <p>CTRL S - Add item</p>
                           <p>CTRL E - Open settings</p>
                        </div>
                     </li>
                     <li>
                        <div class="collapsible-header waves-effect"><i class="material-icons">code</i>Developer</div>
                        <div class="collapsible-body">
                            <a href="https://smartlist.ga/contribute/">Contributor &amp; Developer Dashboard</a>
                           <p>The API is a powerful feature by smartlist. To use this, go to <a href="https://smartlist.ga/contribute/">https://smartlist.ga/contribute/</a>, log in using your smartlist account, and then click on the code icon. Then, create and API key, and follow the directions</p>
                        </div>
                     </li>
                     <li>
                        <div class="collapsible-header waves-effect"><i class="material-icons">sync</i>Sync your account </div>
                        <div class="collapsible-body">
                           <ul class="collection">
                              <a class="waves-effect collection-item modal-trigger  modal-close" href="#pair" onclick="syncalertplayAudio();">Pair my account</a>
                           </ul>
                        </div>
                     </li>
                     <li>
                        <div class="collapsible-header waves-effect"><i class="material-icons">get_app</i>Download the App! </div>
                        <div class="collapsible-body">
                           <button class="add-button btn red waves-effect" type="button">Add to home screen</button>
                           <p><a href="#">Desktop App</a></p>
                           <p><a href="#">Phone App</a></p>
                        </div>
                     </li>
                     <li>
                        <div class="collapsible-header waves-effect"><i class="material-icons">warning</i>Delete my account</div>
                        <div class="collapsible-body">
                           <ul class="collection">
                              <p style="color:red">Please note that this is an irreversible action</p>
                              <a class="waves-effect collection-item modal-trigger modal-close" href="#modal2">Delete My Account</a>
                           </ul>
                        </div>
                     </li>
                  </ul>
                  <button type="submit" class="btn green waves-effect btn-large waves-light">Save (Requires login)</button><br><br>
            </div>
            </form>
         </div>
         <div id="News" class="tabcontent" style=" background:var(--bg-color);color:  background:var(--font-color)">
            <div style="width: 100%;height:400px !important;background:var(--chart-color) !important;<?php if($row_count == 0){ echo "background: #eee !important;";} ?>">
               <?php if($row_count == 0){ echo "<br><br><br><br><br><br><br><br><h6 class='center' style='margin: 0;color: gray'>No data in budget meter to display<br><a href='https://help.smartlist.ga/#/no-data-in-budget-meter-to-display' style='color: #aaa' class='center'>More Info</a></h6>";} ?><?php if($row_count > 0){?>   <canvas id="overlay" width="200" height="100%" style="position:absolute;pointer-events:none;"></canvas>
               <canvas id="myChart" style="width: 100%;height:200px !important;background: background:var(--chart-color) !important;" class="ree"></canvas>
               <?php }?>
            </div>
  <ul id='dropdown1' class='dropdown-content'>
    <li><a href="#!">one</a></li>
    <li><a href="#!">two</a></li>
  </ul>
        
            <div class="row" style="margin:0 !important">
               <div class="col s6 hide-on-small-only" style="margin:0 !important">
                  <p class='center'>Todo </p>
                  <?php
                     try {
                         $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                         $stmt = $dbh->query('SELECT * FROM todo WHERE login_id='.$_SESSION['id']);
                         $todo_row_count = $stmt->rowCount();
                         $dbh = null;
                     }
                     catch (PDOexception $e) {echo "Error is: " . $e-> etmessage();}
                     if($todo_row_count > 0){
                     try {
                         $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                         $sql = "SELECT * FROM todo WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid'];
                         $users = $dbh->query($sql);
                         foreach ($users as $todo_listx) {
                            echo "<div class='card'>
                                 <div class='card-content'>
                                 <span class='card-title activator'>".$todo_listx['name']."
                                 <span style='float:right' class='badge'>Due on ".$todo_listx['price']."</span></span>
                                 <span>Priority: ".$todo_listx['qty']."</span><br> 
                                 </div>
                                 <div class=\"card-reveal\" style='z-index:1;overflow:scroll !important'>
                                 <span class=\"card-title grey-text text-darken-4\">Description<i class=\"material-icons right\">close</i></span>
                                 <span>Description: ".$todo_listx['descs']."</span>
                                 </div>
                                 <div class='card-action' style='z-index: 0 !important;'>
                                 <a href=\"https://smartlist.ga/dashboard/rooms/todo/edit.php?id=$todo_listx[id]\" class='btn btn-flat tooltipped waves-effect 'style='z-index: 0 !important;margin:0 !important' data-tooltip='Edit'>
                                 <i class='material-icons'>edit</i>
                                 </a> <a onclick='var e=this;$(\"#div1\").load(\"https://smartlist.ga/dashboard/rooms/todo/delete.php?id=$todo_listx[id]\");e.parentElement.parentElement.style.opacity=\".5\";M.toast({html: \"Task complete! <br> Good job!\"});task_complete();e.parentElement.style.display=\"none\"'  class='btn btn-flat waves-effect tooltipped'style='z-index: 0 !important;margin:0 !important' data-tooltip='Delete'>
                                 <i class='material-icons'>delete</i>
                                 </a>
                                 </div>";
                             echo "";
                             echo "</div>";
                         }
                         $dbh = null;
                     }
                     catch (PDOexception $e) {
                         echo "Error is: " . $e-> etmessage();
                     }
                     }
                     else {
                     echo "<img alt='image' src='https://i.ibb.co/KX0bKPk/gummy-coffee.png'width='300px' style='display:block;margin:auto;'><br><p class='center'>Great job - you finished all tasks! Why not take this time to drink some coffee or go for a walk?</p>";
                     }
                                          ?>
               </div>
               <div class="col s6 hide-on-small-only ">
                  <style>.search {width: 50%}
                     input {color: var(--font-color)}
                     ::placeholder {color: var(--font-color)}
                     .new:after{display:none}.card{transition: all .2s;background:rgba(255,255,255,.1)!important}.card-reveal{background:var(--bg-color)!important}.demo{margin:auto;width:100%;height:600px;position:relative;left:-50px;margin-top:20px;background-image:radial-gradient(circle 0 at 0 0,#fff 99%,transparent 0),linear-gradient(100deg,transparent,var(--bg-color) 50%,transparent 100%),linear-gradient(var(--skeleton-color) 20px,transparent 0),linear-gradient(var(--skeleton-color) 20px,transparent 0);background-repeat:repeat-y;background-size:90px 90px,100px 90px,150px 90px,100% 90px,500px 90px,100% 90px;background-position:0 0,0 0,120px 0,120px 40px,120px 80px,120px 120px;animation:shine 2s infinite}@keyframes shine{to{background-position:0 0,150% 0,120px 0,120px 40px,120px 80px,120px 120px}}
                  </style>
                  <p class='center'>Grocery list</p>
                  <?php
                     try {
                         $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                         $stmt = $dbh->query('SELECT * FROM grocerylist WHERE login_id='.$_SESSION['id']);
                         $gl_row_count = $stmt->rowCount();
                         //echo $gl_row_count;
                         $dbh = null;
                     }
                     catch (PDOexception $e) {
                         echo "Error is: " . $e-> etmessage();
                     }
                     if($gl_row_count > 0){
                     try {
                         $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                         $sql = "SELECT * FROM grocerylist WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid'];
                         $users = $dbh->query($sql);
                         foreach ($users as $res) {
                            echo "<div class='card'>
                                             <div class='card-content'>
                                             <div style='float:right'>
                                             <a href=\"https://smartlist.ga/dashboard/rooms/grocerylist/edit.php?id=$res[id]\" class='btn btn-flat waves-effect tooltipped'style='z-index: 0 !important;margin:0 !important' data-tooltip='Edit'>
                                             <i class='material-icons'>edit</i>
                                             </a> <a onclick='var e=this;$(\"#div1\").load(\"https://smartlist.ga/dashboard/rooms/grocerylist/delete.php?id=$res[id]\");this.parentElement.parentElement.style.display=\"none\";M.toast({html: \"Deleted\"});task_complete();' data-tooltip='Delete'  class='tooltipped btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                                             <i class='material-icons'>delete</i>
                                             </a>
                                             </div><span class='card-title'>".$res['name']."
                                             </span>
                                             <span>Quantity: ".$res['qty']."</span><br> 
                                             </div>";
                                             echo "";
                                             echo "</div>";
                         }
                         $dbh = null;
                     }
                     catch (PDOexception $e) {
                         echo "Error is: " . $e-> etmessage();
                     }
                     }
                     else {
                     echo "<img alt='image' src='https://images.vexels.com/media/users/3/192486/isolated/preview/b21f813da2e0c122d2950bf1b449106a-winter-woman-shopping-illustration-by-vexels.png'width='300px' style='display:block;margin:auto;'><br><p class='center'>Nothing in your grocery list.... Good Job! </p>";
                     }
                                             ?>
               </div>
            </div>
            <div class="s6 hide-on-med-and-up">
               <!--<div class="col s12" style="margin:0 !important">
                  <ul class="tabs tabs-fixed-width" style="margin:0 !important">
                     <li class="tab col s3 active"><a href="#test1" class="active">Todo</a></li>
                     <li class="tab col s3"><a href="#test4">Grocery List</a></li>
                  </ul>
               </div>-->
               <div id="test1" class="col s12" >
                  <div style="padding: 30px;padding-bottom:0;">
                     <div class="dd">
                        <img alt='image' src='https://i.ibb.co/KX0bKPk/gummy-coffee.png'width='300px' style='display:block;margin:auto;'><br>
                        <p class='center'>Great job - you finished all tasks! Why not take this time to drink some coffee or go for a walk?</p>
                     </div>
                     <?php
                        try {
                            $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $stmt = $dbh->query('SELECT * FROM todo WHERE login_id='.$_SESSION['id']);
                            $todo_row_count = $stmt->rowCount();
                            //echo $todo_row_count;
                            $dbh = null;
                        }
                        catch (PDOexception $e) {echo "Error is: " . $e-> etmessage();}
                        if($todo_row_count > 0){
                        try {
                            $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $sql = "SELECT * FROM todo WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid'];
                            $users = $dbh->query($sql);
                            echo "<div class='card'><div class='card-content'><h5 style='margin-top:0'>Todo</h5>";
                            foreach ($users as $todo_listx) {
                               echo '<p><label><input type="checkbox" onchange=\'$("#div1").load("https://smartlist.ga/dashboard/rooms/todo/delete.php?id='.$todo_listx['id'].'");this.disabled=true;this.nextElementSibling.style.color = "gray";task_complete();\'/><span><b>'.$todo_listx['name'].'</b><br>Priority: '.$todo_listx['qty'].'<br>Due on: '.$todo_listx['price'].'</span></label></p>';
                            }
                            echo "</div></div>";
                            $dbh = null;
                        }
                        catch (PDOexception $e) {
                            echo "Error is: " . $e-> etmessage();
                        }
                        }
                        else {
                        echo "<div class='card'><div class='card-content'><h5 style='margin-top:0'>Todo</h5><img alt='image' src='https://i.ibb.co/KX0bKPk/gummy-coffee.png'width='300px' style='display:block;margin:auto;'><br><p class='center'>Great job - you finished all tasks! Why not take this time to drink some coffee or go for a walk?</p></div></div>";
                        }
                                                ?>
                  </div>
               </div>
               <div id="test4" class="col s12" style="padding: 30px;padding-top:0;">
                  <?php
                     try {
                         $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                         $stmt = $dbh->query('SELECT * FROM grocerylist WHERE login_id='.$_SESSION['id']);
                         $gl_row_count = $stmt->rowCount();
                         //echo $gl_row_count;
                         $dbh = null;
                     }
                     catch (PDOexception $e) {
                         echo "Error is: " . $e-> etmessage();
                     }
                     if($gl_row_count > 0){
                     try {
                         $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                         $sql = "SELECT * FROM grocerylist WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid'];
                         $users = $dbh->query($sql);
                        echo "<div class='card'><div class='card-content'><h5 style='margin-top:0'>Grocery List</h5>";
                        foreach ($users as $todo_listx) {
                           echo '<p><label><input type="checkbox" onchange=\'$("#div1").load("https://smartlist.ga/dashboard/rooms/grocerylist/delete.php?id='.$todo_listx['id'].'");this.disabled=true;this.nextElementSibling.style.color = "gray";task_complete();\'/><span><b>'.$todo_listx['name'].'</b><br>Quantity: '.$todo_listx['qty'].'</span></label></p>';
                        }
                        echo "</div></div>";
                     }
                     catch (PDOexception $e) {
                         echo "Error is: " . $e-> etmessage();
                     }
                 }
                     else {
                     echo "<div class='card'><div class='card-content'><h5 style='margin-top:0'>Grocery List</h5><img alt='image' src='https://images.vexels.com/media/users/3/192486/isolated/preview/b21f813da2e0c122d2950bf1b449106a-winter-woman-shopping-illustration-by-vexels.png'width='300px' style='display:block;margin:auto;'><br><p class='center'>Nothing in your grocery list.... Good Job! </p></div></div>";
                     }
                                             ?>
               </div>
            </div>
         </div>
         <div id="searchresults" class="tabcontent">
            <div class="container">
               <h5 class="center" style="color: var(--font-color)">Search results for "<span id="sr"></span>"</h5>
<div class="chip"> <img src="<?php echo $_SESSION['avatar']; ?>" alt="Contact Person"> By: <?php echo $_SESSION['name']; ?> </div> <div class="chip"> Kitchen <i class="close material-icons" onclick="document.getElementById('kitchen_search').style.display='none'">close</i> </div> <div class="chip"> Garage <i class="close material-icons" onclick="document.getElementById('garage_search').style.display='none'">close</i> </div> <div class="chip"> Bedroom <i class="close material-icons" onclick="document.getElementById('bedroom_search').style.display='none'">close</i> </div> <div class="chip"> Bathroom <i class="close material-icons" onclick="document.getElementById('bathroom_search').style.display='none'">close</i> </div> <div class="chip"> Storage <i class="close material-icons" onclick="document.getElementById('storage_search').style.display='none'">close</i> </div> <div class="chip"> Exact Search <i class="close material-icons">close</i> </div> <div class="chip"> Search rooms and actions <i class="close material-icons" onclick="document.getElementById('rooms').style.display='none'">close</i> </div>
               <ul class="collection with-header" id="myUL">
                  <div id="rooms">
                     <li class="collection-item waves-effect"><a href="#!" >Kitchen<span class="new badge">Room</span></a></li>
                     <li class="collection-item waves-effect"><a href="#!" >Bedroom<span class="new badge">Room</span></a></li>
                     <li class="collection-item waves-effect"><a href="#!" >Bathroom<span class="new badge">Room</span></a></li>
                     <li class="collection-item waves-effect"><a href="#!" >Dining room<span class="new badge">Room</span></a></li>
                     <li class="collection-item waves-effect"><a href="#!" >Grocery list<span class="new badge">Addon</span></a></li>
                     <li class="collection-item waves-effect"><a href="#!" >Garage<span class="new badge">Room</span></a></li>
                     <li class="collection-item waves-effect"><a href="#!" >Family room<span class="new badge">Room</span></a></li>
                     <li class="collection-item waves-effect"><a href="#!" >My todo list<span class="new badge">Addon</span></a></li>
                     <li class="collection-item waves-effect"><a href="#!" >Storage room<span class="new badge">Room</span></a></li>
                     <li class="collection-item waves-effect"><a href="#!" >Settings<span class="new badge">Page</span></a></li>
                     <li class="collection-item waves-effect"><a href="#!" >My Profile<span class="new badge">Page</span></a></li>
                  </div>
                  <?php
                     try {
                         $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                         $sql = "SELECT * FROM grocerylist WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid'];
                         $users = $dbh->query($sql);
                         foreach ($users as $grocerylistsearchitem) {
                         echo "<li class=\"collection-item waves-effect\" onclick=\"sm_page('gl', this, '');M.toast({html: 'Grocery List'})\"><a>" . $grocerylistsearchitem['name'] . "<span class=\"new badge red\">Grocery List</span><span class=\"new badge red\">" . $grocerylistsearchitem['qty'] . "</span></a></li>";
                         }
                         $dbh = null;
                     }
                     catch (PDOexception $e) {
                         echo "Error is: " . $e-> etmessage();
                     }
                     ?>
                  <div id="garage_search">
                     <?php 
                        try {
                            $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $sql = "SELECT * FROM garage WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid'];
                            $users = $dbh->query($sql);
                            foreach ($users as $row) {
                            echo "<li class=\"collection-item waves-effect\" onclick=\"sm_page('About', this, '');M.toast({html: 'Garage'})\"><a>" . $row['name'] . "<span class=\"new badge green\">Garage</span><span class=\"new badge green\">" . $row['qty'] . "</span></a></li>";
                            }
                            $dbh = null;
                        }
                        catch (PDOexception $e) {
                            echo "Error is: " . $e-> etmessage();
                        }
                        ?>
                  </div>
                  <div id="kitchen_search">
                     <?php 
                        try {
                            $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $sql = "SELECT * FROM products WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid'];
                            $users = $dbh->query($sql);
                            foreach ($users as $kitchensearchitem) {
                            echo "<li class=\"collection-item waves-effect\" onclick=\"sm_page('Contact', this, '');M.toast({html: 'Kitchen'})\"><a>" . $kitchensearchitem['name'] . "<span class=\"new badge blue\">Kitchen</span><span class=\"new badge blue\">" . $kitchensearchitem['qty'] . "</span></a></li>";
                            }
                            $dbh = null;
                        }
                        catch (PDOexception $e) {
                            echo "Error is: " . $e-> etmessage();
                        }
                        ?>
                  </div>
                  <div id="bathroom_search">
                     <?php 
                        try {
                            $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $sql = "SELECT * FROM bathroom WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid'];
                            $users = $dbh->query($sql);
                            foreach ($users as $bathroomsearchitem) {
                            echo "<li class=\"collection-item waves-effect\" onclick=\"sm_page('bathroom', this, '');M.toast({html: 'Bathroom'})\"><a>" . $bathroomsearchitem['name'] . "<span class=\"new badge green\" style=\"background: #7b1fa2 !important\">Bathroom</span><span class=\"new badge green\" style=\"background: #7b1fa2 !important\">" . $bathroomsearchitem['qty'] . "</span></a></li>";
                            }
                            $dbh = null;
                        }
                        catch (PDOexception $e) {
                            echo "Error is: " . $e-> etmessage();
                        }
                        ?>
                  </div>
                  <div id="storage_search">
                     <?php 
                        try {
                            $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $sql = "SELECT * FROM storageroom WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid'];
                            $users = $dbh->query($sql);
                            foreach ($users as $storagesearchitem) {
                            echo "<li class=\"collection-item waves-effect\" onclick=\"sm_page('storage', this, '');M.toast({html: 'Storage Room'})\"><a>" . $storagesearchitem['name'] . "<span class=\"new badge green\" style=\"background: #d81b60 !important\">Storage</span><span class=\"new badge green\" style=\"background: #d81b60 !important\">" . $storagesearchitem['qty'] . "</span></a></li>";
                            }
                            $dbh = null;
                        }
                        catch (PDOexception $e) {
                            echo "Error is: " . $e-> etmessage();
                        }
                        ?>
                  </div>
                  <div id="bedroom_search">
                     <?php 
                        try {
                            $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $sql = "SELECT * FROM bedroom WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid'];
                            $users = $dbh->query($sql);
                            foreach ($users as $bedroomsearchitem) {
                            echo "<li class=\"collection-item waves-effect\" onclick=\"sm_page('Home', this, '');M.toast({html: 'Bedroom'})\"><a>" . $bedroomsearchitem['name'] . "<span class=\"new badge green\" style=\"background: #00bcd4 !important\">Bedroom</span><span class=\"new badge green\" style=\"background: #00bcd4 !important\">" . $bedroomsearchitem['qty'] . "</span></a></li>";
                            }
                            $dbh = null;
                        }
                        catch (PDOexception $e) {
                            echo "Error is: " . $e-> etmessage();
                        }
                        ?>
                  </div>
               </ul>
            </div>
         </div>
         <div id="notification_popup" class="tabcontent">
            <h3 class="center" id="ERR_EMPTY_NOTIFICATION_TITLE">Inbox</h3>
    <div id="ERR_EMPTY_NOTIFICATION" style="display:none">
<img src="https://i.ibb.co/18k528g/urban-683.png" style="width:50vw;display:block;margin:auto"><br>
<p style="text-align:center">No notifications</p>
</div>
            <div class="container">
               <ul class="collection" style="border:0 !important;background:var(--bg-color); " id="menu">
                  <?php try { $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); $sql = "SELECT * FROM products WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid']; $users = $dbh->query($sql); foreach ($users as $numbervarnotify) { if ($numbervarnotify['qty'] < $number_notify) { echo ' <li class="collection-item avatar"> <i class="material-icons circle blue" style="color:white !important">kitchen</i> <span class="title">Kitchen</span> <p>You\'re going to run out of '; echo $numbervarnotify['name']; echo " soon</p></li>"; } } $dbh = null; } catch (PDOexception $e) { echo "Error is: " . $e-> etmessage(); } ?> <?php try { $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); $sql = "SELECT * FROM bedroom WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid']; $users = $dbh->query($sql); foreach ($users as $numbervarnotify) { if ($numbervarnotify['qty'] < $number_notify) { echo ' <li class="collection-item avatar"> <i class="material-icons circle red" style="color:white !important">bed</i> <span class="title">Bedroom</span> <p>You\'re going to run out of '; echo $numbervarnotify['name']; echo " soon</p></li>"; } } $dbh = null; } catch (PDOexception $e) { echo "Error is: " . $e-> etmessage(); } ?> <?php try { $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); $sql = "SELECT * FROM bathroom WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid']; $users = $dbh->query($sql); foreach ($users as $numbervarnotify) { if ($numbervarnotify['qty'] < $number_notify) { echo ' <li class="collection-item avatar"> <i class="material-icons circle green" style="color:white !important">wc</i> <span class="title">Bathroom</span> <p>You\'re going to run out of '; echo $numbervarnotify['name']; echo " soon</p></li>"; } } $dbh = null; } catch (PDOexception $e) { echo "Error is: " . $e-> etmessage(); } ?> <?php try { $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); $sql = "SELECT * FROM garage WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid']; $users = $dbh->query($sql); foreach ($users as $numbervarnotify) { if ($numbervarnotify['qty'] < $number_notify) { echo ' <li class="collection-item avatar"> <i class="material-icons circle yellow" style="color:white !important">directions_car</i> <span class="title">Garage</span> <p>You\'re going to run out of '; echo $numbervarnotify['name']; echo " soon</p></li>"; } } $dbh = null; } catch (PDOexception $e) { echo "Error is: " . $e-> etmessage(); } ?> <?php try { $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); $sql = "SELECT * FROM family WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid']; $users = $dbh->query($sql); foreach ($users as $numbervarnotify) { if ($numbervarnotify['qty'] < $number_notify) { echo ' <li class="collection-item avatar"> <i class="material-icons circle pink" style="color:white !important">tv</i> <span class="title">Family Room</span> <p>You\'re going to run out of '; echo $numbervarnotify['name']; echo " soon</p></li>"; } } $dbh = null; } catch (PDOexception $e) { echo "Error is: " . $e-> etmessage(); } ?> <?php try { $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); $sql = "SELECT * FROM dining_room WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid']; $users = $dbh->query($sql); foreach ($users as $numbervarnotify) { if ($numbervarnotify['qty'] < $number_notify) { echo ' <li class="collection-item avatar"> <i class="material-icons circle purple" style="color:white !important">local_dining</i> <span class="title">Dining Room</span> <p>You\'re going to run out of '; echo $numbervarnotify['name']; echo " soon</p></li>"; } } $dbh = null; } catch (PDOexception $e) { echo "Error is: " . $e-> etmessage(); } ?> <?php try { $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); $sql = "SELECT * FROM storageroom WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid']; $users = $dbh->query($sql); foreach ($users as $numbervarnotify) { if ($numbervarnotify['qty'] < $number_notify) { echo ' <li class="collection-item avatar"> <i class="material-icons circle cyan" style="color:white !important">domain</i> <span class="title">Storage Room</span> <p>You\'re going to run out of '; echo $numbervarnotify['name']; echo " soon</p></li>"; } } $dbh = null; } catch (PDOexception $e) { echo "Error is: " . $e-> etmessage(); } ?>
               </ul>
            </div>
         </div>
         <div id="Contact" class="tabcontent">
            <?php 
               try {
                   $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                   $sql = "SELECT * FROM products WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid'];
                   $users = $dbh->query($sql);
                   $KITCHEN_VAR_COUNT = $users->rowCount();
                   if($KITCHEN_VAR_COUNT > 0){
                   }
                    else {
                     echo "<div id='KITCHEN_VAR_COUNT' style='height: 90vh'><img alt='image' src='https://i.ibb.co/KX0bKPk/gummy-coffee.png'width='300px' style='display:block;margin:auto;'><br><p class='center'>No items here! Why not try adding something...</p></div>";
                     }
                   echo '<table class="table container" id="kitchen_table">
                           <div class="container"><input type="search" style="display:none" id="kitchen_search" placeholder="Search..."></div></div>
                              <thead>
                             <tr>
                              <td><b>Name</b></td>
                              <td><b>Quantity</b></td>
                              
                               </thead>
                             </tr>';
                   foreach ($users as $row) {
                       echo "<tr class='draggables' "; 
                       if($row['star'] == 1) {
                       echo "style='border-left: 3px solid #f57f17' id='kitchentr_".$row['id']."' onclick=\"item('".$row['id']."', '".$row['name']."', '".$row['qty']."', '".$row['price']."', '', 'kitchen', '".$row['star']."')\">";
                       }
                       else {
                       echo "id='kitchentr_".$row['id']."' onclick=\"item('".$row['id']."', '".$row['name']."', '".$row['qty']."', '".$row['price']."', '', 'kitchen', '".$row['star']."',)\">";
                       }
                       print "<td>".htmlspecialchars($row["name"]) . "</td><td>" . htmlspecialchars($row["qty"]) ."";
                       if ($row['login_id'] != $_SESSION['id']) {
                                echo "<span clas='badge red' style='float:right;color:white;padding: 4px;border-radius: 2px;background: #00695c !Important'>SYNCED</span>";
                       }
                       echo "</td></tr>";
                   }
                   $dbh = null;
               }
               catch (PDOexception $e) {
                   echo "Error is: " . $e-> etmessage();
               }
               ?>
            </table>
         </div>
         <nav style="position:fixed;background: #212121;z-index:10000;top:0;display:none;overflow:visible" id="secondary_nav">
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo left hide-on-large-only" onclick="back();" style="margin: 0 !important"><i class="material-icons">arrow_back</i> <span style="font-size: 20px;position: relative;top: -3px;">Item Details</span></a>
      <ul class="right snav">
        <li><a href="#" id="nav_star" class="star"><i class="material-icons">star_outline</i></a></li>
        <li><a href="#" id="nav_edit" class="waves-effect waves-light"><i class="material-icons">edit</i></a></li>
        <li><a href="#" id="nav_delete" class="waves-effect waves-light"><i class="material-icons">delete</i></a></li>
      </ul>
    </div>
  </nav>
         <div id="item_popup" style="overflow:hidden" class="tabcontent">
             <div class="container"><br>
             <h5 id="item_title">Title</h5>
             <h6 id="item_qty">Title</h6>
             <p class="flow-text" id="item_desc">Desc (tags)</p>
             <div id="ERR_VIEW_ONLY" style="display:none"><blockquote>View-only mode is set for this item automatically when you create one. Please refresh to edit/delete this item</blockquote></div>
            <div class="collection">
                    <a href="#!" class="collection-item waves-effect" id="action_edit" style="color:gray"><i class="material-icons left">edit</i>Edit</a>
                    <a href="#!" class="collection-item waves-effect" id="action_share" target="_blank" style="color:gray"><i class="material-icons left">forum</i>Invite collaborators &amp; comment</a>
                    <a href="#!" class="collection-item waves-effect" id="action_mail" target="_blank" style="color:gray"><i class="material-icons left">email</i>Share via email</a>
                    <a href="#!" class="collection-item waves-effect" id="action_share_p" style="color:gray"><i class="material-icons left">share</i>Share</a>
                    <a href="#!" class="collection-item waves-effect" id="action_recipe" target="_blank" style="visibility:hidden;height:0;padding:0;color:gray"><i class="material-icons left">lightbulb_outline</i>Find a recipe</a>
                    <a href="#!" class="collection-item red-text waves-effect" id="action_delete"><i class="material-icons left">delete</i>Delete</a>
            </div>
                         <a href="javascript:void(0)" onclick="back();" class="hide-on-small-only btn purple waves-effect"><i class="material-icons left">arrow_back</i>Back</a>
             </div>
         </div>
         <div id="dining_room" class="tabcontent">
            <div class="container">
               <?php 
                  try {
                      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                      $sql = "SELECT * FROM dining_room WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid'];
                      $users = $dbh->query($sql);
                      $dr_count = $users->rowCount();
                      if($dr_count > 0) {
                      echo '<table class="table">
                                <tr>
                                 <td>Name</td>
                                 <td>Quantity</td>
                                 <td class="d-none">Price</td>
                                </tr>';
                      foreach ($users as $row) {
                          echo "<tr id='dining_roomtr_".$row['id']."' onclick=\"item('".$row['id']."', '".$row['name']."', '".$row['qty']."', '".$row['price']."', 'https://smartlist.ga/dashboard/rooms/dining_room/', 'dining_room', '".$row['star']."')";
                          if($row['star'] == 1) {
                              echo "\" style='border-left: 3px solid #f57f17'>";
                          }
                          else {echo "\">";}
                          print "<td>".$row["name"] . "</td><td>" . $row["qty"] ."";
                          if ($row['login_id'] != $_SESSION['id']) {
                                   echo "<span clas='badge red' style='float:right;color:white;padding: 4px;border-radius: 2px;background: #00695c !Important'>SYNCED</span>";
                          }
                          echo "</td>";
                          /*echo " <td><div class=\"dropdown\" tabindex='0'>
                                 <a class=\"dropbtn\"><i class='material-icons'>more_vert</i></a>
                                 <div class=\"dropdown-contenta\">
                                 <a href=\"https://smartlist.ga/dashboard/rooms/dining_room/edit.php?id=$row[id]\" class='waves-effect'><i class='material-icons'>edit</i>Edit</a>
                                 <a href=\"https://smartlist.ga/dashboard/rooms/dining_room/delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete this item? This action is irreversible!')\" class='waves-effect'><i class='material-icons'>delete</i>Delete</a>
                                 <a href='https://smartlist.ga/dashboard/rooms/share/?name=".$row['name']."&personname=".$_SESSION['name']."&itemqty=".$row['qty']."&room=kitchen&id=".$row['id']."&new=true' class='waves-effect'><i class='material-icons'>share</i>Share</a>
                                 </div>
                                 </div></td>
                                 ";*/
                      }
                      $dbh = null;
                  }
                      else {
                     echo "<img alt='image' src='https://i.ibb.co/KX0bKPk/gummy-coffee.png'width='300px' style='display:block;margin:auto;'><br><p class='center'>No items here! Why not try adding something...</p>";
                     }
                  }
                  catch (PDOexception $e) {
                      echo "Error is: " . $e-> etmessage();
                  }
                  ?>
               </table>
            </div>
         </div>
         <div id="family" class="tabcontent">
            <div class="container">
               <?php 
                  try {
                      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                      $sql = "SELECT * FROM family WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid'];
                      $users = $dbh->query($sql);
                      $family_count = $users->rowCount();
                      if($family_count > 0) {
                      echo '<table class="table">
                                <tr>
                                 <td>Name</td>
                                 <td>Quantity</td>
                                 <td class="d-none">Price</td>
                                </tr>';
                      foreach ($users as $row) {
                          echo "<tr id='familytr_".$row['id']."' onclick=\"item('".$row['id']."', '".$row['name']."', '".$row['qty']."', '".$row['price']."', 'https://smartlist.ga/dashboard/rooms/family/', 'family', '".$row['star']."')";
                          if($row['star'] == 1) {
                              echo "\" style='border-left: 3px solid #f57f17'>";
                          }
                          else {echo "\">";}
                          print "<td>".$row["name"] . "</td><td>" . $row["qty"] ."";
                          if ($row['login_id'] != $_SESSION['id']) {
                                   echo "<span clas='badge red' style='float:right;color:white;padding: 4px;border-radius: 2px;background: #00695c !Important'>SYNCED</span>";
                          }
                          echo "</td>";
                        /*  echo " <td><div class=\"dropdown\" tabindex='0'>
                                 <a class=\"dropbtn\"><i class='material-icons'>more_vert</i></a>
                                 <div class=\"dropdown-contenta\">
                                 <a href=\"https://smartlist.ga/dashboard/rooms/family/edit.php?id=$row[id]\" class='waves-effect'><i class='material-icons'>edit</i>Edit</a>
                                 <a href=\"https://smartlist.ga/dashboard/rooms/family/delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete this item? This action is irreversible!')\" class='waves-effect'><i class='material-icons'>delete</i>Delete</a>
                                 <a href='https://smartlist.ga/dashboard/rooms/share/?name=".$row['name']."&personname=".$_SESSION['name']."&itemqty=".$row['qty']."&room=kitchen&id=".$row['id']."&new=true' class='waves-effect'><i class='material-icons'>share</i>Share</a>
                                 </div>
                                 </div></td>
                                 ";*/
                      }
                      $dbh = null;
                      }
                      else {
                     echo "<img alt='image' src='https://i.ibb.co/KX0bKPk/gummy-coffee.png'width='300px' style='display:block;margin:auto;'><br><p class='center'>No items here! Why not try adding something...</p>";
                     }
                  }
                  catch (PDOexception $e) {
                      echo "Error is: " . $e-> etmessage();
                  }
                  ?>
               </table>
            </div>
         </div>
         <div id="bathroom" class="tabcontent">
            <div class="container">
               <?php 
                  try {
                      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                      $sql = "SELECT * FROM bathroom WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid'];
                      $users = $dbh->query($sql);
                      $bath_count = $users->rowCount();
                       if($bath_count > 0){
                   }
                    else {
                     echo "<div id='bathroom_table_var' style='height: 90vh'><img alt='image' src='https://i.ibb.co/KX0bKPk/gummy-coffee.png'width='300px' style='display:block;margin:auto;'><br><p class='center'>No items here! Why not try adding something...</p></div>";
                     }
                      if($bath_count > 0) {
                      echo '<table class="table"  id="bathroom_table">
                                <tr>
                                 <td>Name</td>
                                 <td>Quantity</td>
                                 <td class="d-none">Price</td>
                                 
                                </tr>';
                      foreach ($users as $row) {
                          echo "<tr id='bathroomtr_".$row['id']."' onclick=\"item('".$row['id']."', '".$row['name']."', '".$row['qty']."', '".$row['price']."', 'https://smartlist.ga/dashboard/rooms/bathroom/', 'bathroom', '".$row['star']."')";
                          if($row['star'] == 1) {
                              echo "\" style='border-left: 3px solid #f57f17'>";
                          }
                          else {
                              echo "\">";
                          }
                          print "<td>".$row["name"] . "</td><td>" . $row["qty"] ."";
                          if ($row['login_id'] != $_SESSION['id']) {
                                   echo "<span clas='badge red' style='float:right;color:white;padding: 4px;border-radius: 2px;background: #00695c !Important'>SYNCED</span>";
                          }
                          echo "</td>";
                      }
                      $dbh = null;
                      }
                      else {
                     echo "<img alt='image' src='https://i.ibb.co/KX0bKPk/gummy-coffee.png'width='300px' style='display:block;margin:auto;'><br><p class='center'>No items here! Why not try adding something...</p>";
                     }
                  }
                  catch (PDOexception $e) {
                      echo "Error is: " . $e-> etmessage();
                  }
                  ?>
               </table>
            </div>
         </div>
         <div id="storage" class="tabcontent">
            <div class="container">
               <?php 
                  try {
                      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                      $sql = "SELECT * FROM storageroom WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid'];
                      $users = $dbh->query($sql);
                      $storage_count = $users->rowCount();
                      if($storage_count > 0) {
                      echo '<table class="table">
                                <tr>
                                 <td>Name</td>
                                 <td>Quantity</td>
                                 <td class="d-none">Price</td>
                                </tr>';
                      foreach ($users as $row) {
                          echo "<tr id='storagetr_".$row['id']."' onclick=\"item('".$row['id']."', '".$row['name']."', '".$row['qty']."', '".$row['price']."', 'https://smartlist.ga/dashboard/rooms/storage/', 'storage', '".$row['storage']."')";
                          if($row['star'] == 1) {
                              echo "\" style='border-left: 3px solid #f57f17'>";
                          }
                          else {echo "\">";}
                          print "<td>".$row["name"] . "</td><td>" . $row["qty"] ."";
                          if ($row['login_id'] != $_SESSION['id']) {
                                   echo "<span clas='badge red' style='float:right;color:white;padding: 4px;border-radius: 2px;background: #00695c !Important'>SYNCED</span>";
                          }
                          echo "</td>";
                      }
                      $dbh = null;
                      }
                      else {
                     echo "<img alt='image' src='https://i.ibb.co/KX0bKPk/gummy-coffee.png'width='300px' style='display:block;margin:auto;'><br><p class='center'>No items here! Why not try adding something...</p>";
                     }
                  }
                  catch (PDOexception $e) {
                      echo "Error is: " . $e-> etmessage();
                  }
                  ?>
               </table>
            </div>
         </div>
         <div id="gl" class="tabcontent">
            <div class="container">
               <?php 
                  try {
                      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                      $sql = "SELECT * FROM grocerylist WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid'];
                      $users = $dbh->query($sql);
                      echo '<table class="table">
                                <tr>
                                 <td>Name</td>
                                 <td>Quantity</td>
                                 <td class="d-none">Price</td>
                                 <td style="width:10%">Actions</td>
                                </tr>';
                      foreach ($users as $row) {
                          echo "<tr>";
                          print "<td>".$row["name"] . "</td><td>" . $row["qty"] ."";
                          if ($row['login_id'] != $_SESSION['id']) {
                                   echo "<span clas='badge red' style='float:right;color:white;padding: 4px;border-radius: 2px;background: #00695c !Important'>SYNCED</span>";
                          }
                          echo "</td><td>";
                          echo " <div class=\"dropdown\" tabindex='0'>
                                 <a class=\"dropbtn\"><i class='material-icons'>more_vert</i></a>
                                 <div class=\"dropdown-contenta\">
                                 <a href=\"https://smartlist.ga/dashboard/rooms/bathroom/edit.php?id=$row[id]\" class='waves-effect'><i class='material-icons'>edit</i>Edit</a>
                                 <a href=\"https://smartlist.ga/dashboard/rooms/bathroom/delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete this item? This action is irreversible!')\" class='waves-effect'><i class='material-icons'>delete</i>Delete</a>
                                 <a href='https://smartlist.ga/dashboard/rooms/share/?name=".$row['name']."&personname=".$_SESSION['name']."&itemqty=".$row['qty']."&room=kitchen&id=".$row['id']."&new=true' class='waves-effect'><i class='material-icons'>share</i>Share</a>
                                 </div>
                                 </div></td>
                                 ";
                      }
                      $dbh = null;
                  }
                  catch (PDOexception $e) {
                      echo "Error is: " . $e-> etmessage();
                  }
                  ?>
               </table>
            </div>
         </div>
         <div id="todo_list" class="tabcontent">
            <div class="container">
               <?php 
                  try {
                      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                      $sql = "SELECT * FROM todo WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid'];
                      $users = $dbh->query($sql);
                      echo '<table class="table">
                                <tr>
                                 <td>Name</td>
                                 <td>Quantity</td>
                                 <td class="d-none">Price</td>
                                 <td style="width:10%">Actions</td>
                                </tr>';
                      foreach ($users as $row) {
                          echo "<tr>";
                          print "<td>".$row["name"] . "</td><td>" . $row["qty"] ."";
                          if ($row['login_id'] != $_SESSION['id']) {
                                   echo "<span clas='badge red' style='float:right;color:white;padding: 4px;border-radius: 2px;background: #00695c !Important'>SYNCED</span>";
                          }
                          echo "</td><td>";
                          echo " <div class=\"dropdown\" tabindex='0'>
                                 <a class=\"dropbtn\"><i class='material-icons'>more_vert</i></a>
                                 <div class=\"dropdown-contenta\">
                                 <a href=\"https://smartlist.ga/dashboard/rooms/bathroom/edit.php?id=$row[id]\" class='waves-effect'><i class='material-icons'>edit</i>Edit</a>
                                 <a href=\"https://smartlist.ga/dashboard/rooms/bathroom/delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete this item? This action is irreversible!')\" class='waves-effect'><i class='material-icons'>delete</i>Delete</a>
                                 <a href='https://smartlist.ga/dashboard/rooms/share/?name=".$row['name']."&personname=".$_SESSION['name']."&itemqty=".$row['qty']."&room=kitchen&id=".$row['id']."&new=true' class='waves-effect'><i class='material-icons'>share</i>Share</a>
                                 </div>
                                 </div></td>
                                 ";
                      }
                      $dbh = null;
                  }
                  catch (PDOexception $e) {
                      echo "Error is: " . $e-> etmessage();
                  }
                  ?>
               </table>
            </div>
         </div>
         <div id="About" class="tabcontent">
            <div class="container">
               <?php 
                  try {
                      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                      $sql = "SELECT * FROM garage WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid'];
                      $users = $dbh->query($sql);
                      $garage_count = $users->rowCount();
                      if($garage_count > 0) {
                      echo '<table class="table">
                                <tr>
                                 <td>Name</td>
                                 <td>Quantity</td>
                                 <td class="d-none">Price</td>
                                 
                                </tr>';
                      foreach ($users as $row) {
                          echo "<tr id='garagetr_".$row['id']."' onclick=\"item('".$row['id']."', '".$row['name']."', '".$row['qty']."', '".$row['price']."', 'https://smartlist.ga/dashboard/rooms/garage/', 'garage','".$row['star']."')";
                          if($row['star'] == 1) {
                              echo "\" style='border-left: 3px solid #f57f17'>";
                          }
                          else {echo "\">";}
                          print "<td>".$row["name"] . "</td><td>" . $row["qty"] ."";
                          if ($row['login_id'] != $_SESSION['id']) {
                                   echo "<span clas='badge red' style='float:right;color:white;padding: 4px;border-radius: 2px;background: #00695c !Important'>SYNCED</span>";
                          }
                          echo "</td>";
                      }
                      $dbh = null;
                  }
                      else {
                     echo "<img alt='image' src='https://i.ibb.co/KX0bKPk/gummy-coffee.png'width='300px' style='display:block;margin:auto;'><br><p class='center'>No items here! Why not try adding something...</p>";
                     }
                  }
                  catch (PDOexception $e) {
                      echo "Error is: " . $e-> etmessage();
                  }
                  ?>
               </table>
            </div>
         </div>
               <div id="key" class="modal modal-fixed-a">
         <div class="modal-content">
            <h4>Keyboard Shortcuts</h4>
            <p>CTRL F - Focus on search bar</p>
            <p>CTRL B - View Notifications</p>
            <p>CTRL S - Add item</p>
            <p>CTRL E - Open settings</p>
         </div>
         <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cool!</a>
         </div>
      </div>
         <!--CONTENT ENDS-->
      </div>
      <script defer>
      function back() {document.body.style.overflow = '';    document.getElementById('editfab').style.display='none';

 document.getElementById("FLOATING_ACTION_BUTTON").style.transform = "scale(1)";if(page_title == 'News') {brandlogotext.innerHTML = 'Smartlist';} sm_page(page_title, this, ''); document.querySelector("meta[name=theme-color]").setAttribute("content", "#2a1782");}
      $('select').formSelect(); function showsearch() { var oijw = document.getElementById("searchbar"); if (oijw.style.display === "none") { oijw.style.display = "block"; } else { oijw.style.display = "none"; } } function secondary() { var oijwsecondary_nav = document.getElementById("secondary_nav"); if (oijwsecondary_nav.style.display === "none") { oijwsecondary_nav.style.display = "block"; } else { oijwsecondary_nav.style.display = "none"; } }
  var ctx = document.getElementById('myChart').getContext('2d'); var myChart = new Chart(ctx, { type: 'line', data: { <?php echo "labels: ['',"; try { $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); $sql = "SELECT * FROM bm WHERE login_id=".$_SESSION['id']; $users = $dbh->query($sql); foreach ($users as $row) { echo "'".$row['name']."', "; } $dbh = null; } catch (PDOexception $e) { echo "Error is: " . $e-> etmessage(); } echo "],"; echo "\n"; echo "datasets: [{";echo "\n"; echo "label: 'Amount you spent',"; echo "\n"; echo "data: [0,"; try { $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); $sql = "SELECT * FROM bm WHERE login_id=".$_SESSION['id']; $users = $dbh->query($sql); foreach ($users as $row) { echo "".$row['qty'].", "; } $dbh = null; } catch (PDOexception $e) { echo "Error is: " . $e-> etmessage(); } echo "], \n order: 2,"; ?> borderColor: 'rgba(98,0,238,.8)', backgroundColor: 'rgba(98,0,238,.2)', pointBorderColor: 'rgba(0, 188, 212, 0)', pointBackgroundColor: 'rgba(0, 188, 212, 0.9)', }, { label: 'My goal', data: [<?php try { $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); $sql = "SELECT * FROM bm WHERE login_id=".$_SESSION['id']; $users = $dbh->query($sql); foreach ($users as $row) {echo $goal.", ";} echo $goal.", "; $dbh = null; } catch (PDOexception $e) { echo "Error is: " . $e-> etmessage(); } ?>],
        type: 'line',
        order: 1,
        borderColor: '#f44336',
        borderWidth: 3, 
        backgroundColor: 'rgba(245, 71, 83, 0)',
        }] }, 
        options: { 
            maintainAspectRatio: false, 
            scales: { 
                yAxes: [{ 
                    ticks: { 
                        beginAtZero: true, 
                    }, 
                    scaleLabel: { 
                        display: true, 
                        labelString: 'You spent ' 
                    } 
                }], 
                xAxes: [{ 
                    gridLines: { 
                        color: "rgba(0, 0, 0, 0)", 
                    }, 
                    scaleLabel: { 
                        display: true, 
                        labelString: 'Date' 
                    } }] }, 
                    tooltips: { 
                        titleFontSize: 16, 
                        caretPadding: 10, 
                        bodyFontSize: 14, 
                        mode: 'index', 
                        intersect: false,
                        displayColors: false, 
                        xPadding: 30,
                        yPadding: 20,
                        bodyFontColor: '#919191',
                        backgroundColor: '#fff',
                        cornerRadius: 2,
                        borderColor: '#ccc',
                        borderWidth: 1.5,
                        titleFontColor: '#000',
                        callbacks: { 
                            label: function(tooltipItems, data) { 
                                return data.datasets[tooltipItems.datasetIndex].label + ': ' + tooltipItems.yLabel + ' dollars'; 
                            }, 
                        }, 
                    },
                    hover: { 
                        mode: 'nearest', 
                        intersect: true 
                    }, 
                    elements: { 
                        animationEasing: 'easeIn',
                        line: { 
                            tension: .1 
                        }, 
                        point: { 
                            radius: 0
                        } 
                    }, 
        } }); ctx.height = 500;
function load_croom(data) {
    document.getElementById('custom_room').innerHTML = '<center><br><br><br><svg class=\'circular\' height=\'50\' width=\'50\'> <circle class=\'path\' cx=\'25\' cy=\'25\' r=\'20\' fill=\'none\' stroke-width=\'3\' stroke-miterlimit=\'10\' /> </svg><br></center>';
    $('#custom_room').load('https://smartlist.ga/dashboard/rooms/ajax_croom_loader.php?room='+ encodeURI(data));
    sm_page('custom_room', this, '');
    brandlogotext.innerHTML = data;
}
      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> 
      <script src="https://smartlist.ga/dashboard/js/swipe.js"></script>
      <script src="https://smartlist.ga/dashboard/js/app.js"></script>
      <?php if(isset($_GET['item'])) {?>
      <script defer>
         $(document).ready(function(){
         sm_page('addkitchen', this, '');
         });
      </script>
      <?php } ?>
      <?php if(isset($_GET['croom'])) {?>
      <script defer>
         $(document).ready(function(){
         M.toast({ html: 'Created room successfully' });
         });
      </script>
      <?php } ?>      
      <script defer>
         setTimeout(function(){
            $('.demo').hide();
            $('.demoa').hide();
            window.scrollTo(0, 0);
            <?php
            if (isset($_GET["room"])) {
              $t = $_GET["room"];
              if ($t == "10") {
                  echo "sm_page('Contact', this,'' );";
              } 
              elseif ($t == "1") {
                  echo "sm_page('Contact', this, '');";
              } 
              elseif ($t == "3") {
                  echo "sm_page('Home', this, '');brandlogotext.innerHTML = 'Bedroom'";
              } 
              elseif ($t == "g") {
                  echo "sm_page('About', this, '');brandlogotext.innerHTML = 'Garage'";
              } 
              elseif ($t == "bathroom") {
                  echo "sm_page('bathroom', this, '');brandlogotext.innerHTML = 'Bathroom'";
              } 
              elseif ($t == "storage") {
                  echo "sm_page('storage', this, '');brandlogotext.innerHTML = 'Storage Room'";
              } 
              elseif ($t == "family") {
                  echo "sm_page('family', this, '');brandlogotext.innerHTML = 'Family Room'";
              } 
              elseif ($t == "laundry") {
                  echo "sm_page('laundryroom', this, '');brandlogotext.innerHTML = 'Laundry Room'";
              } 
              elseif ($t == "dining_room") {
                  echo "sm_page('dining_room', this, '');brandlogotext.innerHTML = 'Dining Room'";
              } 
            }
            elseif (!isset($_GET["room"])){
            echo "sm_page('News', this, );";
            }
            ?>  
            request_notification();
         }, 00);
                  var syncalertx = document.getElementById("syncalert"); function syncalertplayAudio() { syncalertx.play(); } $(document).ready(function(){$('.dropdown-trigger').dropdown(); $('.tooltipped').tooltip(); });
         function notifyMe() { if (!("Notification" in window)) { M.toast({ html: 'Your current browser doesn\'t support notifications. We reccomend using Chrome for the best experience' });} else if (Notification.permission === "granted") {  } else if (Notification.permission !== "denied") { Notification.requestPermission().then(function (permission) { if (permission === "granted") {  } }); } } function request_notification() { if (!("Notification" in window)) {M.toast({ html: 'Your current browser doesn\'t support notifications. We reccomend using Chrome for the best experience' }); } else if (Notification.permission === "granted") { /*var notification = new Notification("Welcome to Smartlist!");*/ } else if (Notification.permission !== "denied") { Notification.requestPermission().then(function (permission) { if (permission === "granted") { /*var notification = new Notification("Nice! Notifications are enabled!");*/ } }); } }
      </script>
      <audio id="syncalert">
         <source src="https://padlet-uploads.storage.googleapis.com/446844750/abff4e01e3d7691aa96889855e09afaa/notification_simple_02.wav" type="audio/mpeg">
         Your browser does not support the audio element.
      </audio>
      <audio id="task_complete">
          <source src="https://padlet-uploads.storage.googleapis.com/446844750/f84dfa8a5cf0e025612f3517c2619e99/hero_simple_celebration_03.wav" type="audio/mpeg">
      </audio>
      <script>
function task_complete() {
    var x = document.getElementById("task_complete");
    x.play();
}
var searcha, qtay, date;

function add() {
    $('.modal').modal('close');
    sm_page('Contact', this, '');
    searcha = document.getElementById("tags").value.replace(/['"]+/g, '');
    qtay = document.getElementById("qty").value.replace(/['"]+/g, '');
    date = document.getElementById("date").value.replace(/['"]+/g, '');
    $("#kitchen_table").append("<tr class='card-new' id='KITCHEN_tr_" + searcha + "' onclick='item(\"KITCHEN_IDENTIFY_BY_NAME\", \"" + searcha + "\", \"" + qtay + "\", \"" + date + "\", \"\", \"kitchen\")'><td>" + searcha + "</td><td>" + qtay + "</td></tr>");
    document.getElementById("tags").value = null;
    if (document.getElementById('KITCHEN_VAR_COUNT')) {
        document.getElementById('KITCHEN_VAR_COUNT').style.display = 'none';
    }
    $("#div1").load("https://smartlist.ga/dashboard/resources/modal.php?name=" + encodeURI(searcha) + "&qty=" + encodeURI(qtay) + "&price=" + encodeURI(date) + "");
    document.getElementById("bar").style.display = "block";
    setTimeout(function() {
        document.getElementById("bar").style.display = "none"
    }, 2000);
    $('html, body').scrollTop($(document).height());
}
var item_state, item_p;
var page_title = 'News';

function item(id, name, qty, price, directory, room, star) {
    document.getElementById('editfab').style.display='block';
    document.getElementById('editfab').style.transform='scale(0)';
    setTimeout(function(){ document.getElementById('editfab').style.display='block';     document.getElementById('editfab').style.transform='scale(1)';
}, 0100);

    document.getElementById('editfab').href = directory + "edit.php?id=" + id;
    document.body.style.overflow = 'hidden';
    // ITEM_POPUP--
    document.getElementById('action_share_p').onclick = function() {
        if (navigator.share) {
            navigator.share({
                    title: document.title,
                    text: "I'm currently having" + qty + name + "in my inventory.",
                    url: window.location.href
                }).then(() => console.log('Successful share'))
                .catch(error => console.log('Error sharing:', error));
        }
    }
    document.getElementById("FLOATING_ACTION_BUTTON").style.transform = "scale(0)";
    document.querySelector("meta[name=theme-color]").setAttribute("content", "#1f1f1f");
    if (room == 'bedroom') {
        page_title = 'Home';
    } else if (room == 'kitchen') {
        page_title = 'Contact';
    } else if (room == 'bathroom') {
        page_title = 'bathroom';
    } else if (room == 'garage') {
        page_title = 'About';
    } else if (room == 'family') {
        page_title = 'family';
    } else if (room == 'storage') {
        page_title = 'storage';
    } else if (room == 'dining_room') {
        page_title = 'dining_room';
    } else if (room == 'laundryroom') {
        page_title = 'laundryroom';
    } else if (room == 'camping') {
        page_title = 'cs';
    }
    item_state = 'item_popup';
    item_p = 1;
    document.getElementById("action_delete").onclick = function() {
        document.getElementById(room + 'tr_' + id).style.display = 'none';
        if (room == 'kitchen') {
            toast(name, qty);
        } else {
            M.toast({
                html: 'Deleted!'
            });
        }
        $("#div1").load(directory + "delete.php?id=" + id);
        sm_page(page_title, '', '');
    };
    document.getElementById("nav_delete").onclick = function() {
        document.getElementById(room + 'tr_' + id).style.display = 'none';
        if (room == 'kitchen') {
            toast(name, qty);
        } else {
            M.toast({
                html: 'Deleted!'
            });
        }
        $("#div1").load(directory + "delete.php?id=" + id);
        sm_page(page_title, '', '');
    };
    if (star == 0) {
        document.querySelector('#nav_star i').innerHTML = 'star_outline';
    } else {
        document.querySelector('#nav_star i').innerHTML = 'star';
    }
    if (room == 'kitchen') {
        document.getElementById("nav_star").onclick = function() {
            if (document.querySelector('#nav_star i').innerHTML == 'star') {
                document.querySelector('#nav_star i').innerHTML = 'star_outline';
                $('#div1').load('https://smartlist.ga/dashboard/star.php?id=' + id);
                document.getElementById('kitchentr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 0);
                };
                document.getElementById('kitchentr_' + id).style.borderLeft = '';
                M.toast({
                    html: 'Un-Starred item'
                });
            } else {
                document.querySelector('#nav_star i').innerHTML = 'star';
                $('#div1').load('https://smartlist.ga/dashboard/star.php?id=' + id);
                document.getElementById('kitchentr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 1);
                };
                document.getElementById('kitchentr_' + id).style.borderLeft = '3px solid #f57f17';
                M.toast({
                    html: 'Starred item'
                });
            }
            return false;
        };
    } else if (room == 'bedroom') {
        document.getElementById("nav_star").onclick = function() {
            if (document.querySelector('#nav_star i').innerHTML == 'star') {
                document.querySelector('#nav_star i').innerHTML = 'star_outline';
                $('#div1').load('https://smartlist.ga/dashboard/rooms/bedroom/star.php?id=' + id);
                document.getElementById('bedroomtr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 0);
                };
                document.getElementById('bedroomtr_' + id).style.borderLeft = '';
                M.toast({
                    html: 'Un-Starred item'
                });
            } else {
                document.querySelector('#nav_star i').innerHTML = 'star';
                $('#div1').load('https://smartlist.ga/dashboard/rooms/bedroom/star.php?id=' + id);
                document.getElementById('bedroomtr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 1);
                };
                document.getElementById('bedroomtr_' + id).style.borderLeft = '3px solid #f57f17';
                M.toast({
                    html: 'Starred item'
                });
            }
            return false;
        };
    } else if (room == 'garage') {
        document.getElementById("nav_star").onclick = function() {
            if (document.querySelector('#nav_star i').innerHTML == 'star') {
                document.querySelector('#nav_star i').innerHTML = 'star_outline';
                $('#div1').load('https://smartlist.ga/dashboard/rooms/garage/star.php?id=' + id);
                document.getElementById('garagetr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 0);
                };
                document.getElementById('garagetr_' + id).style.borderLeft = '';
                M.toast({
                    html: 'Un-Starred item'
                });
            } else {
                document.querySelector('#nav_star i').innerHTML = 'star';
                $('#div1').load('https://smartlist.ga/dashboard/rooms/garage/star.php?id=' + id);
                document.getElementById('garagetr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 1);
                };
                document.getElementById('garagetr_' + id).style.borderLeft = '3px solid #f57f17';
                M.toast({
                    html: 'Starred item'
                });
            }
            return false;
        };
    } else if (room == 'camping') {
        document.getElementById("nav_star").onclick = function() {
            if (document.querySelector('#nav_star i').innerHTML == 'star') {
                document.querySelector('#nav_star i').innerHTML = 'star_outline';
                $('#div1').load('https://smartlist.ga/dashboard/rooms/camping/star.php?id=' + id);
                document.getElementById('campingtr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 0);
                };
                document.getElementById('campingtr_' + id).style.borderLeft = '';
                M.toast({
                    html: 'Un-Starred item'
                });
            } else {
                document.querySelector('#nav_star i').innerHTML = 'star';
                $('#div1').load('https://smartlist.ga/dashboard/rooms/camping/star.php?id=' + id);
                document.getElementById('campingtr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 1);
                };
                document.getElementById('campingtr_' + id).style.borderLeft = '3px solid #f57f17';
                M.toast({
                    html: 'Starred item'
                });
            }
            return false;
        };
    } else if (room == 'bathroom') {
        document.getElementById("nav_star").onclick = function() {
            if (document.querySelector('#nav_star i').innerHTML == 'star') {
                document.querySelector('#nav_star i').innerHTML = 'star_outline';
                $('#div1').load('https://smartlist.ga/dashboard/rooms/bathroom/star.php?id=' + id);
                document.getElementById('bathroomtr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 0);
                };
                document.getElementById('bathroomtr_' + id).style.borderLeft = '';
                M.toast({
                    html: 'Un-Starred item'
                });
            } else {
                document.querySelector('#nav_star i').innerHTML = 'star';
                $('#div1').load('https://smartlist.ga/dashboard/rooms/bathroom/star.php?id=' + id);
                document.getElementById('bathroomtr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 1)
                }
                document.getElementById('bathroomtr_' + id).style.borderLeft = '3px solid #f57f17';
                M.toast({
                    html: 'Starred item'
                });
            }
            return false
        }
    } else if (room == 'family') {
        document.getElementById("nav_star").onclick = function() {
            if (document.querySelector('#nav_star i').innerHTML == 'star') {
                document.querySelector('#nav_star i').innerHTML = 'star_outline';
                $('#div1').load('https://smartlist.ga/dashboard/rooms/family/star.php?id=' + id);
                document.getElementById('familytr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 0)
                }
                document.getElementById('familytr_' + id).style.borderLeft = '';
                M.toast({
                    html: 'Un-Starred item'
                });
            } else {
                document.querySelector('#nav_star i').innerHTML = 'star';
                $('#div1').load('https://smartlist.ga/dashboard/rooms/family/star.php?id=' + id);
                document.getElementById('familytr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 1)
                }
                document.getElementById('familytr_' + id).style.borderLeft = '3px solid #f57f17';
                M.toast({
                    html: 'Starred item'
                });
            }
            return false
        }
    } else if (room == 'storage') {
        document.getElementById("nav_star").onclick = function() {
            if (document.querySelector('#nav_star i').innerHTML == 'star') {
                document.querySelector('#nav_star i').innerHTML = 'star_outline';
                $('#div1').load('https://smartlist.ga/dashboard/rooms/storage/star.php?id=' + id);
                document.getElementById('storagetr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 0)
                }
                document.getElementById('storagetr_' + id).style.borderLeft = '';
                M.toast({
                    html: 'Un-Starred item'
                });
            } else {
                document.querySelector('#nav_star i').innerHTML = 'star';
                $('#div1').load('https://smartlist.ga/dashboard/rooms/storage/star.php?id=' + id);
                document.getElementById('storagetr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 1)
                }
                document.getElementById('storagetr_' + id).style.borderLeft = '3px solid #f57f17';
                M.toast({
                    html: 'Starred item'
                });
            }
            return false
        }
    } else if (room == 'laundryroom') {
        document.getElementById("nav_star").onclick = function() {
            if (document.querySelector('#nav_star i').innerHTML == 'star') {
                document.querySelector('#nav_star i').innerHTML = 'star_outline';
                $('#div1').load('https://smartlist.ga/dashboard/rooms/laundry/star.php?id=' + id);
                document.getElementById('laundryroomtr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 0)
                }
                document.getElementById('laundryroomtr_' + id).style.borderLeft = '';
                M.toast({
                    html: 'Un-Starred item'
                });
            } else {
                document.querySelector('#nav_star i').innerHTML = 'star';
                $('#div1').load('https://smartlist.ga/dashboard/rooms/laundry/star.php?id=' + id);
                document.getElementById('laundryroomtr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 1)
                }
                document.getElementById('laundryroomtr_' + id).style.borderLeft = '3px solid #f57f17';
                M.toast({
                    html: 'Starred item'
                });
            }
            return false
        }
    } else if (room == 'dining_room') {
        document.getElementById("nav_star").onclick = function() {
            if (document.querySelector('#nav_star i').innerHTML == 'star') {
                document.querySelector('#nav_star i').innerHTML = 'star_outline';
                $('#div1').load('https://smartlist.ga/dashboard/rooms/dining_room/star.php?id=' + id);
                document.getElementById('dining_roomtr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 0)
                }
                document.getElementById('dining_roomtr_' + id).style.borderLeft = '';
                M.toast({
                    html: 'Un-Starred item'
                });
            } else {
                document.querySelector('#nav_star i').innerHTML = 'star';
                $('#div1').load('https://smartlist.ga/dashboard/rooms/dining_room/star.php?id=' + id);
                document.getElementById('dining_roomtr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 1)
                }
                document.getElementById('dining_roomtr_' + id).style.borderLeft = '3px solid #f57f17';
                M.toast({
                    html: 'Starred item'
                });
            }
            return false
        }
    }
    document.getElementById('nav_edit').href = directory + "edit.php?id=" + id;
    document.getElementById('action_edit').href = directory + "edit.php?id=" + id;
    document.getElementById('action_recipe').href = "https://www.google.com/search?q=recipes+with+" + encodeURI(name);
    if (room !== 'kitchen') {
        document.getElementById('action_recipe').style.visibility = 'hidden';
        document.getElementById('action_recipe').style.height = '0';
        document.getElementById('action_recipe').style.padding = '0';
    } else if (room == 'kitchen') {
        document.getElementById('action_recipe').style.visibility = 'visible';
        document.getElementById('action_recipe').style.height = 'auto';
        document.getElementById('action_recipe').style.padding = '10px 20px';
    }
    document.getElementById('item_title').innerHTML = name;
    document.getElementById('item_qty').innerHTML = "Quantity: " + qty;
    document.getElementById('action_mail').href = "mailto:hello@homebase.rf.gd?subject=My%20Inventory%20Status%20%7C%20Smartlist&body=Hi%20_____%2C%0D%0AI'm%20currently%20having%20" + encodeURI(qty) + "%20" + encodeURI(name) + "%20in%20my%20" + encodeURI(room) + ".%0D%0A%0D%0AThank%20you%2C%0D%0ASincerely%2C%0D%0A________";
    document.getElementById('item_desc').innerHTML = "<div class='chip'>Category: " + price + "</div><div class='chip'>Room: " + room + "</div>";
    if (room == 'kitchen') {
        document.getElementById('item_desc').style.display = 'block'
    } else {
        document.getElementById('item_desc').innerHTML = "<div class='chip'>Room: " + room + "</div>";
    }
    if (id == 'DISABLED_ITEM') {
        document.getElementById("nav_delete").style.display = "none";
        document.getElementById('nav_edit').style.display = "none";
        document.getElementById("action_delete").style.display = "none";
        document.getElementById('action_edit').style.display = "none";
        document.getElementById('ERR_VIEW_ONLY').style.display = 'block';
    } else {
        document.getElementById("nav_delete").style.display = "block";
        document.getElementById('nav_edit').style.display = "block";
        document.getElementById("action_delete").style.display = "block";
        document.getElementById('ERR_VIEW_ONLY').style.display = 'none';
        document.getElementById('action_edit').style.display = "block";
    }
    if (id == 'KITCHEN_IDENTIFY_BY_NAME') {
        document.getElementById("action_delete").onclick = function() {
            document.getElementById('KITCHEN_tr_' + name).style.display = 'none';
            toast(name, qty);
            $("#div1").load("https://smartlist.ga/dashboard/rooms/kitchen/quickdelete.php?name=" + encodeURI(name) + "&qty=" + encodeURI(qty) + "&price=" + encodeURI(price));
            sm_page(page_title, '', '')
        }
        document.getElementById("nav_delete").onclick = function() {
            document.getElementById('KITCHEN_tr_' + name).style.display = 'none';
            toast(name, qty);
            $("#div1").load("https://smartlist.ga/dashboard/rooms/kitchen/quickdelete.php?name=" + encodeURI(name) + "&qty=" + encodeURI(qty) + "&price=" + encodeURI(price));
            sm_page(page_title, '', '')
        }
    }
    if (id == 'BEDROOM_IDENTIFY_BY_NAME') {
        document.getElementById("action_delete").onclick = function() {
            document.getElementById('BEDROOM_tr' + name).style.display = 'none';
            M.toast({
                html: 'Deleted!'
            });
            $("#div1").load("https://smartlist.ga/dashboard/rooms/bedroom/quickdelete.php?name=" + encodeURI(name) + "&qty=" + encodeURI(qty));
            sm_page(page_title, '', '')
        }
        document.getElementById("nav_delete").onclick = function() {
            document.getElementById('BEDROOM_tr' + name).style.display = 'none';
            M.toast({
                html: 'Deleted!'
            });
            $("#div1").load("https://smartlist.ga/dashboard/rooms/bedroom/quickdelete.php?name=" + encodeURI(name) + "&qty=" + encodeURI(qty));
            sm_page(page_title, '', '')
        }
    }
    if (id == 'BATHROOM_IDENTIFY_BY_NAME') {
        document.getElementById("action_delete").onclick = function() {
            document.getElementById('BATHROOM_tr' + name).style.display = 'none';
            M.toast({
                html: 'Deleted!'
            });
            $("#div1").load("https://smartlist.ga/dashboard/rooms/bathroom/quickdelete.php?name=" + encodeURI(name) + "&qty=" + encodeURI(qty));
            sm_page(page_title, '', '')
        }
        document.getElementById("nav_delete").onclick = function() {
            document.getElementById('BATHROOM_tr' + name).style.display = 'none';
            M.toast({
                html: 'Deleted!'
            });
            $("#div1").load("https://smartlist.ga/dashboard/rooms/bathroom/quickdelete.php?name=" + encodeURI(name) + "&qty=" + encodeURI(qty));
            sm_page(page_title, '', '')
        }
    }
    document.getElementById('action_share').href = "https://smartlist.ga/dashboard/rooms/share/?name=" + encodeURI(name) + "&personname=<?php echo urlencode($_SESSION['name']);?>&itemqty=" + encodeURI(qty) + "&room=kitchen&id=" + id + "&new=true" + id;
    sm_page('item_popup', this, '');
    secondary();
}
history.pushState(null, null, 'beta');
window.addEventListener('popstate', function(event) {
    history.pushState(null, null, 'beta');
    $('.modal').modal('close');
    /* sm_page(last_page, this, '')*/
    if (item_state == 'item_popup') {
        back();
        item_state = '1';
    }
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        $('.sidenav').sidenav('close');
    }
});
var bedroom_qty, bedroom_name, bathroom_qty, bathroom_name;

function add_bathroom() {
    $('.modal').modal('close');
    sm_page('bathroom', this, '');
    bathroom_qty = document.getElementById("bathroom_qty_input").value.replace(/['"]+/g, '');
    bathroom_name = document.getElementById("bathroom_name_input").value.replace(/['"]+/g, '');
    document.getElementById("bathroom_name_input").value = null;
    document.getElementById("bathroom_qty_input").value = null;
    $("#bathroom_table").append("<tr class='card-new'id='BATHROOM_tr" + bathroom_name + "' onclick='item(\"BATHROOM_IDENTIFY_BY_NAME\", \"" + bathroom_name + "\", \"" + bathroom_qty + "\", \"\", \"\", \"bathroom\")'><td>" + bathroom_name + "</td><td>" + bathroom_qty + "</td></tr>");
    if (document.getElementById('bathroom_table_var')) {
        document.getElementById('bathroom_table_var').style.display = 'none';
    }
    $("#div1").load("https://smartlist.ga/dashboard/rooms/bathroom/quickadd.php?name=" + encodeURI(bathroom_name) + "&qty=" + encodeURI(bathroom_qty) + "");
    document.getElementById("bar").style.display = "block";
    setTimeout(function() {
        document.getElementById("bar").style.display = "none"
    }, 2000);
    $('html, body').scrollTop($(document).height());
}

function add_bedroom() {
    $('.modal').modal('close');
    sm_page('Home', this, '');
    bedroom_qty = document.getElementById("bedroom_qty_input").value.replace(/['"]+/g, '');
    bedroom_name = document.getElementById("bedroom_name_input").value.replace(/['"]+/g, '');
    document.getElementById("bedroom_name_input").value = null;
    document.getElementById("bedroom_qty_input").value = null;
    $("#bedroom_table").append("<tr class='card-new'id='BEDROOM_tr" + bedroom_name + " onclick='item(\"BEDROOM_IDENTIFY_BY_NAME\", \"" + bedroom_name + "\", \"" + bedroom_qty + "\", \"\", \"\", \"bedroom\")'><td>" + bedroom_name + "</td><td>" + bedroom_qty + "</td></tr>");
    if (document.getElementById('BEDROOM_VAR_COUNT')) {
        document.getElementById('BEDROOM_VAR_COUNT').style.display = 'none';
    }
    $("#div1").load("https://smartlist.ga/dashboard/rooms/bedroom/quickadd.php?name=" + encodeURI(bedroom_name) + "&qty=" + encodeURI(bedroom_qty) + "");
    document.getElementById("bar").style.display = "block";
    setTimeout(function() {
        document.getElementById("bar").style.display = "none"
    }, 2000);
    $('html, body').scrollTop($(document).height());
}
$('.tabs').tabs();
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("FLOATING_ACTION_BUTTON").style.transform = "scale(1)";
    } else {
        document.getElementById("FLOATING_ACTION_BUTTON").style.transform = "scale(0)";
    }
    prevScrollpos = currentScrollPos;
}
window.onerror = function(msg, url, linenumber) {
    console.log('Error message: ' + msg + '\nURL: ' + url + '\nLine Number: ' + linenumber);
    return true;
}
      </script>   
      <?php if (!empty($notifications)) { ?> 
<script>
    window.onerror = function(msg, url, linenumber) {
    console.log('Error message: '+msg+'\nURL: '+url+'\nLine Number: '+linenumber);
    return true;
}
</script>
<script defer>
function desktop_ping(theBody, theTitle) {
    var dts = Math.floor(Date.now());
    var options = {
        body: theBody,
        icon: 'https://i.ibb.co/FDqN0Vh/Screenshot-2021-02-02-at-7-55-08-AM-2.png',
        timestamp: dts,
    };
    var n = new Notification(theTitle, options);
    n.onclick = function() {
        event.preventDefault();
        window.focus();
        sm_page('notification_popup', '', '')
    };
    document.addEventListener('visibilitychange', function() {
        if (document.visibilityState === 'visible') {
            n.close();
        }
    });
    syncalertplayAudio();
}
function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
var notify_cookie;
var NOTIFY_ALREADY_CLOSED = getCookie("NOTIFY_ALREADY_CLOSED");
if ($('#menu li').length > 0) {
if(NOTIFY_ALREADY_CLOSED == 1){  }
else{
    desktop_ping('<?php  try {
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM products WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid'];
$users = $dbh->query($sql);
echo "You\'re going to run out of: ";
foreach ($users as $row) {
  print $row["name"]. ", ";
}
$dbh = null;
}
catch (PDOexception $e) {
echo "Error is: " . $e-> etmessage();
}?>', 'Kitchen | Smartlist');
document.cookie = "NOTIFY_ALREADY_CLOSED=1";
}
}
</script>
<?php 
   }
   ?>
<script>
    // M.toast({ html: 'Failed to connect to server. Please try again' });
</script>
   </body>
</html>
<?php if ($welcome != 1 || isset($_GET['tuts'])) { $donotshowmdl = mysqli_query($mysqli, "UPDATE login SET welcome='1' WHERE id=".$_SESSION['id'].""); echo '
<style>#IUR1{animation: IUR1 .2s forwards;opacity:0;border: 0 !important; -webkit-filter: blur(0.000001px);-webkit-font-smoothing: antialiased;aniamtion-delay: .5s;box-shadow:0 7px 9px -4px rgba(0,0,0,.2),0 14px 21px 2px rgba(0,0,0,.14),0 5px 26px 4px rgba(0,0,0,.12)!important;transform: scale(.9)} @keyframes IUR1 {0% {opacity:0;transform: scale(.9)} 100%{opacity:1;transform: scale(1.1) translateZ(0)}} @media only screen and (max-width: 600px) {#IUR1 {width: 80vw !important}}</style>
<div style="position:fixed;top:0;left:0;width:100%;height:100%;background: rgba(0,0,0,0.3);z-index:99999999999999">
    <div id="IUR1" style="margin: auto;width: 50vw;height: 80vh;background:white;margin-top: 10vh;border-radius: 10px;overflow-y:scroll">
    <img src="https://i.ibb.co/p0q7vRS/Screenshot-2021-03-02-at-12-19-03-PM.png" width="100%" height="250px" style="object-fit:cover;border-radius: 10px;border-bottom-left-radius: 0;border-bottom-right-radius: 0;background-attachment: fixed">
    <h5 class="center">Hi, '.htmlspecialchars($_SESSION['name']).'!</h5>
    <p class="center" style="color: #aaa !important">Welcome to the brand-new Smartlist! <br>We\'ve changed the look and feel of our dashboard so it fits your needs better!</p>
        <div class="container">
            <div class="row" style="text-align:left !important;padding: 0 !important;">
                <div class="col s6">
                    <p> <label> <input type="checkbox" checked="checked" disabled/> <span>Free support via email/chat</span> </label> </p>
                    <p> <label> <input type="checkbox" checked="checked" disabled/> <span>Support Forum</span> </label> </p>
                    <p> <label> <input type="checkbox" checked="checked" disabled/> <span>Todo and Grocery List</span> </label> </p>
                    <p> <label> <input type="checkbox" checked="checked" disabled/> <span>Search your home</span> </label> </p>
                 </div>
                <div class="col s6">
                    <p> <label> <input type="checkbox" checked="checked" disabled/> <span>Encrypted items</span> </label> </p>
                    <p> <label> <input type="checkbox" checked="checked" disabled/> <span>Budget Meter</span> </label> </p>
                    <p> <label> <input type="checkbox" checked="checked" disabled/> <span>Multiple Rooms</span> </label> </p>
                    <p> <label> <input type="checkbox" checked="checked" disabled/> <span>Notifications</span> </label> </p>
                </div>
          </div>
          <center><button class="btn blue waves-effect waves-light" onclick="$(\'#INTRO_1\').tapTarget(\'open\');document.getElementById(\'IUR1\').parentElement.style.display= \'none\'" style="border:0 !important;margin: auto;border-radius: 999999px;line-height: 50px;height: auto;box-shadow:0 5px 5px -3px rgba(0,0,0,.2),0 8px 10px 1px rgba(0,0,0,.14),0 3px 14px 2px rgba(0,0,0,.12)!important">Cool! Let\'s get Started!</button><br><br><a href="http://help.smartlist.ga/" style="color: gray">I would want to read the knowledgebase first</a><br><br></center>
        </div>
    </div>
</div>
  <div class="tap-target" id=\'INTRO_1\' data-target="notification" style="color:white !important;background: black" onclick="$(\'.tap-target\').tapTarget(\'close\');$(this).tapTarget(\'destroy\');$(\'#INTRO_2\').tapTarget(\'open\');">
    <div class="tap-target-content">
      <h5>Notifications</h5>
      <p style="color:white !important">Click here to see the items you are running out!</p>
      <mark>Click next if you want to continue the tutorial</mark>
      <button onclick="$(\'.tap-target\').tapTarget(\'close\');$(this).tapTarget(\'destroy\');$(\'#INTRO_2\').tapTarget(\'open\');" class="btn red">Next</button>
    </div>
  </div>
    <div class="tap-target" id=\'INTRO_2\' data-target="FLOATING_ACTION_BUTTON" style="color:white !important;background: black;z-index: -1 !important">
    <div class="tap-target-content">
      <h5 style=\'text-align:right\'>Add an item</h5>
      <p style="color:white !important;text-align:right;margin-left: 10px;">You can click here to add an item. <br>(You may have to click outside, and then click back here). The Shapes icon represents "Items", the check icon represents "Tasks", and the grocery cart represents "Grocery List" items. <br>To add an item, go ahead and click on the shapes icon. Then, select the room, and add the item. </p>
      <button  onclick="$(\'.tap-target\').tapTarget(\'close\');$(\'#INTRO_2\').tapTarget(\'destroy\');"class="btn red">Cool!!!</button>
    </div>
  </div>
  <script>
  $(\'.tap-target\').tapTarget();
  </script>
'; } ?> <?php if(isset($_GET['query'])) { echo "<script>setTimeout(function(){ showsearch();document.getElementById('search').focus();sm_page('searchresults', this, '');filter() }, 0100);</script>"; } ?>
