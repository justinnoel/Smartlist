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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Login | Smartlist</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="shortcut icon" href="https://smartlist.ga/dashboard/icon/roofing.svg">
    <link rel="favicon" href="https://smartlist.ga/dashboard/icon/roofing.svg">
    <link rel="stylesheet" href="https://matthias-vogt.github.io/legitRipple.js/css/ripple.css">
    <meta name="title" content="Login | Smartlist">
    <meta name="description" content="Log in to your Smartlist account and access your entire home at the tap of a button!">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://metatags.io/">
    <meta property="og:title" content="Login | Smartlist">
    <meta property="og:description" content="Log in to your Smartlist account and access your entire home at the tap of a button!">
    <meta property="og:image" content="https://i.ibb.co/2kSY71Q/Screenshot-2021-04-08-1-57-23-PM.png">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://metatags.io/">
    <meta name="theme-color" content="#eee">
    <meta property="twitter:title" content="Login | Smartlist">
    <meta property="twitter:description" content="Log in to your Smartlist account and access your entire home at the tap of a button!">
    <meta property="twitter:image" content="https://i.ibb.co/2kSY71Q/Screenshot-2021-04-08-1-57-23-PM.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/css/materialize.min.css">
    <!-- Hotjar Tracking Code for smartlist.ga -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:2386239,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
    <style>
      * {
        box-sizing: border-box !important;
      }
      body, html {
        margin: 0;
        padding: 0;
        overflow: hidden;
      }
      .row {
        height: 100vh;
      }
      .col {
        height: 100%;
      }
      .input-field {
        max-width: 100%;
        /* overflow: scroll */
      }
      /*input {*/
      /*  border: 1px solid #aaa !important;*/
      /*  border-radius: 3px !important;*/
      /*  padding-left: 10px !important;*/
      /*  width: 100%;*/
      /*  display: block;*/
      /*  max-width: 100%;*/
      /*}*/
      /*label {*/
      /*  margin-left: 10px !important;*/
      /*  background: white;*/
      /*  transition: all .2s !important;*/
      /*  padding: 0 4px;*/
      /*  display: inline-block;*/
      /*}*/
      /*input:focus {*/
      /*  border-color: #6727ab !important;*/
      /*  box-shadow: 0px 0px 0px 1px rgba(103,39,171,1) inset !important;*/
      /*}*/
      /*.input-field input:focus + label.active {*/
      /*  color: #6727ab !important;*/
      /*}*/
      /*label.active {*/
      /*  margin-left: 7px !important;*/
      /*  margin-top: 8px !important*/
      /*}*/
      .waves-ripple {
        background: rgba(255, 255, 255, .4) !important
      }
      .darkTheme body {
        background: #212121;
        color: #fff;
      }
      .darkTheme .white {
        background: #212121 !important
      }
      .darkTheme input {
        color: white !important;
      }
      .darkTheme input:not(:focus) {
        border-color: #303030 !important
      }
      .darkTheme label {
        background: #212121 !important
      }
      .bg {
        background-size: 100vw;
        background-repeat: no-repeat !important;
      }
      .bar {
        position: fixed;
        top: 0;
        left: 0;
        height: 5px;
        background: #1565c0;
        width: 0%;
        transition: all 20s;
      }
