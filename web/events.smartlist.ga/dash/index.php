<?php 
   session_start();
   include('../cred.php');
   $dbname = "bcxkspna_events";
   $code = $_SESSION['code'];
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <title>Event dashboard | Code: <?php echo $code;?></title>
        <link rel="shortcut icon" href="https://i.ibb.co/XZspXTQ/Screenshot-2021-02-26-at-10-32-02-AM-1.png">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <style>
            nav {
                position:fixed;
                z-index: 9999999;
                top:0;
                width: calc(100% - 300px);
            }
            .sidenav {
                z-index: 999999999;
            }
            .sidenav-overlay {
                z-index: 99999999;
            }
            .brand-logo {
                margin-left: 10px;
            }
            body {
                padding-top: 60px;
            }
            .banner {
                width: 100%;
                margin-top: 10px;
                background: #eee;
            }
            .banner .col {
                padding: 10px;
                vertical-align:middle;
            }
            .card {
                overflow-x: scroll;
            }
            .banner .col div {
                margin-top: 5px;
            }
            .sidenav::webkit-scrollbar {
                display:none;
            }
            body {
                padding-left: 300px;
            }
            .brand-logo i{ display:none !important; }
            @media only screen and (max-width: 992px) {
                body {
                    padding-left: 0;
                }
                .brand-logo i{
                    display: inline-block !important;
                }
                nav {
                    width: 100%;
                }
            }
        </style>
    </head>
    <body onload="$('.menu').tooltip('open')">
        <div class="fixed-action-btn">
  <a class="btn-floating btn-large red tooltipped" data-tooltip='Add an item, task, or event...' data-position='left'>
    <i class="large material-icons">add</i>
  </a>
  <ul>
    <li><a class="btn-floating red" href='./event/add.php'><i class="material-icons">event</i></a></li>
    <li><a class="btn-floating green"href='https://smartlist.ga/dashboard/event/dash/todo/add.php'><i class="material-icons">check</i></a></li>
    <li><a class="btn-floating blue" href='https://smartlist.ga/dashboard/event/dash/item/add.php'><i class="material-icons">storage</i></a></li>
  </ul>
