<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 99999999999999999999999999999;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 950px) {
  .sidenav {padding-top: 15px;position:fixed;top:0;left:0;height:100%;}

  .sidenav a {font-size: 18px;}
}
@media only screen and (max-width: 900px) {
  
  #main {
      margin-left:0 !important;
  }
}
 
</style>
<head>
<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark orange lighten-1 fixed-top">
  <a class="navbar-brand" href="#">  <span onclick="openNav()">Control Panel</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
    aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="index.php">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="view.php">Audit Logs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item avatar">
        <a class="nav-link p-0" href="#">
          <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar.jpg" class="rounded-circle z-depth-0"
            alt="avatar image" height="35">
        </a>
      </li>
    </ul>
  </div>
</nav><br><br><br><div class="container"><script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
   
<a href="index.php">Home</a> | <a href="add.html">Add New Data</a> | <a href="logout.php">Logout</a>
<br/><br/>

<table class="table">
<tr >
<td>Name</td>
<td>Quantity</td>
<td>Version</td>
<td style="width:10%">Update</td>
</tr>
<?php
while($res = mysqli_fetch_array($result)) {
echo "<tr>";
echo "<td>".$res['name']."</td>";
echo "<td>".$res['qty']."</td>";
echo "<td>".$res['price']."</td>";
echo "<td><a href=\"edit.php?id=$res[id]\"><i class=\"fa fa-pen-alt\"></i></a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\"><i class='fa fa-trash'><i></a></td>";
}
?>
</table>
</body>
</html>