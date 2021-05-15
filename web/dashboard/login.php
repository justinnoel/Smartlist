<?php 
session_start();
include('cred.php');
if(isset($_SESSION['valid'])) {
  header("Location: https://smartlist.ga/dashboard/beta");
  exit;
}
if(isset($_COOKIE['attempts']) && $_COOKIE['attempts'] >= 4) {$invalid = 1;} 
if(!isset($_COOKIE['attempts'])) {setcookie('attempts', 0, time() + (86400 * 30), "/");}
?>
<?php if(!isset($invalid)) {?>
<!DOCTYPE html>
<html>
  <head>
    <title>
        Login | Smartlist
    </title>
    <link rel="manifest" href="manifest.webmanifest"> 
    <script src="https://smartlist.ga/dashboard/pwa.js" defer></script>
    <link rel="favicon" href="https://i.ibb.co/BypMsZY/smartlist-logo.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"><meta name="apple-mobile-web-app-capable" content="yes">
    <link href="https://fonts.googleapis.com/css2?family=Exo:wght@300&display=swap" rel="stylesheet">
    <meta name="theme-color" content="rgb(235, 235, 235)">
    <meta name="google-signin-client_id" content="1058366333433-6vccc9duct6c3uov94aklgaj19nqp3bv.apps.googleusercontent.com">
    <link rel="shortcut icon" href="https://res.cloudinary.com/smartlist/image/upload/v1617905788/logo_z3yoqm.svg">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="keywords" content="Smartlist, Homebase, KeepInventory, Smartlist dashboard, Smart List, List, Inventory, Home, Smartlist app, Smart list app, Smartlist Dashboard, Smartlist login, Smartlist Signup, Smart list login, Smart list sign up, Smart list signup, smart list register, Smartlist logo, smartist, smarst, smatist, smartlist login">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <link rel="favicon" href="https://res.cloudinary.com/smartlist/image/upload/v1617905788/logo_z3yoqm.svg"> <link rel="apple-touch-icon" href="https://res.cloudinary.com/smartlist/image/upload/v1617905788/logo_z3yoqm.svg" /> 
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" as="style">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="preload" href="https://fonts.googleapis.com/icon?family=Material+Icons" as="style">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-S0PH6N0Z7E"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-S0PH6N0Z7E');
    </script>
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js" as="script">
    <link rel="preload" href="https://i.ibb.co/BypMsZY/smartlist-logo.png" as="image"> 
    <link rel="preload" href="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fc.pxhere.com%2Fphotos%2Fdf%2F33%2Fmountains_snowy_peaks_mountain_top_scenery_top_range_slopes-543415.jpg!d&f=1&nofb=1" as="image">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
      .s100vh {
        height: 104vh;
      }
      .btn:focus {
        box-shadow:0 9px 12px -6px rgba(0,0,0,.2),0 19px 29px 2px rgba(0,0,0,.14),0 7px 36px 6px rgba(0,0,0,.12)!important
      }
      html {
        overflow:hidden;
      }
      *:not(.material-icons) {font-family: 'Poppins', sans-serif !important;}
      .bg {
        transition: all .2s;
        /*background: #eee url(https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fc.pxhere.com%2Fphotos%2Fdf%2F33%2Fmountains_snowy_peaks_mountain_top_scenery_top_range_slopes-543415.jpg!d&f=1&nofb=1);*/
        background-size: cover;background-repeat: no-repeat;
        background:#eee;
      }
      .btn {
        box-shadow:0 5px 6px -3px rgba(0,0,0,.2),0 9px 12px 1px rgba(0,0,0,.14),0 3px 16px 2px rgba(0,0,0,.12)!important;
        line-height: 50px;
        height: auto;
        width:100%;
      }
      html {overflow-x: hidden;}
      .s100vh {background: #eee;}
      .bg1 {animation: blur .3s forwards linear;animation-delay: 3s;background-size: 200%;}
      /*@keyframes blur {0% {backdrop-filter: blur(10px);} 100% {backdrop-filter: blur(10px);}}*/

      .i1 {background: #eee url(https://cdn.the-scientist.com/assets/articleNo/66864/aImg/35078/foresttb-m.jpg);                background-size: cover;background-repeat: no-repeat;
      }
      .i2 {background:url(https://www.youandthemat.com/wp-content/uploads/nature-2-26-17.jpg);                background-size: cover;background-repeat: no-repeat;
      }
      .i4 {background: #eee url(https://imgproxy.natucate.com/PAd5WVIh-tjEKQM4Z6tm6W1J4Yc2JIYWrKEroD1c7mM/rs:fill/g:ce/w:3840/h:2160/aHR0cHM6Ly93d3cubmF0dWNhdGUuY29tL21lZGlhL3BhZ2VzL3JlaXNlYXJ0ZW4vNmMwODZlYmEtNzk3Yi00ZDVjLTk2YTItODhhNGM4OWUyODdlLzM3NjYwMTQ2NjMtMTU2NzQzMzYxMi8xMl9kYW5pZWxfY2FuX2JjLTIwNy5qcGc);}
      .i3 {background: #eee url(https://dynaimage.cdn.cnn.com/cnn/c_fill,g_auto,w_1200,h_675,ar_16:9/https%3A%2F%2Fcdn.cnn.com%2Fcnnnext%2Fdam%2Fassets%2F191014133527-saba-nature-2.jpg);background-size: cover;background-repeat: no-repeat;}
      .i4 {background:url(https://www.atlasandboots.com/wp-content/uploads/2019/05/ama-dablam2-most-beautiful-mountains-in-the-world.jpg);}
      .i5 {background: #eee url(https://cms.hostelworld.com/hwblog/wp-content/uploads/sites/2/2018/12/kirkjufell.jpg);}
      .i6 {background: #eee url(https://www.teahub.io/photos/full/0-8009_yosemite-national-park-wallpaper-4k.jpg);}
      .i7 {background: #eee url(https://images.unsplash.com/photo-1606055854326-12a2fdcac6c0?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MXx8NGslMjBtb3VudGFpbnxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&w=1000&q=80);}
      .i8 {background: #eee url(https://i.pinimg.com/originals/04/ef/5e/04ef5e1743f2123165f573616c533885.jpg);}
      .i9 {background: #eee url(https://wallpaperaccess.com/full/38582.jpg);}
      .i10 {background: #eee url(https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fc.pxhere.com%2Fphotos%2Fdf%2F33%2Fmountains_snowy_peaks_mountain_top_scenery_top_range_slopes-543415.jpg!d&f=1&nofb=1);}
      .i11 {background: #eee url(https://3.bp.blogspot.com/-_wFRydnnl9E/WtTUN_X0RpI/AAAAAAAABLw/iJKhQKYMLBMRdJfd1nDAqdIfhgUqyF19ACEwYBhgL/s1600/1.jpg);}
      * {
        background-size: cover !important;background-repeat: no-repeat !important;outline:0;
      }
      .col {margin:0 !important;}
      i, h1, h2, h3, h4, a,#toast-container,label,span, p,br {user-select:none;}
      .btn:hover {
        width: 100%;
        box-shadow:0 8px 9px -5px rgba(0,0,0,.2),0 15px 22px 2px rgba(0,0,0,.14),0 6px 28px 5px rgba(0,0,0,.12)!important;
      }
      .col .col {
        margin: 5px 0 !important;
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
      .btn {
        border-radius: 4px;
      }
      p {
        color: #9d9fa6;
      }
      h4 {
        color: #11203f;
        font-weight: bold;
      }
      input {
        background-color: #fff !important;
        background-image:none !important;
        -webkit-box-shadow: 0 0 0px 1000px #fff inset;

        color: #000000 !important;
      }
      .as {background: #eee;}
      .circular { -webkit-animation: rotate 2s linear infinite; animation: rotate 2s linear infinite; height: 50px; width: 50px; } .path { stroke-dasharray: 1, 200; stroke-dashoffset: 0; -webkit-animation: dash 1.5s ease-in-out infinite, color 6s ease-in-out infinite; animation: dash 1.5s ease-in-out infinite, color 6s ease-in-out infinite; stroke-linecap: round; stroke: #3f88f8; } @-webkit-keyframes rotate { 100% { transform: rotate(360deg); } } @keyframes rotate { 100% { transform: rotate(360deg); } } @-webkit-keyframes dash { 0% { stroke-dasharray: 1, 200; stroke-dashoffset: 0; } 50% { stroke-dasharray: 89, 200; stroke-dashoffset: -35; } 100% { stroke-dasharray: 89, 200; stroke-dashoffset: -124; } } @keyframes dash { 0% { stroke-dasharray: 1, 200; stroke-dashoffset: 0; } 50% { stroke-dasharray: 89, 200; stroke-dashoffset: -35; } 100% { stroke-dasharray: 89, 200; stroke-dashoffset: -124; } }
      * {font-smooth: always;}
      /*body {animation: zoom .2s forwards;}*/
      @keyframes zoom {0% {opacity:0;transform: scale(1.1);}}
      @media only screen and (max-width: 600px) { 
        #toast-container {
          top: auto !important;
          right: auto !important;
          bottom: 0;
          left:0;  
        }
        html {
          overflow:scroll;
          padding-bottom: 20px;
        }
      }
      /* The alert message box */
      .alert {
        padding: 20px;
        background-color: #4a148c; /* Red */
        color: white;
        border-radius: 3px;
        margin-bottom: 15px;
      }

      /* The close button */
      .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
      }

      /* When moving the mouse over the close button */
      .closebtn:hover {
        transform: scale(1.1);
      }
      .abcRioButtonContents {
          display: none !important;
      }* {
            -webkit-touch-callout:none;                /* prevent callout to copy image, etc when tap to hold */
            -webkit-text-size-adjust:none;             /* prevent webkit from resizing text to fit */
            -webkit-tap-highlight-color:rgba(0,0,0,0); /* prevent tap highlight color / shadow */
        }
    body {
        overflow-x: hidden;
    }
      .abcRioButton {
          height: 56px !important;padding: 10px !important;margin-left: 10px;width: 56px !important;box-shadow:0 5px 6px -3px rgba(0,0,0,.2),0 9px 12px 1px rgba(0,0,0,.14),0 3px 16px 2px rgba(0,0,0,.12)!important;text-align:center;border-radius: 999px !important;
      }
      [data-theme="dark"] .white, [data-theme="dark"] html {background: #212121 !important;}
      [data-theme="dark"] body {color: white !important;}
      [data-theme="dark"] h4 {color: white !important;}
      [data-theme="dark"] input {color:white !important;background: transparent !important;}
      [data-theme="dark"] hr {display: none;}
      [data-theme="dark"] img {background: white;border-radius; 5px;overflow:hidden;}
      :root {--bg-color: white}
      [data-theme="dark"] {--bg-color: #212121}
    </style>
  </head>
  <body>
    <div class="row as">

      <div class="col s12 m6 s100vh white">
        <div style="float:left;padding:20px;padding-left: 10px;">
          <a href="https://smartlist.ga/" class="brand-logo left"><img class="materialboxed" style="display:inline-block;vertical-align:middle;margin: 0 10px" src="https://res.cloudinary.com/smartlist/image/upload/v1617905788/logo_z3yoqm.svg" width="30px" ><span style="vertical-align:middle;font-size: 20px;color:gray;font-family: 'Exo', sans-serif !important;">Smartlist</span></a>
        </div><br>
        <div style='padding: 20px;display: table; margin: 0 auto;margin-top: 15vh;'>
          <div class="alert hide-on-med-and-up" id='a2'>
            <span class="closebtn" onclick="localStorage.setItem('hide', 'true');this.parentElement.style.display='none';">&times;</span>
            We've made major changes to our security system.
            If you have trouble logging in, please email us at: manuthecoder@protonmail.com, or post a question on the <a href="https://community.smartlist.ga">community forum</a>
            <br><br><b>What does this mean?</b> - Your passwords are now encrypted with Argon2, one of the most secure hashing algorithms. This means that your passwords are securely stored. 
          </div>
          <h4>Hi there, Welcome back!</h4>
          <p>Access your entire home at the tap of a button!</p>
          <div class="row">
            <form class="col s12" method="POST"  autocomplete="off" id="__login" action="https://smartlist.ga/dashboard/auth.php">
              <div class="row">
                <div class="input-field col s12" id="pre_1">
                  <i class="material-icons prefix">email</i>
                  <input id="icon_prefix" type="text" class="validate" name='username' autocomplete="off"autofocus>
                  <label for="icon_prefix">Username or Email</label>
                </div>
                <div class="input-field col s12" id="pre_2">
                  <i class="material-icons prefix">lock_outline</i>
                  <input id="icon_telephone" type="password" class="validate" name='password' autocomplete="off">
                  <label for="icon_telephone">Password</label>
                  <p>
                    <label>
                      <input type="checkbox" id='p' onchange='TOGGLE_P()'/>
                      <span>Show password</span>
                    </label>
                  </p>
                </div>
                <div class='col s12' id='load' style='padding: 0 !important;background:var(--bg-color)'>
                </div>
                <div class="col s12">
                  <button class="btn purple darken-3 waves-effect waves-light" name='submitBtnLogin' onclick="load();var e=this;setTimeout(function(){e.disabled=true; var __1 = setTimeout(function(){ e.innerHTML = 'Decrypting your account...' ; }, 0700);}, 0200);return true;" id="__btn" disabled>Login</button>
                  <br>
                  <br>
                  <!--<div class="g-signin2" data-onsuccess="onSignIn"></div>-->
                </div>
              </div>
            </form>
            <div class="col s12">
              <span class='hide-on-small-only'>Don't have an account yet? </span><a href="https://smartlist.ga/signup">Sign up!</a> 
              <div class="right">
                <a href="http://smartlist.ga/dashboard/resources/fp.php">Forgot Password?</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div style="overflow:hidden;padding:0 !important" class="col s6 hide-on-small-only bg s100vh" data-aos="fade-in" id='bg' data-aos-delay="1000" data-aos-duration="1">
        <div class="bg1" style="backdrop-filter: blur(20px);width:100%;height:100%;overflow:hidden;margin:0">
          <div class="container" style="margin-top: 40vh">
            <div class="alert" id="a1">
              <span class="closebtn" onclick="localStorage.setItem('hide', 'true');this.parentElement.parentElement.parentElement.style.display='none';">&times;</span>
              We've made major changes to our security system.
              If you have trouble logging in, please email us at: manuthecoder@protonmail.com, or post a question on the <a href="https://community.smartlist.ga">community forum</a>
              <br><br><b>What does this mean?</b> - Your passwords are now encrypted with Argon2, one of the most secure hashing algorithms. This means that your passwords are securely stored. 
            </div>
          </div>
        </div>
      </div>
    </div>
    <button class="add-button" style="display:none !important;opacity:0;position:absolute;top: -999px;"></button>
    <script>
    document.getElementById('icon_prefix').addEventListener('input', function(e) {
        var x = document.getElementById('icon_prefix').value;
        var y = document.getElementById('icon_telephone').value;
        if(x !== null && x !== "" && y !== "" && y !== null) {
            document.getElementById('__btn').disabled = false
        }
    });
    document.getElementById('icon_telephone').addEventListener('input', function(e) {
        var x = document.getElementById('icon_prefix').value;
        var y = document.getElementById('icon_telephone').value;
        if(x !== null && x !== "" && y !== "" && y !== null) {
            document.getElementById('__btn').disabled = false
        }
    });
    window.addEventListener('load', function() {
        var x = document.getElementById('icon_prefix').value;
        var y = document.getElementById('icon_telephone').value;
        if(x !== null && x !== "" && y !== "" && y !== null) {
            document.getElementById('__btn').disabled = false
        }
    })
      window.onload= function() {window.scrollTo(0, 0);}
      if ($(window).width() > 960) {setInterval(function() {window.scrollTo(0,0)}, 100)}
      $(document).ready(function(){
        var classCycle=['i1','i2', 'i3', 'i4', 'i5', 'i6', 'i6', 'i7', 'i8', 'i9', 'i10', 'i11'];
        var randomNumber = Math.floor(Math.random() * classCycle.length);
        var classToAdd = classCycle[randomNumber];
        $('.bg').addClass(classToAdd);
      });
      function TOGGLE_P() {
        var x = document.getElementById("icon_telephone");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
      window.onload=function(){window.scrollTo(0,0)}
      function load() {
        document.querySelector('#pre_1').style.opacity = 0;
        document.querySelector('#pre_2').style.opacity = 0;
        document.getElementById('load').innerHTML = '<div style="width: 100%;background-color:#fff;positon:fixed;height: 200px;margin-top: -200px;z-index:99999"><center><br><svg class="circular" height="50" width="50"> <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" /> </svg></center><br><br><br></div>';
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
    <?php if(isset($_GET['logout'])) {?>
    <script>
      window.onload=function() {M.toast({html: 'Successfully logged out of your account'})}
    </script>
    <?php } ?>
    <?php if(isset($_GET['reg'])) {?>
    <script>
      window.onload=function() {M.toast({html: 'Successfully signed up! Please log in to your account!'})}
    </script>
    <?php } ?>
    <?php if(isset($_GET['incorrect'])) {?>
    <script>
      window.onload=function() {M.toast({html: 'Incorrect Username or Password'})}
    </script>
    <?php } ?>
    <?php if(isset($_GET['reset'])) {?>
    <script>
      window.onload=function() {M.toast({html: 'Changed password successfully. Please log in again'})}
    </script>
    <?php } ?>
    <?php if(isset($_GET['sett'])) {?>
    <script>
      window.onload=function() {M.toast({html: 'Successfully updated your settings. Please log in again'})}
    </script>
    <?php } ?>
    <script>
      AOS.init();
      window.onerror = function(msg, url, linenumber) {
        alert('Error message: '+msg+'\nURL: '+url+'\nLine Number: '+linenumber);
        return true;
      }
    </script>
    <script>
      function reset() {
        document.querySelector('#pre_1').style.opacity = 1;
        document.querySelector('#pre_2').style.opacity = 1;
        document.getElementById('load').innerHTML = '';
        document.getElementById('__login').reset();
        document.getElementById('icon_telephone').focus();
        document.getElementById('icon_prefix').focus();
        document.getElementById('__btn').disabled = false;
        setTimeout(function() {document.getElementById('__btn').innerHTML = 'Login';}, 800);
      }
      $("#__login").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        $.ajax({
          type: "POST",
          url: url,
          data: form.serialize(),
          success: function(data) {
            if(data == 'Invalid') {
              M.toast({html: 'Invalid username or password'});
              reset();
            }
            else if(data == 'Empty') {
              M.toast({html: 'Both fields are required'});
              reset();
            }
            else if (data == 'Valid') {
              sessionStorage.setItem('status','loggedIn');
              setTimeout(function() {
                  window.location.href='https://smartlist.ga/dashboard/beta';
              }, 300);
            }
            else if(data == "Welcome") {
                window.location.href = "https://smartlist.ga/dashboard/welcome"
            }
            else if (data == 'max') {
              window.location.reload();
              document.cookie = "attempts=5";
            }
          }
        });
      });
      if(localStorage.getItem('theme') == "dark") {
        document.documentElement.setAttribute('data-theme', 'dark');
        document.getElementsByTagName('icon_telephone').autocomplete = "new-password"
        document.getElementsByTagName('icon_prefix').autocomplete = "off"
      }
      function onSignIn(googleUser) {
          var profile = googleUser.getBasicProfile();
          document.getElementById('icon_prefix').value = profile.getEmail();
          var id_token = googleUser.getAuthResponse().id_token;
    }
    if(localStorage.getItem('hide')) {
        document.getElementById('a1').style.display = "none";
        document.getElementById('a2').style.display = "none";
    }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  </body>
</html>
<?php }
else {?>
<!DOCTYPE html>
<html>
  <head><title>Account Locked | Smartlist</title><link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <style>* {font-family: 'Nunito', sans-serif;}</style></head>
  <body>
    <center>
      <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/08aea422-eab9-428b-82c9-9c04e411bb8c/dbf6x7m-54540852-db91-4898-95b4-550d598cb906.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOiIsImlzcyI6InVybjphcHA6Iiwib2JqIjpbW3sicGF0aCI6IlwvZlwvMDhhZWE0MjItZWFiOS00MjhiLTgyYzktOWMwNGU0MTFiYjhjXC9kYmY2eDdtLTU0NTQwODUyLWRiOTEtNDg5OC05NWI0LTU1MGQ1OThjYjkwNi5qcGcifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6ZmlsZS5kb3dubG9hZCJdfQ.V5CQTr_KCILLH9Wa-gTjzxyuJFnURD2RTpOUyJnqit8" width="300px">
      <h1>Account Locked</h1>
      <h4>Please wait 1 day for your account to be unlocked, or use a different device or <a href="mailto:hello@homebase.rf.gd">contact support</a></h4>
    </center>
  </body>
</html>
<?php } ?>