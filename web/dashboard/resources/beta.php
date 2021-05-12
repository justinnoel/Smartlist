<?php session_start();?>
<?php
   if(!isset($_SESSION['valid'])) {
   #header('Location: login.php');
   }
   ?>
<?php
   if(!isset($_SESSION['valid'])) {
   header('Location: login.php');
   }
   ?>
<?php
   //including the database connection file
   include('../cred.php');
   
    #FILTER
       $result = mysqli_query($mysqli, "SELECT * FROM grocerylist WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
   $chartqty = mysqli_query($mysqli, "SELECT * FROM bm WHERE login_id=".$_SESSION['id']." ORDER BY id ASC");
   $tablebm = mysqli_query($mysqli, "SELECT * FROM bm WHERE login_id=".$_SESSION['id']." ORDER BY id ASC");
   $as = mysqli_query($mysqli, "SELECT * FROM bm WHERE login_id=".$_SESSION['id']." ORDER BY id ASC");
   $chartname = mysqli_query($mysqli, "SELECT * FROM bm WHERE login_id=".$_SESSION['id']." ORDER BY id ASC");
      $filterresult = mysqli_query($mysqli, "SELECT * FROM todo WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
   $filterresulta = mysqli_query($mysqli, "SELECT * FROM todoa WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
   $filterresultb = mysqli_query($mysqli, "SELECT * FROM products WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
   $filterresultab = mysqli_query($mysqli, "SELECT * FROM hobby WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
   $filterper1a = mysqli_query($mysqli, "SELECT * FROM garage WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
   $filterper2a = mysqli_query($mysqli, "SELECT * FROM bedroom WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
   $filterper3a = mysqli_query($mysqli, "SELECT * FROM bathroom WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
   $filterper4a = mysqli_query($mysqli, "SELECT * FROM camping WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
   $filterper5a = mysqli_query($mysqli, "SELECT * FROM storageroom WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
   $filterper6a = mysqli_query($mysqli, "SELECT * FROM todo WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
   $filterper7a = mysqli_query($mysqli, "SELECT * FROM family WHERE login_id=".$_SESSION['id']." ORDER BY id DESC"); 
   $filterresult7 = mysqli_query($mysqli, "SELECT * FROM laundry WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
   
    $grocery = mysqli_query($mysqli, "SELECT * FROM grocerylist WHERE login_id=".$_SESSION['id']." ORDER BY id ASC");
   $garage = mysqli_query($mysqli, "SELECT * FROM garage WHERE login_id=".$_SESSION['id']." ORDER BY id ASC");
   $kitchen = mysqli_query($mysqli, "SELECT * FROM products WHERE login_id=".$_SESSION['id']." OR login_id=".$_SESSION['syncid']." ORDER BY id DESC");
   $storage = mysqli_query($mysqli, "SELECT * FROM storageroom WHERE login_id=".$_SESSION['id']." OR login_id=".$_SESSION['syncid']." ORDER BY id ASC");
   $family = mysqli_query($mysqli, "SELECT * FROM family WHERE login_id=".$_SESSION['id']." OR login_id=".$_SESSION['syncid']." ORDER BY id ASC");
   $bathroom = mysqli_query($mysqli, "SELECT * FROM bathroom WHERE login_id=".$_SESSION['id']." OR login_id=".$_SESSION['syncid']." ORDER BY id ASC");
   $bedroom = mysqli_query($mysqli, "SELECT * FROM bedroom WHERE login_id=".$_SESSION['id']." OR login_id=".$_SESSION['syncid']." ORDER BY id ASC");
   $todo = mysqli_query($mysqli, "SELECT * FROM todo WHERE login_id=".$_SESSION['id']." OR login_id=".$_SESSION['syncid']." ORDER BY id ASC");
   $todoa = mysqli_query($mysqli, "SELECT * FROM todo WHERE login_id=".$_SESSION['id']." OR login_id=".$_SESSION['syncid']." ORDER BY id ASC");
   $todoab = mysqli_query($mysqli, "SELECT * FROM todo WHERE login_id=".$_SESSION['id']." OR login_id=".$_SESSION['syncid']." ORDER BY id ASC");
   $bedroomnotification = mysqli_query($mysqli, "SELECT * FROM bedroom WHERE login_id=".$_SESSION['id']." OR login_id=".$_SESSION['syncid']." ORDER BY id ASC");
   $todomobile = mysqli_query($mysqli, "SELECT * FROM todo WHERE login_id=".$_SESSION['id']." OR login_id=".$_SESSION['syncid']." ORDER BY id ASC");
   $kitchennotification = mysqli_query($mysqli, "SELECT * FROM products WHERE login_id=".$_SESSION['id']." OR login_id=".$_SESSION['syncid']." ORDER BY id ASC");
   $dining = mysqli_query($mysqli, "SELECT * FROM dining_room WHERE login_id=".$_SESSION['id']." OR login_id=".$_SESSION['syncid']." ORDER BY id ASC");
   $camping = mysqli_query($mysqli, "SELECT * FROM camping WHERE login_id=".$_SESSION['id']." OR login_id=".$_SESSION['syncid']." ORDER BY id ASC");
   $laundry = mysqli_query($mysqli, "SELECT * FROM laundry WHERE login_id=".$_SESSION['id']." OR login_id=".$_SESSION['syncid']." ORDER BY id ASC");
   $kitchennotificationaaa = mysqli_query($mysqli, "SELECT * FROM products WHERE login_id=".$_SESSION['id']." OR login_id=".$_SESSION['syncid']." ORDER BY id ASC");
   $bedroomnotificationzx = mysqli_query($mysqli, "SELECT * FROM bedroom WHERE login_id=".$_SESSION['id']." OR login_id=".$_SESSION['syncid']." ORDER BY id ASC");
   $bathroomnotificationzx = mysqli_query($mysqli, "SELECT * FROM bathroom WHERE login_id=".$_SESSION['id']." OR login_id=".$_SESSION['syncid']." ORDER BY id ASC");
   $garagenotificationds = mysqli_query($mysqli, "SELECT * FROM garage WHERE login_id=".$_SESSION['id']." OR login_id=".$_SESSION['syncid']." ORDER BY id ASC");
   $featureupdates = mysqli_query($mysqli, "SELECT * FROM features ORDER BY id DESC");
      $number_notify = $_SESSION['number_notify'];

   ?>
<!-- Compiled and minified CSS -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<meta name="mobile-web-app-capable" content="yes">
<meta name="theme-color" content="#2a1782">
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> 
<link rel="favicon" href="https://todoapp.rf.gd/beta/favicon%20(1).ico">
<link rel="shortcut icon" href="https://todoapp.rf.gd/beta/favicon%20(1).ico">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<!-- Compiled and minified JavaScript -->
<title>Work | Todolist</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
   header, main, footer {
   padding-left: 300px;
   padding-top: 65px;
   }
   nav {
   left: 300px;
   width: calc(100% - 300px)
   }
   .dropdown-content {
       min-width: 300px;
   }
   @media only screen and (max-width : 992px) {
   header, main, footer {
   padding-left: 0;
   }
   nav {left: 0;
   width: 100%;
   }
   }
   .btn-floating,.card {
           box-shadow: 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12) !important;

   }
   .ds-selected {
background: #eee;
user-select: none
}tr,table,.card,.material-icons, nav,.sidenav,h3,img,h6,br {user-select: none}
   .tabcontent {
   display: none;
   overflow-x: auto /*SCROLL*/
   }
   .dropdown-content a {
       background: var(--bnav-color);
       color: var(--font-color) !important
   }

   .dropdown-content a:hover {
       background: var(--bnav-color)
   }
   .couponcode:hover .coupontooltip {
   display: block;
   }
   .bottom-sheet{max-height:97vh !important;height: 97vh}
   td.couponcode {
   white-space: nowrap;
   overflow: hidden;
   text-overflow: ellipsis;
   max-width: 50vw
   }
   * {
    -webkit-touch-callout:none;                /* prevent callout to copy image, etc when tap to hold */
    -webkit-text-size-adjust:none;             /* prevent webkit from resizing text to fit */
    -webkit-tap-highlight-color:rgba(0,0,0,0); /* prevent tap highlight color / shadow */
}

   .coupontooltip {
   display: none;
   background: #424242;
   margin-left: 28px;
   padding: 10px;
   position: fixed;
   z-index: 1000;
   color: #fff;
   border-radius: 2px;
   }   
:root {
         --primary-color: #302AE6;
         --secondary-color: #0099CC;
         --font-color: #424242;
         --bg-color: #fff;
         --heading-color: #292922;
         --topnav-color:#311b92;
         --bnav-color:#fff;
         --check-color:#eee;
         --modal-color:white;
         --todo-color:white;
         --overlay-color:rgba(0,0,0,0.9);
         --waves-color: rgba(0,0,0,0.2);
         --sidenav-color:#fff;
         --sidenavf-color: #616161;
         }
         [data-theme="dark"] {
         --primary-color: #9A97F3;
         --secondary-color: rgba(28, 35, 49, 0.5);
         --font-color: #e2e0e1;
         --waves-color: rgba(255,255,255,0.3);
         --bg-color: #1c1b1b;
         --heading-color: #818cab;
         --topnav-color:#232323;
         --bnav-color:#3c3d3b;
         --check-color:#263238;
         --modal-color:#263238;
         --sidenav-color:#232323;
         --overlay-color:rgba(255,255,255,0.9);
         --todo-color:rgba(0,0,0,0.87);
         --sidenavf-color: var(--font-color);
         }
         .FLOATING_ACTION_BUTTON{animation: btn .2s forwards ease-out;animation-delay:1s;transform: scale(0);}
@keyframes btn {
0% {transform:scale(0)}
100% {transform: scale(1)}
}
body {
  background-color: var(--bg-color);
  color: var(--font-color) !important;
}
.sidenav a,.sidenav i {
      color: var(--sidenavf-color) !important;
}
.waves-effect .waves-ripple {
    background-color: var(--waves-color);
  }
          
.sidenav {
background-color: var(--sidenav-color);
}
h1 {
    color: var(--heading-color);
    font-family: "Sansita One", serif;
    font-size: 2rem;
    margin-bottom: 1vh;
}

p {
  font-size: 1.1rem;
  line-height: 1.6rem;
}

.modal,.modal-footer {
         background-color: var(--modal-color) !important
         }
         .modal-footer a {
             color: var(--font-color) !important
         }
.post-meta {
  font-size: 1rem;
  font-style: italic;
  display: block;
  margin-bottom: 4vh;
  color: var(--secondary-color);
}
</style><nav style="visibility:hidden;height:0;overflow:hidden">
  <div class="theme-switch-wrapper">
       <label class="theme-switch" for="checkbox">
    <input type="checkbox" id="checkbox" />
    <div class="slider round"></div>
  </label>
    <em>Enable Dark Mode!</em>
  </div>

</nav> 
<nav style="position:fixed;top:0;z-index: 1;background: var(--topnav-color)">
   <div class="nav-wrapper">
      <a href="#!" class="brand-logo left sidenav-trigger" data-target="slide-out" style="font-size: 24px"><i class="material-icons">menu</i>Homebase</a>
      <ul class="right">
         <li><a href="#filter" class="modal-trigger"><i class="material-icons">search</i></a></li>
         <li><a href="#"data-target='dropdown1' class="dropdown-trigger"><i class="material-icons">notifications</i></a></li>
      </ul>
   </div>
</nav>
<ul id="slide-out" class="sidenav sidenav-fixed">
   <li>
      <div class="user-view">
         <div class="background">
            <img src="https://besthqwallpapers.com/Uploads/9-8-2019/100569/thumb2-dark-violet-lines-4k-material-design-creative-geometric-shapes.jpg">
         </div>
         <a href="#user"><img class="circle" src="https://icon-library.com/images/google-user-icon/google-user-icon-21.jpg"></a>
         <a href="#name"><span class="white-text name"><?php echo $_SESSION['name'] ?> </span></a>
         <a href="#email"><span class="white-text email"><?php echo $_SESSION['email'] ?> </span></a>
      </div>
   </li>
   <li><a href="#" class="waves-effect sidenav-close" id="defaultOpen" onclick="openPage('News', this, '')"><i class="material-icons">home</i>Home</a></li>
   <li>
      <div class="divider"></div>
   </li>
   <li><a class="subheader">Rooms</a></li>
   <li><a href="#!" class="waves-effect sidenav-close" onclick="openPage('per1',this,'')"><i class="material-icons">label_outline</i>Kitchen</a></li>
   <li><a href="#!" class="waves-effect sidenav-close" onclick="openPage('per2',this,'')"><i class="material-icons">label_outline</i>Bedroom</a></li>
   <li><a href="#!" class="waves-effect sidenav-close" onclick="openPage('per3',this,'')"><i class="material-icons">label_outline</i>Bathroom</a></li>
   <li><a href="#!" class="waves-effect sidenav-close" onclick="openPage('per4',this,'')"><i class="material-icons">label_outline</i>Garage</a></li>
   <li><a href="#!" class="waves-effect sidenav-close" onclick="openPage('per5',this,'')"><i class="material-icons">label_outline</i>Dining Room</a></li>
   <li><a href="#!" class="waves-effect sidenav-close" onclick="openPage('per6',this,'')"><i class="material-icons">label_outline</i>Laundry Room</a></li>
   <li><a href="#!" class="waves-effect sidenav-close" onclick="openPage('per7',this,'')"><i class="material-icons">label_outline</i>Family Room</a></li>
   <li><a href="#!" class="waves-effect sidenav-close" onclick="openPage('per8',this,'')"><i class="material-icons">label_outline</i>Storage</a></li>
   <li><a href="#!" class="waves-effect sidenav-close" onclick="openPage('per9',this,'')"><i class="material-icons">label_outline</i>Camping Supplies</a></li>
   <li><a href="#!" class="waves-effect sidenav-close" onclick="openPage('per10',this,'')"><i class="material-icons">label_outline</i>Grocery and Todo list</a></li>
   <li>
      <div class="divider"></div>
   </li>
   <li><a class="subheader">My Profile</a></li>
   <li><a class="waves-effect modal-trigger" href="#modal1"><i class='material-icons'>settings</i>My profile</a></a>
   <li><a class="waves-effect" href="#" onclick="document.getElementById('checkbox').click()"><i class="material-icons">visibility</i>Dark Mode</a></li>
   <li><a class="waves-effect" href="logout.php"  ><i class="material-icons">logout</i>Logout</a></li>
   <li><a class="waves-effect" href="reset-password.php"><i class="material-icons">vpn_key</i>Reset your password</a></li>
   <li onclick="document.getElementById('info').style.display='block'" ><a class="waves-effect" href="#" onclick="document.getElementById('info').style.display='block'"><i class="material-icons">info</i>Credits</a></li>
   <li>
      <div class="divider"></div>
   </li>
   <li><a class="subheader" class="waves-effect">Other Apps</a></li>
   <li><a href="https://todoapp.rf.gd" class="waves-effect"><i class="material-icons">check</i>Todolist</a></li>
   <li><a href="https://todoapp.rf.gd/poll" class="waves-effect"><i class="material-icons">poll</i>QuickPoll</a></li>
   <li><a href="https://sjscustomcakes.rf.gd" class="waves-effect"><i class="material-icons">cake</i>Order a cake!</a></li>
</ul>
<!--CONTENT BEGINS-->
<main>
   <div id="News" class="tabcontent">
   <div style="width: 100%;height:400px !important;background:var(--chart-color) !important;">
            <canvas id="myChart" style="width: 100%;height:200px !important;background: background:var(--chart-color) !important;" class="ree"></canvas>
         </div>
      <div class="row">
      <div class="col s6">
         <?php
            $t = date("m/d/Y");
            #echo $t;
            if (mysqli_num_rows($todoab) > 0) {
               while($res = mysqli_fetch_array($todoab)) {
               echo "
               <div class='card'>
               <div class='card-content'>
             <a href=\"./todo/delete.php?id=$res[id]\" class='right' ><i class='material-icons' style='color:gray'>delete</i></a>
            <a href=\"./todo/edit.php?id=$res[id]\" class='right'><i class='material-icons' style='color:gray'>edit</i></a> 
             <span class='card-title'>".$res['name']."</span>";
               echo "";
               if ($res['qty'] == "Quantity 3 - Medium") {
               echo "<span style='color:black'>".$res['qty']."</span>";
               }
               elseif ($res['qty'] == "Quantity 1 - Lowest") {
               echo "<span style='color:darkblue'>".$res['qty']."</span>";
               }
               elseif ($res['qty'] == "Quantity 5 - Highest") {
               echo "<span style='color:red'>".$res['qty']."</span>";
               }
               elseif ($res['qty'] == "Quantity 6 - URGENT") {
               echo "<span style='color:red'>".$res['qty']."</span>";
               }
               else {
                   echo $res['qty']."";
               }
               echo "<div class='couponcode'><span class='coupontooltip' style='display:none'>".$res['price']."</div>";
                 if ($res['price'] == "$t") {
                                  echo '<span style="color: red">'.$res['price'].'</span></div>';
             }
             else {
               echo '<span style="color:black">'.$res['price'].'</span></div>';
             }
             echo "</div>";
               }
               }
            else {
                echo "<img src='https://i.ibb.co/KX0bKPk/gummy-coffee.png'width='300px' style='display:block;margin:auto;'><br><h6 class='center'>Hmm... Nothing much here, eh? Want to try adding an item? </h6>";
            }
               ?>
               </div>
               <div class="col s6">
               <?php
                  while($resed = mysqli_fetch_array($result)) {
                  echo "<div class='card'>
                  <div class='card-content'>
                  <div style='float:right'>
                  <a href=\"./todo/edit.php?id=$resed[id]\" class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                  <i class='material-icons'>edit</i>
                  </a> <a href=\"./todo/delete.php?id=$resed[id]\" onClick=\"return confirm('Are you sure you want to delete?')\"  class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                  <i class='material-icons'>delete</i>
                  </a>
                  </div><span class='card-title'>".$resed['name']."
                  </span>
                  <span>Priority: ".$resed['qty']."</span><br> 
                  </div>
                  ";
                  echo "";
                  echo "</div>";
                  }
                  ?>
               </div>
      </div>
   </div>
   <div id="Home" class="tabcontent">
      <div class="demo"></div>
         <?php
if (mysqli_num_rows($resulta) > 0) {
         echo '
                <table style="width:90%;margin:auto">
         <tr>
            <h3 class="center">Personal</h2>
            <td>Item name</td>
            <td>Quantity</td>
            <td style="display:none">Due Date</td>
            <td style="width: 10%">Actions</td>
         </tr>';
            while($resa = mysqli_fetch_array($resulta)) {
            echo "<tr>";
            echo "<td class='couponcode'><span class='coupontooltip'> ".$resa['name']."</span>".$resa['name']."</td>";
            echo "<td class='couponcode'><span class='coupontooltip'> ".$resa['qty']."</span>".$resa['qty']."</td>";
            echo "<td class='couponcode'><span class='coupontooltip'> ".$resa['price']."</span>".$resa['price']."</td>";
            echo "<td><a href=\"./other/edit.php?id=$resa[id]\"><i class='material-icons' style='color:gray'>edit</i></a> <a href=\"./other/delete.php?id=$resa[id]\" onClick=\"\\return confirm('Are you sure you want to delete?')\"  class='couponcode'><span class='coupontooltip'>Delete</span><i class='material-icons' style='color:gray'>delete</i></a></td>";
            }
}
             else {
                echo "<img src='https://i.pinimg.com/originals/30/ef/dc/30efdcdf5a476dba76d6dfb4b480544c.gif'width='300px' style='display:block;margin:auto;'><br><h6 class='center'>Hmm... Nothing much here, eh? Want to try adding an item? </h6>";
            }
            ?>
      </table>
   </div>
   <div id="exp" class="tabcontent">
      <iframe src="https://todoapp.rf.gd/beta/bm/" style="width:100%;height:90%;border:0;"></iframe>
   </div>
   <div id="per8" class="tabcontent">
      <div class="demo"></div>
      <h3 class="center">Storage Room</h2>
      <div class="demo"></div>
      <table style="width:90%;margin:auto">
         <tr >
            <td>Item name</td>
            <td>Quantity</td>
            <td style="display:none">Due Date</td>
            <td style="width: 10%">Actions</td>
         </tr>
         <?php
            while($per8 = mysqli_fetch_array($storage)) {
            echo "<tr>";
            echo "<td class='couponcode'><span class='coupontooltip'> ".$per8['name']."</span>".$per8['name']."</td>";
            echo "<td class='couponcode'><span class='coupontooltip'> ".$per8['qty']."</span>".$per8['qty']."</td>";
            echo "<td><a href=\"edit.php?id=$per8[id]\"><i class='material-icons' style='color:gray'>edit</i></a> <a href=\"delete.php?id=$per8[id]\" onClick=\"\\return confirm('Are you sure you want to delete?')\"  class='couponcode'><span class='coupontooltip'>Delete</span><i class='material-icons' style='color:gray'>delete</i></a></td>";
            }
            ?>
      </table>
   </div>
    <div id="per9" class="tabcontent">
      <div class="demo"></div>
      <h3 class="center">Camping Supplies</h2>
      <div class="demo"></div>
      <table style="width:90%;margin:auto">
         <tr >
            <td>Item name</td>
            <td>Quantity</td>
            <td style="display:none">Due Date</td>
            <td style="width: 10%">Actions</td>
         </tr>
         <?php
            while($per9 = mysqli_fetch_array($camping)) {
            echo "<tr>";
            echo "<td class='couponcode'><span class='coupontooltip'> ".$per9['name']."</span>".$per9['name']."</td>";
            echo "<td class='couponcode'><span class='coupontooltip'> ".$per9['qty']."</span>".$per9['qty']."</td>";
            echo "<td><a href=\"edit.php?id=$per9[id]\"><i class='material-icons' style='color:gray'>edit</i></a> <a href=\"delete.php?id=$per9[id]\" onClick=\"\\return confirm('Are you sure you want to delete?')\"  class='couponcode'><span class='coupontooltip'>Delete</span><i class='material-icons' style='color:gray'>delete</i></a></td>";
            }
            ?>
      </table>
   </div>
   <div id="per7" class="tabcontent">
      <div class="demo"></div>
      <h3 class="center">Family Room</h2>
      <div class="demo"></div>
      <table style="width:90%;margin:auto">
         <tr >
            <td>Item name</td>
            <td>Quantity</td>
            <td style="display:none">Due Date</td>
            <td style="width: 10%">Actions</td>
         </tr>
         <?php
            while($per7 = mysqli_fetch_array($family)) {
            echo "<tr>";
            echo "<td class='couponcode'><span class='coupontooltip'> ".$per7['name']."</span>".$per7['name']."</td>";
            echo "<td class='couponcode'><span class='coupontooltip'> ".$per7['qty']."</span>".$per7['qty']."</td>";
            echo "<td><a href=\"edit.php?id=$per7[id]\"><i class='material-icons' style='color:gray'>edit</i></a> <a href=\"delete.php?id=$per7[id]\" onClick=\"\\return confirm('Are you sure you want to delete?')\"  class='couponcode'><span class='coupontooltip'>Delete</span><i class='material-icons' style='color:gray'>delete</i></a></td>";
            }
            ?>
      </table>
   </div>
   <div id="Contact" class="tabcontent center">
<img src="https://i.ibb.co/r3kP03S/fogg-933.png" width="100px;"><br>
Illustration by <a href="undefined">Icons 8</a> from <a href="https://icons8.com/">Icons8</a>
      <h3 class="center">Awards</h2>
      <span class="new badge" style="float: none;display: inline-block"></span>
      <div class="row" style="height: 200px;overflow: hidden">
         <div class="col s3">
            <i class="material-icons" style="font-size: 50px; <?php if(mysqli_num_rows($resultd) > 10) {echo "color: #ff8902";}else {echo "color:gray";}?>">check</i>
            <h4 style="<?php if(mysqli_num_rows($resultd) > 10) {echo "color: #ff8902";}else {echo "color:gray";}?>">Bronze Level</h4>
            <p style="<?php if(mysqli_num_rows($resultd) > 10) {echo "color: #ff8902";}else {echo "color:gray";}?>">Finish 10 tasks</p>
         </div>
         <div class="col s3">
            <i class="material-icons" style="font-size: 50px;<?php if(mysqli_num_rows($resultd) > 50) {echo "color: #839348";}else {echo "color:gray";}?>">check</i>
            <h4 style="<?php if(mysqli_num_rows($resultd) > 50) {echo "color: #839348";}else {echo "color:gray";}?>">Silver Level</h4>
            <p style="<?php if(mysqli_num_rows($resultd) > 50) {echo "color: #839348";}else {echo "color:gray";}?>">Finish 50 tasks</p>
         </div>
         <div class="col s3">
            <i class="material-icons" style="font-size: 50px;<?php if(mysqli_num_rows($resultd) > 100) {echo "color: #ffc402";}else {echo "color:gray";}?>">check</i>
            <h4 style="<?php if(mysqli_num_rows($resultd) > 100) {echo "color: #ffc402";}else {echo "color:gray";}?>">Gold Level</h4>
            <p style="<?php if(mysqli_num_rows($resultd) > 100) {echo "color: #ffc402";}else {echo "color:gray";}?>">Finish 100 tasks</p>
         </div>
         <div class="col s3">
            <i class="material-icons" style="font-size: 50px;<?php if(mysqli_num_rows($resultd) > 1000) {echo "color: #05e7fc";}else {echo "color:gray";}?>">check</i>
            <h4 style="<?php if(mysqli_num_rows($resultd) > 1000) {echo "color: #05e7fc";}else {echo "color:gray";}?>">Diamond Level</h4>
            <p style="<?php if(mysqli_num_rows($resultd) > 1000) {echo "color: #05e7fc";}else {echo "color:gray";}?>">Finish 1000 tasks</p>
         </div>
      </div>
   </div>
   <div id="About" class="tabcontent">
      <h3 class="center">Hobbies</h2>
      <div class="demo"></div>
      <table style="width:90%;margin:auto">
         <tr >
            <td>Item name</td>
            <td>Quantity</td>
            <td style="display:none">Due Date</td>
            <td style="width: 10%">Actions</td>
         </tr>
         <?php
            while($resab = mysqli_fetch_array($resultab)) {
            echo "<tr>";
            echo "<td class='couponcode'><span class='coupontooltip'> ".$resab['name']."</span>".$resab['name']."</td>";
            echo "<td class='couponcode'><span class='coupontooltip'> ".$resab['qty']."</span>".$resab['qty']."</td>";
            echo "<td class='couponcode'><span class='coupontooltip'>".$resab['price']."</span>".$resab['price']."</td>";
            echo "<td><a href=\"./hobbies/edit.php?id=$resab[id]\"><i class='material-icons' style='color:gray'>edit</i></a> <a href=\"./hobbies/delete.php?id=$resab[id]\" onClick=\"\\return confirm('Are you sure you want to delete?')\"  class='couponcode'><span class='coupontooltip'>Delete</span><i class='material-icons'style='color:gray'>check</i></a></td>";
            }
            ?>
      </table>
   </div>
   <div id="per1" class="tabcontent">
      <div class="demo"></div>
         <?php
            if (mysqli_num_rows($kitchen) > 0) {
                echo '
                <table style="width:90%;margin:auto">
         <tr>
            <h3 class="center">Kitchen</h2>
            <td>Item name</td>
            <td>Quantity</td>
            <td style="display:none">Due Date</td>
            <td style="width: 10%">Actions</td>
         </tr>';
            while($per1 = mysqli_fetch_array($kitchen)) {
            echo "<tr>";
            echo "<td class='couponcode'><span class='coupontooltip'> ".$per1['name']."</span>".$per1['name']."</td>";
            echo "<td class='couponcode'><span class='coupontooltip'>".$per1['qty']."</span>".$per1['qty']."</td>";
            echo "<td><a href=\"./school/per1/edit.php?id=$per1[id]\"><i class='material-icons' style='color:gray'>edit</i></a> <a href=\"./school/per1/delete.php?id=$per1[id]\" onClick=\"\\return confirm('Are you sure you want to delete?')\"  class='couponcode'><span class='coupontooltip'>Delete</span><i class='material-icons' style='color:gray'>delete</i></a></td>";
            }
            }
            else {
                echo "<img src='https://i.ibb.co/KX0bKPk/gummy-coffee.png'width='300px' style='display:block;margin:auto;'><br><h6 class='center'>Hmm... Nothing much here, eh? Want to try adding an item? </h6>";
            }
            ?>
      </table>
   </div>
   <div id="per2" class="tabcontent">
      <div class="demo"></div>
         <?php
         if (mysqli_num_rows($bedroom) > 0) {
                echo '
                <table style="width:90%;margin:auto">
         <tr>
            <h3 class="center">Bedroom</h2>
            <td>Item name</td>
            <td>Quantity</td>
            <td style="display:none">Due Date</td>
            <td style="width: 10%">Actions</td>
         </tr>';
            while($per2 = mysqli_fetch_array($bedroom)) {
            echo "<tr>";
            echo "<td class='couponcode'><span class='coupontooltip'>".$per2['name']."</span>".$per2['name']."</td>";
            echo "<td class='couponcode'><span class='coupontooltip'>".$per2['qty']."</span>".$per2['qty']."</td>";
            echo "<td><a href=\"./school/per2/edit.php?id=$per2[id]\"><i class='material-icons' style='color:gray'>edit</i></a> <a href=\"./school/per2/delete.php?id=$per2[id]\" onClick=\"\\return confirm('Are you sure you want to delete?')\"  class='couponcode'><span class='coupontooltip'>Delete</span><i class='material-icons' style='color:gray'>delete</i></a></td>";
            }
            }
            else {
                echo "<img src='https://i.ibb.co/KX0bKPk/gummy-coffee.png'width='300px' style='display:block;margin:auto;'><br><h6 class='center'>Hmm... Nothing much here, eh? Want to try adding an item? </h6>";
            }
            ?>
      </table>
   </div>
   <div id="per3" class="tabcontent">
      <div class="demo"></div>
         <?php
         if (mysqli_num_rows($bathroom) > 0) {
                echo '
                <table style="width:90%;margin:auto">
         <tr>
            <h3 class="center">Bathroom</h2>
            <td>Item name</td>
            <td>Quantity</td>
            <td style="display:none">Due Date</td>
            <td style="width: 10%">Actions</td>
         </tr>';
            while($per3 = mysqli_fetch_array($bathroom)) {
            echo "<tr>";
            echo "<td class='couponcode'><span class='coupontooltip'> ".$per3['name']."</span>".$per3['name']."</td>";
            echo "<td class='couponcode'><span class='coupontooltip'> ".$per3['qty']."</span>".$per3['qty']."</td>";
            echo "<td><a href=\"./school/per3/edit.php?id=$per3[id]\"><i class='material-icons' style='color:gray'>edit</i></a> <a href=\"./school/per3/delete.php?id=$per3[id]\" onClick=\"\\return confirm('Are you sure you want to delete?')\"  class='couponcode'><span class='coupontooltip'>Delete</span><i class='material-icons' style='color:gray'>delete</i></a></td>";
            }
             }
            else {
                echo "<img src='https://i.ibb.co/KX0bKPk/gummy-coffee.png'width='300px' style='display:block;margin:auto;'><br><h6 class='center'>Hmm... Nothing much here, eh? Want to try adding an item? </h6>";
            }
            ?>
      </table>
   </div>
   <div id="per4" class="tabcontent">
      <div class="demo"></div>
         <?php
          if (mysqli_num_rows($garage) > 0) {
                echo '
                <table style="width:90%;margin:auto">
         <tr>
            <h3 class="center">Garage</h2>
            <td>Item name</td>
            <td>Quantity</td>
            <td style="display:none">Due Date</td>
            <td style="width: 10%">Actions</td>
         </tr>';
            while($per4 = mysqli_fetch_array($garage)) {
            echo "<tr>";
            echo "<td class='couponcode'><span class='coupontooltip'> ".$per4['name']."</span>".$per4['name']."</td>";
            echo "<td class='couponcode'><span class='coupontooltip'> ".$per4['qty']."</span>".$per4['qty']."</td>";
            echo "<td><a href=\"./school/per4/edit.php?id=$per4[id]\"><i class='material-icons' style='color:gray'>edit</i></a> <a href=\"./school/per4/delete.php?id=$per4[id]\" onClick=\"\\return confirm('Are you sure you want to delete?')\"  class='couponcode'><span class='coupontooltip'>Delete</span><i class='material-icons' style='color:gray'>delete</i></a></td>";
            }
            }
            else {
                echo "<img src='https://i.ibb.co/KX0bKPk/gummy-coffee.png'width='300px' style='display:block;margin:auto;'><br><h6 class='center'>Hmm... Nothing much here, eh? Want to try adding an item? </h6>";
            }
            ?>
      </table>
   </div>
   <div id="per5" class="tabcontent">
         <?php
         if (mysqli_num_rows($dining) > 0) {
                echo '
                <table style="width:90%;margin:auto">
         <tr>
            <h3 class="center">Dining Room</h2>
            <td>Item name</td>
            <td>Quantity</td>
            <td style="display:none">Due Date</td>
            <td style="width: 10%">Actions</td>
         </tr>';
            while($per5 = mysqli_fetch_array($dining)) {
            echo "<tr>";
            echo "<td class='couponcode'><span class='coupontooltip'>".$per5['name']."</span>".$per5['name']."</td>";
            echo "<td class='couponcode'><span class='coupontooltip'>".$per5['qty']."</span>".$per5['qty']."</td>";
            echo "<td><a href=\"./school/per5/edit.php?id=$per5[id]\"><i class='material-icons' style='color:gray'>edit</i></a> <a href=\"./school/per5/delete.php?id=$per5[id]\" onClick=\"\\return confirm('Are you sure you want to delete?')\"  class='couponcode'><span class='coupontooltip'>Delete</span><i class='material-icons' style='color:gray'>delete</i></a></td>";
            }
            }
            else {
                echo "<img src='https://i.ibb.co/KX0bKPk/gummy-coffee.png'width='300px' style='display:block;margin:auto;'><br><h6 class='center'>Hmm... Nothing much here, eh? Want to try adding an item? </h6>";
            }
            ?>
      </table>
   </div>
   <div id="per6" class="tabcontent">
      <div class="demo"></div>

         <?php
         if (mysqli_num_rows($laundry) > 0) {
                echo '
                <table style="width:90%;margin:auto">
         <tr>
            <h3 class="center">Laundry Room</h2>
            <td>Item name</td>
            <td>Quantity</td>
            <td style="display:none">Due Date</td>
            <td style="width: 10%">Actions</td>
         </tr>';
            while($per6 = mysqli_fetch_array($laundry)) {
            echo "<tr>";
            echo "<td class='couponcode'><span class='coupontooltip'> ".$per6['name']."</span>".$per6['name']."</td>";
            echo "<td class='couponcode'><span class='coupontooltip'> ".$per6['qty']."</span>".$per6['qty']."</td>";
            echo "<td><a href=\"./school/per6/edit.php?id=$per6[id]\"><i class='material-icons' style='color:gray'>edit</i></a> <a href=\"./school/per6/delete.php?id=$per6[id]\" onClick=\"\\return confirm('Are you sure you want to delete?')\"  class='couponcode'><span class='coupontooltip'>Delete</span><i class='material-icons' style='color:gray'>delete</i></a></td>";
            }
            }
            else {
                echo "<img src='https://i.ibb.co/KX0bKPk/gummy-coffee.png'width='300px' style='display:block;margin:auto;'><br><h6 class='center'>Hmm... Nothing much here, eh? Want to try adding an item? </h6>";
            }
            ?>
      </table>
   </div>
</main>
<!--CONTENT ENDS-->
<!-- Modal Structure -->
 <div id="filter" class="modal modal-fixed-footer">
         <div class="modal-content">
            <h4>Filter</h4>
            <input id="myInput" type="text" placeholder="Search.." autocomplete="off">
            <br>
            <ul id="myList">
            <ul class="collection">
               <?php
                  while($filterresultv = mysqli_fetch_array($filterresult)) {
                  echo "<li class=\"collection-item\">".$filterresultv['name']."<span class='badge'>Work</span></li>";
                  }
                  ?>
               <?php
                  while($filterresultv = mysqli_fetch_array($filterresulta)) {
                  echo "<li class=\"collection-item\">".$filterresultv['name']."<span class='badge'>Personal</span></li>";
                  }
                  ?>
               <?php
                  while($filterresultv = mysqli_fetch_array($filterresultab)) {
                  echo "<li class=\"collection-item\">".$filterresultv['name']."<span class='badge'>Hobbies</span></li>";
                  }
                  ?>
               <?php
                  while($filterresultv = mysqli_fetch_array($filterper1a)) {
                  echo "<li class=\"collection-item\">".$filterresultv['name']."<span class='badge'>Garage</span></li>";
                  }
                  ?>
               <?php
                  while($filterresultv = mysqli_fetch_array($filterper2a)) {
                  echo "<li class=\"collection-item\">".$filterresultv['name']."<span class='badge'>Bedroom</span></li>";
                  }
                  ?>
               <?php
                  while($filterresultv = mysqli_fetch_array($filterper3a)) {
                  echo "<li class=\"collection-item\">".$filterresultv['name']."<span class='badge'>Bathroom</span></li>";
                  }
                  ?>
               <?php
                  while($filterresultv = mysqli_fetch_array($filterper4a)) {
                  echo "<li class=\"collection-item\">".$filterresultv['name']."<span class='badge'>School | Period 4</span></li>";
                  }
                  ?>
               <?php
                  while($filterresultv = mysqli_fetch_array($filterper5a)) {
                  echo "<li class=\"collection-item\">".$filterresultv['name']."<span class='badge'>School | Period 5</span></li>";
                  }
                  ?>
               <?php
                  while($filterresultv = mysqli_fetch_array($filterper6a)) {
                  echo "<li class=\"collection-item\">".$filterresultv['name']."<span class='badge'>School | Period 6</span></li>";
                  }
                  ?>
               <?php
                  while($filterresultv = mysqli_fetch_array($filterper7a)) {
                  echo "<li class=\"collection-item\">".$filterresultv['name']."<span class='badge'>School | Period 7</span></li>";
                  }
                  ?>
            </ul>
         </div>
         <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
         </div>
      </div>
<div id="add_cat" class="modal modal-fixed-footer">
   <div class="modal-content">
      <form action="./cat/adda.php" method="post" name="form1">
         <tr style="border:0;">
            <td><input type="text" name="name" placeholder="Tab title" class="autocomplete" autocomplete="off"></td>
         </tr>
         <tr style="border:0;">
            <td>
               <div class="input-field col s12">
                  <select name="qty">
                     <option value="" disabled selected>Tab to open</option>
                     <option value="per1">Period 1</option>
                     <option value="per2">Period 2</option>
                     <option value="per3">Period 3</option>
                     <option value="per4">Period 4</option>
                     <option value="per5">Period 5</option>
                     <option value="per6">Period 6</option>
                     <option value="per7">Period 7</option>
                  </select>
               </div>
            </td>
         </tr>
         <tr style="border:0;"style="display: none">
            <td style="display: none"><input type="text" name="price" class="datepicker" placeholder="Due Date"autocomplete="off" value='--'></td>
         </tr>
         <tr>
            <td><input type="submit" name="Submit" value="Add" class="sbtn"></td>
         </tr>
      </form>
   </div>
   <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
   </div>
</div>
      <div id="kitchenmodal" class="modal ">
         <div class="modal-content">
            <form action="addx.php" method="post" name="form1">
               <table class="table">
                  <tr>
                     <td>Name</td>
                     <div class="ui-widget">
                        <td>
                           <div class="row">
                              <div class="col s9 input-field ">
                                 <input type="text" name="name" class="form-control autocomplete" id="tags" value="<?php echo $_GET['item']; ?>" placeholder="Item name..." class="autocomplete">
                              </div>
                              <div class="col s3">
                                 <a href="https://homebase.rf.gd/homebase/upload/upload.php" style="float:right;display:inline-block;font-size: 30px;" class="modal-close"><i class="material-icons">camera_alt</i></a>
                              </div>
                           </div>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>Quantity</td>
                     <td><input type="text" name="qty" class="form-control" value="1"></td>
                  </tr>
                  <tr style="height:0;width:0;display:none">
                     <td>Price</td>
                     <td><input type="text" name="price" class="form-control" value="1"></td>
                  </tr>
                  <tr>
                     <td><input type="submit" name="Submit" value="Add" class="btn btn-success"></td>
                     <td></td>
                  </tr>
               </table>
            </form>
         </div>
      </div>
            
<div id="modal1" class="modal">
   <div class="modal-content">
      <h4><?php echo $_SESSION['name'] ?></h4>
      <p>Email: <?php echo $_SESSION['email'] ?></p>
      <p>ID: <?php echo $_SESSION['id'] ?></p>
      <p>Username: <?php echo $_SESSION['username'] ?></p>
      <p>Password: <?php echo $_SESSION['password'] ?></p>
      <a class="red btn waves-effect waves-light modal-trigger" href="#modal2">Delete My Account</a>
   </div>
   <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect btn-flat">Ok</a>
   </div>
</div>
    <div id="credits" class="modal">
         <div class="modal-content">
            <h4>Credits</h4>
            <ul>
            <li>Materializecss</li>
            </ul>
         </div>
         <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
         </div>
      </div>
    <div id="schoolprompt" class="modal">
         <div class="modal-content">
            <h4>Select a period</h4>
            <li><a href="./school/per1/add.php"onclick="M.toast({html: 'School | Period 1'})">Period 1</a></li>
            <li><a href="./school/per2/add.php"onclick="M.toast({html: 'School | Period 2'})">Period 2</a></li>
            <li><a href="./school/per3/add.php"onclick="M.toast({html: 'School | Period 3'})">Period 3</a></li>
            <li><a href="./school/per4/add.php"onclick="M.toast({html: 'School | Period 4'})">Period 4</a></li>
            <li><a href="./school/per5/add.php"onclick="M.toast({html: 'School | Period 5'})">Period 5</a></li>
            <li><a href="./school/per6/add.php"onclick="M.toast({html: 'School | Period 6'})">Period 6</a></li>
            <li><a href="./school/per7/add.php"onclick="M.toast({html: 'School | Period 7'})">Period 7</a></li>
         </div>
         <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
         </div>
      </div>
  <!-- Dropdown Structure -->
  <ul id='dropdown1' class='dropdown-content' >
<?php
               while($featureupdatesa = mysqli_fetch_array($featureupdates)) {
                  echo '
               <a href="https://homebase.rf.gd/blog/?action=viewArticle&articleId='.$featureupdatesa['price'].'"> <li class="waves-effect" style="width:100%">
               <span class="title">Updates</span>
               <p style="width:100%">';
                        echo $featureupdatesa['name']; 
               echo "</p></a><li class=\"divider\" tabindex=\"-1\"></li>";
               }
               ?> 
            <?php
               while($kitchennotificationaa = mysqli_fetch_array($kitchennotificationaaa)) {
                if ($kitchennotificationaa['qty'] < $number_notify) {
                  echo '
               <li><a>
               <span class="title">Kitchen</span>
               <p>You\'re going to run out of ';
                        echo $kitchennotificationaa['name']; 
               echo " soon</p></li></a><li class=\"divider\" tabindex=\"-1\"></li>";
               }
               }
               ?> 
            <?php
               while($bedroomnotificationz = mysqli_fetch_array($bedroomnotificationzx)) {
                if ($bedroomnotificationz['qty'] < $number_notify) {
                  echo '
               <li><a>
              
               <span class="title">Bedroom</span>
               <p>You\'re going to run out of ';
                        echo $bedroomnotificationz['name']; 
               echo " soon</p></li></a><li class=\"divider\" tabindex=\"-1\"></li>";
               }
               }
               ?> 
            <?php
               while($bathroomnotificationz = mysqli_fetch_array($bathroomnotificationzx)) {
                if ($bathroomnotificationz['qty'] < $number_notify) {
                  echo '
               <li><a>
               <span class="title">Bathroom</span>
               <p>You\'re going to run out of ';
                        echo $bathroomnotificationz['name']; 
               echo " soon</p></li></a><li class=\"divider\" tabindex=\"-1\"></li>";
               }
               }
               ?> 
            <?php
               while($garagenotificationd = mysqli_fetch_array($garagenotificationds)) {
                if ($garagenotificationd['qty'] < $number_notify) {
                  echo '
               <li><a>
               <span class="title">Garage</span>
               <p>You\'re going to run out of ';
                        echo $garagenotificationd['name']; 
               echo " soon</p></li></a><li class=\"divider\" tabindex=\"-1\"></li>";
               }
               }
               ?> 
  </ul>
<div class="fixed-action-btn">
         <a class="btn-floating btn-large waves-effect waves-light FLOATING_ACTION_BUTTON" style="background:var(--topnav-color);z-index:99999999999999999999999999999999999999 !important" id="ienqfj">
         <i class="large material-icons" style="color:white !important">add</i>
         </a>
         <ul>
            <li data-position="left" data-tooltip="Task" class="tooltipped"><a class="btn-floating red " href="https://homebase.rf.gd/homebase/todo/add.html"><i class="material-icons" style="color:white !important">task</i></a></li>
            <li data-position="left" data-tooltip="Item" class="tooltipped"><a class="btn-floating yellow darken-1 modal-trigger" href="#budgetmetermodala"><i class="material-icons" style="color:white !important" onclick="//document.querySelector('#itemdialog').showModal()">shopping_basket</i></a></li>
            <li data-position="left" data-tooltip="Budget meter" class="tooltipped"><a class="btn-floating green modal-trigger" onclick="//document.querySelector('#modal').showModal()"  href="#budgetmetermodal"><i class="material-icons" style="color:white !important">add_location</i></a></li>
            <li data-position="left" data-tooltip="Grocery List" class="tooltipped"> <a href="./grocerylist/add.html" class="text-center float-right btn-floating blue" ><i class="material-icons" style="color:white !important">add_shopping_cart</i></a></li>
         </ul>
      </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script defer>
         var ctx = document.getElementById('myChart').getContext('2d');
         var myChart = new Chart(ctx, {
             type: 'line',
             data: { <?php
            echo "labels: ['',";
            while($resd = mysqli_fetch_array($chartname)) {
            echo "'".$resd['name']."',";
            }
            echo "],";
            echo "\n";
            echo "datasets: [{";
            echo "\n";
            echo "label: 'Amount you spent',";
            echo "\n";
            echo "data: [0,";
            while($reschart = mysqli_fetch_array($chartqty)) {
            echo "".$reschart['qty'].",";
            }
            echo "],";
            echo "\n";
            ?>
                     backgroundColor: [
                         'rgba(255, 99, 132, 0.1)'
                     ],
                     borderColor: [
                         'rgba(255, 99, 132, 1)'
                     ],
                     borderWidth: 1
                 }]
             },
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
                     annotation: {
               annotations: [{
                 type: 'line',
                 mode: 'horizontal',
                 scaleID: 'y-axis-0',
                 value: 5,
                 borderColor: 'rgb(75, 192, 192)',
                 borderWidth: 4,
                 label: {
                   enabled: false,
                   content: 'Test label'
                 }
               }]
             },
                     xAxes: [{
               gridLines: {
                         color: "rgba(0, 0, 0, 0)",
                     },
               scaleLabel: {
                 display: true,
                 labelString: 'Day'
               }
             }]
                 },
                 tooltips: {
               titleFontSize: 16,
               caretPadding: 10,
               bodyFontSize: 14,
               mode: 'x',
               displayColors: false,
                    callbacks: {
                         label: function(tooltipItems, data) {
                             return data.datasets[tooltipItems.datasetIndex].label +': ' + tooltipItems.yLabel + ' dollars';
                         },
                     },
                 },
                 elements: {
                         animationEasing: 'easeIn',
                             line: {
                     tension: 0
                 },
                 point:{
                                 //radius: 0
                             }
                         },
             }
         });
         ctx.height = 500;
      </script>
<script>
   $(document).ready(function(){
     $('.sidenav').sidenav();
         $('.modal').modal();
         $('select').formSelect();
   $('.datepicker').datepicker({
           format: 'dd/mm/yyyy'
       });
         $('.dropdown-trigger').dropdown();
    $('.fixed-action-btn').floatingActionButton();

   });
</script>
<script>
   $(document).ready(function(){
   $('.autocomplete').autocomplete({
     data: {
       "Apple": null,
       "Microsoft": null,
       "Google": 'https://placehold.it/250x250'
     },
   });
   });
</script>
      <script defer>
         function notifyMe() {
           // Let's check if the browser supports notifications
           if (!("Notification" in window)) {
             alert("This browser does not support desktop notifications. Please use Chrome");
           }
           // Let's check whether notification permissions have already been granted
           else if (Notification.permission === "granted") {
             // If it's okay let's create a notification
             //var notification = new Notification("Welcome to Homebase!");
           }
           // Otherwise, we need to ask the user for permission
           else if (Notification.permission !== "denied") {
             Notification.requestPermission().then(function (permission) {
               // If the user accepts, let's create a notification
               if (permission === "granted") {
                 var notification = new Notification("Nice! Notifications are enabled!");
               }
             });
           }
           // At last, if the user has denied notifications, and you 
           // want to be respectful there is no need to bother them any more.
         }
      </script>
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
      <div id="modal" class="modal modal-fixed-footer">
         <div class="modal-content">
            <h4>Welcome to your brand-new account</h4>
            <p>Here are a few tips and tricks</p>
         </div>
         <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
         </div>
      </div>
      <div id="birthday" class="modal modal-fixed-a">
         <div class="modal-content">
            <h4 class=center>Homebase beta is almost here!</h4>
            <p class=center>On Jan 1, 2021, we'll present to you the best new features!</p>
         </div>
         <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cool!</a>
         </div>
      </div>
      <div id="modal" class="modal modal-fixed-footer">
         <div class="modal-content">
            <h4>Welcome to your brand-new account</h4>
            <p>Here are a few tips and tricks</p>
         </div>
         <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
         </div>
      </div>
      <!--JavaScript at end of body for optimized loading-->
      <script>
         $(window).bind('keydown', function(event) {
             if (event.ctrlKey || event.metaKey) {
                 switch (String.fromCharCode(event.which).toLowerCase()) {
                 case 'f':
                     event.preventDefault();
                        hidesearchicon();hidemenuicon();myFunction();document.getElementById("search").focus();
                     break;
                 case 'd':
                     event.preventDefault();
                     $('.modal').modal('close'); 
                      $('#key').modal('open'); 
                     break;
                  case 'e':
                     event.preventDefault();
                     $('.modal').modal('close'); 
                    $('#modal1').modal('open');
                     break;   
                 case 'b':
                     event.preventDefault();
                      $('.modal').modal('close'); 
                    $('#budgetmetermodal').modal('open');
                     break;
                 case 's':
                     event.preventDefault();
                     $('.modal').modal('close'); 
                    $('#budgetmetermodala').modal('open');
                     break;
                 }
             }
         });
      </script>
<script>
   function openPage(pageName,elmnt,color) {
     var i, tabcontent, tablinks;
     tabcontent = document.getElementsByClassName("tabcontent");
     for (i = 0; i < tabcontent.length; i++) {
       tabcontent[i].style.display = "none";
     }
     tablinks = document.getElementsByClassName("tablink");
     for (i = 0; i < tablinks.length; i++) {
       tablinks[i].style.backgroundColor = "";
     }
     document.getElementById(pageName).style.display = "block";
     elmnt.style.backgroundColor = color;
   }
   
   // Get the element with id="defaultOpen" and click on it
   document.getElementById("defaultOpen").click();
   var tooltip = document.querySelectorAll('.coupontooltip');
            
            document.addEventListener('mousemove', fn, false);
            
            function fn(e) {
                for (var i=tooltip.length; i--;) {
                    tooltip[i].style.left = e.pageX + 'px';
                    tooltip[i].style.top = e.pageY + 'px';
                }
            }
new DragSelect({
  selectables: document.querySelectorAll('tr'),
  callback: e => console.log(e)
});

</script>
 <?php
            #echo 'Hello ' . htmlspecialchars($_GET["tasklistid"]) . '!';
            $tasklistid = htmlspecialchars($_GET["tasklistid"]);
            ?>
         <script type="text/javascript" defer>            
                var getvar = "<?php Print($tasklistid); ?>";
            if (getvar == 1) {
            openPage('per1', this, '');
            } 
            else if (getvar == 2) {
            openPage('per2', this, '');
            } 
            else if (getvar == 3) {
            openPage('per3', this, '');
            } 
            else if (getvar == 4) {
            openPage('per4', this, '');
            } 
            else if (getvar == 5) {
            openPage('per5', this, '');
            } 
            else if (getvar == 6) {
            openPage('per6', this, '');
            } 
            else if (getvar == 7) {
            openPage('per7', this, '');
            } 
            else if (getvar == 8) {
            openPage('per8', this, '');
            } 
            else if (getvar == 9) {
            openPage('per9', this, '');
            } 
            const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
const currentTheme = localStorage.getItem('theme');

if (currentTheme) {
    document.documentElement.setAttribute('data-theme', currentTheme);
  
    if (currentTheme === 'dark') {
        toggleSwitch.checked = true;
    var metaThemeColor = document.querySelector("meta[name=theme-color]");
    metaThemeColor.setAttribute("content", "#191918");
    }
}
window.oncontextmenu = function(event) {
     event.preventDefault();
     event.stopPropagation();
     return false;
};
function switchTheme(e) {
    if (e.target.checked) {
        document.documentElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark');
        var metaThemeColor = document.querySelector("meta[name=theme-color]");
    metaThemeColor.setAttribute("content", "#191918");
    }
    else {        document.documentElement.setAttribute('data-theme', 'light');
          localStorage.setItem('theme', 'light');
          var metaThemeColor = document.querySelector("meta[name=theme-color]");
    metaThemeColor.setAttribute("content", "#2a1782");
    }    
}

toggleSwitch.addEventListener('change', switchTheme, false);
            </script>
                  <div id="budgetmetermodala" class="modal modal-fixed-footer"  style="width:90%">
         <div class="modal-content">
            <h4 class="center">Add an item </h4>
            <div class="collection">
               <a href="#kitchenmodal" class="modal-trigger collection-item waves-effect modal-close" id="kitchentoggle">Kitchen</a>
               <a href="https://homebase.rf.gd/homebase/bedroom/addx.php" class="collection-item waves-effect">Bedroom</a>
               <a href="#!" class="collection-item waves-effect">Bathroom</a>
               <a href="https://homebase.rf.gd/homebase/garage/add.html" class="collection-item waves-effect">Garage</a>
               <a href="./family/add.html" class="collection-item waves-effect">Family</a>
               <a href="./family/add.html" class="collection-item waves-effect">Storage Room</a>
               <a href="./family/add.html" class="collection-item waves-effect">Dining Room</a>
               <a href="./family/add.html" class="collection-item waves-effect">Todo list</a>
               <a href="./family/add.html" class="collection-item waves-effect">Grocery List</a>
               <a href="./camping/add.html" class="collection-item waves-effect">Camping Supplies</a>
               <a href="./laundry/add.html" class="collection-item waves-effect">Laundry room</a>
               <a href="https://homebase.rf.gd/scalesize/bm/add.php" class="collection-item waves-effect">Budget Meter</a>
            </div>
         </div>
      </div>
      <!-- Modal Structure -->
      <div id="budgetmetermodal" class="modal bottom-sheet modal-fixed-footer">
         <div class="modal-content">
            <h4>My budget meter</h4>
            <table class="table table-striped " id="myTable">
               <tr >
                  <!--<td>Name</td>-->
                  <td>Price</td>
                  <td class="d-none">Price</td>
                  <td style="width:10%">Actions</td>
               </tr>
               <?php
                  while($a = mysqli_fetch_array($as)) {
                  echo "<tr>";
                  #echo "<td>".$resc['name']."</td>";
                  echo "<td>".$a['qty']."</td>";
                  echo "<td class=\"d-none\">".$a['price']."</td>";
                  echo "<td class='sropdown' tabindex='0'>
                 <div class='content' style='float:right'></a>
                  <a href=\"edit.php?id=$a[id]\" style=\"float:none\">
                  <div><i class='material-icons' style=\"float:none\">edit</i></div>
                  </a>
                  <div><a href=\"https://homebase.rf.gd/scalesize/bm/delete.php?id=$a[id]\"\">
                  <i class='material-icons'>delete</i>
                  </a></div>
                  </div>
                  </td>";
                  }
                  ?>
            </table>
         </div>
         <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Ok</a>
            <a href="#bmmodal" class="modal-close waves-effect waves-green btn-flat modal-trigger">Add a point</a>
         </div>
      </div>