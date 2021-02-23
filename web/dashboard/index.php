<?php session_start();
   if(!isset($_SESSION['valid'])) {header('Location: https://smartlist.ga/login');}
   include_once("connection.php");
   try {$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);$stmt = $dbh->query('SELECT * FROM bm WHERE login_id='.$_SESSION['id']);$row_count = $stmt->rowCount();$dbh = null;}
   catch (PDOexception $e) {echo "Error is: " . $e-> etmessage();}
      //ROOMS go to backup.txt for previous version (mysqli_fetch_array) ---------------------------------------------------------------------------------------------------------------------------------------
      $bedroomnotification = mysqli_query($mysqli, "SELECT * FROM bedroom WHERE login_id=".$_SESSION['id']." OR login_id=".$_SESSION['syncid']." ORDER BY id DESC");
      $kitchennotification = mysqli_query($mysqli, "SELECT * FROM products WHERE login_id=".$_SESSION['id']." OR login_id=".$_SESSION['syncid']." ORDER BY id DESC");
      //SESSION VARIABLES ---------------------------------------------------------------------------------------------------------------------------------------
      $notifications = $_SESSION['notifications'];
      $number_notify = $_SESSION['number_notify'];
        try {
        $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $sql = "SELECT * FROM login WHERE id=".$_SESSION['id'];
        $users = $dbh->query($sql);
        foreach ($users as $row) {
        $goal = $row["goal"];
        $welcome = $row['welcome'];
        }
        $dbh = null;
        }
        catch (PDOexception $e) {
        echo "Error is: " . $e-> etmessage();
        }
    ?>
<!--
----------------------------------------------------------------------------------------------------------------

                                                    Hey!
                                        Want to contribute to our site?
                          Go to: https://smartlist.ga/contribute to contribute
                        Github: https://github.com/ManuTheCoder/Smartlist-desktop

----------------------------------------------------------------------------------------------------------------
-->
<!DOCTYPE html>
<html lang="en">
   <head>
      <!--PRELOAD-->
      <link rel="preconnect" href="https://i.ibb.co"> <meta name="mobile-web-app-capable" content="yes"> <meta name="apple-mobile-web-app-status-bar-style" content="#2a1782"> <meta name="apple-mobile-web-app-capable" content="yes"/> <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> <link rel="search" href="https://smartlist.ga/search.xml" type="application/opensearchdescription+xml" title="your home (Smartlist)"/> <link rel="shortcut icon" href="https://i.ibb.co/FDqN0Vh/Screenshot-2021-02-02-at-7-55-08-AM-2.png" type="image/png" /> <link rel="apple-touch-icon" href="https://i.ibb.co/FDqN0Vh/Screenshot-2021-02-02-at-7-55-08-AM-2.png" /> <script src="pwa.js" defer></script> <link rel="manifest" href="manifest.webmanifest"> <script src="https://dragselect.com/ds.min.js"></script> <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
      <title>Dashboard</title>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> <!-- Compiled and minified JavaScript --> <meta name="theme-color" content="#2a1782"> <meta name="title" content="Smartlist - the free home inventory database"> <meta name="description" content="Hey! Have you ever spent so much buying extra groceries which you already have at home? Studies show that people over-buy items which they already have, making them spend hundreds of dollars! Ever wanted to keep track of what you have in your home for free? Smartlist lets you track what's in your home, anywhere, anytime, for free!"> <link rel="preconnect" href="https://fonts.gstatic.com"> <meta property="og:site_name" content="smartlist.ga" /> <meta property="og:title" content="Smartlist" /> <meta property="og:type" content="website" /> <meta property="og:description" content="Hey! Have you ever spent so much buying extra groceries which you already have at home? Studies show that people over-buy items which they already have, making them spend hundreds of dollars! Ever wanted to keep track of what you have in your home for free? Smartlist lets you track what's in your home, anywhere, anytime, for free!" /> <meta name="twitter:card" content="summary_large_image"> <meta name="twitter:site" content="@Smartlist"> <meta name="twitter:title" content="Smartlist"> <meta name="twitter:description" content="Hey! Have you ever spent so much buying extra groceries which you already have at home? Studies show that people over-buy items which they already have, making them spend hundreds of dollars! Ever wanted to keep track of what you have in your home for free? Smartlist lets you track what's in your home, anywhere, anytime, for free!"> <meta name="twitter:domain" content="smartlist.ga"> <meta name="keywords" content="Home, Database, Inventory, free, Smartlist, Smartlist dashboard"> <meta name="robots" content="index, follow"> <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> <meta name="language" content="English">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> 
      <meta name="viewport" content="width=device-width, initial-scale=1">
