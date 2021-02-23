<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");

if(isset($_POST['update']))
{
$id = $_POST['id'];

$name = $_POST['name'];
$qty = $_POST['qty'];
$price = $_POST['price'];

// checking empty fields
if(empty($name) || empty($qty) || empty($price)) {
if(empty($name)) {
echo "<font color='red'>Name field is empty.</font><br/>";
}

if(empty($qty)) {
echo "<font color='red'>Quantity field is empty.</font><br/>";
}

if(empty($price)) {
echo "<font color='red'>Price field is empty.</font><br/>";
}
} else {
//updating the table
$result = mysqli_query($mysqli, "UPDATE products SET name='$name', qty='$qty', price='$price' WHERE id=$id");

//redirectig to the display page. In our case, it is view.php
header("Location: view.php");
}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
$name = $res['name'];
$qty = $res['qty'];
$price = $res['price'];
}
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
   
<body>
<a href="index.php">Home</a> | <a href="view.php">View Products</a> | <a href="logout.php">Logout</a>
<br/><br/>

<form name="form1" method="post" action="edit.php">
<table border="0">
<tr>
<td>Name</td>
<td><input type="text" name="name" value="<?php echo $name;?>" class="form-control"></td>
</tr>
<tr>
<td>Quantity</td>
<td><input type="text" name="qty" value="<?php echo $qty;?>" class="form-control"></td>
</tr>
<tr>
<td>Price</td>
<td><input type="text" name="price" value="<?php echo $price;?>" class="form-control"></td>
</tr>
<tr>
<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
<td><input type="submit" name="update" value="Update" class="btn btn-success"></td>
</tr>
</table>
</form>
</body>
</html>