* {
    -webkit-touch-callout:none;                /* prevent callout to copy image, etc when tap to hold */
    -webkit-text-size-adjust:none;             /* prevent webkit from resizing text to fit */
    -webkit-tap-highlight-color:rgba(0,0,0,0); /* prevent tap highlight color / shadow */
}

      .i1  {background-image: url("https://wallpaperaccess.com/full/31193.jpg");}
      .i2  {background-image: url("https://cdn.wallpapersafari.com/70/1/yGSYxk.jpg");}
      .i3  {background-image: url("https://thewallpaper.co/wp-content/uploads/2020/08/landscape-desktop-images-quality-beautiful-full-hd-free-smart-phone-background-nature-wallpaper-4k-1920x1080-1-1200x675.jpg");}
      .i4  {background-image: url("https://i.ibb.co/wJcrLJF/morning-yosemite-3840x2400.jpg");}
      .i5  {background-image: url("https://c4.wallpaperflare.com/wallpaper/384/818/513/himalayas-mountains-landscape-nature-wallpaper-preview.jpg");}
      .i6  {background-image: url("https://free4kwallpapers.com/uploads/originals/2019/05/18/awesome-himalayas-wallpaper.jpg");}
      .i7  {background-image: url("https://free4kwallpapers.com/uploads/originals/2019/05/20/hd-nature--wallpaper.jpg");}
      .i8  {background-image: url("https://3.bp.blogspot.com/-eilZTdgbWPA/XFUltCS4Z1I/AAAAAAAABz0/feDxTa3Emtsb3Wx4xxu0hWnFrohqtwQfwCKgBGAs/w2560-h1440-c/mountain-lake-scenery-nature-cottage-25-4K.jpg");}
      .i9  {background-image: url("https://wallpapers.com/images/high/4k-ultra-hd-nature-high-resolution-wallpaper-5n3jp9psonuimymd.jpg");}
      .i10 {background-image: url("https://www.pxwall.com/wp-content/uploads/2018/06/Wallpaper%20autumn,%20forest,%20mountain,%204k,%20Nature%20461537031.jpg");}
      .i11 {background-image: url("https://images.unsplash.com/photo-1606055854326-12a2fdcac6c0?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80");}
      .darkTheme .i1  {background-image: url("https://www.androidguys.com/wp-content/uploads/2015/11/milky_way_sky-wide.jpg") !important}
      .darkTheme .i2  {background-image: url("https://wallpaperaccess.com/full/1685406.jpg") !important}
      /* https://images.unsplash.com/photo-1505322022379-7c3353ee6291?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8bmlnaHR8ZW58MHx8MHx8&ixlib=rb-1.2.1&w=1000&q=80 */
      .darkTheme .i3  {background-image: url("https://i.pinimg.com/originals/33/f3/bd/33f3bda341b51f505bb54f10b5e83b2f.jpg") !important}
      .darkTheme .i4  {background-image: url("https://images.hdqwalls.com/download/mountains-landscape-dark-nature-4k-i0-2880x1800.jpg") !important}
      .darkTheme .i5  {background-image: url("https://i.pinimg.com/originals/51/82/ac/5182ac536727d576c78a9320ac62de30.jpg") !important}
      .darkTheme .i6  {background-image: url("https://images.unsplash.com/photo-1528353518104-dbd48bee7bc4?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTh8fG5pZ2h0fGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&w=1000&q=80") !important}
      .darkTheme .i7  {background-image: url("https://i.pinimg.com/originals/41/04/19/4104195a45059c28093f0f5ca7edfac5.jpg") !important}
      .darkTheme .i8  {background-image: url("https://cdn.wallpapersafari.com/30/71/gUeW2o.jpg") !important}
      .darkTheme .i9  {background-image: url("https://cdn.wallpapersafari.com/51/0/jwTGxo.jpg") !important}
      .darkTheme .i10 {background-image: url("https://wallpapercave.com/wp/wp2604216.jpg") !important}
      .darkTheme .i11 {background-image: url("https://www.pxwall.com/wp-content/uploads/2018/06/Wallpaper%20night,%20mountains,%20sky,%20stars,%204k,%20Nature%20564649069.jpg") !important}

 .logo {
        float: right;
        padding: 15px;
    }
      .checkbox-orange[type="checkbox"].filled-in:checked + label:after{
        border: 2px solid #ff9800;
        background-color: #ff9800;
      }
      [type="checkbox"]:checked+span:not(.lever):before,[type="checkbox"]:checked:not(.filled-in)+span:not(.lever):after {
          border-right-color: #6727ab !Important;
          border-bottom-color: #6727ab !Important;
          border-radius: 1px;
      }
      html, 
      body {
          overflow-x: hidden !important;
      }
      .consadftainer {
          padding: 20px;
          padding-top: 20vh;
      }
      @media only screen and (max-width: 992px) {
        .consadftainer {
          padding-top: 15vh !important;
          padding: 20px;
          width: 100%;
          margin: 0;
          padding-right: 20px;
        }
        body,html {
            overflow-y: scroll;
        }
        .hello {
            display: none;
        }
        .logo {
        float: none;
    }
    }
      .hello:hover {
        animation: r 1s;
      }
      @keyframes r {
        50% {
          transform: rotate(-45deg)
        }
        100% {
          transform: rotate(0deg)
        }
      }
    </style>
  </head>
  <body>
    <div class="bar" id="bar"></div>
    <div class="row">
      <div class="col s12 m6 bg grey lighten-3 hide-on-small-only"></div>
      <div class="col s12 m6 white">
          <div class="logo">
              <a href="https://smartlist.ga" style="font-weight:bold;color: #212121"><img src="https://res.cloudinary.com/smartlist/image/upload/v1617905788/logo_z3yoqm.svg" width="30px" style="display:inline-block;margin: 0 10px;vertical-align: middle">Smartlist</a>
          </div>
        <div class="consadftainer">
          <h4><b>Hi there, Welcome back! <img class="right hello" src="https://i.pinimg.com/originals/d8/32/10/d83210d052f3e7e4a7e78bfd16a6f23e.png" width="40px"></b></h4>
          <p>Log in to access your inventory, tasks, lists, and more!</p>
          <form method="POST" id="__login" action="https://smartlist.ga/dashboard/auth.php">
            <div class="input-field" onclick="this.getElementsByTagName('input')[0].focus()">
              <input type="text" id="u1" name='username' autocomplete="off" spellcheck="off" autofocus>
              <label>Username</label>
            </div>
            <div class="input-field" onclick="this.getElementsByTagName('input')[0].focus()">
              <input type="password" id="u2" name='password' autocomplete="off" spellcheck="off">
              <label>Password</label>
            </div>
            <label style="margin-bottom: 20px;margin-left: -3px !important" class="checkbox-orange">
              <input type="checkbox" oninput="showPassword()">
              <span>Show password</span>
            </label>
            <br><br>
            <button class="btn purple btn-large darken-3 ripple" style="width: 100%;height: 50px;line-height: 40px" id="submitBtn" name='submitBtnLogin'>Login</button>
          </form>
          <br><br>
          <div class="col s12">
            <span class='hide-on-small-only'>Don't have an account yet? </span><a href="https://smartlist.ga/signup">Sign up!</a> 
            <div class="right">
              <a href="https://smartlist.ga/dashboard/resources/fp.php">Forgot Password?</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/js/materialize.min.js"></script>
    <script src="https://matthias-vogt.github.io/legitRipple.js/js/ripple.js"></script>
    <script>
      function bar0() {
        document.getElementById('bar').style.width="0%"
        document.getElementById('bar').style.width="100%"
      }
      $(document).ready(function() {
        document.getElementById('submitBtn').addEventListener('click', function() {
        //   bar0();
          var x = document.getElementById('submitBtn')
          setTimeout(function() {
            x.disabled = true;
          }, 500);
        });
      })
      if($(window).width() > 922) {
        setInterval(function() {
          window.scrollTo(0, 0)
        }, 10)
      }
      function showPassword() {
        var x = document.getElementById("u2");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
      $(".ripple").ripple({
        maxDiameter: "100%"
      });
      $(document).ready(function() {
        $('input').keydown(function(event){
          if(event.keyCode == 2987) {
            event.preventDefault();
            return false;
          }
        });
      });
      $(document).ready(function(){
        var classCycle = ['i1','i2', 'i3', 'i4', 'i5', 'i6', 'i6', 'i7', 'i8', 'i9', 'i10', 'i11'];
        var randomNumber = Math.floor(Math.random() * classCycle.length);
        var classToAdd = classCycle[randomNumber];
        $('.bg').addClass(classToAdd);
      });
      if(localStorage.getItem('theme') == "dark") {
        $('html').addClass("darkTheme")
      }
      if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        $('html').addClass("darkTheme");
      }
      function reset() {
        document.getElementById('u1').innerHTML = "";
        document.getElementById('u2').innerHTML = "";
        document.getElementById('submitBtn').disabled = false;
        setTimeout(function() {
          document.getElementById('submitBtn').innerHTML = "Login";
        }, 200);
        // M.toast({html: "Invalid Username or Password"})
      }
      $("#__login").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        document.getElementById('bar').style.transitionDuration = '20s';
        document.getElementById('bar').style.width='100%';
        $.ajax({
          type: "POST",
          url: url,
          data: form.serialize(),
          success: function(data) {
            if(data == 'Invalid') {
              M.toast({html: 'Invalid username or password'});
              document.getElementById('bar').style.transitionDuration = '.2s';
              document.getElementById('bar').style.width='0%';
              reset();
            }
            else if(data == 'Empty') {
              M.toast({html: 'Both fields are required'});
              reset();
            }
            else if (data == 'Valid') {
            document.getElementById('bar').style.transitionDuration = '.2s';
            document.getElementById('bar').style.width='100vw';
              var x = document.getElementById('submitBtn');
              x.innerHTML = "Decrypting your account...";
              setTimeout(function() {
                x.innerHTML = "Cross-verifying your request...";
                setTimeout(function() {
                  x.innerHTML = "Retrieving your data from our servers"
                }, 100);
              }, 300)
              sessionStorage.setItem('status','loggedIn');
              history.pushState(null, null, 'https://smartlist.ga/dashboard/beta/')
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
            else {
              reset()
            }
          }
        });
      });
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