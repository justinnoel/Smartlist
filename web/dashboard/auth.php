<?php
session_start();
$_COOKIE['attempts']++;
if(!isset($_COOKIE['attempts'])) {
setcookie('attempts', 0, time() + (86400 * 1), "/");
}
if(isset($_COOKIE['attempts']) && $_COOKIE['attempts'] >= 4) {echo 'max';exit();}
include('cred.php');
if(isset($_GET['sett'])) {$msg1 = "Please login again"; }
try {
  $db = new PDO('mysql:host='.$servername.';dbname='.$dbname.';charset=utf8mb4', $username, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);  
} catch (PDOException $e) {
  echo "Connection failed : ". $e->getMessage();
}
$msg = ""; 
$pwd_hash = password_hash($_POST['password'], PASSWORD_ARGON2I);
// echo $pwd_hash;
  $username = trim($_POST['username']);
  $password = trim($pwd_hash);
  if($username != "" && $password != "") {
    try {
      $query = "SELECT * from `login` WHERE `username`=:username OR `email` =:usernamea";
      $stmt = $db->prepare($query);
      $stmt->bindParam('username', $username, PDO::PARAM_STR);
      $stmt->bindParam('usernamea', $username, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $row   = $stmt->fetch(PDO::FETCH_ASSOC);
      if($count == 1 && !empty($row)) {
          $auth_email = $row['email'];
          $auth_pwd = $row['password'];
          if(password_verify($_POST['password'], $auth_pwd)) {
             $validuser = $row['username'];
             $_SESSION['valid'] = $validuser;
             $_SESSION['name'] = htmlspecialchars(decrypt($row['name']));
             $_SESSION['id'] = htmlspecialchars($row['id']);
             $_SESSION['email'] = htmlspecialchars(decrypt($row['email']));
             $_SESSION['username'] = htmlspecialchars($row['username']);
             $_SESSION['notifications'] = htmlspecialchars($row['notifications']);
             $_SESSION['number_notify'] = htmlspecialchars($row['remind']);
             $t = htmlspecialchars($row['syncid']);
             if (empty($t)) {
                $_SESSION['syncid'] = -1;
             }
             else {
                 if($row['accept'] == 0) {
                     $_SESSION['syncid'] = $t;
                 }
                 else {
                     $_SESSION['syncid'] = -1;
                 }
             }
             $ta = $row['user_avatar'];
             if (empty($ta)) {
                $_SESSION['avatar'] = "https://i.stack.imgur.com/34AD2.jpg";
             }
             else {
                $_SESSION['avatar'] = htmlspecialchars($ta);
             }
             $_SESSION['welcome'] = htmlspecialchars($row['welcome']);
             $_SESSION['theme'] = htmlspecialchars($row['theme']);
             if($row['welcome'] === "1") {
             setcookie('attempts', 0, time() + (86400 * 30), "/");
             echo 'Valid';
             }
             else {
                 echo "Welcome";
             }
          }
          else {
        setcookie('attempts', $_COOKIE['attempts']++, time() + (86400 * 30), "/");
        echo 'Invalid';
      }
      } else {
        setcookie('attempts', $_COOKIE['attempts']++, time() + (86400 * 30), "/");
        echo 'Invalid';
      }
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  } else {
    echo 'Empty';
  }
?>