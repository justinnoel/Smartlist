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
        header("Location: https://smartlist.ga/dashboard/resources/beta-login.php?incorrect");
      }
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  } else {
    header("Location: https://smartlist.ga/dashboard/resources/beta-login.php?empty");
  }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Login | Smartlist
        </title>
        <link rel="favicon" href="https://i.ibb.co/FDqN0Vh/Screenshot-2021-02-02-at-7-55-08-AM-2.png">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="https://i.ibb.co/FDqN0Vh/Screenshot-2021-02-02-at-7-55-08-AM-2.png">
        <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" as="style">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="preload" href="https://fonts.googleapis.com/icon?family=Material+Icons" as="style">
        <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js" as="script">
        <link rel="preload" href="https://i.ibb.co/FDqN0Vh/Screenshot-2021-02-02-at-7-55-08-AM-2.png" as="image"> 
        <link rel="preload" href="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fc.pxhere.com%2Fphotos%2Fdf%2F33%2Fmountains_snowy_peaks_mountain_top_scenery_top_range_slopes-543415.jpg!d&f=1&nofb=1" as="image">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <style>
            .s100vh {
                height: 100vh;
            }
            .btn:focus {
                box-shadow:0 9px 12px -6px rgba(0,0,0,.2),0 19px 29px 2px rgba(0,0,0,.14),0 7px 36px 6px rgba(0,0,0,.12)!important
            }
            body {
                overflow:hidden;
            }
            *:not(.material-icons) {font-family: 'Poppins', sans-serif !important;}
            .bg {
                background: url(https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fc.pxhere.com%2Fphotos%2Fdf%2F33%2Fmountains_snowy_peaks_mountain_top_scenery_top_range_slopes-543415.jpg!d&f=1&nofb=1);
            }
            .btn {
                box-shadow:0 5px 6px -3px rgba(0,0,0,.2),0 9px 12px 1px rgba(0,0,0,.14),0 3px 16px 2px rgba(0,0,0,.12)!important;
                line-height: 50px;
                height: auto;
                width:100%;
            }
            .btn:hover {
                width: 100%;
                box-shadow:0 8px 9px -5px rgba(0,0,0,.2),0 15px 22px 2px rgba(0,0,0,.14),0 6px 28px 5px rgba(0,0,0,.12)!important;
            }
            .btn[disabled] {
                box-shadow: none !important;
            }
            #toast-container {
              top: auto !important;
              bottom: 5%;
              right: 5%;
            }
            .waves-ripple {
                transition-duration: .6s !important;
                transition-timing-function: cubic-bezier(.41,1.3,.77,1.2) !important
            }
            p {
                color: #9d9fa6;
            }
            h4 {
                color: #11203f;
                font-weight: bold;
            }
            .circular { -webkit-animation: rotate 2s linear infinite; animation: rotate 2s linear infinite; height: 50px; width: 50px; } .path { stroke-dasharray: 1, 200; stroke-dashoffset: 0; -webkit-animation: dash 1.5s ease-in-out infinite, color 6s ease-in-out infinite; animation: dash 1.5s ease-in-out infinite, color 6s ease-in-out infinite; stroke-linecap: round; stroke: #3f88f8; } @-webkit-keyframes rotate { 100% { transform: rotate(360deg); } } @keyframes rotate { 100% { transform: rotate(360deg); } } @-webkit-keyframes dash { 0% { stroke-dasharray: 1, 200; stroke-dashoffset: 0; } 50% { stroke-dasharray: 89, 200; stroke-dashoffset: -35; } 100% { stroke-dasharray: 89, 200; stroke-dashoffset: -124; } } @keyframes dash { 0% { stroke-dasharray: 1, 200; stroke-dashoffset: 0; } 50% { stroke-dasharray: 89, 200; stroke-dashoffset: -35; } 100% { stroke-dasharray: 89, 200; stroke-dashoffset: -124; } }
            * {font-smooth: always;}
            @media only screen and (max-width: 600px) { 
                #toast-container {
                  top: auto !important;
                  right: auto !important;
                  bottom: 0;
                  left:0;  
                }
            }
        </style>
    </head>
    <body>
        <div class="row">
            
            <div class="col s12 m6 s100vh">
                <div style="float:left;padding:20px;padding-left: 10px;">
                    <a href="https://smartlist.ga/" class="brand-logo left"><img class="materialboxed" style="display:inline-block;vertical-align:middle;margin: 0 10px" src="https://i.ibb.co/FDqN0Vh/Screenshot-2021-02-02-at-7-55-08-AM-2.png" width="30px" ><span style="vertical-align:middle;font-size: 20px;color:gray">Smartlist</span></a>
                </div><br>
                <div style='padding: 20px;display: table; margin: 0 auto;margin-top: 15vh;'>
                    <h4>Hi there, Welcome back!</h4>
                    <p>Access your entire home at the tap of a button!</p>
                      <div class="row">
                        <form class="col s12" method="POST">
                          <div class="row">
                            <div class="input-field col s12" id="pre_1">
                              <i class="material-icons prefix">email</i>
                              <input id="icon_prefix" type="text" class="validate" name='username' autocomplete="off">
                              <label for="icon_prefix">Email</label>
                            </div>
                            <div class="input-field col s12" id="pre_2">
                          <i class="material-icons prefix">lock_outline</i>
                              <input id="icon_telephone" type="tel" class="validate" name='password' autocomplete="off">
                              <label for="icon_telephone">Password</label>
                                <p>
                                  <label>
                                    <input type="checkbox" id='cbx'/>
                                    <span>Remember me</span>
                                  </label>
                                </p>
                            </div>
                            <div class='col s12' id='load' style='padding: 0 !important;background:white'>
                            </div>
                            <div class="col s12">
                                <button class="btn purple darken-3 waves-effect waves-light" name='submitBtnLogin' onclick="load();var e=this;setTimeout(function(){e.disabled=true; setTimeout(function(){ e.innerHTML = 'Decrypting your account...' ; setTimeout(function(){ e.innerHTML = 'Cross-verifying your request...' }, 0700);}, 0700);},0200);return true;">Login</button>
                            </div>
                          </div>
                        </form>
                      <div class="col s12">
                          Don't have an account yet? <a href="https://smartlist.ga/signup">Sign up!</a>
                      </div>
                     </div>
                </div>
            </div>
            <div class="col s6 hide-on-med-and-down bg s100vh"></div>
        </div>
        <script>
            window.onload= function() {window.scrollTo(0, 0);}
        function load() {
            document.querySelector('#pre_1').style.opacity = 0;
            document.querySelector('#pre_2').style.opacity = 0;
            document.getElementById('load').innerHTML = '<div style="width: 100%;background-color:#fff;positon:fixed;height: 200px;margin-top: -200px;z-index:99999"><center><br><svg class="circular" height="50" width="50"> <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="6" stroke-miterlimit="10" /> </svg></center><br><br><br></div>';
        }
        </script>
        <?php if(isset($_GET['empty'])) {?>
        <script>
              window.onload=function() {M.toast({html: 'Login Details are empty. Please try again'})}
              function checkCookie(){
                var cookieEnabled = navigator.cookieEnabled;
                if (!cookieEnabled){ 
                    document.cookie = "testcookie";
                    cookieEnabled = document.cookie.indexOf("testcookie")!=-1;
                }
                return cookieEnabled || showCookieFail();
            }
            
            function showCookieFail(){
              document.getElementById('cbx').disabled = true;
            }
            checkCookie();
        </script>
        <?php } ?>
        <?php if(isset($_GET['incorrect'])) {?>
        <script>
              window.onload=function() {M.toast({html: 'Incorrect Username or Password'})}
        </script>
        <?php } ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>