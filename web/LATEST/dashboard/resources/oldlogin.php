<?php 
session_start();
if(isset($_SESSION['valid'])) {
    header("Location: https://smartlist.ga/dashboard/beta");
    exit;
}
if(isset($_GET['sett'])) {$msg1 = "Please login again"; }
try {
  $db = new PDO('mysql:host=localhost;dbname=bcxkspna_test;charset=utf8mb4', 'bcxkspna', 'Q$J~:4GI!7+E');
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
        /******************** Your code ***********************/
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
<meta property="og:image" content="https://i.ibb.co/J74KsvT/Screenshot-2021-02-03-at-2-22-53-PM-2.jpg">
      <meta property="og:type" content="website" />
      <meta property="og:description" content="Hey! Have you ever spent so much buying extra groceries which you already have at home? Studies show that people over-buy items which they already have, making them spend hundreds of dollars! Ever wanted to keep track of what you have in your home for free? Smartlist lets you track what's in your home, anywhere, anytime, for free!" />
      <meta name="twitter:card" content="https://i.ibb.co/J74KsvT/Screenshot-2021-02-03-at-2-22-53-PM-2.jpg">
      <meta name="twitter:site" content="@smartlist">
      <meta name="twitter:title" content="Smartlist">
      <meta name="twitter:description" content="Hey! Have you ever spent so much buying extra groceries which you already have at home? Studies show that people over-buy items which they already have, making them spend hundreds of dollars! Ever wanted to keep track of what you have in your home for free? Smartlist lets you track what's in your home, anywhere, anytime, for free!">
      <meta name="twitter:domain" content="smartlist.ga">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
      <meta name="keywords" content="Home, Database, Inventory, free, Smartlist">
      <meta name="robots" content="index, follow">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="language" content="English"><link rel="shortcut icon" href="https://smartlist.ga/dashboard/rooms/images/icon%20(1).png">
<link rel="favicon" href="https://smartlist.ga/dashboard/rooms/images/icon%20(1).png">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<script src="pwa.js" defer></script>
<link rel="manifest" href="manifest.webmanifest">
</head>
<style>
* {
    -webkit-touch-callout:none;                
    -webkit-text-size-adjust:none;             
    -webkit-tap-highlight-color:rgba(0,0,0,0);
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
  background: #3f5ac8;
  color: white;
  box-shadow: 3px 3px 6px rgba(53, 84, 209,.5);
  outline:0;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
  outline:0;
  transition: all .2s;
}
 #circle { z-index:99999999999999999999999999;position:fixed; top:10px; right: 10px; width: 20px; height: 20px; border: 3px solid transparent; border-top: 3px solid #036bfc; border-left: 3px solid #036bfc; border-radius: 999px; animation: rotate .5s linear infinite; transform: rotate(45deg); } #bar { z-index: 999999999999999999999999999999999999999999999999999999999999999;background: #4287f5; width: 1%; height: 2px; position: fixed; top: 0; left: 0; animation: bar 3s forwards cubic-bezier(1,1.08,0,1); } #bar:after { content: ''; width: 60px; height: 1px; /* Half of the original height */ margin-left: -10px;; margin-top: -105px; float:right; box-shadow: 0 100px 5px 5px #036bfc; z-index: -1; animation: bar-after 2s forwards cubic-bezier(1,1.08,0,1) } @keyframes bar-after{ 100%{ right:0; } } @keyframes bar { 0% {width:0%} 60% {width: 100%;opacity:1} 99% {width: 100%;opacity:1} 100% {width:100%;opacity:1;} } @keyframes rotate { 0% { transform:rotate(0deg); opacity:1 } 100% { transform:rotate(360deg); opacity:1 } }#toast-container { top: auto !important; right: auto !important; bottom: 5%; left:2%; }
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
a {
text-decoration:none;color:#03a5fc;}
.add-button {
    opacity:0;
}
  #submitBtnLogin[disabled] {
  background-color: #aaa !important;
  box-shadow:none !important;
  cursor: wait;
}
</style>
<body onload="bar();run();">
<div id="bar" style="display:none"></div>
<div id="circle" style="display:none"></div>
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
        <button type="submit" name="submitBtnLogin" id="submitBtnLogin" value="Login" onclick="bar();var e=this;setTimeout(function(){e.disabled=true;},10);return true;" class="btn"/>Login</button><br><br><hr>
        Don't have an account yet? You're missing out on so much! <a href="register.php">Sign Up!</a>
        </div>
        </div>
        <div class="col bg"></div>
        <button class="add-button">Add to home screen</button>
</form>
        <span class="loginMsg" style="position: fixed;bottom:10px;right:10px;color:white;background:#212121;padding:10px;max-width:100%;border-radius:4px;"><?php echo @$msg;?></span><br><br><hr>
        <span class="loginMsg" style="position: fixed;bottom:10px;right:10px;color:white;background:#212121;padding:10px;max-width:100%;border-radius:4px;"><?php echo $msg1;?></span><br><br><hr>

<script>
function myFunction() {
  var passwordx = document.getElementById("password");
  if (passwordx.type === "password") {
    passwordx.type = "text";
  } else {
    passwordx.type = "password";
  }
}
var setTimeoutv;
    function bar() {
        clearTimeout(setTimeoutv);
        document.getElementById("bar").style.display = "block";
        document.getElementById("circle").style.display = "block";
        setTimeoutv = setTimeout(function() {
            document.getElementById("bar").style.display = "none";
            document.getElementById("circle").style.display = "none";
        }, 3000);
    }
</script>