</div>
          <nav class="orange darken-4">
            <div class="nav-wrapper">
              <a href="#" class="brand-logo left hide-on-med-and-up" onclick="$('.sidenav').sidenav('open')"><i class="material-icons">menu</i> <span style="vertical-align:middle;font-size: 18px">Smartlist events</span></a>
              <ul class="right">
                <li><a href="javascript:location.reload()"><i class="material-icons">refresh</i></a></li>
                <li><a href="https://smartlist.ga/"><i class="material-icons">dashboard</i></a></li>
              </ul>
            </div>
          </nav>
            <ul id="slide-out" class="sidenav sidenav-fixed">
                <li><div class="user-view">
                  <div class="background">
                    <img src="https://i.pinimg.com/originals/c2/bd/3a/c2bd3ae483f9617e6f71bc2a74b60b5a.jpg">
                  </div>
                  <a href="#user"><img class="circle" src="https://icon-library.com/images/google-user-icon/google-user-icon-21.jpg"></a>
                  <a href="#name"><span class="white-text name"><?php echo $_SESSION['name'];?></span></a>
                  <a href="#name"><span class="white-text email"><i>Guest user - Sign up for full access!</i></span></a>
                </div></li>
                <li><a href="#!" class="waves-effect"><i class="material-icons">home</i>Home</a></li>
                 <li><div class="divider"></div></li>
                <li><a class="subheader">Add</a></li>
                <li><a onclick="ajax_load('#loader', './todo/add.php')" class="waves-effect"><i class="material-icons">check</i>Todo list</a></li>
                <li><a onclick="ajax_load('#loader', './item/add.php')" class="waves-effect"><i class="material-icons">storage</i>Item</a></li>
                <li><a onclick="ajax_load('#loader', './event/add.php')" class="waves-effect"><i class="material-icons">event</i>Event</a></li>
                <li><div class="divider"></div></li>
                <li><a class="subheader">Rooms</a></li>
                 <?php 
                       try {
                       $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                       $sql = "SELECT * FROM rooms WHERE login=".$_SESSION['code'];
                       $users = $dbh->query($sql);
                       $bedroom_row_count = $users->rowCount();
                       if($bedroom_row_count > 0) {
                       foreach ($users as $row) {
                         echo "<li><a href='#' class='waves-effect' onclick='ajax_load(\"room_loader.php?id=".$row['id']."\")'>".$row['name']."</a></li>";
                       }
                       $dbh = null;
                         
                       }
                       else {
                         echo "<li><a href='#'>No rooms</a></li>";
                       }
                       }
                       catch (PDOexception $e) {
                       echo "Error is: " . $e-> etmessage();
                       }
                ?>
                <li><div class="divider"></div></li>
                <li><a class="subheader">Other</a></li>
                <li><a href="https://smartlist.ga/dashboard/beta" class="waves-effect"><i class="material-icons">login</i>Log in to your account</a></li>
                <li><a href="https://smartlist.ga/contribute/" class="waves-effect"><i class="material-icons">code</i>Developer Dashboard</a></li>
                <li><a class="waves-effect" href="logout.php"><i class="material-icons">logout</i>Logout</a></li>
          </ul>
          <div class="row container" id="loader">
              <div class="col s12 m6">
                  <h5 onclick="this.nextElementSibling.style.display='block'">To-do</h5>
                  <p style="display:none">This section is usually used to tell others what to do for the party and get tasks done</p>
              <?php 
           try {
           $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
           $sql = "SELECT * FROM todo WHERE price=".$_SESSION['code'];
           $users = $dbh->query($sql);
           $bedroom_row_count = $users->rowCount();
           if($bedroom_row_count > 0) {
           foreach ($users as $row) {
             echo  "<div class='card'><div class='card-content'>";
             print "<span class='card-title'>".$row["name"] . "</span>" . $row["qty"] ."<br> Created by: <b>".$row["uname"]."</b><br><a onclick=\"$('#AJAX_LOADER').load('./todo/delete.php?id=".$row['id']."');this.parentElement.parentElement.style.display='none';M.toast({html: 'Deleted item'})\">Delete</a>";
             echo "</div></div>";
           }
           $dbh = null;
             
           }
           else {
             echo "<img alt='image' src='https://i.ibb.co/KX0bKPk/gummy-coffee.png'width='300px' style='display:block;margin:auto;'><br><p class='center'>No tasks. <a href='./todo/add.php'>Add one</a></p>";
           }
           }
           catch (PDOexception $e) {
           echo "Error is: " . $e-> etmessage();
           }
        ?>
        </div>
        <div class="col s12 m6">
            <h5>Items</h5>
        <?php 
           try {
           $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
           $sql = "SELECT * FROM items WHERE price=".$_SESSION['code'];
           $users = $dbh->query($sql);
           $bedroom_row_count = $users->rowCount();
           if($bedroom_row_count > 0) {
           foreach ($users as $row) {
             echo  "<div class='card'><div class='card-content'>";
             print "<span class='card-title'>".$row["name"] . "</span>" . $row["qty"] ."<br> Created by: <b>".$row["uname"]."</b><br><a onclick=\"$('#AJAX_LOADER').load('./item/delete.php?id=".$row['id']."');this.parentElement.parentElement.style.display='none';M.toast({html: 'Deleted item'})\">Delete</a>";
             echo "</div></div>";
           }
           $dbh = null;
             
           }
           else {
             echo "<img alt='image' src='https://i.ibb.co/KX0bKPk/gummy-coffee.png'width='300px' style='display:block;margin:auto;'><br><p class='center'>No items. <a href='./item/add.php'>Add one</a></p>";
           }
           }
           catch (PDOexception $e) {
           echo "Error is: " . $e-> etmessage();
           }
        ?>
        </div>
          </div>
          <div id="AJAX_LOADER"></div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script>
             $(document).ready(function(){
                $('.sidenav').sidenav();
                $('.tooltipped').tooltip();
                $('.fixed-action-btn').floatingActionButton();
             });
             function ajax_load(el, data) {
                 document.querySelector(el).innerHTML = "Loading...";
                 $(el).load(data);
             }
        </script>
    </body>
</html>