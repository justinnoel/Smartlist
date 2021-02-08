<?php 
session_start();
if(isset($_SESSION['valid'])) {
    header("Location: https://smartlist.ga/dashboard/beta");
    exit;
}
try {
  $db = new PDO('mysql:host=OMMITED;dbname=OMMITED;charset=utf8mb4', 'OMMITED', 'OMMITED');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);  
} catch (PDOException $e) {
  echo "Connection failed : ". $e->getMessage();
}
$msg = ""; 
if(isset($_POST['submitBtnLogin'])) {
  $username = trim($_POST['username']);
  $password = trim(md5($_POST['password']));
  if($username != "" && $password != "") {
    try {
      $query = "SELECT * from `login` where `username`=:username AND `password`=:password";
      $stmt = $db->prepare($query);
      $stmt->bindParam('username', $username, PDO::PARAM_STR);
      $stmt->bindValue('password', $password, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $row   = $stmt->fetch(PDO::FETCH_ASSOC);
      if($count == 1 && !empty($row)) {
 $validuser = $row['username'];
 $_SESSION['valid'] = $validuser;
 $_SESSION['name'] = $row['name'];
 $_SESSION['id'] = $row['id'];
 $_SESSION['email'] = $row['email'];
 $_SESSION['notifications'] = $row['notifications'];
 $_SESSION['number_notify'] = $row['remind'];
 $t = $row['syncid'];
 if (empty($t)) {
 $_SESSION['syncid'] = -1;
 }
 else {
 $_SESSION['syncid'] = $t;
 }
 $ta = $row['user_avatar'];
 if (empty($ta)) {
 $_SESSION['avatar'] = "https://i.stack.imgur.com/34AD2.jpg";
 }
 else {
 $_SESSION['avatar'] = $ta;
 }
 //$_SESSION['avatar'] = $row['user_avatar'];
 $_SESSION['welcome'] = $row['welcome'];
 $_SESSION['theme'] = $row['theme'];
       /*
        echo "Theme: ".$_SESSION['theme']."<br>";
        echo "Name: ".$_SESSION['name']."<br>";
        echo "Email: ".$_SESSION['email']."<br>";
        echo "Avatar: ".$_SESSION['avatar']."<br>";
        echo "Welcome: ".$_SESSION['welcome']."<br>";
        echo "Sync ID: ".$_SESSION['syncid']."<br>";
        echo "Notifications".$_SESSION['notifications']."<br>";
        echo "Notify me when I have: ".$_SESSION['number_notify']."<br>";
        echo "ID: ".$_SESSION['id']."<br>";
        //----------------------------------------
        echo $_SESSION['theme'];
        echo $_SESSION['name'];
        echo $_SESSION['email'];
        echo $_SESSION['avatar'];
        echo $_SESSION['welcome'];
        echo $_SESSION['syncid'];
        echo $_SESSION['notifications'];
        echo $_SESSION['number_notify'];
        echo $_SESSION['id'];
        */
       header("location: https://smartlist.ga/dashboard/beta");
      } else {
        $msg = "Invalid username and password. Please try again or reset your password";
      }
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  } else {
    $msg = "Both fields are required!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Cloudflare Web Analytics --><script defer src='https://static.cloudflareinsights.com/beacon.min.js' data-cf-beacon='{"token": "3d832d4dead94e2dbb026d0270446990"}'></script><!-- End Cloudflare Web Analytics -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
<link rel="shortcut icon" href="https://smartlist.ga/dashboard/rooms/images/icon%20(1).png">
<link rel="favicon" href="https://smartlist.ga/dashboard/rooms/images/icon%20(1).png">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<script src="pwa.js" defer></script>
<link rel="manifest" href="manifest.webmanifest">
</head>
<style>
* {
    -webkit-touch-callout:none;                /* prevent callout to copy image, etc when tap to hold */
    -webkit-text-size-adjust:none;             /* prevent webkit from resizing text to fit */
    -webkit-tap-highlight-color:rgba(0,0,0,0); /* prevent tap highlight color / shadow */
}
* {font-family: 'Poppins', sans-serif;box-sizing:border-box;}
* {box-sizing: border-box;}
.input-container {
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}
.icon {
  padding: 10px;
  background: #fff;
  color: gray;
  border: 2px solid #eee;
  border-right: 0;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  border: 2px solid #eee;
  outline: none;
  border-left:0;
}
.btn {
  background-color: #3f5ac8;
  color: white;
  box-shadow: 2px 2px 10px rgba(53, 84, 209,.5);
  outline:0;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
  outline:0;
}

.btn:active {
  opacity: 1;
}
.col {
  float: left;
  width: 50%;
  height: 100vh;
  padding: 10px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
body {
    margin: 0;
    overflow: hidden;
}
.bg {
    background-image: url(https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fc.pxhere.com%2Fphotos%2Fdf%2F33%2Fmountains_snowy_peaks_mountain_top_scenery_top_range_slopes-543415.jpg!d&f=1&nofb=1);
  background-size: cover;
  background-position: center;
}
.center {
    text-align:center
}
i {
    user-select:none;
}
h1 {
    color: #11203f;
    margin:0;
}
p {
    color: #9d9fa6;
    
}
.brand {
    color: #374ebc;
    margin-bottom: 15vh;
}
.container {
    padding: 20px;
}
span:empty {
    display:none;
}
.btn {
    border-radius: 5px !important;
}
hr {
    border: 0;
    height: 0;
    border-top: 1px solid rgba(0, 0, 0, 0.1);
    border-bottom: 1px solid rgba(255, 255, 255, 0.3);
}
@media screen and (max-width: 600px) {
  .col {
    width: 100%;
  }
  .bg{
      display: none;
  }
  body {
      overflow-y: scroll;
  }
  span {
      position: fixed;
      bottom: 0 !important;
      left: 0;
      width: 100%;
      margin: 0;
      border-radius: 0 !important;
      animation: span 5s forwards;
  }
  @keyframes span {
      0% {
          margin-bottom: 0px;
      }
      90% {
        margin-bottom: 0px;
      }
      100% {
          margin-bottom: -100px;
      }
  }
}
.add-button {
    opacity:0;
}
</style>
<form method="post">
    <div class="row">
        <div class="col">
            <p class="brand">Smartlist</p>
            <div class="container">
            <h1>Hi there, Welcome back!</h1>
            <p>Access your entire home at the tap of a button!</p>
    <div class="input-container">
        <i class="material-icons icon">email</i>
        <input type="text" name="username" id="username" value="" autocomplete="off" class="input-field" autofocus placeholder="Username"/>
        </div>
        <div class="input-container">
        <i class="material-icons icon">lock_outline</i>
        <input type="password" name="password" id="password" value="" autocomplete="off" class="input-field" style="border-right:0;" placeholder="Password"/>
        <i class="material-icons icon" style="border-right: 2px solid #eee;border-left:0;user-select:none;cursor:pointer" onclick="myFunction(); document.getElementById('password').focus()">visibility</i>
        </div><a href="./resources/fp.php" style="float:right;color: gray;text-decoration:none">Forgot Password?</a>
        <button type="submit" name="submitBtnLogin" id="submitBtnLogin" value="Login"  class="btn"/>Login</button><br><br><hr>
        Don't have an account yet? You're missing out on so much! <a href="register.php">Sign Up!</a>
        </div>
        </div>
        <div class="col bg"></div>
        <button class="add-button">Add to home screen</button>
</form>
        <span class="loginMsg" style="position: fixed;bottom:10px;right:10px;color:white;background:#212121;padding:10px;max-width:100%;border-radius:4px;"><?php echo @$msg;?></span><br><br><hr>

<script>
function myFunction() {
  var passwordx = document.getElementById("password");
  if (passwordx.type === "password") {
    passwordx.type = "text";
  } else {
    passwordx.type = "password";
  }
}
</script>
