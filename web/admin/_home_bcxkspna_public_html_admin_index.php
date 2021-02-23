<?php session_start(); ?>
<?php
if(!isset($_SESSION['valid'])) {
header ("Location: login.php");
}
?>
<?php #include './include/header.php'; ?>
<?php
/*
// mysql_connect("database-host", "username", "password")
$conn = mysql_connect("localhost","root","root")
            or die("cannot connected");
 
// mysql_select_db("database-name", "connection-link-identifier")
@mysql_select_db("test2",$conn);
*/
 
/**
* mysql_connect is deprecated
* using mysqli_connect instead
*/
 
$databaseHost = 'sql204.epizy.com';
$databaseName = 'epiz_26877943_inventory_with_crud';
$databaseUsername = 'epiz_26877943';
$databasePassword = 'pYLIZRktLbr';
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
?>

<?php
 
$databaseHost = 'sql204.epizy.com';
$databaseName = 'epiz_26877943_admin';
$databaseUsername = 'epiz_26877943';
$databasePassword = 'pYLIZRktLbr';
$audita = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
 $audit = mysqli_query($audita, "SELECT * FROM products WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>
<?php
/*
// mysql_connect("database-host", "username", "password")
$conn = mysql_connect("localhost","root","root") 
			or die("cannot connected");

// mysql_select_db("database-name", "connection-link-identifier")
@mysql_select_db("test2",$conn);
*/

/**
 * mysql_connect is deprecated
 * using mysqli_connect instead
 */

$databaseHosta = 'sql104.epizy.com';
$databaseNamea = 'epiz_27081301_logintodolist';
$databaseUsernamea = 'epiz_27081301';
$databasePassworda = 'oGM667NEMc';

$mysqlia = mysqli_connect($databaseHosta, $databaseUsernamea, $databasePassworda, $databaseNamea); 
?>
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php
//including the database connection file
//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM login ORDER BY id DESC");
$kitchen = mysqli_query($mysqli, "SELECT * FROM products ORDER BY id DESC");
$asdf = mysqli_query($mysqli, "SELECT * FROM analytics ORDER BY id DESC");
$aqty = date("d/M/Y");
$today = mysqli_query($mysqli, "SELECT * FROM analytics WHERE qty='".$aqty."' ORDER BY id DESC");
$todaya = mysqli_query($mysqli, "SELECT * FROM analytics WHERE name='ADMIN' ORDER BY id DESC");
$todayb = mysqli_query($mysqli, "SELECT * FROM analytics WHERE name='Regular user' ORDER BY id DESC");

//products------------------------------------------------------------------------
$i1 = mysqli_query($mysqli, "SELECT * FROM products ORDER BY id DESC");
$i2 = mysqli_query($mysqli, "SELECT * FROM garage ORDER BY id DESC");
$i3 = mysqli_query($mysqli, "SELECT * FROM bathroom ORDER BY id DESC");
$i4 = mysqli_query($mysqli, "SELECT * FROM bedroom ORDER BY id DESC");
$i5 = mysqli_query($mysqli, "SELECT * FROM camping ORDER BY id DESC");
$i6 = mysqli_query($mysqli, "SELECT * FROM family ORDER BY id DESC");
$i7 = mysqli_query($mysqli, "SELECT * FROM laundry ORDER BY id DESC");
$i8 = mysqli_query($mysqli, "SELECT * FROM storageroom ORDER BY id DESC");
$i9 = mysqli_query($mysqli, "SELECT * FROM todo ORDER BY id DESC");
$i10 = mysqli_query($mysqli, "SELECT * FROM bm ORDER BY id DESC");
$i11 = mysqli_query($mysqli, "SELECT * FROM inbox ORDER BY id DESC");
$i12 = mysqli_query($mysqli, "SELECT * FROM grocerylist ORDER BY id DESC");


$todayc = mysqli_num_rows($i1) + mysqli_num_rows($i2)+ mysqli_num_rows($i3)+ mysqli_num_rows($i4)+ mysqli_num_rows($i5)+mysqli_num_rows($i6) + mysqli_num_rows($i7)+ mysqli_num_rows($i8)+ mysqli_num_rows($i9)+ mysqli_num_rows($i10)+ mysqli_num_rows($i11) + mysqli_num_rows($i12);
//end-----------------------------------------------------------------------------
$todouseraccounts = mysqli_query($mysqlia, "SELECT * FROM login ORDER BY id DESC");

?>
<!DOCTYPE html>
<html>
<head>
<title>Canvas IUSD</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
<style>
.sidebar {
    position:fixed;
    top:0;
    left:0;
    min-width: 300px;
    height: 100%;
    background: #1C2331;
    margin-top: 60px;
}
.sidebar li {
    width:100%;
    padding: 20px;
    color:white !important;
}
.sidebar * {
    color: white;
    list-style-type: none
}
</style>
</head>
<body>
<div class="sidebar" style="width: 300px;">
        <li class="tab tablink waves-effect waves-block waves-light"onclick="openPage('Home', this, '5px solid #3F729B')" id="defaultOpen"><a>Homebase</a></li>
        <li class="tab tablink waves-effect waves-block waves-light"onclick="openPage('News', this, '5px solid #3F729B')"><a>Todolist</a></li>
        <li class="tab tablink waves-effect waves-block waves-light"onclick="openPage('About', this, '3px solid #3F729B')"><a href="#test3">QuickPoll</a></li>
        <li class="tab tablink waves-effect waves-block waves-light"onclick="openPage('Contact', this, '5px solid #3F729B')"><a href="#test4">Other</a></li>
</div>

  <nav style="background: #263238;position: fixed;top:0;left:0;width: 100%;z-index:999999999">
    <div class="nav-wrapper">
      <form  method="GET" action="search.php">
        <div class="input-field">
          <input id="search" type="search" required autocomplete="off" name="q">
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>
<div style="margin-top: 120px;margin-left: 350px">

<div id="Home" class="tabcontent">
  <ul class="tabs">
        <li class="tab tablink"onclick="openPage('users', this, '3px solid black')" id="defaultOpen"><a >Users</a></li>
        <li class="tab tablink"onclick="openPage('Kitchen', this, '3px solid black')"><a>Kitchen</a></li>
        <li class="tab tablink"onclick="openPage('Bedroom', this, '3px solid black')"><a href="#test3">Bedroom</a></li>
        <li class="tab tablink"onclick="openPage('Bathroom', this, '3px solid black')"><a href="#test4">Bathroom</a></li>
      </ul>
     <h1 class=center> <?php echo mysqli_num_rows($asdf); ?></h1>
     <p class="center">Views so far</p>
     <div class="row">
     <div class="col s3">
      <h1 class=center> <?php echo mysqli_num_rows($today); ?></h1>
     <p class="center">Views Today</p>
     </div>
     <div class="col s3">
     <h1 class=center> <?php echo mysqli_num_rows($todaya); ?></h1>
     <p class="center">Admin Views</p>
     </div>
     <div class="col s3">
     <h1 class=center> <?php echo mysqli_num_rows($todayb); ?></h1>
     <p class="center">Regular Visitors</p>
     </div>
     <div class="col s3">
     <h1 class=center> <?php echo $todayc; ?></h1>
     <p class="center">Items added by visitors!</p>
     </div>
     </div>
  <table class="table" id="myTable">
<tr >
<td>ID</td>
<td>Name</td>
<td class="d-none">Email</td>
<td style="width:10%">Actions</td>
</tr>
<?php
$name = "ADMIN";
$qty = date("d/M/Y");
$result = mysqli_query($mysqli, "INSERT INTO analytics(name, qty, price, login_id) VALUES('$name','$qty','$price', '$loginId')");

while($audita = mysqli_fetch_array($audit)) {
echo "<tr>";
echo "<td>".$audita['qty']."</td>";
echo "<td>".$audita['name']."</td>";
echo "<td class=\"d-none\">".$audita['email']."</td>";
echo "<td><a href=\"edit.php?id=$audita[id]\"><i class='material-icons'>edit</i></a> <a href=\"delete.php?id=$audita[id]\" onClick=\"return confirm('Are you sure you want to delete?')\"><i class='material-icons'>delete</i></a></td>";
}
?>
</table>
</div>
<div id="News" class="tabcontent">
  <table class="table" id="myTable">
<tr >
<td>ID</td>
<td>Name</td>
<td class="d-none">Email</td>
<td style="width:10%">Actions</td>
</tr>
<?php
while($todouseraccountsa = mysqli_fetch_array($todouseraccounts)) {
echo "<tr>";
echo "<td>".$todouseraccountsa['id']."</td>";
echo "<td>".$todouseraccountsa['name']."</td>";
echo "<td class=\"d-none\">".$todouseraccountsa['email']."</td>";
echo "<td><a href=\"./login/edit.php?id=$todouseraccountsa[id]\"><i class='material-icons'>edit</i></a> <a href=\"./login/delete.php?id=$todouseraccountsa[id]\" onClick=\"return confirm('Are you sure you want to delete?')\"><i class='material-icons'>delete</i></a></td>";
}
?>
</table>
</div>

<div id="Contact" class="tabcontent">
  <h3>Contact</h3>
  <p>Get in touch, or swing by for a cup of coffee.</p>
</div>

<div id="Kitchen" class="tabcontent">
<h2 class="center">Items users have in Kitchen</h2>
  <table class="table" id="myTable">
<tr >
<td>User ID</td>
<td>Name</td>
<td class="d-none">Email</td>
</tr>
<?php
while($kit = mysqli_fetch_array($kitchen)) {
echo "<tr>";
echo "<td>".$kit['login_id']."</td>";
echo "<td>".$kit['name']."</td>";
echo "<td>".$kit['qty']."</td>";
}
?>
</table>
</div>
<div id="users" class="tabcontent">
<table class="table" id="myTable">
<tr >
<td>ID</td>
<td>Name</td>
<td class="d-none">Email</td>
<td style="width:10%">Actions</td>
</tr>
<?php
while($res = mysqli_fetch_array($result)) {
echo "<tr>";
echo "<td>".$res['id']."</td>";
echo "<td>".$res['name']."</td>";
echo "<td class=\"d-none\">".$res['email']."</td>";
echo "<td><a href=\"./login/edit.php?id=$res[id]\"><i class='material-icons'>edit</i></a> <a href=\"./login/delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\"><i class='material-icons'>delete</i></a></td>";
}
?>
</table>
</div>
<script>
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.borderRight = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.borderRight = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
   <script>
   $(document).ready(function(){
    $('.sidenav').sidenav();
  });
  </script>
<script>
var action = <?php echo '' . htmlspecialchars($_GET["action"]) . '';?>;

if (action == 1) {
  openPage('users', this, '3px solid black')
} 
else if (action == 2){
  openPage('Kitchen', this, '3px solid black')
}
</script>
 <?php include ".include/footer.php"; ?>       
</body>
</html>