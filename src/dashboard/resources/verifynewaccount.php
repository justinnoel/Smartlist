<?php
session_start();
include "../cred.php";
$_SESSION['re_id'] = intval($_SESSION['re_id']);
if(isset($_SESSION['re_id']) && hash('sha256', $_SESSION['re_id']) == $_GET['u']) {
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE login SET accept='1' WHERE id=:sessid";
    // echo $_SESSION['re_id'];
    // Prepare statement
    $stmt = $conn->prepare($sql);
    // execute the query
    $stmt->execute(array(
      ":sessid" => $_SESSION['re_id']
    ));
    // echo $stmt->rowCount() . " records UPDATED successfully";
    // echo a message to say the UPDATE succeeded
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "INSERT INTO auth_ip (ip, login)
  VALUES (".json_encode(md5($_SERVER['REMOTE_ADDR'])).", ".json_encode(($_SESSION['re_id'])).")";
      // use exec() because no results are returned
      $conn->exec($sql);
      header('Location: https://smartlist.ga/dashboard/login.php?new');
    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;



  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }

  $conn = null;
}
else {    exit("Session has expired. This might occur due to inactivity, or clicking the link from another device. Try re-verifying your email again");
}
?>