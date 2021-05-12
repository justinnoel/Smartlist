<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//if(isset($_GET['Submit'])) {
$name = $_GET['name'];
$qty = $_GET['qty'];
$price = $_GET['price'];
$loginId = $_SESSION['id'];

// checking empty fields
if(empty($name) || empty($qty) || empty($price)) {
if(empty($name)) {
echo "<font color='red'>Item name is empty</font><br/>";
}

if(empty($qty)) {
echo "<font color='red'>Priority is empty</font><br/>";
}

if(empty($price)) {
echo "<font color='red'>Due date is empty</font><br/>";
}

//link to the previous page
echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
} else {
// if all the fields are filled (not empty)

//insert data to database
$result = mysqli_query($mysqli, "INSERT INTO products(name, qty, price, login_id) VALUES('$name','$qty','$price', '$loginId')");

//display success message
header('Location: test.php?room=1');

}
//}
?>
</body>
</html>
