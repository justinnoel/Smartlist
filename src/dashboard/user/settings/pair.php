<?php 
session_start();
include('cred.php');
$id = $_SESSION['id'];
$name = $_POST['pairingaccountid'];
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "UPDATE login SET accept=1, syncid=:syncid WHERE id=:sessid";

  // Prepare statement
  $stmt = $conn->prepare($sql);

  // execute the query
  $stmt->execute( array(':syncid'=>$name, ':sessid'=>$_SESSION['id']) );

  // echo a message to say the UPDATE succeeded
  // echo $stmt->rowCount() . " records UPDATED successfully";
  ?>
  Successfully paired your account! You might have to refresh this page and/or log out and back in.
<?php
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>