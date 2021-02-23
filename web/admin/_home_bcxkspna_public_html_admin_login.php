<?php session_start(); ?>
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
<title>Login</title>
</head>

<body>
<a href="index.php">Home</a> <br />
<?php
include("connection.php");

if(isset($_POST['submit'])) {
$user = mysqli_real_escape_string($mysqli, $_POST['username']);
$pass = mysqli_real_escape_string($mysqli, $_POST['password']);

if($user == "" || $pass == "") {
echo "Either username or password field is empty.";
echo "<br/>";
echo "<a href='login.php'>Go back</a>";
} else {
$result = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$user' AND password=md5('$pass')")
or die("Could not execute the select query.");

$row = mysqli_fetch_assoc($result);

if(is_array($row) && !empty($row)) {
$validuser = $row['username'];
$_SESSION['valid'] = $validuser;
$_SESSION['name'] = $row['name'];
$_SESSION['id'] = $row['id'];
} else {
echo "Invalid username or password.";
echo "<br/>";
echo "<a href='login.php'>Go back</a>";
}

if(isset($_SESSION['valid'])) {
header('Location: index.php');
}
}
} else {
?>
<p><font size="+2">Login</font></p>
<form name="form1" method="post" action="">
<table width="75%" border="0">
<tr>
<td width="10%">Username</td>
<td><input type="text" name="username"></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" name="password"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" name="submit" value="Submit"></td>
</tr>
</table>
</form>
<?php
}
?>
</body>
</html>