<?php
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
}
else {
echo '<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>';
}
?>
      <style>
    </style>
    <style>
        .show { z-index: 999999999999999999999999999999999; position: absolute;transition: all .2s; background-color: #fff; padding: 2px; display: block;  box-shadow: 0 2px 4px -1px rgba(0, 0, 0, 0.2), 0 4px 5px 0 rgba(0, 0, 0, 0.14), 0 1px 10px 0 rgba(0, 0, 0, 0.12); animation: ctx .2s forwards; margin: 0;border:0;padding:0; list-style-type: none; list-style: none; width: 200px; transform-origin:top left } hr { border: 0; height: 0; border-top: 1px solid rgba(0, 0, 0, 0.1); border-bottom: 1px solid rgba(255, 255, 255, 0.3); } @keyframes ctx { 0% { transform: scale(0);opacity:0; } 100% {transform: scale(1);opacity:1} } .hide { display: none; } .show li { list-style: none; } .show a { border: 0 !important; display:block; padding: 10px 20px; color: gray; text-decoration: none; text-align:left; }
    </style>
    <link rel="stylesheet" href="style.css">
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
        } );
        <?php } ?>
        </script>
   </head>
   <body>
      <div id="bar" style="display:none"></div>
      <a href="#CONTENT" class="ctnt" style="z-index: 99999999999999999999999999999999999999999">Skip to content</a>
      <nav  style="position:fixed;background: var(--navbar-color) ;z-index:9999;display:none;box-shadow:none !important" id="searchbar">
         <div class="nav-wrapper">
            <form onsubmit="openPage('searchresults',this, '');document.getElementById('bar').style.display='block'; setTimeout(function(){ document.getElementById('bar').style.display = 'none' }, 2000);return false;">
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
               <li onclick="$('#slide-out').scrollTop(0);"><a class=" sidenav-trigger brand-logo left" style="margin-left:0px !important" data-target="slide-out"><i class="material-icons" id="icon">menu</i><span style="font-size: 23px;position: relative;top: -2px;left: -5px;" id="brandlogo">Smartlist</span></a></li>
               <li>
                  <a  id="notification" data-position="bottom" class="right tooltippeda waves-effect waves-light"  data-tooltip='Notifications' onclick='openPage("myDIVa", this, "");brandlogotext.innerHTML = "Inbox"'>
                     <i class="material-icons">notifications</i>
                     <div id="hide" style="background:red;width:10px;height:10px;border-radius:999px;position:relative;top:-20px;left:-10px;margin-top: -24px;margin-right: -10px !important;float:right"></div>
                  </a>
               </li>
               <li><a class="right waves-effect waves-light" onclick="showsearch();document.getElementById('search').focus();"><i class="material-icons">search</i></a></li>
            </ul>
         </div>
      </nav>
      <div id="modal2" class="modal modal-fixed-footer"> <div class="modal-content"> <h4>Heads Up!</h4> <p>Are you sure you want to delete your account???</p> </div> <div class="modal-footer"> <a href="#modal1" class="modal-close waves-effect waves-green btn-flat modal-trigger">Go back</a> <a class="waves-effect waves-light btn red modal-trigger" href="#modal5" class="red btn waves-effect waves-light">Delete My account</a> </div> </div> <div id="bmmodal" class="modal"><div class="modal-content"> <form action="https://smartlist.ga/scalesize/bm/addx.php" method="post" name="form1"> <table width="100%" border="0" class="table"> <tr > <td>Name</td> <td><input type="text" name="name" class="form-control" value="<?php echo date('m/d/Y') ;?>" readonly></td> </tr> <tr> <td>Price you spent</td> <td><input type="text" name="qty" class="form-control"></td> </tr> <tr class="d-none"> <td>Price</td> <td><input type="text" name="price" class="form-control" value="1"></td> </tr> <tr> <td></td> <td><input type="submit" name="Submit" value="Add" class="red btn"></td> </tr> </table> </form> </div> </div> </div> <div id="kitchenmodal" class="modal "> <div class="modal-content"> </div> </div> <div id="pair" class="modal modal-fixed-footer"> <div class="modal-content"> <h4>Heads Up!</h4> <p>Are you sure you want to pair your account? Pairing your account will you see everything in their inventory!</p> </div> <div class="modal-footer"> <a href="#modal1" class="modal-close waves-effect waves-green btn-flat modal-trigger">Go back</a> <a class="waves-effect waves-light btn red modal-trigger modal-close" href="#pair2" class="red btn waves-effect waves-light">Pair my account!</a> </div> </div> <div id="camera" class="modal modal-fixed-footear"> <div class="modal-content"> <div class="logo"> <img class="image waves-effect" alt='image' src="https://i.pinimg.com/originals/51/11/d8/5111d818140cbaef5459ce331151463f.gif" onclick='document.getElementById("myCheck").click();'style="display:block;margin:auto;width:100%" /> <div class="result"> <h2></h2> </div> <div class="capture"> <div class="record waves-effect waves-light" /> <input class="input" type="file" accept="image/*" onchange="handleUpload(this.files);myFunction()" id="myCheck" style="opacity:0;" /> </div> </div> </div> </div> <div class="modal-footer"> <a href="#kitchennmodal" class="modal-close waves-effect waves-green btn-flat modal-trigger">Go back</a> </div> </div> <div id="pair2" class="modal modal-fixed-footer"> <div class="modal-content"> <h4>Pair your account</h4> <br> <form action="pair.php" method="GET"> <input type="text" name="pairingaccountid" placeholder="Login ID..."> <p>To pair, you will need to know the other person's login ID. You can find yours in the settings page</p> </div> <div class="modal-footer"> <button type="submit"class="btn btn-flat waves-effect">Change</button> </form> <a class="waves-effect waves-light btn btn-flat modal-trigger modal-close" href="#modal1" class="red btn waves-effect waves-light">Never mind</a> </div> </div> <div id="budgetmetermodala" class="modal modal-fixed-s  bottom-sheet"  style="width:100%"> <div class="modal-content"> <h4 class="center">Add an item <span class="hide-on-med-and-down">(CTRL S)</span></h4> <div class="collection"> <a onclick="openPage('addkitchen', this, '');setTimeout(function(){ document.getElementById('tags').focus() }, 0500);" class="modal-trigger collection-item waves-effect modal-close" id="kitchentoggle">Kitchen</a> <a href="#" onclick="openPage('bedroom_add', this, '');setTimeout(function(){ openPage('bedroom_add', this, '');document.getElementById('bedroom_name_input').focus() }, 0500);" class="collection-item waves-effect">Bedroom</a> <a href="#"onclick="openPage('bathroom_add', this, '');setTimeout(function(){ openPage('bathroom_add', this, '');document.getElementById('bathroom_name_input').focus() }, 0500);" class="collection-item waves-effect">Bathroom</a> <a href="https://smartlist.ga/dashboard/rooms/garage/add.html" class="collection-item waves-effect">Garage</a> <a href="https://smartlist.ga/dashboard/rooms/family/add.html" class="collection-item waves-effect">Family</a> <a href="https://smartlist.ga/dashboard/rooms/storage/add.html" class="collection-item waves-effect">Storage Room</a> <a href="https://smartlist.ga/dashboard/rooms/dining_room/add.html" class="collection-item waves-effect">Dining Room</a><a href="https://smartlist.ga/dashboard/rooms/camping/add.html" class="collection-item waves-effect">Camping Supplies</a> <a href="https://smartlist.ga/dashboard/rooms/laundry/add.html" class="collection-item waves-effect">Laundry room</a> </div> </div> </div> <div id="modal5" class="modal modal-fixed-footer"> <!--<script src="https://www.google.com/recaptcha/api.js" async defer></script> --> <div class="modal-content"> <h4>Heads Up (again)!</h4> <p>We want to confirm this is you, so please do the reCAPTCHA</p> <div class="g-recaptcha" data-sitekey="6LdSGPAZAAAAAMs85kHIOqrMKV7W_nDcJ-V0n2g7"></div> </div> <div class="modal-footer"> <a href="#!" class="modal-close waves-effect waves-green btn-flat">Go back</a> <a class="waves-effect waves-light btn red modal-trigger" href="#modal3" class="red btn waves-effect waves-light">Delete My account</a> </div> </div> <div id="modal3" class="modal modal-fixed-footer"> <div class="modal-content"> <h4>Are you very, very, very sure?</h4> <p>Don't blame us because we didn't warn you........</p> <ul style="list-style-type:circle !important;"> <li style="list-style-type:circle !important;">Your todos will vanish into thin air</li> <li style="list-style-type:circle !important;">Your inventory will vanish into thin air</li> <li style="list-style-type:circle !important;">Your rooms will vanish into thin air</li> <li style="list-style-type:circle !important;">Your homes will vanish into thin air</li> <li style="list-style-type:circle !important;">You will not be able to ever log in again with these credentials</li> <li style="list-style-type:circle !important;">You will not be able use the desktop or mobile app</li> </ul> </div> <div class="modal-footer"> <a href="#!" class="modal-close waves-effect waves-green btn-flat">That's scary. Never mind</a> <a href="https://smartlist.ga/dashboard/resources/deleted.php?id=<?php echo $_SESSION['id'] ?>" class="red btn waves-effect waves-light">I choose to permanently delete my account</a> </div> </div> <div id="credits" class="modal modal-fixed-footer"> <div class="modal-content"> <h4>Credits</h4> <ul> <li>Materialize</li> <li>InfinityFree</li> <li>CodePen</li> <li>Cloudflare</li> <li>SQL</li> <li>Materialize</li> <li>Materialize</li> <li>Webestools - for the forum</li> <li><a href="https://blog.chapagain.com.np/very-simple-add-edit-delete-view-in-php-mysql/">Very Simple Add, Edit, Delete, View (CRUD) in PHP & MySQL [Beginner Tutorial]</a></li> <h5>People</h5> </ul> </div> <div class="modal-footer"> <a href="#modal1" class="modal-close waves-effect btn-flat modal-trigger">ok</a> </div> </div> <div id="security" class="modal modal-fixed-footer"> <div class="modal-content"> <h4>Privacy</h4> <p>Yes, your data is encrypted end-to-end. We hash your items, so even if a hacker gets access to the database, it will be rendered useless! We also use PHP PDO, which is very secure to SQL injection attacks.</p> </div> <div class="modal-footer"> <a href="#modal1" class="modal-close waves-effect btn-flat modal-trigger">ok</a> </div> </div> <div id="avarar" class="modal modal-fixed-footer"> <div class="modal-content"> <a href="#user"><img class="materialboxed" alt='image' class="circle" src="<?php echo $_SESSION['avatar'] ?>" style="display:block;margin:auto;width:80px;"></a><br> <div class="row"> <div class="col s6 center"> <h4 class="center">Upload an image</h4> <a href="https://smartlist.ga/playground/imgbb.php" class="btn btn-large red center">Upload an image</a> </div> <div class="col s6"> <h4 class="center">Or paste an image URL</h4> <form action="avatar.php" method="GET"><input type="text" name="pairingaccountid" placeholder="Avatar (Image URL)"></form> </div> </div> </div> <div class="modal-footer"> <button type="submit"class="btn btn-flat waves-effect">Change</button> <a href="#modal1" class="modal-close waves-effect btn-flat modal-trigger">Cancel</a> </div> </div>
      <ul id="slide-out" class="sidenav sidenav-fixed">
         <li>
            <div class="user-view">
               <div class="background">
                  <img src="https://www.colorbook.io/imagecreator.php?hex=41308a&width=1920&height=1080&text=%201920x1080" id ="imageid" alt='Background'>
               </div>
               <a href="#user"><img class="circle materialboxed" src="<?php echo $_SESSION['avatar'] ?>" alt='image'></a><!--https://icon-library.com/images/google-user-icon/google-user-icon-21.jpg-->
               <details>
                  <summary><span class="white-text name"><?php echo $_SESSION['name'] ?></span></summary>
                  <p style="background: white;padding:10px;">Not you? <a href="https://smartlist.ga/dashboard/logout.php">Logout</a></p>
               </details>
               <a href="#email"><span class="white-text email"><?php echo $_SESSION['email'] ?></span></a>
               <!-- Modal Trigger
                  <a class="waves-effect waves-light btn modal-trigger btn-flat" href="#modal1" style="color:white;margin:0;">Profile</a> -->
            </div>
         </li>
         <li><a class="waves-effect sidenav-close" href="javascript:void(0)" onclick="openPage('News', this, );brandlogotext.innerHTML = 'Smartlist';page_title = 'News';" id="defaultOpen"><i class="material-icons">home</i>Home   </a></li>
         <li style="height:0;opacity:0;width:0;"><a class="waves-effect"onclick="openPage('loader', this, );" ><i class="material-icons">home</i>Home   </a></li>
         <li>
            <div class="divider"></div>
         </li>
         <li><a class="subheader">Rooms</a></li>
         <li><a onclick="openPage('addkitchen', this, '');setTimeout(function(){ document.getElementById('tags').focus() }, 0500);"  style="float:right;padding-right:0;"  class=" waves-effect"><i class="material-icons">add</i></a><a class="waves-effect" onclick="openPage('Contact', this, '');brandlogotext.innerHTML = 'Kitchen';"><i class="material-icons">kitchen</i>Kitchen</a></li>
         <li><a class="waves-effect sidenav-close" onclick="openPage('Home', this, '');brandlogotext.innerHTML = 'Bedroom'"><i class="material-icons">bed</i>Bedroom</a></li>
         <li><a class="waves-effect sidenav-close" onclick="openPage('bathroom', this, '');brandlogotext.innerHTML = 'Bathroom'"><i class="material-icons">wc</i>Bathroom</a></li>
         <li><a class="waves-effect sidenav-close" onclick="openPage('About', this, '');brandlogotext.innerHTML = 'Garage'"><i class="material-icons">directions_car</i>Garage</a></li>
         <li><a class="waves-effect sidenav-close" onclick="openPage('family', this, '');brandlogotext.innerHTML = 'Family Room'"><i class="material-icons">tv</i>Family Room</a></li>
         <li><a class="waves-effect sidenav-close" onclick="openPage('storage', this, '');brandlogotext.innerHTML = 'Storage Room'"><i class="material-icons">domain</i>Storage room</a></li>
         <li><a class="waves-effect sidenav-close" onclick="openPage('dining_room', this, '');brandlogotext.innerHTML = 'Dining Room'"><i class="material-icons">local_dining</i>Dining Room</a></li>
         <li><a class="waves-effect sidenav-close" onclick="openPage('laundryroom', this, '');brandlogotext.innerHTML = 'Laundry Room'"><i class="material-icons">local_laundry_service</i>Laundry Room</a></li>
         <li><a class="waves-effect sidenav-close" onclick="openPage('cs', this, '');brandlogotext.innerHTML = 'Camping Supplies'"><i class="material-icons">nature_people</i>Camping Supplies</a></li>
         <li>
            <div class="divider"></div>
         </li>
         <li><a class="subheader">Other</a></li>
         <li><a class="waves-effect sidenav-close" onclick="openPage('gl', this, '');brandlogotext.innerHTML = 'Grocery List'"><i class="material-icons">local_grocery_store</i>Grocery list</a></li>
         <li><a class="waves-effect sidenav-close" onclick="openPage('todo_list', this, '');brandlogotext.innerHTML = 'Todo List'"><i class="material-icons">task</i>My todo list</a></li>
         <li><a class="waves-effect sidenav-close" onclick="openPage('budgetmetermodal', this, '');brandlogotext.innerHTML = 'Budget Meter'"><i class="material-icons">attach_money</i>My budget meter</a></li>
         <li>
            <div class="divider">
            </div>
         </li>
         <li><a class="subheader">Profile</a></li>
         <li><a class="waves-effect " href="#modal1"onclick="openPage('myDIVa', this, '');brandlogotext.innerHTML = 'Inbox'"><i class="material-icons">inbox</i>Notifications <span id="badge" class="badge"></span>
            </a>
         </li>
         <li><a class="waves-effect sidenav-close"onclick="openPage('modal1', this, '');brandlogotext.innerHTML = 'Settings'"><i class="material-icons">settings</i>Settings</a></li>
         <li><a class="waves-effect" onclick="openPage('modal1', this, '');brandlogotext.innerHTML = 'Settings'"><i class="material-icons">person</i>My Account</a></li>
         <li><a class="waves-effect" href="logout.php"><i class="material-icons">logout</i>Logout</a></li>
         <li>
            <div class="divider"></div>
         </li>
         <li><a class="subheader">Questions? </a></li>
         <li><a class="waves-effect  " href="https://community.smartlist.ga/" target="_blank" ><i class="material-icons">forum</i>Community Forum <span class="badge">New!</span></a></li>
         <li><a class="waves-effect  " href="https://knowledgebase.smartlist.ga/" target="_blank" ><i class="material-icons">book</i>Knowledge Base <span class="badge">New!</span></a></li>
      </ul>
      <div class="fixed-action-btn" id="fab">
         <a class="btn-floating btn-large waves-effect waves-light FLOATING_ACTION_BUTTON" style="background:var(--navbar-color);z-index:99999999999999999999999999999999999999 !important;border-radius: 999999999px !important" id="ienqfj">
         <i class="large material-icons" style="color:white !important">add</i>
         </a>
         <ul>
            <li data-position="left" data-tooltip="Task" class="tooltipped"><a class="btn-floating pink " href="https://smartlist.ga/dashboard/rooms/todo/add.html"><i class="material-icons" style="color:white !important">task</i></a></li>
            <li data-position="left" data-tooltip="Item" class="tooltipped"><a class="btn-floating pink modal-trigger" href="#budgetmetermodala"><i class="material-icons" style="color:white !important" onclick="//document.querySelector('#itemdialog').showModal()">shopping_basket</i></a></li>
            <li data-position="left" data-tooltip="Grocery List" class="tooltipped"> <a href="https://smartlist.ga/dashboard/rooms/grocerylist/add.html" class="text-center float-right btn-floating pink" ><i class="material-icons" style="color:white !important">add_shopping_cart</i></a></li>
         </ul>
      </div>
      <div class="hide" id="rmenu">
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
      <div id="CONTENT" tabindex="0" style="outline: 0;">
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
                          echo "<tr id='https://smartlist.ga/dashboard/rooms/laundry/tr_".$row['id']."' onclick=\"item('".$row['id']."', '".$row['name']."', '".$row['qty']."', '".$row['price']."', 'https://smartlist.ga/dashboard/rooms/laundry/', 'laundryroom')\">";
                          print "<td>".$row["name"] . "</td><td>" . $row["qty"] ."";
                          if ($row['login_id'] != $_SESSION['id']) {
                                   echo "<span clas='badge red' style='float:right;color:white;padding: 4px;background: #2BBBAD !Important'>Synced</span>";
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
<?php try { $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); $sql = "SELECT * FROM bm WHERE login_id=".$_SESSION['id']." OR login_id= ".$_SESSION['syncid']; $users = $dbh->query($sql); echo '<table class="table"> <tr> <td>Name</td> <td>Quantity</td> <td class="d-none">Price</td> <td style="width:10%">Actions</td> </tr>'; foreach ($users as $row) { echo "<tr>"; print "<td>".$row["name"] . "</td><td>" . $row["qty"] .""; if ($row['login_id'] != $_SESSION['id']) { echo "<span clas='badge red' style='float:right;color:white;padding: 4px;background: #2BBBAD !Important'>Synced</span>"; } echo "</td><td>"; echo " <div class=\"dropdown\" tabindex='0'> <a class=\"dropbtn\"><i class='material-icons'>more_vert</i></a> <div class=\"dropdown-contenta\"> <a href=\"https://smartlist.ga/dashboard/rooms/bedroom/edit.php?id=$row[id]\" class='waves-effect'><i class='material-icons'>edit</i>Edit</a> <a onclick='$(\"#div1\").load(\"https://smartlist.ga/scalesize/bm/delete.php?id=$row[id]\");this.parentElement.parentElement.parentElement.parentElement.style.display=\"none\";' class='waves-effect'><i class='material-icons'>delete</i>Delete</a> </div> </div></td> "; } $dbh = null; } catch (PDOexception $e) { echo "Error is: " . $e-> etmessage(); } ?>
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
                          echo "<tr id='https://smartlist.ga/dashboard/rooms/camping/tr_".$row['id']."' onclick=\"item('".$row['id']."', '".$row['name']."', '".$row['qty']."', '".$row['price']."', 'https://smartlist.ga/dashboard/rooms/camping/', 'camping')\">";
                          print "<td>".$row["name"] . "</td><td>" . $row["qty"] ."";
                          if ($row['login_id'] != $_SESSION['id']) {
                                   echo "<span clas='badge red' style='float:right;color:white;padding: 4px;background: #2BBBAD !Important'>Synced</span>";
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
                                 <!--<td style="width:10%">Actions</td>-->
                                </tr>';
                      foreach ($users as $row) {
                          echo "<tr id='https://smartlist.ga/dashboard/rooms/bedroom/tr_".$row['id']."' onclick=\"item('".$row['id']."', '".$row['name']."', '".$row['qty']."', '".$row['price']."', 'https://smartlist.ga/dashboard/rooms/bedroom/', 'bedroom')\">";
                          print "<td>".$row["name"] . "</td><td>" . $row["qty"] ."";
                          if ($row['login_id'] != $_SESSION['id']) {
                                   echo "<span clas='badge red' style='float:right;color:white;padding: 4px;background: #2BBBAD !Important'>Synced</span>";
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
            <!--SETTINGS MODAL-->
            <div class="container">
               <div class="smediapadding">
                  <a href="#user"><img alt='image' class="materialboxed" class="circle" src="<?php echo $_SESSION['avatar'] ?>" style="float:right;width:80px;border-radius:9999px"></a>
                  <!-- Tap Target Structure -->
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
                              <a href="https://smartlist.ga/dashboard/reset-password.php" class="waves-effect collection-item modal-trigger  modal-close">Change your Password</a>
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
                        <div class="collapsible-header waves-effect"><i class="material-icons">notifications</i>Notifications</div>
                        <div class="collapsible-body">
                           <ul class="collection">
                              <button onclick="notifyMe();desktop_ping('Success! Notifications are enabled!', 'Smartlist Notificatons')"class="btn red" type="button">Test Notifications!</button>
                              <a class="collection-item">
                                 Notifications
                                 <div class="switch" style="float:right">
                                    <label>
                                    <input type="checkbox" name="notificationssettings" value="on" <?php if ($notifications != "on") {  } else{echo "checked";}?>>
                                    <span class="lever"></span>
                                    </label>
                                 </div>
                              </a>
                              <a class="collection-item" onclick="$('.modal').modal('close');$('#key').modal('open');">Keyboard Shortcuts</a> 
                              <a class="collection-item">
                                 <div class="row">
                                    <div class="col s10">
                                       Only remind me when I have anything less than <u><?php echo "$number_notify" ?> items</u>
                                    </div>
                                    <div class="col s2">
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
               <?php if($row_count == 0){ echo "<br><br><br><br><br><br><br><br><h6 class='center' style='margin: 0;color: gray'>No data in budget meter to display<br><a href='https://homebasedocs.gitbook.io/docs/errors/no-data-in-budget-meter-to-display' style='color: #aaa' class='center'>More Info</a></h6>";} ?><?php if($row_count > 0){?> 
               <canvas id="myChart" style="width: 100%;height:200px !important;background: background:var(--chart-color) !important;" class="ree"></canvas>
               <?php }?>
            </div>
            <div class="row" style="margin:0 !important">
               <div class="col s6 hide-on-small-only" style="margin:0 !important">
                  <p class='center'>Todo </p>
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
                                 </a> <a onclick='$(\"#div1\").load(\"https://smartlist.ga/dashboard/rooms/todo/delete.php?id=$todo_listx[id]\");this.parentElement.parentElement.style.display=\"none\";'  class='btn btn-flat waves-effect tooltipped'style='z-index: 0 !important;margin:0 !important' data-tooltip='Delete'>
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
                     .new:after{display:none}.card{background:rgba(255,255,255,0)!important}.card-reveal{background:var(--bg-color)!important}.demo{margin:auto;width:100%;height:600px;position:relative;left:-50px;margin-top:20px;background-image:radial-gradient(circle 0 at 0 0,#fff 99%,transparent 0),linear-gradient(100deg,transparent,var(--bg-color) 50%,transparent 100%),linear-gradient(var(--skeleton-color) 20px,transparent 0),linear-gradient(var(--skeleton-color) 20px,transparent 0);background-repeat:repeat-y;background-size:90px 90px,100px 90px,150px 90px,100% 90px,500px 90px,100% 90px;background-position:0 0,0 0,120px 0,120px 40px,120px 80px,120px 120px;animation:shine 2s infinite}@keyframes shine{to{background-position:0 0,150% 0,120px 0,120px 40px,120px 80px,120px 120px}}
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
                                             </a> <a onclick='$(\"#div1\").load(\"https://smartlist.ga/dashboard/rooms/grocerylist/delete.php?id=$res[id]\");this.parentElement.parentElement.style.display=\"none\";' data-tooltip='Delete'  class='tooltipped btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
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
               <div class="col s12" style="margin:0 !important">
                  <ul class="tabs tabs-fixed-width" style="margin:0 !important">
                     <li class="tab col s3 active"><a href="#test1" class="active">Todo</a></li>
                     <li class="tab col s3"><a href="#test4">Grocery List</a></li>
                  </ul>
               </div>
               <div id="test1" class="col s12 container" >
                  <div style="padding: 30px;">
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
                                    </a> <a onclick='$(\"#div1\").load(\"https://smartlist.ga/dashboard/rooms/todo/delete.php?id=$todo_listx[id]\");this.parentElement.parentElement.style.display=\"none\";'  class='btn btn-flat waves-effect tooltipped'style='z-index: 0 !important;margin:0 !important' data-tooltip='Delete'>
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
               </div>
               <div id="test4" class="col s12" style="padding: 30px;">
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
                                             </a> <a onclick='$(\"#div1\").load(\"https://smartlist.ga/dashboard/rooms/grocerylist/delete.php?id=$res[id]\");this.parentElement.parentElement.style.display=\"none\";' data-tooltip='Delete'  class='tooltipped btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
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
                         echo "<li class=\"collection-item waves-effect\" onclick=\"openPage('gl', this, '');M.toast({html: 'Grocery List'})\"><a>" . $grocerylistsearchitem['name'] . "<span class=\"new badge red\">Grocery List</span><span class=\"new badge red\">" . $grocerylistsearchitem['qty'] . "</span></a></li>";
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
                            echo "<li class=\"collection-item waves-effect\" onclick=\"openPage('About', this, '');M.toast({html: 'Garage'})\"><a>" . $row['name'] . "<span class=\"new badge green\">Garage</span><span class=\"new badge green\">" . $row['qty'] . "</span></a></li>";
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
                            echo "<li class=\"collection-item waves-effect\" onclick=\"openPage('Contact', this, '');M.toast({html: 'Kitchen'})\"><a>" . $kitchensearchitem['name'] . "<span class=\"new badge blue\">Kitchen</span><span class=\"new badge blue\">" . $kitchensearchitem['qty'] . "</span></a></li>";
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
                            echo "<li class=\"collection-item waves-effect\" onclick=\"openPage('bathroom', this, '');M.toast({html: 'Bathroom'})\"><a>" . $bathroomsearchitem['name'] . "<span class=\"new badge green\" style=\"background: #7b1fa2 !important\">Bathroom</span><span class=\"new badge green\" style=\"background: #7b1fa2 !important\">" . $bathroomsearchitem['qty'] . "</span></a></li>";
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
                            echo "<li class=\"collection-item waves-effect\" onclick=\"openPage('storage', this, '');M.toast({html: 'Storage Room'})\"><a>" . $storagesearchitem['name'] . "<span class=\"new badge green\" style=\"background: #d81b60 !important\">Storage</span><span class=\"new badge green\" style=\"background: #d81b60 !important\">" . $storagesearchitem['qty'] . "</span></a></li>";
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
                            echo "<li class=\"collection-item waves-effect\" onclick=\"openPage('Home', this, '');M.toast({html: 'Bedroom'})\"><a>" . $bedroomsearchitem['name'] . "<span class=\"new badge green\" style=\"background: #00bcd4 !important\">Bedroom</span><span class=\"new badge green\" style=\"background: #00bcd4 !important\">" . $bedroomsearchitem['qty'] . "</span></a></li>";
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
         <div id="myDIVa" class="tabcontent">
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
<div id="kitchen_cat" class="tabcontent"> <div class="row container"><h6 class="center">Categories</h6><div class="col m6 s12"> <ul class="collapsible"> <li> <div class="collapsible-header"><i class="material-icons">local_dining</i>Cutlery</div> <div class="collapsible-body"> <?php try { $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); $sql = "SELECT * FROM products WHERE login_id=".$_SESSION['id']." AND `price` = 'Cutlery'"; $users = $dbh->query($sql); echo '<table class="table"><h4 class="center">Cutlery</h4> <tr> <td>Name</td> <td>Quantity</td> <td class="d-none">Price</td> <td style="width:10%">Actions</td> </tr> '; foreach ($users as $row) { echo "<tr class='draggables'>"; print "<td>".$row["name"] . "</td><td>" . $row["qty"] .""; if ($row['login_id'] != $_SESSION['id']) { echo "<span clas='badge red' style='float:right;color:white;padding: 4px;background: #2BBBAD !Important'>Synced</span>"; } echo "</td><td>"; echo " <div class=\"dropdown\" tabindex='0'> <a class=\"dropbtn\"><i class='material-icons'>more_vert</i></a> <div class=\"dropdown-contenta\"> <a href=\"edit.php?id=$row[id]\" class='waves-effect'><i class='material-icons'>edit</i>Edit item</a> <a href='https://smartlist.ga/dashboard/rooms/share/?name=".$row['name']."&personname=".$_SESSION['name']."&itemqty=".$row['qty']."&room=kitchen&id=".$row['id']."&new=true' class='waves-effect'><i class='material-icons'>share</i>Share <span class='badge right'>New</a> <a target='_blank' href='https://www.google.com/search?q=recipes+with+".urlencode($row['name'])."' class='waves-effect'><i class='material-icons'>whatshot</i>Find a recipe</a> <a onclick='toast(\"".$row['name']."\", \"".$row["qty"]."\");$(\"#div1\").load(\"https://smartlist.ga/dashboard/delete.php?id=$row[id]\");this.parentElement.parentElement.parentElement.parentElement.style.display=\"none\";' class='waves-effect'><i class='material-icons'>delete</i>Delete item</a> </div> </div></td> "; } $dbh = null; } catch (PDOexception $e) { echo "Error is: " . $e-> etmessage(); } ?> </table></div> </div></li> </ul> <div class="col m6 s12"> <ul class="collapsible"> <li> <div class="collapsible-header"><i class="material-icons">filter_drama</i>Fruits &amp; Veggies</div> <div class="collapsible-body"> <?php try { $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); $sql = "SELECT * FROM products WHERE login_id=".$_SESSION['id']." AND `price` = 'Fruits, Veggies, etc.'"; $users = $dbh->query($sql); echo '<table class="table"><h4 class="center">Fruits, Veggies, etc.</h4> <tr> <td>Name</td> <td>Quantity</td> <td class="d-none">Price</td> <td style="width:10%">Actions</td> </tr> '; foreach ($users as $row) { echo "<tr class='draggables'>"; print "<td>".$row["name"] . "</td><td>" . $row["qty"] .""; if ($row['login_id'] != $_SESSION['id']) { echo "<span clas='badge red' style='float:right;color:white;padding: 4px;background: #2BBBAD !Important'>Synced</span>"; } echo "</td><td>"; echo " <div class=\"dropdown\" tabindex='0'> <a class=\"dropbtn\"><i class='material-icons'>more_vert</i></a> <div class=\"dropdown-contenta\"> <a href=\"edit.php?id=$row[id]\" class='waves-effect'><i class='material-icons'>edit</i>Edit item</a> <a href='https://smartlist.ga/dashboard/rooms/share/?name=".$row['name']."&personname=".$_SESSION['name']."&itemqty=".$row['qty']."&room=kitchen&id=".$row['id']."&new=true' class='waves-effect'><i class='material-icons'>share</i>Share <span class='badge right'>New</a> <a target='_blank' href='https://www.google.com/search?q=recipes+with+".urlencode($row['name'])."' class='waves-effect'><i class='material-icons'>whatshot</i>Find a recipe</a> <a onclick='toast(\"".$row['name']."\", \"".$row["qty"]."\");$(\"#div1\").load(\"https://smartlist.ga/dashboard/delete.php?id=$row[id]\");this.parentElement.parentElement.parentElement.parentElement.style.display=\"none\";' class='waves-effect'><i class='material-icons'>delete</i>Delete item</a> </div> </div></td> "; } $dbh = null; } catch (PDOexception $e) { echo "Error is: " . $e-> etmessage(); } ?> </table></div> </div></li> </ul> <div class="col m6 s12"> <ul class="collapsible"> <li> <div class="collapsible-header"><i class="material-icons">filter_drama</i>Pots and Pans</div> <div class="collapsible-body"> <?php try { $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); $sql = "SELECT * FROM products WHERE login_id=".$_SESSION['id']." AND `price` = 'Pots and Pans'"; $users = $dbh->query($sql); echo '<table class="table"><h4 class="center">Pots and Pans</h4> <tr> <td>Name</td> <td>Quantity</td> <td class="d-none">Price</td> <td style="width:10%">Actions</td> </tr> '; foreach ($users as $row) { echo "<tr class='draggables'>"; print "<td>".$row["name"] . "</td><td>" . $row["qty"] .""; if ($row['login_id'] != $_SESSION['id']) { echo "<span clas='badge red' style='float:right;color:white;padding: 4px;background: #2BBBAD !Important'>Synced</span>"; } echo "</td><td>"; echo " <div class=\"dropdown\" tabindex='0'> <a class=\"dropbtn\"><i class='material-icons'>more_vert</i></a> <div class=\"dropdown-contenta\"> <a href=\"edit.php?id=$row[id]\" class='waves-effect'><i class='material-icons'>edit</i>Edit item</a> <a href='https://smartlist.ga/dashboard/rooms/share/?name=".$row['name']."&personname=".$_SESSION['name']."&itemqty=".$row['qty']."&room=kitchen&id=".$row['id']."&new=true' class='waves-effect'><i class='material-icons'>share</i>Share <span class='badge right'>New</a> <a target='_blank' href='https://www.google.com/search?q=recipes+with+".urlencode($row['name'])."' class='waves-effect'><i class='material-icons'>whatshot</i>Find a recipe</a> <a onclick='toast(\"".$row['name']."\", \"".$row["qty"]."\");$(\"#div1\").load(\"https://smartlist.ga/dashboard/delete.php?id=$row[id]\");this.parentElement.parentElement.parentElement.parentElement.style.display=\"none\";' class='waves-effect'><i class='material-icons'>delete</i>Delete item</a> </div> </div></td> "; } $dbh = null; } catch (PDOexception $e) { echo "Error is: " . $e-> etmessage(); } ?> </table></div> </div></li> </ul> <div class="col m6 s12"> <ul class="collapsible"> <li> <div class="collapsible-header"><i class="material-icons">filter_drama</i>Bottles and Cups</div> <div class="collapsible-body"> <?php try { $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); $sql = "SELECT * FROM products WHERE login_id=".$_SESSION['id']." AND `price` = 'Bottles and Cups'"; $users = $dbh->query($sql); echo '<table class="table"><h4 class="center">Bottles and Cups</h4> <tr> <td>Name</td> <td>Quantity</td> <td class="d-none">Price</td> <td style="width:10%">Actions</td> </tr> '; foreach ($users as $row) { echo "<tr class='draggables'>"; print "<td>".$row["name"] . "</td><td>" . $row["qty"] .""; if ($row['login_id'] != $_SESSION['id']) { echo "<span clas='badge red' style='float:right;color:white;padding: 4px;background: #2BBBAD !Important'>Synced</span>"; } echo "</td><td>"; echo " <div class=\"dropdown\" tabindex='0'> <a class=\"dropbtn\"><i class='material-icons'>more_vert</i></a> <div class=\"dropdown-contenta\"> <a href=\"edit.php?id=$row[id]\" class='waves-effect'><i class='material-icons'>edit</i>Edit item</a> <a href='https://smartlist.ga/dashboard/rooms/share/?name=".$row['name']."&personname=".$_SESSION['name']."&itemqty=".$row['qty']."&room=kitchen&id=".$row['id']."&new=true' class='waves-effect'><i class='material-icons'>share</i>Share <span class='badge right'>New</a> <a target='_blank' href='https://www.google.com/search?q=recipes+with+".urlencode($row['name'])."' class='waves-effect'><i class='material-icons'>whatshot</i>Find a recipe</a> <a onclick='toast(\"".$row['name']."\", \"".$row["qty"]."\");$(\"#div1\").load(\"https://smartlist.ga/dashboard/delete.php?id=$row[id]\");this.parentElement.parentElement.parentElement.parentElement.style.display=\"none\";' class='waves-effect'><i class='material-icons'>delete</i>Delete item</a> </div> </div></td> "; } $dbh = null; } catch (PDOexception $e) { echo "Error is: " . $e-> etmessage(); } ?> </table></div> </div></li> </ul> <div class="col m6 s12"> <ul class="collapsible"> <li> <div class="collapsible-header"><i class="material-icons">filter_drama</i>Bowls and Plates</div> <div class="collapsible-body"> <?php try { $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); $sql = "SELECT * FROM products WHERE login_id=".$_SESSION['id']." AND `price` = 'Bowls and Plates'"; $users = $dbh->query($sql); echo '<table class="table"><h4 class="center">Bowls and Plates</h4> <tr> <td>Name</td> <td>Quantity</td> <td class="d-none">Price</td> <td style="width:10%">Actions</td> </tr> '; foreach ($users as $row) { echo "<tr class='draggables'>"; print "<td>".$row["name"] . "</td><td>" . $row["qty"] .""; if ($row['login_id'] != $_SESSION['id']) { echo "<span clas='badge red' style='float:right;color:white;padding: 4px;background: #2BBBAD !Important'>Synced</span>"; } echo "</td><td>"; echo " <div class=\"dropdown\" tabindex='0'> <a class=\"dropbtn\"><i class='material-icons'>more_vert</i></a> <div class=\"dropdown-contenta\"> <a href=\"edit.php?id=$row[id]\" class='waves-effect'><i class='material-icons'>edit</i>Edit item</a> <a href='https://smartlist.ga/dashboard/rooms/share/?name=".$row['name']."&personname=".$_SESSION['name']."&itemqty=".$row['qty']."&room=kitchen&id=".$row['id']."&new=true' class='waves-effect'><i class='material-icons'>share</i>Share <span class='badge right'>New</a> <a target='_blank' href='https://www.google.com/search?q=recipes+with+".urlencode($row['name'])."' class='waves-effect'><i class='material-icons'>whatshot</i>Find a recipe</a> <a onclick='toast(\"".$row['name']."\", \"".$row["qty"]."\");$(\"#div1\").load(\"https://smartlist.ga/dashboard/delete.php?id=$row[id]\");this.parentElement.parentElement.parentElement.parentElement.style.display=\"none\";' class='waves-effect'><i class='material-icons'>delete</i>Delete item</a> </div> </div></td> "; } $dbh = null; } catch (PDOexception $e) { echo "Error is: " . $e-> etmessage(); } ?> </table></div> </div></li> </ul> </div> </div>
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
                           <div class="container"><button class=" btn red" onclick="openPage(\'kitchen_cat\', this, \'\')">Category mode</button><div class="right search"><input type="search" style="display:none" id="kitchen_search" placeholder="Search..."></div></div>
                             <tr>
                              <td>Name</td>
                              <td>Quantity</td>
                              <!--<td style="width:10%">Actions</td>-->
                             </tr>';
                   foreach ($users as $row) {
                       echo "<tr class='draggables' id='tr_".$row['id']."' onclick=\"item('".$row['id']."', '".$row['name']."', '".$row['qty']."', '".$row['price']."', '', 'kitchen')\">";
                       print "<td>".htmlspecialchars($row["name"]) . "</td><td>" . htmlspecialchars($row["qty"]) ."";
                       if ($row['login_id'] != $_SESSION['id']) {
                                echo "<span clas='badge red' style='float:right;color:white;padding: 4px;background: #2BBBAD !Important'>Synced</span>";
                       }
                       echo "</td></tr>";
                    /*   echo " <td><div class=\"dropdown\" tabindex='0'>
                              <a class=\"dropbtn\"><i class='material-icons'>more_vert</i></a>
                              <div class=\"dropdown-contenta\">
                              <a href=\"edit.php?id=$row[id]\" class='waves-effect'><i class='material-icons'>edit</i>Edit item</a>
                              <a href='https://smartlist.ga/dashboard/rooms/share/?name=".$row['name']."&personname=".$_SESSION['name']."&itemqty=".$row['qty']."&room=kitchen&id=".$row['id']."&new=true' class='waves-effect'><i class='material-icons'>share</i>Share <span class='badge right'>New</a>
                              <a target='_blank' href='https://www.google.com/search?q=recipes+with+".urlencode($row['name'])."' class='waves-effect'><i class='material-icons'>whatshot</i>Find a recipe</a>
                              <a onclick='toast(\"".$row['name']."\", \"".$row["qty"]."\");$(\"#div1\").load(\"https://smartlist.ga/dashboard/delete.php?id=$row[id]\");this.parentElement.parentElement.parentElement.parentElement.style.display=\"none\";' class='waves-effect'><i class='material-icons'>delete</i>Delete item</a>
                              </div>
                              </div></td>
                              </tr>
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
         <nav style="position:fixed;background: #212121;z-index:10000;top:0;display:none;overflow:hidden" id="secondary_nav">
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo left hide-on-large-only" onclick="back();" style="margin: 0 !important"><i class="material-icons">arrow_back</i> <span style="font-size: 20px;position: relative;top: -3px;">Item Details</span></a>
      <ul class="right">
        <li><a href="#" id="nav_delete" class="waves-effect waves-light"><i class="material-icons">delete</i></a></li>
        <li><a href="#" id="nav_edit" class="waves-effect waves-light"><i class="material-icons">edit</i></a></li>
      </ul>
    </div>
  </nav>
         <div id="item_popup" class="tabcontent">
             <div class="container">
             <p class="flow-text" style="margin-bottom:0;" id="item_title">Title</p>
             <p class="flow-text" style="margin-top:0;"id="item_qty">Title</p>
             <p class="flow-text" id="item_desc">Desc (tags)</p>
             <div id="ERR_VIEW_ONLY" style="display:none"><blockquote>View-only mode is set for this item automatically when you create one. Please refresh to edit/delete this item</blockquote></div>
             <a href="javascript:void(0)" onclick="back();" class="hide-on-small-only btn red">Back</a>
            <div class="collection">
                    <a href="#!" class="collection-item waves-effect" id="action_edit">Edit</a>
                    <a href="#!" class="collection-item waves-effect" id="action_share" target="_blank">Share</a>
                    <a href="#!" class="collection-item waves-effect" id="action_delete">Delete</a>
                    <a href="#!" class="collection-item waves-effect" id="action_recipe" target="_blank" style="visibility:hidden;height:0;padding:0;">Find a recipe</a>
            </div>
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
                          echo "<tr id='https://smartlist.ga/dashboard/rooms/dining_room/tr_".$row['id']."' onclick=\"item('".$row['id']."', '".$row['name']."', '".$row['qty']."', '".$row['price']."', 'https://smartlist.ga/dashboard/rooms/dining_room/', 'dining_room')\">";
                          print "<td>".$row["name"] . "</td><td>" . $row["qty"] ."";
                          if ($row['login_id'] != $_SESSION['id']) {
                                   echo "<span clas='badge red' style='float:right;color:white;padding: 4px;background: #2BBBAD !Important'>Synced</span>";
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
                          echo "<tr id='https://smartlist.ga/dashboard/rooms/family/tr_".$row['id']."' onclick=\"item('".$row['id']."', '".$row['name']."', '".$row['qty']."', '".$row['price']."', 'https://smartlist.ga/dashboard/rooms/family/', 'family')\">";
                          print "<td>".$row["name"] . "</td><td>" . $row["qty"] ."";
                          if ($row['login_id'] != $_SESSION['id']) {
                                   echo "<span clas='badge red' style='float:right;color:white;padding: 4px;background: #2BBBAD !Important'>Synced</span>";
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
                        //   bathroom_table_var
                      echo '<table class="table"  id="bathroom_table">
                                <tr>
                                 <td>Name</td>
                                 <td>Quantity</td>
                                 <td class="d-none">Price</td>
                                 <!--<td style="width:10%">Actions</td>-->
                                </tr>';
                      foreach ($users as $row) {
                          echo "<tr id='https://smartlist.ga/dashboard/rooms/bathroom/tr_".$row['id']."' onclick=\"item('".$row['id']."', '".$row['name']."', '".$row['qty']."', '".$row['price']."', 'https://smartlist.ga/dashboard/rooms/bathroom/', 'bathroom')\">";
                          print "<td>".$row["name"] . "</td><td>" . $row["qty"] ."";
                          if ($row['login_id'] != $_SESSION['id']) {
                                   echo "<span clas='badge red' style='float:right;color:white;padding: 4px;background: #2BBBAD !Important'>Synced</span>";
                          }
                          echo "</td>";
                          /*echo "<td> <div class=\"dropdown\" tabindex='0'>
                                 <a class=\"dropbtn\"><i class='material-icons'>more_vert</i></a>
                                 <div class=\"dropdown-contenta\">
                                 <a href=\"https://smartlist.ga/dashboard/rooms/bathroom/edit.php?id=$row[id]\" class='waves-effect'><i class='material-icons'>edit</i>Edit</a>
                                 <a href=\"https://smartlist.ga/dashboard/rooms/bathroom/delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete this item? This action is irreversible!')\" class='waves-effect'><i class='material-icons'>delete</i>Delete</a>
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
                          echo "<tr id='https://smartlist.ga/dashboard/rooms/storage/tr_".$row['id']."' onclick=\"item('".$row['id']."', '".$row['name']."', '".$row['qty']."', '".$row['price']."', 'https://smartlist.ga/dashboard/rooms/storage/', 'storage')\">";
                          print "<td>".$row["name"] . "</td><td>" . $row["qty"] ."";
                          if ($row['login_id'] != $_SESSION['id']) {
                                   echo "<span clas='badge red' style='float:right;color:white;padding: 4px;background: #2BBBAD !Important'>Synced</span>";
                          }
                          echo "</td>";
                          /*echo " <td><div class=\"dropdown\" tabindex='0'>
                                 <a class=\"dropbtn\"><i class='material-icons'>more_vert</i></a>
                                 <div class=\"dropdown-contenta\">
                                 <a href=\"https://smartlist.ga/dashboard/rooms/storage/edit.php?id=$row[id]\" class='waves-effect'><i class='material-icons'>edit</i>Edit</a>
                                 <a href=\"https://smartlist.ga/dashboard/rooms/storage/delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete this item? This action is irreversible!')\" class='waves-effect'><i class='material-icons'>delete</i>Delete</a>
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
                                   echo "<span clas='badge red' style='float:right;color:white;padding: 4px;background: #2BBBAD !Important'>Synced</span>";
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
                                   echo "<span clas='badge red' style='float:right;color:white;padding: 4px;background: #2BBBAD !Important'>Synced</span>";
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
                                 <!--<td style="width:10%">Actions</td>-->
                                </tr>';
                      foreach ($users as $row) {
                          echo "<tr id='https://smartlist.ga/dashboard/rooms/garage/tr_".$row['id']."' onclick=\"item('".$row['id']."', '".$row['name']."', '".$row['qty']."', '".$row['price']."', 'https://smartlist.ga/dashboard/rooms/garage/', 'garage')\">";
                          print "<td>".$row["name"] . "</td><td>" . $row["qty"] ."";
                          if ($row['login_id'] != $_SESSION['id']) {
                                   echo "<span clas='badge red' style='float:right;color:white;padding: 4px;background: #2BBBAD !Important'>Synced</span>";
                          }
                          echo "</td>";
                          /*echo " <td><div class=\"dropdown\" tabindex='0'>
                                 <a class=\"dropbtn\"><i class='material-icons'>more_vert</i></a>
                                 <div class=\"dropdown-contenta\">
                                 <a href=\"https://smartlist.ga/dashboard/rooms/garage/edit.php?id=$row[id]\" class='waves-effect'><i class='material-icons'>edit</i>Edit</a>
                                 <a href=\"https://smartlist.ga/dashboard/rooms/garage/delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete this item? This action is irreversible!')\"class='waves-effect'><i class='material-icons'>delete</i>Delete</a>
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
      var item_state, item_p;
      var page_title = 'News';
      function item(id, name, qty, price, directory, room) {
       document.querySelector("meta[name=theme-color]").setAttribute("content", "#1f1f1f"); if (room == 'bedroom') { page_title = 'Home'; } else if (room == 'kitchen') { page_title = 'Contact'; } else if (room == 'bathroom') { page_title = 'bathroom'; } else if (room == 'garage') { page_title = 'About'; } else if (room == 'family') { page_title = 'family'; } else if (room == 'storage') { page_title = 'storage'; } else if (room == 'dining_room') { page_title = 'dining_room'; } else if (room == 'laundryroom') { page_title = 'laundryroom'; } else if (room == 'camping') { page_title = 'cs'; }
         item_state = 'item_popup';
         item_p = 1;
         document.getElementById("action_delete").onclick = function() {document.getElementById(directory+'tr_'+id).style.display='none'; if (room == 'kitchen') {toast(name, qty);} else {M.toast({html: 'Deleted!'})} $("#div1").load(directory+"delete.php?id="+id);openPage(page_title, '', '')}
         document.getElementById("nav_delete").onclick = function() {document.getElementById(directory+'tr_'+id).style.display='none'; if (room == 'kitchen') {toast(name, qty);} else {M.toast({html: 'Deleted!'})} $("#div1").load(directory+"delete.php?id="+id);openPage(page_title, '', '')}
         document.getElementById('nav_edit').href = directory + "edit.php?id=" + id;
         document.getElementById('action_edit').href = directory + "edit.php?id=" + id;
         document.getElementById('action_recipe').href = "https://www.google.com/search?q=recipes+with+" + encodeURI(name);
         if (room !== 'kitchen') { document.getElementById('action_recipe').style.visibility = 'hidden'; document.getElementById('action_recipe').style.height = '0'; document.getElementById('action_recipe').style.padding = '0'; }
         else if (room == 'kitchen') { document.getElementById('action_recipe').style.visibility = 'visible'; document.getElementById('action_recipe').style.height = 'auto'; document.getElementById('action_recipe').style.padding = '10px 20px'; }
         document.getElementById('item_title').innerHTML = name;
         document.getElementById('item_qty').innerHTML = "Quantity: " + qty;
         document.getElementById('item_desc').innerHTML = "<div class='chip'>" + price + "</div><div class='chip'>By: <?php echo $_SESSION['name'];?></div><div class='chip'>Room: "+room+"</div>";
         if (room == 'kitchen') {document.getElementById('item_desc').style.display='block'}
         else {         document.getElementById('item_desc').innerHTML = "<div class='chip'>By: <?php echo $_SESSION['name'];?></div><div class='chip'>Room: "+room+"</div>";
}
         if(id == 'DISABLED_ITEM') { 
         document.getElementById("nav_delete").style.display="none";
         document.getElementById('nav_edit').style.display="none";
              document.getElementById("action_delete").style.display="none";
         document.getElementById('action_edit').style.display="none";
         document.getElementById('ERR_VIEW_ONLY').style.display='block';
         }
         else {
              document.getElementById("nav_delete").style.display="block";
         document.getElementById('nav_edit').style.display="block";
         document.getElementById("action_delete").style.display="block";
                  document.getElementById('ERR_VIEW_ONLY').style.display='none';
         document.getElementById('action_edit').style.display="block";
         }
         if(id == 'KITCHEN_IDENTIFY_BY_NAME') {
             document.getElementById("action_delete").onclick = function() {document.getElementById('KITCHEN_tr_'+name).style.display='none'; toast(name, qty); $("#div1").load("https://smartlist.ga/dashboard/rooms/kitchen/quickdelete.php?name="+encodeURI(name)+"&qty="+encodeURI(qty)+"&price="+encodeURI(price));openPage(page_title, '', '')}
             document.getElementById("nav_delete").onclick = function() {document.getElementById('KITCHEN_tr_'+name).style.display='none'; toast(name, qty); $("#div1").load("https://smartlist.ga/dashboard/rooms/kitchen/quickdelete.php?name="+encodeURI(name)+"&qty="+encodeURI(qty)+"&price="+encodeURI(price));openPage(page_title, '', '')}
            }
        if(id == 'BEDROOM_IDENTIFY_BY_NAME') {
             document.getElementById("action_delete").onclick = function() {document.getElementById('BEDROOM_tr'+name).style.display='none'; M.toast({html: 'Deleted!'}); $("#div1").load("https://smartlist.ga/dashboard/rooms/bedroom/quickdelete.php?name="+encodeURI(name)+"&qty="+encodeURI(qty));openPage(page_title, '', '')}
             document.getElementById("nav_delete").onclick = function() {document.getElementById('BEDROOM_tr'+name).style.display='none'; M.toast({html: 'Deleted!'}); $("#div1").load("https://smartlist.ga/dashboard/rooms/bedroom/quickdelete.php?name="+encodeURI(name)+"&qty="+encodeURI(qty));openPage(page_title, '', '')}
        }
        if(id == 'BATHROOM_IDENTIFY_BY_NAME') {
             document.getElementById("action_delete").onclick = function() {document.getElementById('BATHROOM_tr'+name).style.display='none'; M.toast({html: 'Deleted!'}); $("#div1").load("https://smartlist.ga/dashboard/rooms/bathroom/quickdelete.php?name="+encodeURI(name)+"&qty="+encodeURI(qty));openPage(page_title, '', '')}
             document.getElementById("nav_delete").onclick = function() {document.getElementById('BATHROOM_tr'+name).style.display='none'; M.toast({html: 'Deleted!'}); $("#div1").load("https://smartlist.ga/dashboard/rooms/bathroom/quickdelete.php?name="+encodeURI(name)+"&qty="+encodeURI(qty));openPage(page_title, '', '')}
        }
         document.getElementById('action_share').href = "https://smartlist.ga/dashboard/rooms/share/?name="+encodeURI(name)+"&personname=<?php echo urlencode($_SESSION['name']);?>&itemqty="+encodeURI(qty)+"&room=kitchen&id="+id+"&new=true" + id;
         openPage('item_popup', this, '');
         secondary();
      }
      function back() { if(page_title == 'News') {brandlogotext.innerHTML = 'Smartlist';} openPage(page_title, this, ''); document.querySelector("meta[name=theme-color]").setAttribute("content", "#2a1782");}
      $('select').formSelect(); function showsearch() { var oijw = document.getElementById("searchbar"); if (oijw.style.display === "none") { oijw.style.display = "block"; } else { oijw.style.display = "none"; } } function secondary() { var oijwsecondary_nav = document.getElementById("secondary_nav"); if (oijwsecondary_nav.style.display === "none") { oijwsecondary_nav.style.display = "block"; } else { oijwsecondary_nav.style.display = "none"; } }
  var ctx = document.getElementById('myChart').getContext('2d'); var myChart = new Chart(ctx, { type: 'line', data: { <?php echo "labels: ['',"; try { $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); $sql = "SELECT * FROM bm WHERE login_id=".$_SESSION['id']; $users = $dbh->query($sql); foreach ($users as $row) { echo "'".$row['name']."', "; } $dbh = null; } catch (PDOexception $e) { echo "Error is: " . $e-> etmessage(); } echo "],"; echo "\n"; echo "datasets: [{";echo "\n"; echo "label: 'Amount you spent',"; echo "\n"; echo "data: [0,"; try { $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); $sql = "SELECT * FROM bm WHERE login_id=".$_SESSION['id']; $users = $dbh->query($sql); foreach ($users as $row) { echo "".$row['qty'].", "; } $dbh = null; } catch (PDOexception $e) { echo "Error is: " . $e-> etmessage(); } echo "], \n order: 2,"; ?> borderColor: 'rgba(0, 188, 212, 0.75)', backgroundColor: 'rgba(0, 188, 212, 0.3)', pointBorderColor: 'rgba(0, 188, 212, 0)', pointBackgroundColor: 'rgba(0, 188, 212, 0.9)', }, { label: 'My goal', data: [<?php try { $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); $sql = "SELECT * FROM bm WHERE login_id=".$_SESSION['id']; $users = $dbh->query($sql); foreach ($users as $row) {echo $goal.", ";} echo $goal.", "; $dbh = null; } catch (PDOexception $e) { echo "Error is: " . $e-> etmessage(); } ?>],
type: 'line', order: 1, borderColor: 'rgba(245, 71, 83, 0.7)', borderWidth: 3, backgroundColor: 'rgba(245, 71, 83, 0)', }] }, options: { maintainAspectRatio: false, scales: { yAxes: [{ ticks: { beginAtZero: true, }, scaleLabel: { display: true, labelString: 'You spent ' } }], annotation: { annotations: [{ type: 'line', mode: 'horizontal', scaleID: 'y-axis-0', value: 5, borderColor: 'rgb(75, 192, 192)', borderWidth: 10, label: { enabled: false, content: 'Test label' } }] }, xAxes: [{ gridLines: { color: "rgba(0, 0, 0, 0)", }, scaleLabel: { display: true, labelString: 'Date' } }] }, tooltips: { titleFontSize: 16, caretPadding: 10, bodyFontSize: 14, mode: 'x', displayColors: false, callbacks: { label: function(tooltipItems, data) { return data.datasets[tooltipItems.datasetIndex].label + ': ' + tooltipItems.yLabel + ' dollars'; }, }, }, elements: { animationEasing: 'easeIn', line: { tension: 0 }, point: { radius: 0 } }, } }); ctx.height = 500;
         $(document).ready(function() {
    $('body').on('contextmenu', '', function() {
      document.getElementById("rmenu").className = "show";
      document.getElementById("rmenu").style.top = mouseY(event) + 'px';
      document.getElementById("rmenu").style.left = mouseX(event) + 'px';
      window.event.returnValue = false;
    });
});
$(document).bind("click", function(event) {
  document.getElementById("rmenu").className = "hide";
});
function mouseX(evt) {
  if (evt.pageX) {
    return evt.pageX;
  } else if (evt.clientX) {
    return evt.clientX + (document.documentElement.scrollLeft ?
      document.documentElement.scrollLeft :
      document.body.scrollLeft);
  } else {
    return null;
  }
}
function mouseY(evt) {
  if (evt.pageY) {
    return evt.pageY;
  } else if (evt.clientY) {
    return evt.clientY + (document.documentElement.scrollTop ?
      document.documentElement.scrollTop :
      document.body.scrollTop);
  } else {
    return null;
  }
}
      </script>
<script>
if ($('#menu li').length == 0) {
document.getElementById('ERR_EMPTY_NOTIFICATION').style.display='block';
document.getElementById('ERR_EMPTY_NOTIFICATION_TITLE').style.display='none';
}
</script>
      <script src="./js/swipe.js"></script>
      <script src="./js/app.js"></script>
      <?php
         if(isset($_GET['item'])) {
             ?>
      <script defer>
         $(document).ready(function(){
         openPage('addkitchen', this, '');
         });
      </script>
      <?
         }
         ?>
      <script defer>
         $(document).ready(function(){
            $('.tabs').tabs({swipeable: true});
            $('#modal').modal();
            $('.materialboxed').materialbox();
         });
      </script>
      <script type="text/javascript">
        //  var trigger_flag = localStorage.getItem('trigger_flag');
        //  if( !trigger_flag ) {
        //  // invoke your function here
        //  localStorage.setItem('trigger_flag', 'flag_is_set');
        //  }
      </script>
      <script id="rendered-js">
         window.oncontextmenu = function(event) {
              event.preventDefault();
              event.stopPropagation();
              return false;
         };
      </script>
      <script> 
         function changeValue(){ 
         document.getElementById("sr").innerHTML = document.getElementById("search").value
         }
      function addItem(history) { 
            let type = document. 
              getElementById("type").value; 
          let value = document. 
              getElementById("value").value; 
          type = document.createElement(type); 
            type.appendChild( 
              document.createTextNode(value)); 
            document.getElementById( 
              "parent").appendChild(type); 
      } 
      </script>
      <script defer>
         setTimeout(function(){
            $('.demo').hide();// or fade, css display however you'd like.
            $('.demoa').hide();// or fade, css display however you'd like.
            window.scrollTo(0, 0);
            <?php
            if (isset($_GET["room"])) {
              $t = $_GET["room"];
              if ($t == "10") {
                  echo "openPage('Contact', this,'' );";
              } 
              elseif ($t == "1") {
                  echo "openPage('Contact', this, '');";
              } 
              elseif ($t == "3") {
                  echo "openPage('Home', this, '');brandlogotext.innerHTML = 'Bedroom'";
              } 
              elseif ($t == "g") {
                  echo "openPage('About', this, '');brandlogotext.innerHTML = 'Garage'";
              } 
              elseif ($t == "bathroom") {
                  echo "openPage('bathroom', this, '');brandlogotext.innerHTML = 'Bathroom'";
              } 
              elseif ($t == "storage") {
                  echo "openPage('storage', this, '');brandlogotext.innerHTML = 'Storage Room'";
              } 
              elseif ($t == "family") {
                  echo "openPage('family', this, '');brandlogotext.innerHTML = 'Family Room'";
              } 
              elseif ($t == "laundry") {
                  echo "openPage('laundryroom', this, '');brandlogotext.innerHTML = 'Laundry Room'";
              } 
              elseif ($t == "dining_room") {
                  echo "openPage('dining_room', this, '');brandlogotext.innerHTML = 'Dining Room'";
              } 
            }
            elseif (!isset($_GET["room"])){
            echo "openPage('News', this, );";
            }
            ?>  
            request_notification();
         }, 00);
                  var syncalertx = document.getElementById("syncalert"); function syncalertplayAudio() { syncalertx.play(); } $(document).ready(function(){ $('.tooltipped').tooltip(); });
         function notifyMe() { if (!("Notification" in window)) { alert("This browser does not support desktop notifications. Please use Chrome"); } else if (Notification.permission === "granted") {  } else if (Notification.permission !== "denied") { Notification.requestPermission().then(function (permission) { if (permission === "granted") {  } }); } } function request_notification() { if (!("Notification" in window)) { alert("This browser does not support desktop notifications. Please use Chrome"); } else if (Notification.permission === "granted") { /*var notification = new Notification("Welcome to Smartlist!");*/ } else if (Notification.permission !== "denied") { Notification.requestPermission().then(function (permission) { if (permission === "granted") { /*var notification = new Notification("Nice! Notifications are enabled!");*/ } }); } }
      </script>
      <audio id="syncalert">
         <source src="https://padlet-uploads.storage.googleapis.com/446844750/abff4e01e3d7691aa96889855e09afaa/notification_simple_02.wav" type="audio/mpeg">
         Your browser does not support the audio element.
      </audio>
      <script>
    var searcha, qtay, date;
         function add() {
         $('.modal').modal('close'); 
         openPage('Contact', this, '');
          searcha = document.getElementById("tags").value.replace(/['"]+/g, '');
          qtay = document.getElementById("qty").value.replace(/['"]+/g, '');
          date = document.getElementById("date").value.replace(/['"]+/g, '');
         $("#kitchen_table").append("<tr class='card-new' id='KITCHEN_tr_"+searcha+"' onclick='item(\"KITCHEN_IDENTIFY_BY_NAME\", \""+searcha+"\", \""+qtay+"\", \""+date+"\", \"\", \"kitchen\")'><td>"+ searcha +"</td><td>"+qtay+"</td></tr>");
          document.getElementById("tags").value = null;
         if(document.getElementById('KITCHEN_VAR_COUNT')) {document.getElementById('KITCHEN_VAR_COUNT').style.display='none';}
         $("#div1").load("https://smartlist.ga/dashboard/modal.php?name="+encodeURI(searcha)+"&qty="+encodeURI(qtay)+"&price="+encodeURI(date)+"");
          document.getElementById("bar").style.display="block";
         setTimeout(function(){ document.getElementById("bar").style.display = "none" }, 2000);
         $('html, body').scrollTop($(document).height());
         }
history.pushState(null, null, 'beta');
window.addEventListener('popstate', function(event) {
  history.pushState(null, null, 'beta');
  $('.modal').modal('close');
/* openPage(last_page, this, '')*/
if (item_state == 'item_popup') {
back();
item_state = '1';
}
if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {$('.sidenav').sidenav('close');}
});
var bedroom_qty, bedroom_name, bathroom_qty, bathroom_name;
function add_bathroom() {
    $('.modal').modal('close'); 
    openPage('bathroom', this, '');
    bathroom_qty = document.getElementById("bathroom_qty_input").value.replace(/['"]+/g, '');
    bathroom_name = document.getElementById("bathroom_name_input").value.replace(/['"]+/g, '');
    document.getElementById("bathroom_name_input").value = null;
    document.getElementById("bathroom_qty_input").value = null;
    $("#bathroom_table").append("<tr class='card-new'id='BATHROOM_tr"+bathroom_name+"' onclick='item(\"BATHROOM_IDENTIFY_BY_NAME\", \""+ bathroom_name +"\", \""+bathroom_qty+"\", \"\", \"\", \"bathroom\")'><td>"+ bathroom_name +"</td><td>"+bathroom_qty+"</td></tr>");
    if(document.getElementById('bathroom_table_var')) {document.getElementById('bathroom_table_var').style.display='none';}
    $("#div1").load("https://smartlist.ga/dashboard/rooms/bathroom/quickadd.php?name="+encodeURI(bathroom_name)+"&qty="+encodeURI(bathroom_qty)+"");
    document.getElementById("bar").style.display="block";
    setTimeout(function(){ document.getElementById("bar").style.display = "none" }, 2000);
    $('html, body').scrollTop($(document).height());
}
function add_bedroom() {
    $('.modal').modal('close'); 
    openPage('Home', this, '');
    bedroom_qty = document.getElementById("bedroom_qty_input").value.replace(/['"]+/g, '');
    bedroom_name = document.getElementById("bedroom_name_input").value.replace(/['"]+/g, '');
    document.getElementById("bedroom_name_input").value = null;
    document.getElementById("bedroom_qty_input").value = null;
    $("#bedroom_table").append("<tr class='card-new'id='BEDROOM_tr"+bedroom_name+" onclick='item(\"BEDROOM_IDENTIFY_BY_NAME\", \""+ bedroom_name +"\", \""+bedroom_qty+"\", \"\", \"\", \"bedroom\")'><td>"+ bedroom_name +"</td><td>"+bedroom_qty+"</td></tr>");
    if(document.getElementById('BEDROOM_VAR_COUNT')) {document.getElementById('BEDROOM_VAR_COUNT').style.display='none';}
    $("#div1").load("https://smartlist.ga/dashboard/rooms/bedroom/quickadd.php?name="+encodeURI(bedroom_name)+"&qty="+encodeURI(bedroom_qty)+"");
    document.getElementById("bar").style.display="block";
    setTimeout(function(){ document.getElementById("bar").style.display = "none" }, 2000);
        $('html, body').scrollTop($(document).height());
}
      </script>   
   </body>
</html>
<!--<?php $message = $_GET["syncpersonnotifications"]; echo $_GET["welcome"]; if (isset($message)) { echo "<script> var toastHTML = '<span>Paired account! To view, please log in again</span><a class=\"btn-flat toast-action waves-effect waves-light text-white\" style=\"color: white !important\">Login</a>'; M.toast({html: toastHTML}); </script>"; } ?> <?php if (isset($bm_set)) { ?> <script> function set() { var toastHTML = '<span>Budget meter goal successfully set! Try not to go above this goal! <br><i>The goal is displayed as a red line in the chart above</i></span>'; M.toast({html: toastHTML}); } setTimeout(function(){ set() }, 1000); </script> <?php } ?> <?php if (!empty($notifications)) { ?> <script defer> setTimeout(function(){ var notification = new Notification("You're running out of  <?php while($bedroomnotificationa = mysqli_fetch_array($bedroomnotification)) { if ($bedroomnotificationa['qty'] < $number_notify) { echo $bedroomnotificationa['name']; echo ", "; } } ?> in your bedroom"); syncalertplayAudio(); }, 20000); </script> <?php } ?>-->
<?php if (!empty($notifications)) { 

?> 
<script defer>
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
<?php if ($welcome != 1) { $donotshowmdl = mysqli_query($mysqli, "UPDATE login SET welcome='1' WHERE id=".$_SESSION['id'].""); echo ' <div style="position: fixed;top: 0;left: 0;width: 100%;height: 100%;z-index: 9999999999999999999999999999;text-align:center;background: white;background-image: url(\'https://image.ibb.co/de6JzG/bitmap_1_1.png\');overflow:scroll;background-size:cover;background-repeat:no-repeat;background-position: center;"> <div class="container"> <h3>Hello, and welcome to Smartlist!!!!</h3> <p>We strongly suggest you to read the <a href="https://homebasedocs.gitbook.io/docs/">documentation here</a></p> <p>Scroll down to continue</p> <div class="row"> <div class="col s6"> <img alt=\'image\' src="https://i.ibb.co/wKDxTsm/Screenshot-2021-01-15-at-11-24-14-AM.png" width="100%"> </div> <div class="col s6"> <h4>Welcome to Smartlist! </h4> <p>This is your dashboard</p> </div> </div> <div class="row"> <div class="col s6"> <h4>Adding an item</h4> <p>Press CTRL S, or hit the purple button</p> </div> <div class="col s6">        <img  alt=\'image\'src="https://i.ibb.co/BjhXJ05/Screenshot-2021-01-15-at-11-20-02-AM.png" width="100%"> </div> </div> <div class="row"> <div class="col s6"> <img  alt="image" src="https://i.ibb.co/BKvvKL6/Screenshot-2021-01-15-at-11-31-04-AM.png" width="100%"> </div> <div class="col s6"> <h4>View your rooms </h4> <p>Click on a link in the sidebar</p> </div> </div> <div class="row"> <div class="col s6"> <h4>Read the documentation</h4> </div> <div class="col s6">       <p>Get to know more by reading the docs! <br><a href="https://homebasedocs.gitbook.io/docs/">homebasedocs.gitbook.io/docs</a></p> </div> </div> <button onclick="this.parentElement.parentElement.style.display=\'none\';defaultOpen.click()" class="btn waves-light btn-large waves-effect red">Let\'s Get started!</button> <br><br> </div> </div> <br><br> </div> <script> $(\'.carousel.carousel-slider\').carousel({ fullWidth: true, indicators: true }); </script> '; } ?> <?php if(isset($_GET['query'])) { echo "<script>setTimeout(function(){ showsearch();document.getElementById('search').focus();openPage('searchresults', this, '');filter() }, 0100);</script>"; } ?>
